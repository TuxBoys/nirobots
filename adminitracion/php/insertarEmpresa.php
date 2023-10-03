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
                    if (isset($_FILES['fotoEmpresa'])) {
                        // Extraer datos del formulario
                        extract($_POST);
                        $nombre_empresa = $_POST['nombreEmpresa'];
                        $descripcion = $_POST['descripcion'];
                        $ubicacion = $_POST['ubicacion'];

                        // Carpeta de destino para la imagen de la empresa
                        $carpeta_destino_imagenes = "../imagenesServidor/imagenesEmpresas/";

                        $nombre_imagen = basename($_FILES['fotoEmpresa']['name']);

                        if (move_uploaded_file($_FILES['fotoEmpresa']['tmp_name'], $carpeta_destino_imagenes . $nombre_imagen)) {
                            // Insertar información en la base de datos
                            $query = "INSERT INTO empresa (nombre_empresa, descripcion, ubicacion, foto_empresa) VALUES (?, ?, ?, ?)";
                            $stmt = $conexion->prepare($query);
                            $stmt->bind_param("ssss", $nombre_empresa, $descripcion, $ubicacion, $nombre_imagen);

                            if ($stmt->execute()) {
                                echo "Se insertó la empresa correctamente.";
                            } else {
                                echo "Error al insertar la empresa: " . $stmt->error;
                            }

                            $stmt->close();
                        } else {
                            echo "Error al mover la imagen.";
                        }
                    } else {
                        echo "No se ha subido alguna imagen.";
                    }
                    ?>

                </div>

            </div>
            <br>

            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center">
                        <div class="p-4 bg-light rounded">
                            <img src="../img/icons8-libro.gif" alt="Libro GIF" class="img-fluid" width="100px">

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