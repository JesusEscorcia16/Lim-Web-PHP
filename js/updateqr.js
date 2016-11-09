$(document).ready(function(){
    $('#update_qr').submit(function(e){
        e.preventDefault();
        
        var id = $('#id').val();
        
        $.post('UpdateQr', {
            id: id
        }, function(h){
            if(h === 'OK'){
                swal('Correcto','Se han actualizado los codigos QR de todos los productos.','success');
            }
            if(h === 'ERROR1'){
                swal('Error','Ha ocurrido un error al actualizar los codigos. Intentalo mas tarde.','error');
            }
        });
    });
});