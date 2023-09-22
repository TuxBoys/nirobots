<?php
session_start();
include 'conexion.php';

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$contrasena = hash('sha512', $contrasena);
$validar_login = mysqli_query($conexion, "SELECT * from usuarios WHERE correo='$correo'
and contrasena = '$contrasena'");

if (mysqli_num_rows($validar_login) > 0) {
    $row = mysqli_fetch_assoc($validar_login);
    if ($row['contrasena'] === $contrasena) {
        $_SESSION['usuario'] = $correo;

        $fecha_actual = date('Y-m-d H:i:s');
        $update_usuario = mysqli_query($conexion, "UPDATE usuarios SET ultimo_acceso = '$fecha_actual' WHERE correo='$correo'");

        if (!$update_usuario) {
            die("Error al actualizar el usuario: " . mysqli_error($conexion));
        }
        header("location: ../../index01.php");
        exit;
    }
} else {
    echo $contrasena;
    exit;
}
?>