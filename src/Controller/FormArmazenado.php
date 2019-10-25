<?php

namespace Grafica\Projeto\Controller;

use Nyholm\Psr7\Response;
use Grafica\Projeto\Entity\Registros;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use Grafica\Projeto\Helper\RenderizarHtml;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Grafica\Projeto\Entity\Usuario;

class FormArmazenado implements RequestHandlerInterface
{
    use RenderizarHtml;

    private $repositorio;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorio = $entityManager
            ->getRepository(Registros::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $usuario = json_decode($_SESSION ['logado']);

        $html = $this->renderizaHtml('formulario/form-armazenado.php', [
            'registros' => $this->repositorio->findBy(['id_usuario' => $usuario->id]),
            // 'usuario' => $usuario->id
        ]); 

        return new Response(200, [], $html);
    }
}