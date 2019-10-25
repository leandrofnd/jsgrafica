<?php

define("BASE", "/public/index.php");

use Grafica\Projeto\Controller\{
    Formulario,
    Persistir,
    FormArmazenado,
    Adm,
    Error404,
    Logar,
    RealizarLogin,
    Logout};

function verifyRouter($searchRouter)
{
    $routes = [
        '/login' => Logar::Class,
        '/realizar-login' => RealizarLogin::Class,
        '/formView' => Formulario::class,
        '/formEnviado' => Persistir::Class,
        '/form-armazenado' => FormArmazenado::Class,
        '/adm' => Adm::Class, 
        '/error404' => Error404::Class,
        '/logout' =>Logout::Class,
    ];
    return array_key_exists($searchRouter, $routes) ? $routes[$searchRouter] : $routes["/error404"];
}