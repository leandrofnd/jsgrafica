<?php

namespace Grafica\Projeto\Controller;

use Nyholm\Psr7\Response;
use Grafica\Projeto\Entity\Usuario;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use Grafica\Projeto\Services\EnviarEmail;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Persistir implements RequestHandlerInterface
{

    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        
        $post = $request->getParsedBody();

        $cnpj = filter_var(
            $post['cnpj'],
            FILTER_SANITIZE_STRING
        );

        $nome = filter_var(
            $post['nome'],
            FILTER_SANITIZE_STRING
        );

        $telefone = filter_var(
            $post['telefone'],
            FILTER_SANITIZE_STRING
        );

        $cpf = filter_var(
            $post['cpf'],
            FILTER_SANITIZE_STRING
        );

        $cpf_titular = filter_var(
            $post['cpf_titular'],
            FILTER_SANITIZE_STRING
        );

        $funcao = filter_var(
            $post['funcao'],
            FILTER_SANITIZE_STRING
        );

        $cidade = filter_var(
            $post['cidade'],
            FILTER_SANITIZE_STRING
        );

        $quantidade = filter_var(
            $post['quantidade'],
            FILTER_SANITIZE_STRING
        );

        $email = filter_var(
            $post['EMAIL_USER'],
            FILTER_SANITIZE_STRING
        );

        $usuario = new Usuario();
        
        $usuario->setCnpj($cnpj);
        $usuario->setNome($nome);
        $usuario->setTelefone($telefone);
        $usuario->setCpf($cpf);
        $usuario->setCpfTitular($cpf_titular);
        $usuario->setFuncao($funcao);
        $usuario->setCidade($cidade);
        $usuario->setQuantidade($quantidade);
        $usuario->setEmail($email);

        if (isset($request->getQueryParams()['id'])) {
            $id = filter_var(
                $request->getQueryParams()['id'],
                FILTER_VALIDATE_INT
            );
            $usuario->setId($id);
            $this->entityManager->merge($usuario);
        } else {
                $this->entityManager->persist($usuario);
        }
        
        $this->entityManager->flush();

        $resposta = new Response(300, ['Location' => BASE . "/form-armazenado?id={$usuario->getId()}"]);
        
        if(!empty ($post["EMAIL_CONTENT"])){           
            $enviar = new EnviarEmail($post["EMAIL_USER"], $post["EMAIL_CONTENT"]);
            $enviar->enviarEmail();          
        }
        return $resposta;
    }
}