<?php
namespace App\Services;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

final class ServiceEntityManager
{

    private static $instance = null;

    /**
     * gets the EntityManager
     * @return EntityManager
     */
    public static function getInstance(): EntityManager
    {
        $isDevMode = true;
        $proxyDir = null;
        $cache = null;
        $useSimpleAnnotationReader = false;
        $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/../"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

        $conn = array(
            'driver'   => $_ENV['DB_DRIVER'],
            'user'     => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASSWORD'],
            'dbname'   => $_ENV['DB_NAME'],
        );

        if (static::$instance === null) {
            static::$instance = $entityManager = EntityManager::create($conn, $config);
        }

        return static::$instance;
    }


    private function __construct()
    {
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

}