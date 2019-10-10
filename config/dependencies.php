<?php

$builder = new DI\ContainerBuilder();
$builder->addDefinitions([
    \Doctrine\ORM\EntityManagerInterface::class => function () {
        return (new \Grafica\Projeto\Infra\EntityManagerCreator())
            ->getEntityManager();
    }
]);
$container = $builder->build();

return $container;
