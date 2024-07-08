<?php

    session_start();

    $titulo = str_replace("#", "-", filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS));
    $categoria = str_replace("#", "-", filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_SPECIAL_CHARS));
    $descricao = str_replace("#", "-", filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS));

    $id = $_SESSION['id_email'];

    $texto = $id . '#' . $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL; 

    $arquivo = fopen('../../../app_help_ti/aberturas.txt', 'a');

    fwrite($arquivo, $texto);

    fclose($arquivo);

    header('Location: ../u/abrir_chamado.php?status=sucesso');

?>