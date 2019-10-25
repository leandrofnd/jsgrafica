<?php

namespace Grafica\Projeto\Controller;

use Nyholm\Psr7\Response;
use Grafica\Projeto\Entity\Usuario;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use Grafica\Projeto\Helper\RenderizarHtml;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Doctrine\Common\Persistence\ObjectRepository;

class RealizarLogin implements  RequestHandlerInterface
{
    use RenderizarHtml;

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    private $repositorio;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorio = $entityManager
            ->getRepository(Usuario::class);
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {

        $email = filter_var(
            $request->getParsedBody()['email'],
            FILTER_SANITIZE_STRING
        );

        $senha = filter_var(
            $request->getParsedBody()['senha'],
            FILTER_SANITIZE_STRING
        );

        /** @var Usuario $usuario */
        $usuario = $this->repositorio
        ->findOneBy([
            'email_login' => $email,
            'senha' => $senha,
        ]);
        
        if(is_null($usuario)){
            return new Response(300, ['Location' => BASE . "/login"]);
        }

        $_SESSION['logado'] = json_encode($usuario);
        
        // echo(json_last_error_msg ());
        if($usuario->is_admin == '1'){
            return new Response(300, ['Location' => BASE . "/adm"]);
        }
        
        return new Response(300, ['Location' => BASE . '/formView']);

    }
}