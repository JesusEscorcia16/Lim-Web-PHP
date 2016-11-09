$(document).ready(function () {
    $('#form_modificar_usuario').submit(function (e) {
        e.preventDefault();

        var id = $('#id').val();
        var nombre = $('#nombre').val();
        var apellido = $('#apellido').val();
        var telefono = $('#telefono').val();
        var direccion = $('#direccion').val();
        var actualpass = $('#actualpass').val();
        var newpass = $('#newpass').val();
        var correo = $('#correo').val();

        $.post('ModificarUsuario', {
            id: id,
            nombre: nombre,
            apellido: apellido,
            telefono: telefono,
            direccion: direccion,
            actualpass: actualpass,
            newpass: newpass,
            correo: correo
        }, function (h) {
            if (h === 'OK') {
                swal('Actualización correcta', 'Se han actualizado tus datos correctamente. Te redireccionaremos automaticamente en 3 segundos.', 'success');
                setTimeout(function () {
                    window.location = "index.jsp";
                }, 3000);
            }

            if (h === 'ERROR1') {
                swal('Error', 'La nueva contraseña  debe tener al menos 5 caracteres.', 'error');
            }

            if (h === 'ERROR2') {
                swal('Error', 'La nueva contraseña no puede ser igual a tu correo.', 'error');
            }

            if (h === 'ERROR3') {
                swal('Error', 'La nueva contraseña no puede ser igual a tu identificación.', 'error');
            }

            if (h === 'ERROR4') {
                swal('Error', 'La contraseña  no coincide con la almacenada en nuestros servidores.', 'error');
            }
        });
    });
});

