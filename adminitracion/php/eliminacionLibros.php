<!DOCTYPE html>
<html>

<head>
    <title>Resultado de la Inserción</title>
    <!-- Agregar los enlaces a los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Agregar los enlaces a los scripts de Bootstrap (JavaScript) -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body>
<?php
// Verifica si se ha proporcionado un ID válido a través de la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Incluye el archivo de conexión a la base de datos
    require 'conexion_be.php';

    $id = mysqli_real_escape_string($conexion, $_GET['id']);

    // Consulta SQL para eliminar el libro
    $sql = "DELETE FROM prueba.libros WHERE ID_Biblioteca = $id";

    if (mysqli_query($conexion, $sql)) {
        // Libro eliminado con éxito
        echo '<script>alert("Libro eliminado con éxito");</script>';
        echo '<p>¿Qué desea hacer?</p>';
        echo '<a href="../eliminarLibros.php" class="btn btn-primary mb-4 mr-4">Volver a la gestión de libros</a>';
        echo '<a href="../index.php" class="btn btn-secondary mb-4 mr-4">Ir a la página de inicio</a>';
    } else {
        echo "Error al eliminar el libro: " . mysqli_error($conexion);
    }

   
    mysqli_close($conexion);
} else {
    echo "ID no válido";
}
?>
</body>

