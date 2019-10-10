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
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private $email_login;

    /**
     * @Column(type="string")
     */
    private $senha;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getEmailLogin(): string
    {
        return $this->email_login;
    }

    public function setEmailLogin(string $email_login): void
    {
        $this->email_login = $email_login;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha(string $senha): void
    {
        $this->senha = $senha;
    }
}