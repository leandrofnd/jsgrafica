<?php

namespace Grafica\Projeto\Controller;

use Nyholm\Psr7\Response;
use Grafica\Projeto\Entity\Usuario;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use Grafica\Projeto\Helper\RenderizarHtml;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormArmazenado implements RequestHandlerInterface
{
    use RenderizarHtml;

    private $repositorio;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorio = $entityManager
            ->getRepository(Usuario::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        $html = $this->renderizaHtml('formulario/form-armazenado.php', [
            'usuario' => $this->repositorio->find($id)
        ]);

        return new Response(200, [], $html);
    }
}