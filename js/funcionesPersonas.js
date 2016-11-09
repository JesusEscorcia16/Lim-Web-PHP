function eliminarCliente(cod) {
    if (confirm("Seguro que desea eliminar esta persona?")) {
        $.post("EliminarCliente", {codigo: cod}, function (h) {
            if (h == 'OK')
                $("#c_" + cod).remove();
            else
                alert(h);
        });
        event.preventDefault();
    }
}

function eliminarEmpleado(id) {
    if (confirm("Seguro que desea eliminar esta persona?")) {
        $.post("EliminarEmpleado", {id: id}, function (h) {
            if (h == 'OK')
                $("#e_" + id).remove();
            else
                alert(h);
        });
        event.preventDefault();
    }
}

function runScript(e) {
    if (e.keyCode == 13) {
        var tb = document.getElementById("txtBuscar");
        buscar()
        return false;
    }
}

function buscar() {
    location.href = "persona.jsp?search=" + document.getElementById("txtBuscar").value;
}





