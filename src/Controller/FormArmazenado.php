<?php

namespace Grafica\Projeto\Controller;

use Nyholm\Psr7\Response;
use Grafica\Projeto\Entity\Uploads;
use Grafica\Projeto\Entity\Usuario;
use Grafica\Projeto\Entity\Registros;
use Grafica\Projeto\Entity\Observacao;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use Grafica\Projeto\Helper\RenderizarHtml;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Grafica\Projeto\Helper\FlashMessageTrait;

class FormArmazenado implements RequestHandlerInterface
{
    use RenderizarHtml;

    private $repositorio;

    private $armazenamento;

    private $uploads;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorio = $entityManager
            ->getRepository(Registros::class);

        $this->armazenamento = $entityManager
            ->getRepository(Observacao::class);

        $this->uploads = $entityManager
        ->getRepository(Uploads::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $usuario = json_decode($_SESSION ['logado']);

        $registros = $this->repositorio->findBy(['id_usuario' => $usuario->id]);

        $arquivos = $this->uploads->findBy(['id_usuario' => $usuario->id]);

        $isObservacao = false;

        $isArquivo = false;

        if(!$isArquivo && !empty($arquivos)){
            $isArquivo = true;
        }

        foreach ($registros as $registro){
            $observacoes = $this->armazenamento->findBy(['id_usuario' => $usuario->id, 'id_registro' => $registro->getId()]);
            if(!$isObservacao && !empty($observacoes)){
                $isObservacao = true;
            }
            $registro->observacoes = $observacoes;
        }

        $html = $this->renderizaHtml('formulario/form-armazenado.php', [
            'registros'    => $registros,
            'isObservacao' => $isObservacao,
            'isArquivo'    => $isArquivo,
            'arquivos'     => $arquivos
        ]);

        return new Response(200, [], $html);
    }
}