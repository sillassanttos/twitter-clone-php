<?php

    require_once('db.class.php');

    $usuario = $_POST['usuario'];

    $senha = $_POST['senha'];

    $objDb = new db();
    
    $link = $objDb -> conecta_mysql();

    $sql = "select * from usuarios where usuario = '$usuario' and senha = '$senha';";

    $resultado_id = (mysqli_query($link, $sql));

    if ($resultado_id) {

        $dados_usuario = mysqli_fetch_array($resultado_id);

       if (isset($dados_usuario['usuario'])) {



       } else {

            header('Location: index.php?erro=1');

       }

    } else {

        echo 'Erro ao efetuar consulta no banco de dados';

    }

?>