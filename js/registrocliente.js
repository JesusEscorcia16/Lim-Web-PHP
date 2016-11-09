$(document).ready(function () {
    $('#registro').submit(function (e) {
        e.preventDefault();

        var data = $(this).serializeArray();
        data.push({name: 'tag', value: 'contacto'});

        var nombre = $('#nombre').val();
        var apellidos = $('#apellidos').val();
        var identificacion = $('#identificacion').val();
        var correo = $('#correo').val();
        var pass = $('#pass').val();
        var telefono = $('#telefono').val();
        var direccion = $('#direccion').val();
        var sexo = $('#gender').val();

        $.post('ValidarRegistro', {
            nombre: nombre,
            apellidos: apellidos,
            identificacion: identificacion,
            correo: correo,
            pass: pass,
            telefono: telefono,
            direccion: direccion,
            gender: sexo
        }, function (h) {
            if (h === 'OK') {
                swal('Correcto', 'Se ha registrado correctamente! Lo redireccionaremos automáticamente en 3 segundos.', 'success');
                setTimeout(function () {
                    window.location = "index.jsp";
                }, 3000);
            }
            
            if (h === 'ERROR') {
                swal({title: "Ups!",
                    text: "Parece que el correo que instentas registrar pertenece a otra cuenta de LIM.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Si, restaurar!",
                    cancelButtonText: "No, intentar de nuevo.",
                    closeOnConfirm: true,
                    closeOnCancel: true},
                function (isConfirm) {
                    if (isConfirm) {
                        window.location = "restorePass.jsp";
                    }
                });
                //swal('Ups!', 'Parece que el correo que instentas registrar pertenece a otra cuenta de LIM. <a href="restorePass.jsp">Recupera tu cuenta</a>', 'error');
            }
            
            if (h === 'ERRORPASS') {
                swal('Ups!', 'Tu contraseña no puede ser igual a tu correo o identificación. Intentalo de nuevo.', 'error');
            }
            if (h === 'ERRORLONGPASS') {
                swal('Ups!', 'La contraseña debe tener al menos 5 caracteres.', 'error');
            }
        })
    });
});