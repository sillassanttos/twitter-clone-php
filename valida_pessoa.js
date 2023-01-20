$(document).ready(function() {

    $('#btn_procurar_pessoa').click(function() {

        if ($('#nome_pessoa').val().length > 0) {

            $.ajax({

                url: 'get_pessoas.php',

                method: 'post',

                data: $('#form_procurar_pessoas').serialize(),

                success: function(data) {

                    $('#pessoas').html(data);

                    // $('#texto_tweet').val('');

                    // $('#texto_tweet').focus();

                }

            });

        }

    });




});