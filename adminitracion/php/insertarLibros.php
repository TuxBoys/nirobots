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
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <div class="container-fluid">
                <h1 class="text-center mt-5">Resultado de la Incersion de LIBROS</h1>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-md-6">
                <?php
session_start();
include 'conexion_be.php';

if (isset($_FILES['archivo']) && isset($_FILES['Imagen'])) {
    // Extraer datos del formulario
    extract($_POST);
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $sinopsis = $_POST['sinopsis'];
    $fechaPublicacion = $_POST['fechaPublicacion'];
    $categoria = $_POST['categoria'];

    // Carpeta de destino para los archivos PDF e imágenes
    $carpeta_destino_pdf = "../librosPDF/";
    $carpeta_destino_imagenes = "../imagenesServidor/";

    // Obtener información de los archivos
    $nombre_archivo_pdf = basename($_FILES['archivo']['name']);
    $nombre_imagen = basename($_FILES['Imagen']['name']);

    // Verificar que el archivo sea un PDF
    $extension_pdf = pathinfo($nombre_archivo_pdf, PATHINFO_EXTENSION);
    if (strtolower($extension_pdf) === 'pdf') {
        // Mover el archivo PDF a la carpeta de destino
        if (move_uploaded_file($_FILES['archivo']['tmp_name'], $carpeta_destino_pdf . $nombre_archivo_pdf)) {
            // Mover la imagen a la carpeta de destino
            if (move_uploaded_file($_FILES['Imagen']['tmp_name'], $carpeta_destino_imagenes . $nombre_imagen)) {
                // Insertar información en la base de datos
                $query = "INSERT INTO libros (Titulo, Autor, Sinopsis, Categoria, Fecha_Publicacion, PortadaURL, ruta_pdf) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conexion->prepare($query);
                $stmt->bind_param("sssssss", $titulo, $autor, $sinopsis, $categoria, $fechaPublicacion, $nombre_imagen, $nombre_archivo_pdf);

                if ($stmt->execute()) {
                    echo "Se insertó el libro correctamente.";
                } else {
                    echo "Error al insertar el libro: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Error al mover la imagen.";
            }
        } else {
            echo "Error al mover el archivo PDF.";
        }
    } else {
        echo "El archivo subido no es un PDF válido.";
    }
} else {
    echo "No se ha subido algún archivo.";
}
?>


                       
                </div>
                
            </div>
                    <br>

            <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <div class="p-4 bg-light rounded">
                
            
                </div>
        </div>
    </div>
</div>
           

        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>