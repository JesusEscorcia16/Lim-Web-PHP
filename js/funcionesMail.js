function eliminarContacto(id) {
    if (confirm("Seguro que desea eliminar este mensaje?")) {
        $.post("EliminarContacto", {id: id}, function (h) {
            if (h == 'OK')
                $("#m_" + id).remove();
            else
                alert(h);
        });
    }
}

function pagina() {
    location.href = "mail.jsp?" + document.getElementById("tabla").value;
}
