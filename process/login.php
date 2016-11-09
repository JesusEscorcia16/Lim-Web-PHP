<?php

include('../process/conexion.php');
session_start();
$mysql = conectar();
$correo = strtolower(htmlspecialchars($_POST['correo']));
$pass = htmlspecialchars($_POST['pass']);

if ($correo !== '' && $pass !== '') {
    $result = $mysql->query("SELECT * FROM cliente WHERE correo = '$correo' AND pass = '$pass'")->fetch_assoc();
    if ($result !== null) {
        $_SESSION['rol'] = $result['rol'];
        $_SESSION['nombre'] = $result['nombre'];
        $_SESSION['apellidos'] = $result['apellidos'];
        $_SESSION['telefono'] = $result['telefono'];
        $_SESSION['direccion'] = $result['direccion'];
        $_SESSION['id'] = $result['id'];
        $_SESSION['correo'] = $result['correo'];
        $_SESSION['usuario'] = obtenerUsuario($result['nombre'], $result['apellidos']);
        echo true;
    } else {
        $result = $mysql->query("SELECT * FROM empleado WHERE correo = '$correo' AND pass = '$pass'")->fetch_assoc();
        if ($result !== null) {
            $_SESSION['rol'] = $result['rol'];
            $_SESSION['nombre'] = $result['nombre'];
            $_SESSION['apellidos'] = $result['apellidos'];
            $_SESSION['telefono'] = $result['telefono'];
            $_SESSION['direccion'] = $result['direccion'];
            $_SESSION['id'] = $result['id'];
            $_SESSION['correo'] = $result['correo'];
            $_SESSION['usuario'] = obtenerUsuario($result['nombre'], $result['apellidos']);
            echo true;
        } else {
            echo false;
        }
    }
}

function obtenerUsuario($nombre, $apellido) {
    $nombreFormateado = '';
    $Apellido = '';

    for ($i = 0; $i < strlen($apellido); $i++) {
        if (substr($apellido, $i, 1) !== ' ') {
            $Apellido .= substr($apellido, $i, 1);
        } else {
            break;
        }
    }
    $nombreFormateado = substr($nombre, 0, 1) . ". " . $Apellido;
    return $nombreFormateado;
}
