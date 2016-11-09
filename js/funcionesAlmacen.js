$(document).ready(function drawMap(latlng) {
    function quitar_marcadores(lista) {
        for (i in lista) {

            lista[i].setMap(null);
        }
    }
    var mapa;
    function initMap() {

        //Variable del punto incial
        var punto = new google.maps.LatLng(10.4041806, -75.4981457);

        //Variable para configuracion incial
        var config = {
            zoom: 16,
            center: punto,
            mapTypeId: google.maps.MapTypeId.mapa,
            scrollwheel: true
        };

        //Variable del mapa
        mapa = new google.maps.Map(document.getElementById('mapa'), config);

        var direccion = new google.maps.LatLng(10.4041806, -75.4981457);

        //Variable para marcador
        var marcador = new google.maps.Marker({
            title: "SEDE PRINCIPAL",
            position: direccion, //Posicion del nuevo marcador
            map: mapa, //en que mapa se ubicara el marcador
            animation: google.maps.Animation.Drop, //como aparecera el marcador
            draggable: false //no permitir el arraste del marcador
        });
        //Ubicar el marcador en el mapa
        marcador.setMap(mapa);
        //Mostrar una alerta al hacer click en el mapa
        google.maps.event.addListener(mapa, "click", function (event) {
            //Coordenadas
            var coordenadas = event.latLng.toString();
            coordenadas = coordenadas.replace("(", "");//Para quitar los parentesis
            coordenadas = coordenadas.replace(")", "");
            var formulario = $("#formulario");
            var lista = coordenadas.split(",");


            var direccion = new google.maps.LatLng(lista[0], lista[1]);

            var nombreMarcador = prompt("Titulo del marcador?");
            if (nombreMarcador !== "" && nombreMarcador !== null) {
                //Variable para marcador
                var marcador = new google.maps.Marker({
                    titulo: nombreMarcador,
                    position: direccion, //Posicion del nuevo marcador
                    map: mapa, //en que mapa se ubicara el marcador
                    animation: google.maps.Animation.Drop, //como aparecera el marcador
                    draggable: false // Permitir el arraste del marcador

                });
            }
            //Agregar evento click al marcador

            formulario.find("input[name='latitud']").val(lista[0]);
            formulario.find("input[name='longitud']").val(lista[1]);
            formulario.find("input[name='nombre']").val(nombreMarcador);
            formulario.find("input[name='descripcion']").focus();
            //Ubicar el marcador en el mapa
            marcador.setMap(mapa);
        });

    }
    google.maps.event.addDomListener(window, "load", initMap);
});

$.ajax({
    url: "ListarPuntos",
    success: function (puntos) {
        $.each(puntos, function (i, p) {
            marcador = new google.maps.Marker({
                title: p.nombre,
                position: new google.maps.LatLng(p.latitud, p.longitud),
                map: mapa,
                animation: google.maps.Animation.DROP
            });
            google.maps.event.addListener(marcador, 'click', function (event) {
                var nombreAlmacen = $('#nombreAlmacen').val(p.nombre);
                var latitud = $('#latitud').val(event.latLng.lat());
                var longitud = $('#longitud').val(event.latLng.lng());
                var descripcion = $('#descripcion').val(p.descripcion);
            });
        });
    }
});

function enviarUbicacion(ubicacion) {
    swal({
        title: "Indicanos donde!", 
        text: "Ingresa el correo sincronizado con el telefono donde quieres recibir nuestra ubicación.", 
        type: "input", 
        showCancelButton: true, 
        closeOnConfirm: false, 
        animation: "slide-from-top", 
        inputPlaceholder: "Write something"}, 
        function (inputValue) {
        if (inputValue === false)
            return false;
        if (inputValue === "") {
            swal.showInputError("No puedes dejar el campo de texto vacio!");
            return false
        }
        $.post('EnviarUbCorreo', {
            position: ubicacion,
            correo: inputValue
        }, function (h) {
            if(h === 'OK'){
                swal("Perfecto!", "Lo hemos enviado a: " + inputValue, "success");
            } 
            
            if(h === 'ERROR1'){
                swal("Ups!", "Algo ha salido mal. Intentalo mas tarde.", "error");
            }
        });
        
    });

}
