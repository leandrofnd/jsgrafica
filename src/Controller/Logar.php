<?php

namespace Grafica\Projeto\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Grafica\Projeto\Helper\RenderizarHtml;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;


class Logar implements  RequestHandlerInterface
{
    use RenderizarHtml;

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $html = $this->renderizaHtml('login/logar.php', []);

        return new Response(200, [], $html);
    }
}