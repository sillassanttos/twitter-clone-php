$(document).ready(function() {

    $('#btn_tweet').click(function() {

        if ($('#texto_tweet').val().length > 0) {

            $.ajax({

                url: 'incluir_tweet.php',

                method: 'post',

                data: $('#form_tweet').serialize(),

                success: function(data) {

                    $('#texto_tweet').val('');

                    $('#texto_tweet').focus();

                }

            });

        }

    })

});