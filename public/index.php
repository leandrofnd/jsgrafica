<?php

require __DIR__ . '/../vendor/autoload.php';

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;

require __DIR__ . '/../config/env.php';


$rotas = require __DIR__ . '/../config/routes.php';

$classeExistente = verifyRouter($_SERVER['PATH_INFO']);

// $caminho = $_SERVER['PATH_INFO'];

// if (!array_key_exists($caminho, $rotas)) {
//     http_response_code(404);
//     exit();
// }

session_start();


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
