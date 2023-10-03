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
        $rol = $row['cod_rol'];

       
        switch ($rol) {
            case 1:
                header("location: ../../index.php");
                break;
            case 2:
                header("location: ../../../adminitracion/index.php");
                break;
            case 3:
                 ///Espacio para moderador (Trabajando en ello)
            default:
                echo"Error xD";
                
                break;
        }
        exit;
    }
}
else {
    
    echo '
         <script>
         alert ("Contraseña o usuario invalido, vuelva intenarlo")ñ
         windows.location = "../index.php"
         </script>
    ';
    
    exit;
}
?>


