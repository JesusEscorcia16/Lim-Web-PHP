<?php
include('./conexion.php');

$id = htmlspecialchars($_POST['id']);

if ($id != null){
    $mysql = conectar();
    $result = $mysql->query("UPDATE contacto SET estado = 'f' WHERE id = $id");
    echo 'OK';
} else {
    echo 'ERROR';
}