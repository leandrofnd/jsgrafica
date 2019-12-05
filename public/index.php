<?php

require __DIR__ . '/../vendor/autoload.php';

use Grafica\Projeto\Controller\Registrar;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Container\ContainerInterface;
use Grafica\Projeto\Controller\Cadastro;
use Grafica\Projeto\Helper\RenderizarHtml;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Http\Server\RequestHandlerInterface;

require __DIR__ . '/../config/env.php';

$rotas = require __DIR__ . '/../config/routes.php';

$classeExistente = verifyRouter($_SERVER['PATH_INFO']);

$caminho = $_SERVER['PATH_INFO']; 

session_start();

$ehRotaDeLogin = stripos($caminho, 'login');

if (!isset($_SESSION['logado']) && $ehRotaDeLogin === false && $classeExistente != Cadastro::class && $classeExistente != Registrar::class) {
    header('Location:' . BASE . '/login');
    exit();
}

$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

$serverRequest = $creator->fromGlobals();

// $classeControladora = $rotas[$caminho];
$classeControladora = $classeExistente;
/** @var ContainerInterface $container */
$container = require __DIR__ . '/../config/dependencies.php';
/** @var RequestHandlerInterface $controlador */
$controlador = $container->get($classeControladora);

$resposta = $controlador->handle($serverRequest);

foreach ($resposta->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $resposta->getBody();
