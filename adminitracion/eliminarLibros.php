<?php
require_once "vistas/header.php"; ?>


<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="mb-4 text-gray-800">Búsqueda de Libros</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form id="busqueda-form" class="form-inline">
                    <div class="form-group mr-3">
                        <label for="criterio" class="mr-3">Selecciona el criterio de búsqueda:   </label>
                        <select class="form-control mr-3" id="criterio" name="criterio">
                            <option value="autor">Autor</option>
                            <option value="fecha">Fecha</option>
                            <option value="titulo">Título</option>
                            <option value="todos">Ver todos los libros</option>
                        </select>
                    </div>
                    <div class="form-group mr-3">
                        <input type="text" class="form-control" id="busqueda" name="busqueda" placeholder="Buscar">
                    </div>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div id="resultados"></div> <!-- Aquí se mostrarán los resultados de la búsqueda -->
            </div>
        </div>
    </div>

    <script>
        document.getElementById('busqueda-form').addEventListener('submit', function (event) {
            event.preventDefault(); // Evitar que el formulario se envíe de manera tradicional
            
            // Obtener los valores del formulario
            var criterio = document.getElementById('criterio').value;
            var busqueda = document.getElementById('busqueda').value;

            // Realizar una solicitud AJAX para buscar y obtener los resultados
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'php/busqueda.php?criterio=' + criterio + '&busqueda=' + busqueda, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Manejar la respuesta y actualizar los resultados en el div 'resultados'
                    document.getElementById('resultados').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        });
    </script>
</body>

<?php
require_once "vistas/footer.php"; ?>