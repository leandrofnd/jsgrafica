<?php

namespace Grafica\Projeto\Helper;

// use Grafica\Projeto\Entity\Usuario;
// use Doctrine\ORM\EntityManagerInterface;

class Verify
{
    public $repositorio;

    public function __construct(EntityManagerInterface $entityManager, $entity)
    {
        $this->repositorio = $entityManager
            ->getRepository($entity);
    }

    public function verificaId($id)
    {
        
    }
}