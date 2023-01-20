$(document).ready(function() {

    $('#btn_procurar_pessoa').click(function() {
        if ($('#nome_pessoa').val().length > 0) {
            $.ajax({
                url: 'get_pessoas.php',
                method: 'post',
                data: $('#form_procurar_pessoas').serialize(),
                success: function(data) {
                    $('#pessoas').html(data);

                    $('.btn_seguir').click(function() {
                        // data-id_usuario
                        var id_usuario = $(this).data('id_usuario');

                        $('#btn_seguir_' + id_usuario).hide();
                        $('#btn_deixar_seguir_' + id_usuario).show();

                        $.ajax({
                            url: 'seguir.php',
                            method: 'post',
                            data: { seguir_id_usuario: id_usuario },
                            success : function(data) {
                                console.log(data);
                            }
                        });
                    });

                    $('.btn_deixar_seguir').click(function() {
                        // data-id_usuario
                        var id_usuario = $(this).data('id_usuario');

                        $('#btn_seguir_' + id_usuario).show();
                        $('#btn_deixar_seguir_' + id_usuario).hide();

                        $.ajax({
                            url: 'deixar_seguir.php',
                            method: 'post',
                            data: { deixar_seguir_id_usuario: id_usuario },
                            success : function(data) {
                                console.log(data);
                            }
                        });
                    });
                }
            });
        }
    });

});