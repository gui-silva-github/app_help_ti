<?php

    require("../config.php");

    $method = strtolower($_SERVER['REQUEST_METHOD']);

    if ($method == "get"){

        $sql = $pdo->query("SELECT * FROM registros");

        if($sql->rowCount() > 0){

            $data = $sql->fetchAll(PDO::FETCH_ASSOC);

            foreach($data as $item){

                $array['result'] = [
                    'id' => $item['id'],
                    'titulo' => $item['titulo'],
                    'categoria' => $item['categoria'],
                    'descricao' => $item['descricao']
                ];

            }

        }

    } else {

        $array['error'] = "Método não permitido (apenas GET)";

    }

    require("../return.php");

?>