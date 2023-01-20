<?php

    session_start();

    if (!isset($_SESSION['usuario'])) {
        header('Location: index.php?erro=1');
    }

    require_once('db.class.php');

    $nome_pessoa = $_POST['nome_pessoa'];

    $id_usuario = $_SESSION['id_usuario'];

    $objDb = new db();
    
    $link = $objDb -> conecta_mysql();

    $sql  = " select u.*, us.id as id_usuario_seguidor ";
    $sql .= "   from usuarios u  ";
    $sql .= "   left ";
    $sql .= "   join usuarios_seguidores us ";
    $sql .= "     on us.id_usuario = $id_usuario ";
    $sql .= "    and u.id = us.id_usuario_seguindo ";
    $sql .= "  where u.usuario LIKE '%$nome_pessoa%' ";
    $sql .= "    and u.id <> $id_usuario ";

    $resultado_id = mysqli_query($link, $sql); 

    if ($resultado_id) {

        while ($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)) {

            $seguindo = isset($registro['id_usuario_seguidor']) && !empty($registro['id_usuario_seguidor']) ? 'S' : 'N';

            $btn_seguir_display = 'block';
            $btn_deixar_seguir_display = 'block';

            if ($seguindo == 'N') {
                $btn_deixar_seguir_display = 'none';
            } else {
                $btn_seguir_display = 'none';
            }

            echo '<a href="#" class="list-group-item">';
            echo '  <strong>' . $registro['usuario'] . '</strong> <small> - ' . $registro['email'] . '</small>';
            echo '  <p class="list-group-item-text pull-right">';
            echo '      <button id="btn_seguir_' . $registro['id'] . '" type="button" style="display: '. $btn_seguir_display .'" class="btn btn-default btn_seguir" data-id_usuario="' . $registro['id'] . '">Seguir</button>';
            echo '      <button id="btn_deixar_seguir_' . $registro['id'] . '" type="button" style="display: '. $btn_deixar_seguir_display .'" class="btn btn-primary btn_deixar_seguir" data-id_usuario="' . $registro['id'] . '">Deixar de Seguir</button>';
            echo '  </p>';
            echo '  <div class="clearfix"></div>';
            echo '</a>';

        }

    } else {

        echo 'Erro na consulta de usuarios';

    }


?>