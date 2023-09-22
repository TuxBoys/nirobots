<?php
require 'conexion_be.php';

// Verifica si se ha enviado un formulario de búsqueda
if (isset($_GET['criterio']) && isset($_GET['busqueda'])) {
    // Obtiene los valores del formulario
    $criterio = $_GET['criterio'];
    $busqueda = $_GET['busqueda'];

    // Consulta SQL dinámica basada en el criterio seleccionado
    $consulta = "";
    if ($criterio === "autor") {
        $consulta = "SELECT * FROM prueba.libros WHERE Autor LIKE '%$busqueda%'";
    } elseif ($criterio === "fecha") {
        $consulta = "SELECT * FROM prueba.libros WHERE Fecha_Publicacion = '$busqueda'";
    } elseif ($criterio === "titulo") {
        $consulta = "SELECT * FROM prueba.libros WHERE Titulo LIKE '%$busqueda%'";
    } elseif ($criterio === "todos") { // Opción para ver todos los libros
        $consulta = "SELECT * FROM prueba.libros";
    }

    $resultados = $conexion->query($consulta);

    if ($resultados->num_rows > 0) {
        echo '<div class="mt-4">';
        echo '<div class="container">';
        echo '<table class="table table-bordered">';
        echo '<thead class="thead-dark">';
        echo '<tr>';
        echo '<th>Título</th>';
        echo '<th>Autor</th>';
        echo '<th>Sinopsis</th>';
        echo '<th>Fecha de Publicación</th>';
        echo '<th>Acciones</th>'; // Columna para editar o eliminar
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        while ($fila = $resultados->fetch_assoc()) {
            echo '<tr>';
            echo '<td>'. $fila["Titulo"] . '</td>';
            echo '<td>'. $fila["Autor"] . '</td>';
            echo '<td>'. $fila["Sinopsis"] . '</td>';
            echo '<td>'. $fila["Fecha_Publicacion"] . '</td>';
            echo '<td>';
            echo '<a href="editar.php?id=' . $fila["ID_Biblioteca"] . '" class="btn btn-primary">Editar</a> ';
            echo '<a href="php/eliminacionLibros.php?id=' . $fila["ID_Biblioteca"] . '" class="btn btn-danger">Eliminar</a>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        echo '</div>';
    } else {
        echo 'No se encontraron resultados.';
    }
}
?>
