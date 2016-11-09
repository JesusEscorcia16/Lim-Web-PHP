<?php
session_start();
$codigo_producto = $_GET['cod'];
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" type="image/png" href="../imgs/Logo.png" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>LIM Detalle producto</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/est-dp.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/est-index.css">
        <link href="../css/est-restorePass.css" rel="stylesheet" type="text/css"/>        
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="../js/validar_login.js" type="text/javascript"></script>
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="../js/funcionesMenu.js" type="text/javascript"></script>
        <script src="../js/qrcode.js" type="text/javascript"></script>
    </head>
    <body>
        <?php include('./menu.php'); ?>


        <?php if ($codigo_producto != null) { 
            $mysql = conectar();
            $producto = $mysql->query("SELECT * FROM producto WHERE codigo = '$codigo_producto' AND estado = 't' AND estado_online = 't'")->fetch_assoc();
            if($producto != null){
            ?>
            <br><br><br><br>
            <div class="container" >
                <table align="center" class="table" >
                    <tr>
                        <td id="nomProducto"><h7><?= $producto['nombre'] ?></h7></td>
                    <td id="codigo"><h7>Código: <?= $producto['codigo'] ?></h7></td>
                    </tr>
                    <td id="td"><!--IMAGEN PRODUCTO-->
                        <div class="mag">
                            <img src="../files/pintuco.jpg" data-toggle="magnify" >
                            <br>
                            <p id="descripcion"><font color="#808080" ><?=$producto['descripcion']?></font></p>
                            <br>
                        </div>
                    </td>

                    <td width="20" id="cont"><!--INFORMACION PRODUCTO-->
                        <div>
                            <br>
                            <form>
                                <table>
                                    <tr>
                                        <td>
                                            <button class="btn btn-primary"onclick="update_qrcode('<?='192.168.1.68/LIM/pages/producto.php?cod='.$codigo_producto?>', 'mostrarqr')" style="width: 180px">Ver código QR</button>
                                        </td>
                                        <td>
                                            <div id="mostrarqr"></div> 
                                        </td>
                                    </tr>
                                </table>                   
                            </form>
                            <br>
                            <h4>&nbsp;<font color="337ab7" size="5"><span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;$<?= $producto['precio'] ?></font></h4>
                            <br>
                            <h5>Marca:&nbsp;<?=$producto['marca']?></h5>
                            <?php $categoria = $mysql->query("SELECT nombre FROM categoria WHERE id = {$producto['id_categoria']}")->fetch_assoc(); ?>
                            <h5> Categoría: &nbsp;<?=$categoria['nombre']?></h5>
                            <h5> Veces vendido: &nbsp;<?=$producto['veces_vendido']?></h5>
                        </div>
                    </td>
                </table>
            </div>
            <?php } else {?>
            
            <br><br><br><br>
            <div align="center">
                <h1>PRODUCTO NO ENCONTRADO</h1>
            </div>        
            
            <?php }            
            } else { 
            ?>
                
            <br><br><br><br>
            <div align="center">
                <h1>PRODUCTO NO ENCONTRADO</h1>
            </div>
        <?php } ?>


    </body>
</html>
