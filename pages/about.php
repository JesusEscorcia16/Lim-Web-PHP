<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" type="image/png" href="imgs/Logo.png" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>LIM ¿Quienes somos?</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/est-about.css">
        <link rel="stylesheet" type="text/css" href="../css/est-menu.css">
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="../js/validar_login.js" type="text/javascript"></script>
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
        <script src="../js/funcionesMenu.js" type="text/javascript"></script>
    </head>

    <body  id="body">
        <!---SE REUTILIZA EL MENU GENERICO PARA TODAS LAS VISTAS--->
        <?php include('./menu.php'); ?>
        <!---SE REUTILIZA EL MENU GENERICO PARA TODAS LAS VISTAS--->


        <div id="div1" align="justify">
            <center><img src="../imgs/Logo.png" width="200px" height="200px"></center>
            <p class="form-title">LESOFT INVENTORY MANAGEMENT (LIM)</p>
            <p class="form-p">Lesoft Inventory Manegement, es una aplicación web dedicada a ofrecer servicios online como la comercialización de productos ferreteros de alta calidad, como la cotización de los mismos.</p>
            <p class="form-p">Ofrecemos una amplia gama de productos en herramientas para construcción, de carpintería, materiales de fijación, entre otros que garantizan a usted como cliente escoger según sus necesidades. </p>
        </div>

        <div class="container">
            <center>
                <h4><font color='white'>Equipo de trabajo</h4>
                <h5>LIM</h5>
                <br><br>
                <!--ERNESTO COLINA-->
                <div class="col-lg-4 text-center">
                    <center><img class="img-circle img-responsive img-center" src="../imgs/colina.jpg" width="200" height="200"></center>
                    <h3>Ernesto Colina</h3>
                    <p>Diseñador e ilustrador.</p>
                    <a href="https://www.facebook.com/profile.php?id=100001046312480" target="_blank">
                        <button type="button" title="Ir a su Facebook." class="btn btn-primary btn-circle"><i class="fa fa-facebook"></i></button>
                    </a>    
                    <a href="https://www.instagram.com/ernestocolina05/" target="_blank">
                        <button type="button" title="Ir a su Instagram." class="btn btn-info btn-circle"><i class="fa fa-instagram"></i></button>
                    </a>
                </div>

                <!--MONICA PUELLO-->
                <div class="col-lg-4 text-center">
                    <center><img class="img-circle img-responsive img-center" src="../imgs/puello.jpeg" width="200" height="200"></center>
                    <h3>Mónica Puello</h3>
                    <p>Diseñadora.</p>
                    <a href="https://www.facebook.com/monii.puello?fref=ts" target="_blank">
                        <button type="button" title="Ir a su Facebook." class="btn btn-primary btn-circle"><i class="fa fa-facebook"></i></button>
                    </a>
                    <a href="https://www.instagram.com/moni_puello/" target="_blank">
                        <button type="button" title="Ir a su Instagram." class="btn btn-info btn-circle"><i class="fa fa-instagram"></i></button>
                    </a>
                </div>

                <!--JESUS ESCORCIA-->
                <div class="col-lg-4 text-center">
                    <center><img class="img-circle img-responsive img-center" src="../imgs/lora.jpg" width="200" height="200"></center>
                    <h3>Jesús Escorcia</h3>
                    <p>Desarrollador.</p>
                    <a href="https://www.facebook.com/jesus.escorcia.9?fref=ts" target="_blank">
                        <button type="button" title="Ir a su Facebook." class="btn btn-primary btn-circle"><i class="fa fa-facebook"></i></button>
                    </a>
                    <a href="https://twitter.com/JesusEscorcia16" target="_blank">
                        <button type="button" title="Ir a su Twitter." class="btn btn-info btn-circle"><i class="fa fa-twitter"></i></button>
                    </a>
                    <a href="https://www.instagram.com/jesusescorcia16/" target="_blank">
                        <button type="button" title="Ir a su Instagram." class="btn btn-primary btn-circle"><i class="fa fa-instagram"></i></button>
                    </a>
                </div>
            </center>
        </div>
        <br><br>
    </body>
</html>
