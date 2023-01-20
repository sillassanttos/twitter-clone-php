<?php

    session_start();

    if (!isset($_SESSION['usuario'])){

        header('Location: index.php?erro=1');

    }
    require_once('db.class.php');

    $objDb = new db();
    
    $link = $objDb -> conecta_mysql();

	$id_usuario = $_SESSION['id_usuario'];

	$sql = "select count(*) as qtde_tweets from tweet where id_usuario = $id_usuario ";

    $resultado_id = mysqli_query($link, $sql); 

	$qtde_tweets = 0;

    if ($resultado_id) {
        $registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
		$qtde_tweets = $registro['qtde_tweets'];
    } else {
        echo 'Erro na consulta de tweets';
    }

	$sql = "select count(*) as qtde_seguidores from usuarios_seguidores where id_usuario_seguindo = $id_usuario ";

    $resultado_id = mysqli_query($link, $sql); 

	$qtde_seguidores = 0;

    if ($resultado_id) {
        $registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
		$qtde_seguidores = $registro['qtde_seguidores'];
    } else {
        echo 'Erro na consulta de tweets';
    }

?>