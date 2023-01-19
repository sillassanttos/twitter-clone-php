<?php

    require_once('db.class.php');

    $usuario = $_POST['usuario'];

    $email = $_POST['email'];

    $senha = md5($_POST['senha']);

    $usuario_existe = false;

    $email_existe = false;

    $objDb = new db();
    
    $link = $objDb -> conecta_mysql();

    $sql = "select * from usuarios where usuario = '$usuario'";

    if ($resultado_id = mysqli_query($link, $sql)) {

        $dados_usuario = mysqli_fetch_array($resultado_id);

        $usuario_existe = isset($dados_usuario['usuario']);

    } 

    $sql = "select * from usuarios where email = '$email'";

    if ($resultado_id = mysqli_query($link, $sql)) {

        $dados_usuario = mysqli_fetch_array($resultado_id);

        $email_existe = isset($dados_usuario['usuario']);

    }  
    
    if ($usuario_existe || $email_existe) {

        $retorno_get = '';

        if ($usuario_existe) {

            $retorno_get .= "erro_usuario=1&";

        }

        if ($email_existe) {

            $retorno_get .= "erro_email=1&";

        }

        header('Location: inscrevase.php?' . $retorno_get);

        die();

    }

    $sql = " insert into usuarios(usuario, email, senha) values('$usuario', '$email', '$senha')";

    if (mysqli_query($link, $sql)) {

        echo 'Usuários registrado com sucesso';

    } else {

        echo 'Erro ao registrar o usuário';
        
    }

?>