<?php

namespace Grafica\Projeto\Controller;

use Nyholm\Psr7\Response;
use Grafica\Projeto\Entity\Registros;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use Grafica\Projeto\Helper\RenderizarHtml;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Formulario implements RequestHandlerInterface
{
    use RenderizarHtml;

    public $repositorio;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorio = $entityManager
        ->getRepository(Registros::class);
    }
    
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        
        $usuarioSessao = json_decode($_SESSION ['logado']);
        
        $isEdit = false;
        $registro_id = 0;
        $usuario_id = null;

        if(isset($request->getQueryParams()['registro_id'])) {
            $registro_id = $request->getQueryParams()['registro_id'];
            $isEdit = true;
        }

        if(!isset($registro_id)){
            echo"Não possui registros!";
        }
    
        $cidades = include(__DIR__ . '/CollectionCidades.php');
        $response = [
            'cidades' => $cidades,
            'isEdit' => $isEdit,
            'usuario' => $usuarioSessao,
            'registro' => $this->repositorio->find($registro_id)
        ];

        $html = $this->renderizaHtml('formulario/formView.php', $response);

        return new Response(200, [], $html);
            
    }
}