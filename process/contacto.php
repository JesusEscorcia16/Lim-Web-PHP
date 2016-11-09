<?php
include('./conexion.php');

$nombre = strtoupper(htmlspecialchars($_POST['nombre']));
$correo = strtolower(htmlspecialchars($_POST['correo']));
$asunto = strtoupper(htmlspecialchars($_POST['asunto']));
$mensaje = htmlspecialchars($_POST['mensaje']);

if($nombre != null && $correo != null && $asunto != null && $mensaje != null){
    $mysql = conectar();
    $result = $mysql->query("INSERT INTO contacto(nombre, correo, asunto, mensaje, estado) VALUES('$nombre', '$correo', '$asunto', '$mensaje', 't')");
    echo true;
}else{
    echo false;
}
