$(document).on("click", "#btnlogin", function () {
    var usu_correo = $('#txtcorreo').val();
    var usu_pass = $('#txtpass').val();

    if (usu_correo == '' || usu_pass == '') {
        $('#lblmensaje').show();
        $('#lblerror').hide();
        $('#lblregistro').hide();
    } else {
        $.post("controller/usuario.php?op=acceso", {usu_correo: usu_correo, usu_pass: usu_pass}, function(data) {
            if (data == 0) {
                $('#lblerror').show();
                $('#lblmensaje').hide();
            } else {
                // Guardar el estado de sesión
                sessionStorage.setItem('isLoggedIn', 'true');
                window.open('http://localhost:8080/login/view/home/', '_self');
            }
        });
    }
});
