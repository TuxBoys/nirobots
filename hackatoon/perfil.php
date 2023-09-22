<?php
require_once "login/php/conexion.php";
session_start();
    
    $user = $_SESSION['usuario'];
    $sql = "SELECT Id, nombre_completo, correo, usuario
     from usuarios where correo = '" . addslashes($user) . "'";


    $result = mysqli_query($conexion, $sql);


if (!$result) {
    
    die("Error al ejecutar la consulta SQL: " . mysqli_error($conexion));
}

$row = mysqli_fetch_assoc($result);





    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estiloPerfil.css">
    <link href="css/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    <title>Perfil</title>
</head>

<body>

</p>
    
     
    <div class="container">
        <div class="main-body">
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index01.php">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                    <li class="breadcrumb-item"><a href="login/php/cerrarSesion.php">Cerrar Sesion</a></li>
                    

                </ol>
            </nav>

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                    class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4><?php ?></h4>
                                    <p class="text-secondary mb-1">Información personal...</p>
                                    <p class="text-muted font-size-sm">Añade una descripción</p>
                                    <button class = "btn btn-primary"> Subir foto de perfil</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3" style="height:315px">
                        <div class="card-body" >
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $row['nombre_completo']; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php  echo $row['correo'];?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Usuario</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $row['usuario']; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Servicio adquirido</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    ¡Opción aún no disponible!
                                </div>
                            <div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Empresa proovedora</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    ¡Opción aún no disponible!
                                </div>
                            <div>

                            
                            <!-- Agrega más campos y detalles aquí según sea necesario -->
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</body>

</html>
