$(document).ready(function() {

    $('#btn_tweet').click(function() {

        if ($('#texto_tweet').val().length > 0) {

            $.ajax({

                url: 'incluir_tweet.php',

                method: 'post',

                data: $('#form_tweet').serialize(),

                success: function(data) {

                    atualizaTweet();

                    $('#texto_tweet').val('');

                    $('#texto_tweet').focus();

                }

            });

        }

    });


    function atualizaTweet() {

        $.ajax({

            url: 'get_tweet.php',

            success: function(data) {

                $('#tweets').html(data);

            }

        });

    }


    atualizaTweet();

});