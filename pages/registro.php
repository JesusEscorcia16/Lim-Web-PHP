<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" type="image/png" href="imgs/Logo.png" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>LIM Registrase</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/est-register.css">
        <link rel="stylesheet" type="text/css" href="../css/est-menu.css">
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="../resources/js/angular.min.js" type="text/javascript"></script>
        <script src="../js/funcionesMenu.js" type="text/javascript"></script>
        <script src="../js/validar_login.js" type="text/javascript"></script>
    </head>

    <body ng-app="">
        <?php include('../pages/menu.php'); ?>

        
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pr-wrap">
                        <div class="pass-reset">
                            <input type="email" placeholder="Email" />
                            <input type="submit" value="Submit" class="pass-reset-submit btn btn-inverse btn-sm" />
                        </div>
                    </div>
                    <div class="wrap">
                        <br><br>
                        <div>
                            <p class="form-title" id="tittle">Registrarse</p>
                            <table id="tabla">
                                <td>
                                    <form class="login" action="ValidarRegistro" method="post">

                                        <div class="input-group input-group">
                                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input type="text" name="nombre" ng-model="nombre" class="form-control" placeholder="Nombres" required="required">
                                        </div>

                                        <div class="input-group input-group">
                                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input type="text" name="apellidos" ng-model="apellido" class="form-control" placeholder="Apellidos" required="required">
                                        </div>

                                        <div class="input-group input-group">
                                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-pushpin"></span></span>
                                            <input type="number" name="identificacion" ng-model="id" class="form-control" placeholder="Identificación" required="required">
                                        </div>    


                                        <div class="input-group input-group">
                                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-text-height"></span></span>
                                            <input type="email" name="correo" ng-model="correo" class="form-control" placeholder="Correo electrónico" required="required">
                                        </div>

                                        <div class="input-group input-group">
                                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-eye-open"></span></span>
                                            <input type="password" name="pass" ng-model="pass" class="form-control" placeholder="Contraseña" required="required">
                                        </div>   

                                        <div class="input-group input-group">
                                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-phone"></span></span>
                                            <input type="number" name="telefono" ng-model="telefono" class="form-control" placeholder="Teléfono" required="required">
                                        </div>

                                        <div class="input-group input-group">
                                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-home"></span></span>
                                            <input type="text" name="direccion" ng-model="direccion" class="form-control" placeholder="Dirección" required="required">
                                        </div>

                                        <div class="input-group input-group">
                                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-heart"></span></span>
                                            &nbsp;&nbsp;
                                            <label class="radio-inline"><input name="gender" type="radio" value="MASCULINO"><font color="black">Masculino</font></label>&nbsp;
                                            <label class="radio-inline"><input name="gender" type="radio" value="FEMENINO"><font color="black">Femenino</font></label>
                                        </div>

                                        <input type="submit" value="Registrarse" class="btn btn-primary btn-sm"   id="btnIniciar"/>
                                </td>
                                <td>                               
                                    </form>
                                <center><p>Información personal</p></center>
                                <hr>
                                <p>Nombre: {{nombre + " " + apellido}}</p>
                                <p>Identificación: {{id}}</p>
                                <p>Correo: {{correo}}</p>
                                <p>Teléfono: {{telefono}}</p>
                                <p>Dirección: {{direccion}}</p>
                                <br><br><br><br><br>
                                </td>
                            </table>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <%if (mensaje != null) {%>
        <br>
        <div class="container">
            <div class="alert alert-danger fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>ERROR EN EL REGISTRO!</strong> <%=mensaje%>
            </div>
        </div>
        <script>
            time(3000);
        </script>
        <br>
        <%}%>   
    </body>
</html>
