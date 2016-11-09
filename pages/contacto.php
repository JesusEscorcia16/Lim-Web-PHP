<?php
session_start();
$rol = isset($_SESSION['rol']) ? isset($_SESSION['rol']) : null;
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" type="image/png" href="../imgs/Logo.png" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>LIM Contáctenos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/est-contact.css">        
        <link rel="stylesheet" type="text/css" href="../css/est-menu.css">
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="../js/validar_login.js" type="text/javascript"></script>
        <script src="../js/validar_contacto.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="../js/funcionesMenu.js" type="text/javascript"></script>
        <style>
            #modalContacto{
                display: none;
            }
        </style>
    </head>


    <body>
        <!---SE REUTILIZA EL MENU GENERICO PARA TODAS LAS VISTAS--->
        <?php include('./menu.php'); ?>
        <!---SE REUTILIZA EL MENU GENERICO PARA TODAS LAS VISTAS--->

        <br><br>
        <div class="container">
            <div class="row">
                <div class="tab-content">
                    <div class="tab-pane active" id="home-vr">
                        <div class="form-group">
                            <form class="form_contacto" id="form_contacto" action="../js/validar_contacto.js" method="post">
                                <br>
                                <p class="form-title" id="fuente1">Contáctenos</p>

                                <?php if ($rol != null) { ?>
                                    <div class="input-group input-group">                                    
                                        <input type="text" name="nombre" class="form-control" value="<?= $_SESSION['nombre'] . " " . $_SESSION['apellidos'] ?>" style="display:none">
                                    </div><br>

                                    <div class="input-group input-group">                                    
                                        <input type="email" name="correo" class="form-control" value="<?= $_SESSION['correo'] ?>" style="display:none">
                                    </div><br>

                                <?php } else { ?>

                                    <div class="input-group input-group">
                                        <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" required="required">
                                    </div><br>

                                    <div class="input-group input-group">
                                        <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-text-size"></span></span>
                                        <input type="email" name="correo" class="form-control" placeholder="Correo" required="required">
                                    </div><br>

                                <?php } ?>

                                <div class="input-group input-group">
                                    <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-pushpin"></span></span>
                                    <input type="text" name="asunto" class="form-control" placeholder="Asunto" >
                                </div><br>

                                <div class="input-group input-group">
                                    <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-envelope"></span></span>
                                    <textarea class="form-control" name="mensaje" placeholder="Mensaje" required="required"></textarea>
                                </div>

                                <br>

                                <div class="btn-group">
                                    <input type="submit" value="Enviar" class="btn btn-primary "/>&nbsp;
                                    <input type="reset" value="Limpiar" class="btn btn-default "/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade"  id="modalContacto" tabindex="-1" role="dialog" aria>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h1 class="modal-title">Envío correcto</h1>
                    </div>
                    <div class="modal-body">                       
                        <p>Se ha enviado correctamente tu petición a nuestros servidores. Te responderemos 
                           en cuanto encontremos una solución a tu problema. Nos pondremos en contacto contigo mediante
                           el correo que nos proporcionaste.
                        </p><br>
                        <p>Con sentido de respeto, </p>
                        <h3>Equipo de Lesoft Inc.</h3>
                    </div>
                    <div class="modal-footer">
                        <a href="index.php" type="button" class="btn btn-primary">Cerrar</a>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <br><br><br>
        <div class="container" id="msg_error" hidden="hidden">
            <div class="alert alert-danger fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>ERROR!</strong> Rellene todos los campos.
            </div>
        </div>
    </body>
</html>
