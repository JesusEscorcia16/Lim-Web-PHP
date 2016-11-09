$(document).ready(function(){
   $('#form_registro_producto').submit(function(e){
       e.preventDefault();
       
       var codigo = $('#codigo').val();
       var marca = $('#marca').val();
       var nombre = $('#nombre').val();
       var categoria = $('#categoria').val();
       var precio = $('#precio').val();
       var descripcion = $('#descripcion').val();
       var stockM = $('#stockM').val();
       var stock = $('#stock').val();
       var estado = $('#gender').val();
       $.post('RegistroProducto', {
           codigo: codigo,
           marca: marca,
           nombre: nombre,
           categoria: categoria,
           precio: precio,
           descripcion: descripcion,
           stockM: stockM,
           stock: stock,
           gender: estado
       }, function(h){
           if(h === 'OK'){
               document.getElementById('form_registro_producto').reset();
               swal('Registro correcto','Se ha registrado correctamente el producto.','success');
           }
           if(h === 'ERROR'){
               document.getElementById('form_registro_producto').reset();
               swal('Error','El producto que intentas registrar ya se encuentra en la base de datos.','error');
           }
       });
   });
});