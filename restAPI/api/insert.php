<?php

    require("../config.php");

    $method = strtolower($_SERVER['REQUEST_METHOD']);

    if ($method == "post"){

        $perfil = filter_input(INPUT_POST, 'perfil');
        $titulo = filter_input(INPUT_POST, 'titulo');
        $categoria = filter_input(INPUT_POST, 'categoria');
        $descricao = filter_input(INPUT_POST, 'descricao');

        if ($perfil && $titulo && $categoria && $descricao){

            $sql = $pdo->prepare("INSERT INTO registros (perfil, titulo, categoria, descricao) VALUES (:perfil, :titulo, :categoria, :descricao)");
            $sql->bindValue(':perfil', $perfil);
            $sql->bindValue(':titulo', $titulo);
            $sql->bindValue(':categoria', $categoria);
            $sql->bindValue(':descricao', $descricao);
            $sql->execute();

            $id = $pdo->lastInsertId();

            $array['result'] = [
                'id' => $id,
                'perfil' => $perfil,
                'titulo' => $titulo,
                'categoria' => $categoria,
                'descricao' => $descricao
            ];

        } else {

            $array['error'] = "Campos não enviados";

        }

    } else {

        $array['error'] = "Método não permitido (apenas POST)";

    }

    require("../return.php");

?>