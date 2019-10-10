<?php

namespace Grafica\Projeto\Helper;

trait RenderizarHtml
{
    public function renderizaHtml(string $caminhoTemplate, array $dados): string
    {
        extract($dados);
        ob_start();
        $full_path = __DIR__ . '/../../view/' . $caminhoTemplate;
        if(file_exists($full_path)){
            require $full_path;
        }else{
            require __DIR__ . '/../../view/formulario/error404.php';
        }
        $html = ob_get_clean();

        return $html;

    }
}