<?php

    require("../config.php");

    $method = strtolower($_SERVER['REQUEST_METHOD']);

    if ($method == "put"){

        parse_str(file_get_contents('php://input'), $input);

        // $id = (!empty($input['id'])) ? $input['id'] : null;
        $id = $input['id'] ?? null;
        $perfil = $input['perfil'] ?? null;
        $titulo = $input['titulo'] ?? null;
        $categoria = $input['categoria'] ?? null;
        $descricao = $input['descricao'] ?? null;

        $id = filter_var($id);
        $perfil = filter_var($perfil);
        $titulo = filter_var($titulo);
        $categoria = filter_var($categoria);
        $descricao = filter_var($descricao);
      
        if ($id && $perfil && $titulo && $categoria && $descricao){

            $sql = $pdo->prepare("SELECT * FROM registros WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();

            if($sql->rowCount() > 0){

                $sql = $pdo->prepare("UPDATE registros SET perfil = :perfil, titulo = :titulo, categoria = :categoria, descricao = :descricao WHERE id = :id");
                $sql->bindValue(":id", $id);
                $sql->bindValue(':perfil', $perfil);
                $sql->bindValue(':titulo', $titulo);
                $sql->bindValue(':categoria', $categoria);
                $sql->bindValue(':descricao', $descricao);
                $sql->execute();

                $array['result'] = [
                    "mensagem" => "Alteração feita com sucesso!"
                ];

            } else {

                $array['error'] = "ID inexistente";

            }

        } else {

            $array['error'] = "Dados não enviados";

        }

    } else {

        $array['error'] = "Método não permitido (apenas PUT)";

    }

    require("../return.php");

?>