<?php

namespace Grafica\Projeto\Controller;

use Nyholm\Psr7\Response;
use Grafica\Projeto\Entity\Usuario;
use Grafica\Projeto\Entity\Registros;
use Grafica\Projeto\Entity\Observacao;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use Grafica\Projeto\Services\EnviarEmail;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
// use Grafica\Projeto\Entity\Usuario;

class Persistir implements RequestHandlerInterface
{

    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;

    private $repositorio;

    private $armazenamento;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

        $this->repositorio = $entityManager
        ->getRepository(Registros::class);

        $this->armazenamento = $entityManager
        ->getRepository(Observacao::class);
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
        
        $usuario = json_decode($_SESSION['logado']);

        $registro = new Registros();
        
        $registro->setCnpj($cnpj);
        $registro->setNome($nome);
        $registro->setTelefone($telefone);
        $registro->setCpf($cpf);
        $registro->setCpfTitular($cpf_titular);
        $registro->setFuncao($funcao);
        $registro->setCidade($cidade);
        $registro->setQuantidade($quantidade);
        $registro->setEmail($email);
        $registro->setIdUsuario($usuario->id);

        if (isset($request->getQueryParams()['registro_id'])) {
            $data_registro = $this->repositorio->findOneBy([
                'id' => $request->getQueryParams()['registro_id']
            ]);
            
            $registro->setId($request->getQueryParams()['registro_id']);
            $this->entityManager->merge($registro);

            foreach ($data_registro as $campo => $valor_campo){
                if(($campo != 'id') && ($post[$campo] != $valor_campo)){
                    $observacao = $this->armazenamento->findBy([
                        'id_registro' => $data_registro->id,
                        'id_usuario' => $usuario->id,
                        'campo' => $campo
                    ]);

                    if(!empty($observacao)){
                        $this->entityManager->remove($observacao);
                    }
                }
            }            
        } else {
            die("Erro ao inserir registro");
            $this->entityManager->persist($registro);
        }

        $this->entityManager->flush();

        $resposta = new Response(300, ['Location' => BASE . '/form-armazenado']);
        
        if(!empty ($post["EMAIL_CONTENT"])){           
            $enviar = new EnviarEmail($post["EMAIL_USER"], $post["EMAIL_CONTENT"]);
            $enviar->enviarEmail();          
        }

        return $resposta;
    }
}