function buscar() {
    location.href = "index.php?search=" + document.getElementById("txtBuscar").value + "#pnlproductos";
}

$(document).ready(function ()
{
    $("#modalContacto").modal("show");
});

function runScript(e) {
    if (e.keyCode == 13) {
        var tb = document.getElementById("txtBuscar");
        buscar()
        return false;
    }
}