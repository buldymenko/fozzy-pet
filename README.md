# PETS FACTORY

### Installation:

1. Clone this repository.
2. Load mysql dump fozzy_pet_dump.sql.
3. Copy config file `cp .env.dist .env`.
4. Edit .env file for connect to DB.
5. Run `php composer.phar install` to install the required resources.
6. You can see all commands. Run `php index.php list` shows available commands.

#### Tests:
Run `php vendor/bin/phpunit`.

#### Using:
1. Add pet, run `php index.php add cat Vasya`.
2. Now your pet can make a sound, run `php index.php voice Vasya`.

The application supports several types of pets: cat, dog, hamster, parrot; 

# MY GEO APP

### Installation:
1. Run from root dir of project `cd web`.
2. Run `npm install` to install the required resources.
3. Now need to run application `npm start`.
4. Open http://localhost:1234/ in your browser.
