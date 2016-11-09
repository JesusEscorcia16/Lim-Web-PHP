function modificarUsuario() {
    var actualpass = document.getElementById("actualpass");
    var id = document.getElementById("idd");    
    var newpass = document.getElementById("newpass");
    var nombre = document.getElementById("nombre");
    var apellido = document.getElementById("apellido");
    var correo = document.getElementById("correo");
    var telefono = document.getElementById("telefono");
    var direccion = document.getElementById("direccion");
    $.post("ModificarUsuario", {id: id, actualpass: actualpass, newpass: newpass,
    nombre: nombre, apellido: apellido, correo: correo, telefono: telefono,
    direccion: direccion}, function (h) {
        if (h != 'OK')
            alert(h);
    });
    event.preventDefault();
}

