<?php
session_start();
//$modal = isset($_GET['correcto']) ? $_GET['correcto'] : null;
$buscar = isset($_GET['search']) ? $_GET['search'] : null;
$categoriaProducto = isset($_GET['categoriaProducto']) ? $_GET['categoriaProducto'] : null;
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <link rel="icon" type="image/png" href="../imgs/Logo.png" />
        <title>Lesoft Inventory Management</title>
        <script src="../js/sweetalert.min.js" type="text/javascript"></script>
        <link href="../css/sweetalert.css" rel="stylesheet" type="text/css"/>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">           
        <script src="../resources/js/jquery.js" type="text/javascript"></script>
        <link href="../resources/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../resources/js/bootstrap.min.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="../css/est-index.css">
        <script src="../js/registrar_producto.js" type="text/javascript"></script>
        <script>
            function obtenerCodigo() {
                var codigo = <%= Utilidad.GenerarCodigo()%>
                document.getElementById("codigo").value = codigo;
            }
        </script>

        <!-- LIBRERIAS MOMENTANEAS POR FALTA DE LUZ
        <link href="resources/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="resources/js/jquery.js" type="text/javascript"></script>
        <script src="resources/js/bootstrap.min.js" type="text/javascript"></script>
        FIN LIBRERIAS MOMENTANEAS POR FALTA DE LUZ -->

        <script src="../js/funcionesIndex.js" type="text/javascript"></script>
        <script src="../js/funcionesMenu.js" type="text/javascript"></script>
        <script src="../js/validar_login.js" type="text/javascript"></script>
        <style>
            #error_login{
                display: none;
            }
        </style>
    </head>
    <body>
        
        <!---SE REUTILIZA EL MENU GENERICO PARA TODAS LAS VISTAS--->
        <?php include('./menu.php'); ?>
        <!---SE REUTILIZA EL MENU GENERICO PARA TODAS LAS VISTAS--->

        <!--IMAGEN MOMENTANEA-->
        <div class="container">
            <img src="../imgs/Portada1.jpg" class="img-responsive" width="1145" height="520">
        </div>

        <!--BUSCAR PRODUCTO-->
        <br>
        <div class="container" id="pnlproductos">
            <div align='right'>
                <div class="input-group col-md-8 " >
                    <input required="required" id="txtBuscar" type="text" class="form-control" title="Buscar" placeholder="Buscar" onkeypress="return runScript(event)" >
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button" id="btnBuscar"  onclick="buscar()"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                </div>
            </div>
            <!--FIN BUSCAR PRODUCTO-->           

            <!--PANEL CATEGORIA-->     
            <br>
            <div class="row">
                <div class="col-md-4"  id="myScrollspy">
                    <div class="panel panel-default" id="categorias">
                        <div class="panel-heading">
                            <h3 class="panel-title">Categorías</h3>
                        </div>
                        <div class="panel-body">
                            <?php
                            try {
                                $mysql = conectar();
                                $result = $mysql->query("SELECT nombre FROM categoria WHERE (SELECT COUNT(*) FROM categoria) > 0");
                                while ($categoria = $result->fetch_assoc()) {
                                    ?>                                    
                                    <a href="index.php?categoriaProducto=<?= strtoupper($categoria['nombre'])?>#pnlproductos"><button type="button" class="btn btn-default"><?= strtoupper($categoria['nombre']) ?></button></a><br>
                                    <?php
                                }
                            } catch (Exception $ex) {
                                echo $ex;
                            }
                            ?>
                            <a href="index.php?categoriaProducto=all#pnlproductos"><button type="button" class="btn btn-default">TODOS</button></a>
                        </div>
                    </div>
                </div>
                <!--FIN PANEL CATEGORIA-->                 

                <!--PANEL RESULTADOS-->                
                <div class="col-md-8" >
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Resultados 
                            <?php if (isset($_SESSION['rol']) == 'A') { ?>
                            <a><button type="button" id="btnNuevo" class="btn btn-success" data-toggle="modal" data-target="#myModal">Agregar productos</button></a>
                            <?php } ?>
                        </div>


                        <!--MODAL AGREGAR PRODUCTO-->  
                        <div class="modal fade" id="myModal"  role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h5 class="modal-title text-center text-success" id="myModalLabel">AGREGAR PRODUCTO</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form_registro_producto" action="../js/registrar_producto.js" method="post">
                                            <table>
                                                <tr>
                                                    <td id="tdformproduct">
                                                        <h5 id="formProduct">Código</h5>
                                                        <div class="input-group">
                                                            <input name="codigo" type="text" class="form-control" id="codigo" value="" required>
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-warning" id="generarCodigo" onclick="obtenerCodigo()" type="button" id="">&nbsp;&nbsp;<span class="glyphicon glyphicon-repeat">&nbsp;</span></button>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 id="formProduct">Marca</h5>
                                                        <div class="input-group">
                                                            <input type="text" name="marca" class="form-control" id="marca" required>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <h5 id="formProduct">Nombre</h5>
                                                        <input type="text" name="nombre" class="form-control" id="nombre" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td id="tdformproduct">
                                                        <h5 id="formProduct">Categoria</h5>
                                                        <select name="categoria" id="categoria" class="form-control">
                                                            <option>-------------</option>
                                                            <?php                            
                                                                $mysql = conectar();
                                                                $result = $mysql->query("SELECT nombre FROM categoria");
                                                                while ($categoria = $result->fetch_assoc()) {?>       
                                                            <option name="cat" value="<?= strtoupper($categoria['nombre'])?>"><?= strtoupper($categoria['nombre'])?></option>
                                                                <?php } ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <h5 id="formProduct">Precio</h5>
                                                        <input type="number" name="precio" class="form-control" id="precio" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <h5 id="formProduct">Descripción</h5>
                                                        <textarea name="descripcion" class="form-control" id="descripcion" required></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td id="tdformproduct">
                                                        <h5 id="formProduct">Stock mínimo</h5>
                                                        <input type="number" name="stockM" class="form-control" id="stockM" required>
                                                    </td>
                                                    <td>
                                                        <h5 id="formProduct">Stock</h5>
                                                        <input type="number" name="stock" class="form-control" id="stock" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 id="formProduct">Estado</h5> 
                                                        <label class="radio-inline"><input name="gender" id="gender" type="radio" value="DISPONIBLE">Disponible</label>
                                                        <label class="radio-inline"><input name="gender" id="gender" type="radio" value="NODISPONIBLE">No Disponible</label>
                                                    </td>
                                                    <td>
                                                        <h5 id="formProduct">Imagen</h5> 
                                                        <input type="file" name="file">
                                                    </td>
                                                </tr>
                                            </table>
                                        </form>
                                    </div>
                                    <div class="modal-footer"> 
                                        <button type="button" class="btn btn-danger" onclick="window.location = 'index.jsp'">TERMINAR</button>
                                        <button type="submit" form="form_registro_producto" id="btnNuevo" class="btn btn-success">GUARDAR</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Fin Modal agregar producto-->        
                        <?php 
                            $result = $mysql->query("SELECT * FROM producto WHERE estado_online = 't' ORDER BY nombre ASC;");
                            while($producto = $result->fetch_assoc()){
                                $categoria = $mysql->query("SELECT nombre FROM categoria WHERE id = {$producto['id_categoria']}")->fetch_assoc();                            
                        ?>
                                    <!-- Modal -->
                                                <div class="container">
                                                    <div class="modal fade" id="myModal_<?=$producto['codigo']?>" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h5 class="modal-title text-center">DETALLES DEL PRODUCTO</h5>
                                                                </div>
                                                                <br>
                                                                <h4  class="text-primary text-right" style="margin-right: 50px"><?= $producto['nombre']?></h4>                                                           
                                                                <div class="modal-body">
                                                                    <div class="container">
                                                                        <table>
                                                                            <tr>
                                                                                <td><!--IMAGEN PRODUCTO-->
                                                                                    <img src="../<?=$producto['imagen']?>" class="img-responsive" width="150px" height="150px">
                                                                                </td>
                                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                <td><!--INFORMACION PRODUCTO-->        

                                                                            <h7><font color="gray">Codigo: <?= $producto['codigo']?></h7></h7>
                                                                            <h4 class="text-success">Precio: 
                                                                                <span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;$ <?= $producto['precio']?>
                                                                            </h4>
                                                                            <p><font color="darkgray"></font></p>
                                                                            <!--CARACTERISTICAS-->
                                                                            <ul class="nav nav-tabs">
                                                                                <li class="active"><a data-toggle="tab" href="#home">Características</a></li>
                                                                            </ul>

                                                                            <div class="tab-content">
                                                                                <div id="home" class="tab-pane fade in active"><br>
                                                                                    <table cellpadding="10">
                                                                                        <tr>
                                                                                            <td class="text-primary">Marca: &nbsp;</td>
                                                                                            <td><font color="gray"><?= $producto['marca']?></font></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="text-primary">Categoría:&nbsp;&nbsp;</td>
                                                                                            <td><font color="gray"><?= $categoria['nombre']?></font></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="text-primary">Descripción: &nbsp;&nbsp;</td>
                                                                                            <td><font color="gray"><?= $producto['descripcion']?></font></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                        
                                                                                            <td class="text-primary">Código QR: &nbsp;&nbsp;</td>
                                                                                            <td>
                                                                                                <br>
                                                                                                <img src="files/qrcode/<?= $producto['codigo']?>.jpg" 
                                                                                                     class="img-responsive" width="100px" height="100px">
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>                                                                                   
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            </td>
                                                                            </tr>
                                                                        </table>                                                                       
                                                                    </div>
                                                                </div>
                                                                <div align="center">

                                                                </div>
                                                                <br>
                                                                <br>
                                                                <div class="modal-footer">
                                                                    <a data-toggle="tooltip" title="Añadir al carrito"><button class="btn btn-primary" type="button" id="btnAnadir"><span class="glyphicon glyphicon-shopping-cart"></span></button></a>
                                                                <?php if(isset($_SESSION['rol']) == 'A'){ ?>
                                                                    <a href="products.php?cod=<?=$producto['imagen']?>" data-toggle="tooltip" title="Editar"><button class="btn btn-success" type="button" id="btnAnadir"><span class="glyphicon glyphicon-pencil "></span></button></a>
                                                                <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--fin del modal-->          
                                <?php } ?>

                        <!-- CONTENIDO PRODUCTOS--> 
                        <div class="panel-body" >
                            <div>
                                <?php 
                                    if($buscar === null){
                                        $result = $mysql->query("SELECT * FROM producto WHERE estado_online = 't' ORDER BY nombre ASC;");
                                        while($producto = $result->fetch_assoc()){
                                            $categoria = $mysql->query("SELECT nombre FROM categoria WHERE id = {$producto['id_categoria']}")->fetch_assoc();                                         
                                            if($categoriaProducto === null || $categoriaProducto === "all"){                                                                         
                                ?>
                                <div id="prducto">
                                    <div class="col-md-4">
                                        <div class="thumbnail ">
                                            <div class="caption">
                                                <center><img src="../<?=$producto['imagen']?>" class="img-responsive" width="150px" height="150px"></center>

                                                <h3><font color="#B3B3B3" size="1.9" name="categoria"><?=$categoria['nombre']?></font></h3>
                                                <p><font size="2.5" name="nombreP"><?=$producto['nombre']?> <br> <!--<font color="#337ab7" size="3">Stock:</font> <%= productos.getInt("stock")%></font>--></p>
                                                <div >
                                                    <div class="input-group">
                                                        <label class="form-control" id="precio" name="precio">$<?=$producto['precio']?></label>
                                                        <span class="input-group-btn">
                                                            <a href="#" data-toggle="tooltip" title="Añadir al carrito"><button class="btn btn-primary" type="button" id="btnCar"><span class="glyphicon glyphicon-shopping-cart"></span></button></a>
                                                            <a data-toggle="tooltip" title="Detalles"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal_<?=$producto['codigo']?>"><span class="glyphicon glyphicon-eye-open"></span></button></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    } else {
                                        if(strtoupper($categoriaProducto) === $categoria['nombre']){                                           
                                ?>
                                <script>
                                    location.href = "#pnlproductos";
                                </script>

                                <div id="prducto">
                                    <div class="col-md-4">
                                        <div class="thumbnail ">
                                            <div class="caption">
                                                <center><img src="../<?=$producto['imagen']?>" class="img-responsive" width="150px" height="150px"></center>

                                                <h3><font color="#B3B3B3" size="1.9" name="categoria"><?=$categoria['nombre']?></font></h3>
                                                <p><font size="2.5" name="nombreP"><?=$producto['nombre']?> <br> <!--<font color="#337ab7" size="3">Stock:</font> <%= productos.getInt("stock")%></font>--></p>
                                                <div >
                                                    <div class="input-group">
                                                        <label class="form-control" id="precio" name="precio">$<?=$producto['precio']?></label>
                                                        <span class="input-group-btn">
                                                            <a href="#" data-toggle="tooltip" title="Añadir al carrito"><button class="btn btn-primary" type="button" id="btnCar"><span class="glyphicon glyphicon-shopping-cart"></span></button></a>
                                                            <a data-toggle="tooltip" title="Detalles"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal_<?=$producto['codigo']?>"><span class="glyphicon glyphicon-eye-open"></span></button></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    }                                    
                                        }
                                        }
                                    } else {
                                        $result = $mysql->query("SELECT * FROM producto WHERE nombre LIKE('%". strtoupper($buscar). "%') AND estado_online = 't' ORDER BY nombre ASC;");
                                        while($producto = $result->fetch_assoc()){ 
                                            $categoria = $mysql->query("SELECT nombre FROM categoria WHERE id = {$producto['id_categoria']}")->fetch_assoc();
                                ?>
                                <script>
                                    location.href = "#pnlproductos";
                                </script>
                                <div id="prducto">
                                    <div class="col-md-4">
                                        <div class="thumbnail ">
                                            <div class="caption">
                                                <center><img src="../<?=$producto['imagen']?>" class="img-responsive" width="150px" height="150px"></center>

                                                <h3><font color="#B3B3B3" size="1.9" name="categoria"><?=$categoria['nombre']?></font></h3>
                                                <p><font size="2.5" name="nombreP"><?=$producto['nombre']?> <br> <!--<font color="#337ab7" size="3">Stock:</font> <%= productos.getInt("stock")%></font>--></p>
                                                <div >
                                                    <div class="input-group">
                                                        <label class="form-control" id="precio" name="precio">$<?=$producto['precio']?></label>
                                                        <span class="input-group-btn">
                                                            <a href="#" data-toggle="tooltip" title="Añadir al carrito"><button class="btn btn-primary" type="button" id="btnCar"><span class="glyphicon glyphicon-shopping-cart"></span></button></a>
                                                            <a data-toggle="tooltip" title="Detalles"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal_<?=$producto['codigo']?>"><span class="glyphicon glyphicon-eye-open"></span></button></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php 
                                    } }
                                ?>
                            </div>
                        </div>
                    </div>
                </div><!-- FIN PANEL RESULTADOS--> 
            </div>
        </div>

        <!--ESPACIOS -->  
        <div id="espacio">
            <p>&nbsp;</p>
        </div>
        <!-- FIN PIECERA -->  

        <!--PIECERA -->                
        <div id="fin">
            <div class="container">
                <img src="../imgs/Logo.png" width="3%" height="4%"> &nbsp; LESOFT INVENTORY MANAGEMENT
                <p id="textofin">Copyright © 2016 Lesoft, Inc. Todos los derechos reservados.</p>
            </div>

        </div>
        <!--FIN PIECERA -->  
    </body>
</html>
