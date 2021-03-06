<?php

namespace Grafica\Projeto\Infra;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerCreator
{
    public function getEntityManager(): EntityManagerInterface
    {
        $paths = [__DIR__ . '/../Entity'];
        $isDevMode = false;

        $dbParams = array(
            'dbname'   => 'teste',
            'user'     => 'root',
            'password' => '',
            'host'     => 'localhost',
            'driver'   => 'pdo_mysql',
            'charset'  => 'utf8',
            'driveroptions'=>array(1002=>"SET NAMES utf8")
        );

        $config = Setup::createAnnotationMetadataConfiguration(
            $paths,
            $isDevMode
        );
        return EntityManager::create($dbParams, $config);
    }
}
