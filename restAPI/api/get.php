<?php

    require("../config.php");

    $method = strtolower($_SERVER['REQUEST_METHOD']);

    if ($method == "get"){

        $id = filter_input(INPUT_GET, 'id');

        if ($id){

            $sql = $pdo->prepare("SELECT * FROM registros WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();

            if($sql->rowCount() > 0){

                $data = $sql->fetch(PDO::FETCH_ASSOC);

                $perfil = $data['perfil'] == 1 ? "ADM" : "USER";

                $array['result'] = [
                    'id' => $data['id'],
                    'perfil' => $perfil,
                    'titulo' => $data['titulo'],
                    'categoria' => $data['categoria'],
                    'descricao' => $data['descricao'],
                    'log-chamado' => $data['log_chamado']
                ];

            } else {

                $array['error'] = "ID inexistente";

            }

        } else {
            
            $array['error'] = "ID não enviado";

        }

    } else {

        $array['error'] = "Método não permitido (apenas GET)";

    }

    require("../return.php");

?>