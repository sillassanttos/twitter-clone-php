<?php

    session_start();

    if (!isset($_SESSION['usuario'])) {
        header('Location: index.php?erro=1');
    }

    require_once('db.class.php');

    $id_usuario = $_SESSION['id_usuario'];

    $deixar_seguir_id_usuario = $_POST['deixar_seguir_id_usuario'];

    if ($deixar_seguir_id_usuario == '' || $id_usuario == '') {
        die();
    }

    $objDb = new db();
    
    $link = $objDb -> conecta_mysql();

    $sql  = " delete ";
    $sql .= "   from usuarios_seguidores ";
    $sql .= "  where id_usuario = $id_usuario  ";
    $sql .= "    and id_usuario_seguindo = $deixar_seguir_id_usuario ";
    
    mysqli_query($link, $sql); 

?>