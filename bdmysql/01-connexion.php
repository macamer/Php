<?php

$servidor="localhost";
$usuario="root";
$password="";

$conexion= new mysqli($servidor, $usuario, $password);

if($conexion->connect_error){
    die("Error de conexión: ".$conexion->connect_error);
}

echo "Conexión establecida..";
?>