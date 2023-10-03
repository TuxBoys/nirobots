<?php
$header_type = 'header1';
require_once "vistas/header.php";


// Verifica si se ha enviado el formulario para filtrar por categoría
if (isset($_POST['criterio']) && $_POST['criterio'] !== 'Todos') {

    $categoriaSeleccionada = $_POST['criterio'];
    $query = "SELECT ID_Biblioteca, Titulo, Autor, Sinopsis, PortadaURL FROM libros WHERE Categoria = ?";
    $stmt = $conexion->prepare($query);
    $stmt->execute([$categoriaSeleccionada]);
} elseif (isset($_POST['criterio']) && $_POST['criterio'] === 'Todos') {

    $query = "SELECT ID_Biblioteca, Titulo, Autor, Sinopsis, PortadaURL FROM libros";
    $stmt = $conexion->prepare($query);
    $stmt->execute();
} else {
    $query = "SELECT ID_Biblioteca, Titulo, Autor, Sinopsis, PortadaURL FROM libros";
    $stmt = $conexion->prepare($query);
    $stmt->execute();
}

$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<br><br>



<div class="container">

<div class="containerSelect">
    <form method="post">
        <div class="form-group mx-auto centered-content">
            <label for="criterio" class="mx-3 mt-2 mb-3">
                <h2>Selecciona qué tipo de libro deseas leer.</h2>
            </label>
            <div class="select">
                <div class="select-wrapper">
                    <select class="form-control mx-auto" id="criterio" name="criterio" autofocus>
                        <option value="Todos">Todos</option>
                        <option value="Infantil">Infantil</option>
                        <option value="Adultos">Adultos</option>
                        <option value="Apoyo">Apoyo</option>
                    </select>
                </div>
                <button type="submit" class="btn01">Filtrar</button>
            </div>
        </div>
    </form>
</div>
    <div class="row">
        <?php
        $counter = 1; // Inicializamos un contador
        $patternCounter = 0;

        foreach ($resultado as $row) {
            $rutaIMG = '../adminitracion/imagenesServidor/' . $row['PortadaURL'];
            $isLarge = ($patternCounter < 1); // 1 grande seguido de 6 delgados o viceversa
            ?>
            <div class="about main col-md-<?php echo ($isLarge) ? '6' : '3'; ?>">
                <div class="projcard">
                    <img class="card-img-top" src="<?php echo $rutaIMG ?>" style="height: <?php echo ($isLarge) ? '300px' : '150px'; ?>;
                               object-fit: cover; border-radius: 40px 40px 0 0">
                    <div class="card-body">
                        <h5 class="projcard-title text-center">
                            <?php echo $row['Titulo']; ?>
                        </h5>
                        <div class="projcard-bar"></div>
                        <p class="m-2">
                            <?php echo $row['Autor']; ?>
                        </p>
                        <p class="projcard-description">
                            <?php echo $row['Sinopsis']; ?>
                        </p>
                        <div class="text-center">
                            <a href="libros.php?ID_Biblioteca=<?php echo $row['ID_Biblioteca']; ?>&token=<?php echo hash_hmac('sha512', $row['ID_Biblioteca'], KEY_TOKEN); ?>"
                                class="btn btn-primary">Ir a la página</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php $counter++; // Incrementamos el contador en cada iteración
                $patternCounter++; // Incrementamos el contador de patrón
                // Verificar si hemos llegado al final del patrón
                if ($patternCounter == 9) {
                    $patternCounter = 0; // Reiniciamos el contador de patrón después de 7 elementos
                }
        }


        ?>
        <script>
            // Obtener el elemento select
            const select = document.getElementById('criterio');

            // Agregar un evento para detectar cuando se abre o cierra
            select.addEventListener('focus', () => {
                document.querySelector('.select-wrapper .btn').style.display = 'block';
            });

            select.addEventListener('blur', () => {
                setTimeout(() => {
                    document.querySelector('.select-wrapper .btn').style.display = 'none';
                }, 200); // Ajusta este tiempo para controlar la velocidad de la animación
            });

        </script>
    </div>
</div>

<?php
require_once "vistas/footerPrincipal.php";
?>