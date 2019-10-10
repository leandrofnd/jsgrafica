<?php

define("BASE", "/public/index.php");

use Grafica\Projeto\Controller\{
    Formulario,
    Persistir,
    FormArmazenado,
    Error404,
    Logar};

function verifyRouter($searchRouter)
{
    $routes = [
        '/formView' => Formulario::class,
        '/formEnviado' => Persistir::Class,
        '/form-armazenado' => FormArmazenado::Class,
        '/error404' => Error404::Class,
        '/login' => Logar::Class,
        '/dashboard' => Dashboard::Class, 
    ];
    return array_key_exists($searchRouter, $routes) ? $routes[$searchRouter] : $routes["/error404"];
}

