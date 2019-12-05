<?php

namespace Grafica\Projeto\Entity;

/**
 * @Entity
 * @Table(name="uploads")
 */
 class Uploads
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;

    /**
    * @Column(type="integer")
    * @ManyToOne(targetEntity="Registros")
    * @JoinColumn(name="id_registro", referencedColumnName="id")
    */
   public $id_registro;

    /**
     * @Column(type="integer")
     * @ManyToOne(targetEntity="Usuario")
     * @JoinColumn(name="id_usuario", referencedColumnName="id")
     */
    private $id_usuario;

     /**
     * @Column(type="string")
     */
    public $file;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getIdUsuario(): int
    {
        return $this->id_usuario;
    }

    public function setIdUsuario(int $id_usuario): void
    {
        $this->id_usuario = $id_usuario;
    }

    public function getIdRegistro(): int
    {
        return $this->id_registro;
    }

    public function setIdRegistro(int $id_registro): void
    {
        $this->id_registro = $id_registro;
    }
    
    public function getFile(): string
    {
        return $this->file;
    }

    public function setFile(string $file): void
    {
        $this->file = $file;
    }

}