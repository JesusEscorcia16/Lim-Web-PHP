<?php
include('../process/conexion.php');

function set($nombre){
    $mysql = conectar();
    $result = $mysql->query("SELECT nombre FROM categoria WHERE nombre = '$nombre'");
    $result = $result->fetch_assoc();
    if($nombre == $result['nombre']){
        return false;
    } else {
        $result = $mysql->query("INSERT INTO categoria(nombre) VALUES('$nombre')");
        return true;
    }   
}

function getCategorias(){
    $mysql = conectar();
    $result = $mysql->query("SELECT nombre FROM categoria");
    return $result;
}


