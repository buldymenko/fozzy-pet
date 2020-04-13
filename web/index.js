import 'ol/ol.css';
import Map from 'ol/Map';
import Overlay from 'ol/Overlay';
import View from 'ol/View';
import {toStringHDMS} from 'ol/coordinate';
import TileLayer from 'ol/layer/Tile';
import {fromLonLat, toLonLat} from 'ol/proj';
import OSM from 'ol/source/OSM';


var layer = new TileLayer({
    source: new OSM()
});

var map = new Map({
    layers: [layer],
    target: 'map',
    view: new View({
        center: [0, 0],
        zoom: 2
    })
});


var onSuccess = function(location){
    var pos = fromLonLat([location.location.longitude, location.location.latitude]);

    var marker = new Overlay({
        position: pos,
        positioning: 'center-center',
        element: document.getElementById('marker'),
        stopEvent: false
    });

    map.addOverlay(marker);
};

var onError = function(error){
    alert(
        "Error:\n\n"
        + JSON.stringify(error, undefined, 4)
    );
};

geoip2.city(onSuccess, onError);

map.on('click', function(evt) {
    var coordinate = evt.coordinate;

    var marker = new Overlay({
        positioning: 'center-center',
        element: document.getElementById('marker'),
        stopEvent: false
    });

    marker.setPosition(coordinate);
    map.addOverlay(marker);

    $('#longitude').val(toLonLat(coordinate)[0]);
    $('#latitude').val(toLonLat(coordinate)[1]);

});

$('#set-coordinates').click(function () {
    var newPos = fromLonLat([$('#longitude').val(), $('#latitude').val()]);

    var newMarker = new Overlay({
        position: newPos,
        positioning: 'center-center',
        element: document.getElementById('marker'),
        stopEvent: false
    });

    map.addOverlay(newMarker);
});