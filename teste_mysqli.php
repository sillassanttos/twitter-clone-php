<?php

    require_once('db.class.php');

    $objDb = new db();
    
    $link = $objDb -> conecta_mysql();

    $sql = "select * from usuarios";

    $resultado_id = (mysqli_query($link, $sql));

    if ($resultado_id) {

        $dados_usuario = array();
        
        while ( $linha = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)) {
            $dados_usuario[] = $linha;
        }

        var_dump($dados_usuario);

        echo '<br>';
        echo '<br>';

        foreach($dados_usuario as $usuario) {
            var_dump($usuario);
            echo '<br>';
            echo '<br>';

        }

    } else {

        echo 'Erro ao efetuar consulta no banco de dados';
    }

?>