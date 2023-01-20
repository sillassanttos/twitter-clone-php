$(document).ready(function() {

    $('#btn_login').click(function() {

        var campo_vazio = false;

        $('#campo_usuario').css({'border-color': '#accc'});
        $('#campo_email').css({'border-color': '#accc'});

        if ($('#campo_usuario').val() == '') {
            campo_vazio = true;
            $('#campo_usuario').css({'border-color': '#a94442'});
        }

        if ($('#campo_senha').val() == '') {
            campo_vazio = true;
            $('#campo_senha').css({'border-color': '#a94442'});
        }

        if (campo_vazio) return false;

    });

})