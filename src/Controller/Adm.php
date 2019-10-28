<?php

namespace Grafica\Projeto\Controller;

use Nyholm\Psr7\Response;
use Grafica\Projeto\Entity\Usuario;
use Grafica\Projeto\Entity\Registros;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use Grafica\Projeto\Helper\RenderizarHtml;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Adm implements RequestHandlerInterface
{
    use RenderizarHtml;

    public $armazenamento;
    public $repositorio;

    public function __construct(EntityManagerInterface $entityManager)
    {

        $this->armazenamento = $entityManager
            ->getRepository(Usuario::class);

        $this->repositorio = $entityManager
            ->getRepository(Registros::class);
    }
    
    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        $usuarioSessao = json_decode($_SESSION ['logado']);
        
        if($usuarioSessao->is_admin == '0'){
            return new Response(200, ['Location' => BASE . '/logout']);
        }

        $allRegistros =[];

        $usuarios =$this->armazenamento->findBy([
            'ativo'    => 1, 
            'is_admin' => 0
        ]);

        foreach ($usuarios as $usuario){
            $registros = $this->repositorio->findBy([
                'id_usuario' => $usuario->id
            ]);

            $allRegistros[] = [
                'nome_usuario' => $usuario->nome,
                'registros' => $registros
            ];
        }

        $html = $this->renderizaHtml('administrador/adm.php', [
            'user_data' => $allRegistros
        ]);

        return new Response(200, [], $html);
    }
}