<?php

$my_file = 'CollectionCidades.php';

$handle = fopen($my_file, 'w') or die('Cannot open file: ' . $my_file);

$cidades = include(__DIR__ . "/SP.php");
$count = 1;

foreach ($cidades as $cidade){
    $newCidade = [
        "id"     => $count,
        "cidade" => $cidade
    ];

    $newCollections[] = $newCidade;
    $count++;
}

fwrite($handle, var_export($newCollections, true));
fclose($handle);