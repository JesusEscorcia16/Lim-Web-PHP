<?php
include('../process/conexion.php');
$mysql = conectar();
$result = $mysql->query("SELECT * FROM contacto WHERE estado='t'");
$count = mysqli_num_rows($result);
$rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : null;
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
                <li><a href="almacen.jsp">Gestión Almacenes</a></li>
                <li><a  href="persona.jsp">Gestión personas</a></li>             
                <li><a href="about.php">¿Quienes somos?</a></li>
                <li><a data-toggle="tooltip" title="<?= $count ?> peticiones pendientes" href="mail.php">Buzón&nbsp;<span class="badge"><?= $count ?></span></a></li>
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
                <li><a href="almacen.php">Almacenes</a></li>
            </ul>

        </div>
    </nav>
    <!-- FIN DE MENU LOGGEADO COMO CLIENTE-->  

    <?php
}
if ($rol == null) {
    ?>

    <!-- MENU SIN LOGGEAR -->
    <nav class="navbar navbar-inverse">
        <div class="container" >
            <div class="navbar-header" >
                <img src="../imgs/Logo.png" width="6.3%" height="5%" href="#" class="navbar-brand">
                <a class="navbar-brand" href="index.php">LESOFT INVENTORY MANAGEMENT</a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;Iniciar sesión<span class="caret"></span></a>
                        <ul id="login-dp" class="dropdown-menu">
                            <li>
                                <div class="row">
                                    <div class="col-md-12">
                                        Iniciar sesión via: 
                                        <div class="social-buttons">
                                            <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                                            <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
                                        </div>
                                        ¿Ya tienes una cuenta?
                                        <form class="form" role="form" action="../js/validar_login.js" method="post" id="formlogin">
                                            <div class="form-group">
                                                <input name="correo" type="email" class="form-control" id="correo" placeholder="Correo electrónico" required>
                                            </div>
                                            <div class="form-group">
                                                <input name="pass" type="password" class="form-control" id="pass" placeholder="Contraseña" required>
                                                <div class="help-block text-right"><a href="restorePass.jsp">Olvidé mi contraseña&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><a href="contacto.php">¿Sucede algo?</a></div>
                                            </div>
                                            <center>
                                                <div class="loader-login"></div>
                                            </center>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary btn-block" value="Ingresar"/>
                                            </div>
                                            <div id="error_login" class="form-group">
                                                <p style="color: #CD5C5C">Correo y/o contraseña no válidos</p>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Recuerdame
                                                </label>                                                        
                                            </div>
                                        </form>
                                    </div>
                                    <div class="bottom text-center">
                                        ¿Eres nuevo? <a href="registro.php"><b>Registrate</b></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li> 
                </ul> 
            </ul>    
        </div>
    </nav>

    <nav class="navbar navbar-default" >
        <div class="container" id="menu">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Inicio</a></li>
                <li><a href="about.php">¿Quienes somos?</a></li>
                <li><a href="contacto.php">Contáctenos</a></li>
                <li><a href="almacen.php">Almacenes</a></li>
            </ul>

        </div>
    </nav>
    <!-- FIN MENU SIN LOGGEAR -->   
<?php } ?>