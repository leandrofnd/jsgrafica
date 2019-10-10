<?php

namespace Grafica\Projeto\Controller;

use Nyholm\Psr7\Response;
use Grafica\Projeto\Entity\Usuario;
use Grafica\Projeto\Helper\Verify;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use Grafica\Projeto\Helper\RenderizarHtml;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Formulario extends Verify implements RequestHandlerInterface
{
    use RenderizarHtml;

    public $repositorio;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorio = $entityManager
            ->getRepository(Usuario::class);
        // parent::__construct($entityManager, Usuario::Class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = null;
        if(isset($request->getQueryParams()['id'])) {
            $id = $request->getQueryParams()['id'];
        }
        
        $isEdit = false;
        if(!is_null($id)){
            $isEdit = true;
        }

        $cidades = include(__DIR__ . '/CollectionCidades.php');
        $response = [
            'cidades' => $cidades,
            'isEdit' => $isEdit
        ];
        
        if($isEdit){
            $response['usuario'] = $this->repositorio->find($id);
        }

        $html = $this->renderizaHtml('formulario/formView.php', $response);

        return new Response(200, [], $html);
    }
}