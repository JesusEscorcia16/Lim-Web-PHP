<?php
session_start();
$rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : null;
?>

<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbp9M_rtiDsK_EK6oR-SJIh5OUcT2AN_U"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>LIM Almacenes</title>
        <script src="../resourcesjs/jquery.js" type="text/javascript"></script>
        <link href="../resources/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../resourcesjs/bootstrap.min.js" type="text/javascript"></script>
        <script src="../js/funcionesMenu.js" type="text/javascript"></script>
        <script src="../js/sweetalert.min.js" type="text/javascript"></script>
        <link href="../css/sweetalert.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="../css/est-product.css">
        <link rel="stylesheet" type="text/css" href="../css/est-index.css">
        <script src="../resourcesjs/angular.min.js" type="text/javascript"></script>
        <link rel="icon" type="image/png" href="imgs/Logo.png" />
        <link href="../css/est-almacen.css" rel="stylesheet" type="text/css"/>
        <script src="../js/funcionesAlmacen.js" type="text/javascript"></script>
        <script src="../js/validar_login.js" type="text/javascript"></script>
        <script src="../js/registro_almacen.js" type="text/javascript"></script>
    </head>
    <body>

        <!---SE REUTILIZA EL MENU GENERICO PARA TODAS LAS VISTAS--->
        <?php include('./menu.php'); ?>
        <!---SE REUTILIZA EL MENU GENERICO PARA TODAS LAS VISTAS--->

        <!--GESTION ALMACEN-->
        <?php
        $result = $mysql->query("SELECT * FROM almacen;");
        $count = mysqli_num_rows($result);
        ?>
        <br>
        <div class="container">
            <div align="center">
                <img class="img-responsive" src="../imgs/gps.png" width="100" height="100">
                <h3 class="text-center text-gray"><font color="6b6b6b">ALMACENES PINTU ELECTRICOS
                    <br><font size="3">Almacenes registrados <span class="label label-default">
                        <?=$count?></span></font></font> </h3><br>
            </div>

            <form id="formulario" action="../js/registro_almacen.js" method="post" >
                <table  id="div1">  

                    <?php
                    if ($rol === 'A') {
                        ?>
                        <td id="td1" style="height: 440px; width: 200px">
                            <h1><font color="white" size="5px"><center>&nbsp;&nbsp;Nuevo Almacén</center></font></h1>
                            <div class="col-md-5 col-sm-5">
                                <br>  
                                <input type="text"  name="nombre" id="nombre" class="txtInput" placeholder="Nombre almacén" required>                                                                                              
                                <input type="text" name="descripcion" id="descripcion" class="txtInput" placeholder="Descripción" required/>                                                                                               
                                <input type="text" onfocus="this.blur()" id="latitud" name="latitud" class="txtInput" placeholder="Latitud"  required>                                                                                               
                                <input type="text" onfocus="this.blur()" id="longitud" name="longitud" class="txtInput" placeholder="Longitud" required>                                                                                                                                                                            
                                <div >
                                    <button type="submit" class="btn btn-primary" style=" border-radius: 0px; width: 203px; margin-bottom:3px "><center>Listo</center></button>
                                    <button type="reset" class="btn btn-default" style=" border-radius: 0px; width: 203px"><center>Limpiar</center></button>                                                      
                                </div> 
                            </div>
                        </td>

                    <?php } ?>
                    <td bgcolor="#e6e6e6" >
                        <div class="col-md-7 col-sm-7">
                            <div id="mapa"></div>
                        </div>
                    </td>

                </table>
            </form> 
        </div>
        <br><br>
        <div class="container">
            <table class="table" id="tablaAlmacen" align="center" >
                <thead class="thead-inverse">
                    <tr bgcolor="#e6e6e6" id="tr1">
                        <th>ID</th>
                        <th>ALMACÉN</th>
                        <th>DESCRIPCIÓN</th>
                        <th>LATITUD</th>
                        <th>LONGITUD</th>
                        <th>ACCION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $mysql = conectar();
                    $result = $mysql->query("SELECT * FROM almacen;");
                    while ($almacen = $result->fetch_assoc()) {
                        $lat = $almacen['latitud'];
                        $lon = $almacen['longitud'];
                        $ubicacion = "https://www.google.com/maps?q=" . trim($lat) . "," . trim($lon) . "&z=17&hl=es";
                        ?>                   
                        <tr id="a_<?= $almacen['id'] ?>">
                            <td><a href="<?= ubicacion?>" target="_blank"><?= $almacen['id']?></a></td>
                            <td><?= $almacen['nombre']?></td>
                            <td><?= $almacen['descripcion']?></td>
                            <td><?= $almacen['latitud']?></td>
                            <td><?= $almacen['longitud']?></td>
                            <?php
                                if($rol === 'A'){
                            ?>
                            <td><a href="#" onclick="eliminarAlmacen('<?= $almacen['id']?>')">ELIMINAR</a></td>
                            <?php } else { ?>
                            <td><a data-toggle="tooltip" data-original-title="Enviar ubicación a mi telefono" onclick="enviarUbicacion('<?=$ubicacion?>')"><span class="glyphicon glyphicon-phone"></span></a></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table> 
        </div>
        <!--FIN GESTION ALMACEN-->
    </body>
</html>
