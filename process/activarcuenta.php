<?php
include('conexion.php');
$tag = $_POST['tag'];
$token = $_POST['token'];
$token = strtoupper($token);
if ($tag != '') {
    if ($tag == 'login') {
        $conexion = conectar();
        $user = $conexion->query("SELECT usuario FROM usuarios WHERE token = '$token'")->fetch_assoc();
        if ($user != null) {
            $result = $conexion->query("UPDATE usuarios SET estado = 't', token = '' WHERE token = '$token'");
            echo true;
        } else {
            echo false;
        }
    }
}
?>