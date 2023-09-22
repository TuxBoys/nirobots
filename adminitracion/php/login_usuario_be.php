<?php
session_start();
include 'conexion_be.php';

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Verificar si las casillas de correo y contraseña están vacías
if (empty($usuario) || empty($contrasena)) {
    echo '
        <script>
            alert("Por favor, complete todos los campos.");
            window.location = "../login.php";
        </script>
    ';
    exit; // Detener la ejecución si faltan datos
}

$validar_login = mysqli_query($conexion, "SELECT * FROM usuarioadmin
    WHERE usuario = '$usuario' AND contrasena ='$contrasena'");

if (mysqli_num_rows($validar_login) > 0) {
    $_SESSION['usuario'] = $usuario;
    header("Location: ../index.php");
    exit;
} else {
    echo '
        <script>
            alert("Usuario no existe o la contraseña es incorrecta, inténtelo de nuevo");
            window.location = "../login.php";
        </script>
    ';
}
?>