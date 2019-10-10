<?php

namespace Grafica\Projeto\Entity;


/**
 * @Entity
 * @Table(name="registro")
 */

 class Registros
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
    private $cnpj;
    /**
     * @Column(type="string")
     */
    private $nome;
    /**
     * @Column(type="string")
     */
    private $telefone;
    /**
     * @Column(type="string")
     */
    private $cpf;
    /**
     * @Column(type="string")
     */
    private $cpf_titular;
    /**
     * @Column(type="string")
     */
    private $funcao;
    /**
     * @Column(type="string")
     */
    private $cidade;
    /**
     * @Column(type="string")
     */
    private $quantidade;
    /**
     * @Column(type="string")
     */
    private $email;
    

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCnpj(): string
    {
        return $this->cnpj;
    }

    public function setCnpj(string $cnpj): void
    {
        $this->cnpj = $cnpj;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function setTelefone(string $telefone): void
    {
        $this->telefone = $telefone;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): void
    {
        $this->cpf = $cpf;
    }

    public function getCpfTitular(): string
    {
        return $this->cpf_titular;
    }

    public function setCpfTitular(string $cpf_titular): void
    {
        $this->cpf_titular = $cpf_titular;
    }

    public function getFuncao(): string
    {
        return $this->funcao;
    }

    public function setFuncao(string $funcao): void
    {
        $this->funcao = $funcao;
    }

    public function getCidade(): string
    {
        return $this->cidade;
    }

    public function setCidade(string $cidade): void
    {
        $this->cidade = $cidade;
    }

    public function getQuantidade(): string
    {
        return $this->quantidade;
    }

    public function setQuantidade(string $quantidade): void
    {
        $this->quantidade = $quantidade;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }


}