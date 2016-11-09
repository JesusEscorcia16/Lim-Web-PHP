<?php 
session_start();
$rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : null;
$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : null;
$apellidos = isset($_SESSION['apellidos']) ? $_SESSION['apellidos'] : null;
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" type="image/png" href="../imgs/Logo.png" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?php if ($nombre != null) {?>
        <title><?= $nombre ?> <?= $apellido ?></title>
        <?php } else { ?>
        <title>Usuario no encontrado</title>
        <?php } ?>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/est-profile.css">
        <link rel="stylesheet" type="text/css" href="../css/est-menu.css">
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="../js/validar_login.js" type="text/javascript"></script>
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="../js/funcionesMenu.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
        if ($rol == 'A') {
            ?>
            <!-- MENU LOGGEADO COMO ADMINISTRADOR-->
            <nav class="navbar navbar-inverse">
                <div class="container" >
                    <div class="navbar-header">
                        <img src="../imgs/Logo.png" width="6.3%" height="5%" href="#" class="navbar-brand">
                        <a class="navbar-brand" href="index.php">LESOFT INVENTORY MANAGEMENT</a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>&nbsp; <?= $_SESSION['usuario'] ?>
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="profile.php"><span class="glyphicon glyphicon-sunglasses"></span>&nbsp;&nbsp;Ver Perfil</a></li>
                                <li><a href="settings.jsp"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Configuración</a></li>
                                <li><a href="contacto.php"><span class="glyphicon glyphicon-question-sign"></span>&nbsp;&nbsp;Ayuda</a></li><hr>
                                <li><a href="../process/desconectar.php"><span class="glyphicon glyphicon-remove-sign"></span>&nbsp;&nbsp;Salir</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <nav class="navbar navbar-default" data-offset-top="47">
                <div class="container">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Inicio</a></li>     
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Productos <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a  href="ventas.jsp">Venta producto</a></li>
                                <li><a href="products.jsp">Gestión productos</a></li>
                            </ul>
                        </li>
                        <li><a  href="persona.jsp">Gestión personas</a></li>     

                        <li><a href="about.php">¿Quienes somos?</a></li>
                        <li><a href="contacto.php">Contáctenos</a></li>
                        <li><a data-toggle="tooltip" title="<%= ContactoController.count()%> peticiones pendientes" href="mail.jsp">Buzón&nbsp;<span class="badge"><%= ContactoController.count()%></span></a></li>
                    </ul>
                </div>
            </nav>
            <!-- FIN DE MENU LOGGEADO COMO ADMINISTRADOR-->                       
            <?php
        }
        if ($rol == 'C') {
            ?>

            <!-- MENU LOGGEADO COMO CLIENTE-->
            <nav class="navbar navbar-inverse">
                <div class="container" >
                    <div class="navbar-header">
                        <img src="../imgs/Logo.png" width="6.3%" height="5%" href="#" class="navbar-brand">
                        <a class="navbar-brand" href="index.php">LESOFT INVENTORY MANAGEMENT</a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>&nbsp; <?= $_SESSION['usuario'] ?>
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="profile.php"><span class="glyphicon glyphicon-sunglasses"></span>&nbsp;&nbsp;Ver Perfil</a></li>
                                <li><a href="settings.jsp"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Configuración</a></li>
                                <li><a href="contacto.php"><span class="glyphicon glyphicon-question-sign"></span>&nbsp;&nbsp;Ayuda</a></li><hr>
                                <li><a href="../process/desconectar.php"><span class="glyphicon glyphicon-remove-sign"></span>&nbsp;&nbsp;Salir</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>


            <nav class="navbar navbar-default">
                <div class="container">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Inicio</a></li>
                        <li><a href="about.php">¿Quienes somos?</a></li>
                        <li><a href="contacto.php">Contáctenos</a></li>
                    </ul>

                </div>
            </nav>
            <!-- FIN DE MENU LOGGEADO COMO CLIENTE-->  

            <?php } ?>

        <?php if ($nombre != null) { ?>

        <br><br><br>
        <div class="container">
            <div>
                <div class="account-wall">
                    <h1 class="text-center login-title" ><font color="gray"> <img src="../imgs/Logo.png" width="40" height="40"> Información y privacidad personal<font></h1>
                    <hr>
                    <table class="table">
                        <td id="td">
                            <p>
                                Nombres: <?= $_SESSION['nombre'] ?><br><br>
                                Apellidos: <?= $_SESSION['apellidos'] ?><br><br>
                                Teléfono: <?= $_SESSION['telefono'] ?><br><br>
                                Dirección: <?= $_SESSION['direccion'] ?><br><br>
                                Identificación: <?= $_SESSION['id'] ?><br><br>
                                Correo electrónico: <?= $_SESSION['correo'] ?><br><br>
                            </p>
                        </td>
                        <td id="td">
                            <hr>
                            <h1 class="text-center login-title" ><font color="gray"> <img src="../imgs/config.png" width="78" height="78">&nbsp; Configuración de cuenta<font></h1>

                            <p>
                                Realiza esta configuración para modificar cambios en tu perfil.
                                De esta manera tendras tu información más segura.
                            </p>
                            <a href="settings.jsp" >Ir a la configuración</a>
                        </td>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <?php } else {?>    
    <div class="container">
        <div class="alert alert-danger fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>ERROR!</strong> Para ver esta pagina primero debes iniciar sesión. Te redireccionaremos automáticamente.
        </div>
    </div>
    <script>
        redireccionar();
    </script>
    <?php } ?>
</body>
</html>
