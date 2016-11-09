<?php

function conectar() {
    //Direccion, usuario, contraseña, base de datos.
    //En modo desarrollo los parametros deben ser respectivamente:
    //localhost, root, '', lesoftinc
    //Al subir al dominio los parametros deben ser respectivamente:
    //mysql.webcindario.com, lesoftinc, Doc3nt3sfitco*.0, lesoftinc
    $mysqli = new mysqli('localhost', 'root', '', 'lim_db'); //Para conexión local
    //$mysqli = new mysqli('mysql.webcindario.com', 'limw', '20denoviembre', 'limw'); //Para el servidor

    if ($mysqli->connect_errno) {
        echo "Lo sentimos, este sitio web está experimentando problemas.\n\n";
        echo "Error: Fallo al conectarse a MySQL debido a: \n";
        echo "Errno: " . $mysqli->connect_errno . "\n";
        echo "Error: " . $mysqli->connect_error . "\n";
        exit;
    }

    return $mysqli;
}
