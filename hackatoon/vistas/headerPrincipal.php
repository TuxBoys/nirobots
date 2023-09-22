<?php
require 'config/database.php'; // Asegúrate de que la ruta sea correcta y apunte al archivo que contiene la clase MiConexionPDO

$miConexion = new MiConexionPDO();
$conexion = $miConexion->conectar();

session_start();
if (!isset($_SESSION['usuario'])) {
    echo '
        <script>
            alert("Inicie sesión para poder continuar");
        </script>
    ';
    header("location: login/index.php");
    session_destroy();
    die();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ni.Robots</title>
    <link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/estilos_finales.css">
    <link rel="stylesheet" href="./css/headerPrincipal01.css">
    <link rel="stylesheet" href="./css/card_principales.css">
    <link href="css/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: linear-gradient(180deg, #0000008c 0%, #0000007c 100%), url('./images/computer.jpg');
            background-size: cover;
            z-index: -1;
        }
    </style>
</head>


<body>
    <div class="row">
        <div class="col-12">
            <!----header--->
            <header class="hero box">
                <div class="nav">
                    <input type="checkbox" id="nav-check">
                    <div class="nav-header">
                        <div class="nav-logo">
                            <img src="./images/logoBlancoPNG.png" alt="" width="120px" height="40px">
                        </div>
                    </div>
                    <div class="boton-nav">
                        <label for="nav-check">
                            <span></span>
                            <span></span>
                            <span></span>
                        </label>
                    </div>
                    <div class="nav-links">
                        <a href="#" target="_self">Inicio</a>
                        <a href="biblioteca.php" target="_self">Biblioteca virtual</a>
                        <a href="empresas.php" target="_self">Empresas</a>
                        <a href="login/php/cerrarSesion.php" target="_self">Cerrar Sesión</a>
                    </div>
                </div>
                <section class="hero__container container">
                    <h1 class="hero__title" style="color: #ffffff">¿Nicaragua necesita robots?</h1>
                    <p class="hero__paragraph">En nuestro portal, explorarás el emocionante mundo de las prótesis biónicas y 
                        descubrirás cómo están transformando vidas. Desde información esencial hasta productos innovadores, 
                     proporcionamos todo lo que necesitas para tomar decisiones informadas y acceder a las mejores opciones disponibles. 
                     Únete a nuestra comunidad y abre la puerta a un futuro más inclusivo y lleno de posibilidades con las prótesis biónicas.</p>
                    <h4 class="h4">Tú perfil de usuario: </h4>

                    <a class="btn btn-primary" style = "border-radius: 200px; background: #1f2124; border: none;" href="perfil.php">Cick aquí</a>
                </section>
            </header>