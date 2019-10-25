<?php

namespace Grafica\Projeto\Entity;

/**
 * @Entity
 * @Table(name="usuario")
 */

class Usuario
{
     /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     *  @OneToMany(targetEntity="Registros")
     *  @JoinColumn(name="id", referencedColumnName="id_usuario")
     */
    public $id;

    /**
     * @Column(type="string")
     */
    public $email_login;

    /**
     * @Column(type="string")
     */
    public $senha;

     /**
     * @Column(type="string", columnDefinition="ENUM('visible', 'invisible')") 
     */
    public $is_admin;

     /**
     * @Column(type="string")
     */
    public $nome;

     /**
     * @Column(type="string", columnDefinition="ENUM('visible', 'invisible')") 
     */
    public $ativo;

    public function getId(): int
    {
        return $this->id;
    }


    
    // public function senhaEstaCorreta(string $senhaPura): bool
    // {
    //     return password_verify($senhaPura, $this->senha);
    // }

}