<?php

namespace Grafica\Projeto\Controller;

use Nyholm\Psr7\Response;
use Grafica\Projeto\Entity\Usuario;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Registrar implements RequestHandlerInterface
{
     /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;

    private $repositorio;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

        $this->repositorio = $entityManager
        ->getRepository(Usuario::class);
    }
    
    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        $post = $request->getParsedBody();

        $username = filter_var(
            $post['username'],
            FILTER_SANITIZE_STRING
        );

        $email = filter_var(
            $post['email'],
            FILTER_SANITIZE_STRING
        );

        $senha1 = filter_var(
            $post['senha1'],
            FILTER_SANITIZE_STRING
        );

        $senha2 = filter_var(
            $post['senha2'],
            FILTER_SANITIZE_STRING
        );

          /** @var Usuario $usuario */
          $usuario = $this->repositorio
          ->findOneBy([
              'email_login' => $email,
              'senha' => $senha2,
          ]);

        if(!isset($usuario) && $senha1 == $senha2){
            $usuario = new Usuario();

            $usuario->setNome($username);
            $usuario->setEmail($email);
            $usuario->setSenha(password_hash($senha2, PASSWORD_BCRYPT));
            $usuario->is_admin = 0;
            $usuario->ativo = 1;

            $this->entityManager->merge($usuario);

            $this->entityManager->flush();

            $_SESSION['logado'] = json_encode($usuario);
            
            $resposta = new Response (300, ['Location' => BASE . '/formView']);
            return $resposta;
        }else{
            echo('Usuário já existente!');
            $resposta = new Response (300, ['Location' => BASE . '/login']);
            return $resposta;
        }
    }
}