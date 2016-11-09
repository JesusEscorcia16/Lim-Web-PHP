$(document).ready(function () {
    $('#form_contacto').submit(function (e) {
        e.preventDefault();

        var data = $(this).serializeArray();
        data.push({name: 'tag', value: 'contacto'});

        var nombre = $('#nombre').val();
        var correo = $('#correo').val();
        var asunto = $('#asunto').val();
        var mensaje = $('#mensaje').val();

        $.post('ValidarContactos', {
            nombre: nombre,
            correo: correo,
            asunto: asunto,
            mensaje: mensaje
        }, function (h) {
            if (h === 'OK') {
                swal('Envío correcto', 'Se ha enviado correctamente tu petición a nuestros servidores. Te responderemos en cuanto encontremos una solución a tu problema. Nos pondremos en contacto contigo mediante el correo que nos proporcionaste.', 'success');
            } else {
                if (h === 'ERROR') {
                    swal('Ups!', 'Ha ocurrido un error al enviar tu petición a nuestros servidores. Intentalo mas tarde.', 'error');
                } else {
                    if (h === 'ERRORCAMPOS') {
                        swal('Ups!', 'Ningun campo puede estar vacio.', 'error');
                    }
                }
            }
        });
    });
});


