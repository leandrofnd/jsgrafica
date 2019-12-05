<?php

namespace Grafica\Projeto\Entity;

/**
 * @Entity
 * @Table(name="observacoes")
 */
 class Observacao
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;

    /**
     * @Column(type="integer")
     * @ManyToOne(targetEntity="Usuario")
     * @JoinColumn(name="id_usuario", referencedColumnName="id")
     */
    private $id_usuario;

     /**
     * @Column(type="string")
     */
    private $campo;

     /**
     * @Column(type="string")
     */
    public $observacao;

     /**
     * @Column(type="integer")
     * @ManyToOne(targetEntity="Registros")
     * @JoinColumn(name="id_registro", referencedColumnName="id")
     */
    public $id_registro;

    private $entityManager;

    private $repositorio;

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

    public function getCampo(): string
    {
        return $this->campo;
    }

    public function setCampo(string $campo): void
    {
        $this->campo = $campo;
    }

    public function getObservacao(): string
    {
        return $this->observacao;
    }

    public function setObservacao(string $observacao): void
    {
        $this->observacao = $observacao;
    }

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repositorio = $this->entityManager->getRepository(self::Class);
    }
    
    public function make(array $data = [], int $id_usuario, $id_registro)
    {
        
        if(empty($data))
            throw new \Exception("Não há data", 401);

        foreach ($data as $key => $value) {
            $verifyed = filter_var(
                $value,
                FILTER_SANITIZE_STRING
            );
            $this->setIdRegistro($id_registro);
            $this->setIdUsuario($id_usuario);
            $this->setCampo($key);
            $this->setObservacao($verifyed);
            $this->entityManager->persist($this);
        }
        return $this;
    }

    public function save()
    {
        $this->entityManager->flush();
    }
}