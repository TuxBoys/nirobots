<?php
include 'conexion.php'; // Asegúrate de que este archivo contiene la configuración de conexión a la base de datos

// Obtén los datos del formulario
$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$contrasena = hash('sha512', $contrasena); // Recomiendo usar algoritmos más seguros para el hash, como bcrypt

$query = "INSERT INTO usuarios (nombre_completo, correo, usuario, contrasena)
            VALUES ('$nombre_completo', '$correo','$usuario','$contrasena')";

$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo'");
$ejecutar = mysqli_query($conexion, $query);


if (mysqli_num_rows($verificar_correo) > 0) {
    echo ' 
    <script>
    alert("correo ya esta registrado, intenta con otro di ferente");
    window.location= "../index.php" ;
    
    </script>
    ';
    exit();
}

if($ejecutar)
{
    echo ' 
    <script>
    alert("Usuario almacenado con exito");
    windows.location= "../INICIO.php"
    </script>
    ';
}
else
{
    echo ' 
    <script>
    alert("Usuario almacenado con exito");
    windows.location= "../index.php"
    </script>
    ';
}
mysqli_close($conexion);
?>
