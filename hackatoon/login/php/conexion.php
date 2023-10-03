<?php
    $server = "localhost";
    $user = "root";
    $pass = '123';
    $db = "prueba";

    $conexion = new mysqli($server,$user,$pass,$db, 3308);
    if($conexion->connect_errno) //Comprobar conexion a base de datos login
    {
        die("Conexion fallida". $conexion->connect_errno);
    }else {
        //echo "Conectador";
    }
?>