<?php

    require("../config.php");

    $method = strtolower($_SERVER['REQUEST_METHOD']);

    if ($method == "delete"){

        parse_str(file_get_contents('php://input'), $input);

        // $id = (!empty($input['id'])) ? $input['id'] : null;
        $id = $input['id'] ?? null;

        $id = filter_var($id);

        if ($id){

            $sql = $pdo->prepare("SELECT * FROM registros WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();

            if($sql->rowCount() > 0){

                $sql = $pdo->prepare("DELETE FROM registros WHERE id = :id");
                $sql->bindValue(":id", $id);
                $sql->execute();

                $array['result'] = [
                    "mensagem" => "Chamado excluído com sucesso!"
                ];

            } else {

                $array['error'] = "ID inexistente";

            }

        } else {

            $array['error'] = "ID não enviado";

        }
        
    } else {

        $array['error'] = "Método não permitido (apenas DELETE)";

    }

    require("../return.php");

?>