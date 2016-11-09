$(document).ready(function () {
    $('#formrestaurar').submit(function (e) {
        e.preventDefault();

        var correo = $('#correo').val();
        $.post('restorePass', {
            correo: correo,
            beforeSend: function () {
                $('.loader').show();
            }
        }, function (h) {
            if (h === 'OK') {
                swal('Correcto', 'Se ha enviado tu información al correo que nos proporcionaste', 'success');
                $('.loader').hide();
            } else {
                if (h === 'ERROR') {
                    swal('Ups!', 'El correo que ingresaste no pertenece a ninguna cuenta de nuestro sistema.', 'error');
                    $('.loader').hide();
                } else {
                    if (h === 'ERRORENVIO') {
                        swal('Ups!', 'Nuestro sistema esta experimentando problemas para el envio de correos. Intentalo mas tarde.', 'error');
                        $('.loader').hide();
                    } else {
                        if (h === 'ERRORCAMPOS') {
                            swal('Ups!', 'Ningun campo puede estar vacio. Intentalo mas tarde.', 'error');
                            $('.loader').hide();
                        }
                    }
                }
            }
        });

    });
});