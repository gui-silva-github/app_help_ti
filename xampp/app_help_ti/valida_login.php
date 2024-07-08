<?php

    session_start();

    $usuario_autenticado = false;
    $usuario_id_email = null;
    $usuario_perfil_id = null;

    $perfis = array(1 => 'Administrativo', 2 => 'Usuário');
    
    $usuarios_app = array(
        array(
            'id_email'=> 1,
            'email'=>'adm@teste.com',
            'senha'=>'1234',
            'perfil_id'=>1
        ),
        array(
            'id_email'=> 2,
            'email'=>'user@teste.com',
            'senha'=>'abcd',
            'perfil_id'=>1
        ),
        array(
            'id_email'=> 3,
            'email'=>'maria@teste.com',
            'senha'=>'1234',
            'perfil_id'=>2
        ),
        array(
            'id_email'=> 4,
            'email'=>'jose@teste.com',
            'senha'=>'abcd',
            'perfil_id'=>2
        )
    );

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);

    foreach($usuarios_app as $usuario){
        if($usuario['email'] == $email && $usuario['senha'] == $senha){
            $usuario_autenticado = true;
            $usuario_id_email = $usuario['id_email'];
            $usuario_perfil_id = $usuario['perfil_id'];
        }
    }

    if($usuario_autenticado){
        $_SESSION['autenticado'] = "SIM";
        $_SESSION['id_email'] = $usuario_id_email;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        header('Location: u/home.php');
    } else {
        header('Location: index.php?login=erro');
    }

?>