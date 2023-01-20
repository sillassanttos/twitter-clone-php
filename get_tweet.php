<?php

    session_start();

    if (!isset($_SESSION['usuario'])) {
        header('Location: index.php?erro=1');
    }

    require_once('db.class.php');

    $id_usuario = $_SESSION['id_usuario'];

    $objDb = new db();
    
    $link = $objDb -> conecta_mysql();

    $sql  = "select u.usuario as nome_usuario ";
    $sql .= "     , t.tweet ";
    $sql .= "     , date_format(t.data_inclusao, '%d %b %Y %T') as data_inclusao ";
    $sql .= "  from tweet t ";
    $sql .= " inner ";
    $sql .= "  join usuarios u ";
    $sql .= "    on t.id_usuario = u.id ";
    $sql .= " where t.id_usuario = $id_usuario ";
    $sql .= " order ";
    $sql .= "    by t.data_inclusao desc ";

    $resultado_id = mysqli_query($link, $sql); 

    if ($resultado_id) {

        while ($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)) {

            echo '<a href="#" class="list-group-item">';
            echo '  <h4 class="list-group-item-heading">' . $registro['nome_usuario'] . '<small> em: ' . $registro['data_inclusao'] . '</small></h4>';
            echo '  <p class="list-group-item-text">' . $registro['tweet'] . '</p>';
            echo '</a>';

        }

    } else {

        echo 'Erro na consulta de tweets';

    }


?>