<?php

namespace Grafica\Projeto\Controller;

use Nyholm\Psr7\Response;
use Grafica\Projeto\Entity\Observacao;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Grafica\Projeto\Helper\FlashMessageTrait;

class EnviarObs implements RequestHandlerInterface
{

    use FlashMessageTrait;

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $post = $request->getParsedBody();

        $id_usuario = $request->getQueryParams()['id_usuario'];
        $id_registro = $request->getQueryParams()['id_registro'];
        
        try {
            $observacao = new Observacao($this->entityManager);
            $observacao->make($post, $id_usuario, $id_registro);
            $observacao->save();
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        $this->defineMensagem('info', 'Observação enviada!');
        return new Response(300, ['Location' => BASE . "/adm"]);

    }
}

