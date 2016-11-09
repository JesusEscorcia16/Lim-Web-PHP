
function eliminarProducto(cod) {
    if (confirm("Seguro que desea eliminar este producto?")) {
        $.post("eliminarProducto", {codigo: cod}, function (h) {
            if (h == 'OK')
                $("#p_" + cod).remove();
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

function eliminarCategoria(cod) {
    if (confirm("Seguro que desea eliminar esta categoria?")) {
        $.post("eliminarCategoria", {codigo: cod}, function (h) {
            if (h == 'OK')
                $("#c_" + cod).remove();
            else
                alert(h);
        });
        event.preventDefault();
    }
}

function modificarCategoria(cod) {
    var name = prompt("Nombre de la categoria:");
    if (name != null) {
        $.post("ModificarCategoria", {codigo: cod, nombre: name}, function (h) {
            if (h == 'OK')
                location.href = "products.jsp?mod=true";
            else
                alert(h);
        });
        event.preventDefault();
    } else {
        alert("El nombre no puede estar vacio");
    }
}

function exportarExcel() {
    if (confirm("Desea incluir productos deshabilitados?")) {
        window.open('exportarExcel.jsp?d=s', '', '')
    } else {
        window.open('exportarExcel.jsp', '', '')
    }
}


function eliminarAlmacen(cod){
    if(confirm("Seguro que desea eliminar el almacen?")){
        $.post("EliminarAlmacen", {codigo: cod}, function(h){
            if(h == "OK")
                $("a_" + cod).remove();
            else{
                alert(h);
            }
        });
        event.preventDefault();
    }
}