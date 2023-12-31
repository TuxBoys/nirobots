<?php
require 'config/database.php';

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
    <link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link href="css/css/bootstrap.min.css" rel="stylesheet">
    <?php if ($header_type === 'header1'): ?>
        <link rel="stylesheet" href="css/libroPdf.css">
        <link rel="stylesheet" href="css/cardDising.css">
        <link rel="stylesheet" href="css/filtro.css">
        <?php elseif ($header_type === 'header2'): ?>
        <link rel="stylesheet" href="css/card_principales.css">
    <?php elseif ($header_type === 'header3'): ?>
        <link rel="stylesheet" href="css/Cards.css">
       
    <?php endif; ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <style>
        


    </style>
</head>

<body>
    <header class="masthead">

        <div class="newnavbar ">
            <div class="logo">
                <img src="images/LogoBlancoPNG.png" alt="Logo">
            </div>
            <nav>
                <ul class="nav-bar-links">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="biblioteca.php">Biblioteca virtual</a></li>
                    <li><a href="empresas.php">Empresas</a></li>
                    <li><a href="#">Acerca de nosotros</a></li>
                </ul>
            </nav>
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Perfil
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"
                    style="background: #0000; border-radius: 20px; ">
                    <a class="dropdown-item" href="perfil.php" style="color: #622db2; background: #0000;">Ver Perfil</a>
                    <a class="dropdown-item" href="login/php/cerrarSesion.php"
                        style="color: #622db2; background: #0000;">Cerrar Sesión</a>
                </div>
            </div>
            <!----> <a onclick="openNav()" class="menu" href="#"><button>Menu</button></a>

            <!---->
            <div id="mobile-menu" class="overlay">
                <!----> <a onclick="closeNav()" href="" class="close">&times;</a>
                <!---->
                <div class="overlay-content">
                    <a href="index.php">Inicio</a>
                    <!----> <a href="biblioteca.php">Biblioteca virtual</a>
                    <!----> <a href="empresas.php">Empresas</a>
                    <!----> <a href="#">Acerca de nosotros</a>
                    <!----> <a href="perfil.php">Perfil</a>
                    <!---->
                </div>
                <!---->
            </div>

        </div>

        <div class="container">

            <div class="row align-items-center">
                <div class="col-lg-7 py-5">
                    <?php if ($header_type === 'header1'): ?>
                        <h1 class="mb-4">Bienvenido a nuestra Biblioteca Virtual</h1>
                        <h2 class="m-0">
                            Descubre una amplia colección de libros digitales y recursos educativos.
                    </h2>
                    <?php elseif ($header_type === 'header2'): ?>
                        <h1 class="mb-4">Conexiones para la Accesibilidad</h1>
                        <h2 class="m-0">
                            Facilitando Soluciones para Personas con Discapacidades
                        </h2>
                    <?php elseif ($header_type === 'header3'): ?>
                        <h1 class="mb-4">¿Nicaragua necesita robots?</h1>
                        <h2 class="m-0">
                            Explora el emocionante mundo de las prótesis biónicas y cómo están transformando vidas.
                    </h2>
                    <?php endif; ?>
                    <button class="btn btn-primary" href="#Explora">Explora</button>
                </div>

                <div class="col-lg-5">
                    <div class="py-5 px-4 masthead-cards">
                        <?php if ($header_type === 'header1'): ?>
                            <img class="card-img" src="images/Biblioteca-Virtual.png"
                                style="height: 50vh; position: relative">
                        <?php elseif ($header_type === 'header2'): ?>
                            <img class="card-img" src="images/Empresas_IMG.png" style="height: 50vh; position: relative">>
                        <?php elseif ($header_type === 'header3'): ?>
                            <img class="card-img" src="images/headerprincipal.png"
                            style="height: 50vh; position: relative">
                        <?php endif; ?>
                        <div class="shape"></div>
                    </div>
                </div>
            </div>
        </div>
        <svg style="pointer-events: none" class="wave" width="100%" height="50px" preserveAspectRatio="none"
            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 75">
            <defs>
                <style>
                    .a {
                        fill: none;
                    }

                    .b {
                        clip-path: url(#a);
                    }

                    .c,
                    .d {
                        fill: #f9f9fc;
                    }

                    .d {
                        opacity: 0.5;
                        isolation: isolate;
                    }
                </style>
                <clipPath id="a">
                    <rect class="a" width="1920" height="75"></rect>
                </clipPath>
            </defs>
            <title>wave</title>
            <g class="b">
                <path class="c"
                    d="M1963,327H-105V65A2647.49,2647.49,0,0,1,431,19c217.7,3.5,239.6,30.8,470,36,297.3,6.7,367.5-36.2,642-28a2511.41,2511.41,0,0,1,420,48">
                </path>
            </g>
            <g class="b">
                <path class="d"
                    d="M-127,404H1963V44c-140.1-28-343.3-46.7-566,22-75.5,23.3-118.5,45.9-162,64-48.6,20.2-404.7,128-784,0C355.2,97.7,341.6,78.3,235,50,86.6,10.6-41.8,6.9-127,10">
                </path>
            </g>
            <g class="b">
                <path class="d"
                    d="M1979,462-155,446V106C251.8,20.2,576.6,15.9,805,30c167.4,10.3,322.3,32.9,680,56,207,13.4,378,20.3,494,24">
                </path>
            </g>
            <g class="b">
                <path class="d"
                    d="M1998,484H-243V100c445.8,26.8,794.2-4.1,1035-39,141-20.4,231.1-40.1,378-45,349.6-11.6,636.7,73.8,828,150">
                </path>
            </g>
        </svg>
    </header>