$(document).ready(function () {
    $('#formulario').submit(function (e) {
        e.preventDefault();

        var nombre = $('#nombre').val();
        var descripcion = $('#descripcion').val();
        var latitud = $('#latitud').val();
        var longitud = $('#longitud').val();

        $.post('RegistroAlmacen', {
            nombre: nombre,
            descripcion: descripcion,
            latitud: latitud,
            longitud: longitud
        }, function (h) {
            if (h === 'OK') {
                swal('Registrado correctamente', 'Se ha registrado correctamente la ubiación del nuevo almacen.', 'success');
            }

            if (h === 'ERROR1') {
                swal('Error', 'Ninguno de los campos puede estar vacio.', 'error');
            }
        });
    });
});


