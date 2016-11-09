<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" type="image/png" href="../imgs/Logo.png"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>LIM Buzón de mensajes</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/est-mail.css">
        <link rel="stylesheet" type="text/css" href="../css/est-menu.css">        
        <script src="../resources/js/angular.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
        <script src="../js/funcionesMenu.js" type="text/javascript"></script>
        <script src="../js/funcionesMail.js" type="text/javascript"></script>
        <script src="../js/validar_login.js" type="text/javascript"></script>
    </head>
    <body>
        <?php include('./menu.php') ?>
        <?php
        if ($rol == 'A') {
            ?>
            <br>
            <div class="container" id="correcto" style="display: none">            
                <div class="alert alert-success fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong><%=titulo%></strong> <%=mensaje%>
                </div>
            </div>
            <script>
                time(4000);
            </script>
            <div align="center">
                <img class="" src="../imgs/mail.png" width="150" height="150">
                <h1><font color="6b6b6b">BANDEJA DE ENTRADA <br><font size="3">Mensajes pendientes <span class="label label-default"><?= $count ?></span></font></font></h1>
            </div>
            <br><br>            
            <div class="container">
                <div id="div-categoria">
                    <table>
                        <tr>
                            <td>
                                <h4>Mostrar:&nbsp;</h4>
                            </td>
                            <td>
                                <select id="selCategoria" name="selCategoria" class="form-control">
                                    <option id="leido" value="RECIENTE">Recientes</option>
                                    <option id="noleido" value="ELIMINADO">Eliminados</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    
                    
                </div>
                <br>
                <table class="table table-striped">
                    <thead>
                        <tr bgcolor="#e8e8e8">
                            <td>NOMBRE</td>
                            <td>ASUNTO</td>
                            <td>ACCION</td>
                        </tr>
                    </thead>

                    <?php
                    $mysql = conectar();
                    $result = $mysql->query("SELECT * FROM contacto WHERE estado = 't'");
                    while ($contacto = $result->fetch_assoc()) {
                        ?>
                        <!--TABLA BANDEJA DE ENTRADA-->
                        <tr id="m_<?= $contacto['id'] ?>">
                            <td><?= $contacto['nombre'] ?></td>
                            <td><?= $contacto['asunto'] ?></td>
                            <td>
                                <button type="button" class="btn btn-primary" title="Ver detalles del mensaje" data-toggle="modal" data-target="#mlm_<?= $contacto['id'] ?>"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;Leer más</button>
                                <button type="button" class="btn btn-success" title="Responder el mensaje" data-toggle="modal" data-target="#ma_<?= $contacto['id'] ?>"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Responder</button>
                                <button type="button" class="btn btn-danger" title="Eliminar mensaje" onclick="eliminarContacto(<?= $contacto['id'] ?>)"><span class="glyphicon glyphicon-trash"></span>&nbsp;Eliminar</button>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>


            <?php
            $mysql = conectar();
            $result = $mysql->query("SELECT * FROM contacto WHERE estado = 't'");
            while ($contacto = $result->fetch_assoc()) {
                ?>
                <!-- MODAL LEER MAS-->
                <div class="modal fade" id="mlm_<?= $contacto['id'] ?>" role="dialog">
                    <div class="modal-dialog">

                        <!-- CONTENIDO DEL MODAL-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><img class="" src="../imgs/mail.png" width="40" height="40"><font color="6b6b6b" size="4">&nbsp;<?= $contacto['asunto'] ?></font></h4>
                            </div>
                            <div class="modal-body">
                                <table>
                                    <td>
                                        <img src="../imgs/user.png" width="110" height="110">
                                    </td>
                                    <td>
                                        <p>&nbsp; <font color="6b6b6b"> &nbsp;&nbsp;<?= $contacto['fecha'] ?><br>&nbsp;&nbsp; <font size="5"><?= $contacto['nombre'] ?><font color="6b6b6b"></font></p>
                                    </td>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <p id="descripcion"><?= $contacto['mensaje'] ?></p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- FIN MODAL LEER MAS-->

                <!-- MODAL RESPUESTA -->
                <div class="modal fade" id="ma_<?= $contacto['id'] ?>" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <form action="..respondercontacto.php" method="post">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h6 class="modal-title"><img class="" src="../imgs/mail.png" width="40" height="40"><font color="6b6b6b" size="4">&nbsp;RESPONDER</font></h6>
                                </div>
                                <div class="modal-body">

                                    <table>
                                        <td>
                                            <img src="../imgs/user.png" width="110" height="110">
                                        </td>
                                        <td>
                                            <p>&nbsp; <font size="5"><?= $contacto['fecha'] ?><br>&nbsp;&nbsp; <font color="6b6b6b"> &nbsp;PARA:<br>&nbsp;&nbsp; <font size="5"><?= $contacto['nombre'] ?><font color="6b6b6b"></font></p>

                                        </td>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <p id="descripcion">mensaje</p><br>
                                                <p>Respuesta: </p>
                                                <textarea name="respuesta" class="form-control" id="respuesta" required></textarea>
                                                <input name="correo" value="<?= $contacto['correo'] ?>" style="display:none">
                                                <input name="id" value="<?= $contacto['id'] ?>" style="display:none">
                                            </td>                                  
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <!-- FIN MODAL RESPUESTA -->

            <?php } ?>

        <?php } 
            if($rol != 'A' && $rol != null){
        ?>
            <br>
            <div class="container">
                <div class="alert alert-danger fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>ACCESO NO AUTORIZADO!</strong> Tu cuenta no tiene permiso para ingresar a esta página. <a href="index.php">Vuelve al menú principal.</a>
                </div>
            </div>
        <?php } ?>
        <?php
        if ($rol == null) {
        ?>
            <br>
            <div class="container">
                <div class="alert alert-danger fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>ACCESO NO AUTORIZADO!</strong> No te has identificado. Ingresa con una cuenta de administrador para para ver esta página. <a href="login.php">Iniciar sesión.</a>
                </div>
            </div>
        <?php } ?>
    </body>
</html>
