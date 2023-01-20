<?php

    session_start();

    if (!isset($_SESSION['usuario'])) {
        header('Location: index.php?erro=1');
    }

    require_once('db.class.php');

    $id_usuario = $_SESSION['id_usuario'];

    $seguir_id_usuario = $_POST['seguir_id_usuario'];

    if ($seguir_id_usuario == '' || $id_usuario == '') {
        die();
    }

    $objDb = new db();
    
    $link = $objDb -> conecta_mysql();

    $sql  = " insert ";
    $sql .= "   into usuarios_seguidores ";
    $sql .= "      ( id_usuario ";
    $sql .= "      , id_usuario_seguindo ";
    $sql .= "      ) ";
    $sql .= " values ";
    $sql .= "      ( $id_usuario ";
    $sql .= "      , $seguir_id_usuario ";
    $sql .= "      )";

    mysqli_query($link, $sql); 

?>