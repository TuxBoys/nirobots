<?php
require_once "vistas/header.php";

?>

<?php

function getEmpresas()
{
    // Conectarse a la base de datos
    include "php/conexion_be.php";

    // Realizar la consulta
    $result = mysqli_query($conexion, "SELECT id_empresa, nombre_empresa FROM empresa");

    // Iterar los resultados
    $empresas = [];
    while ($fila = mysqli_fetch_assoc($result)) {
        $empresas[] = $fila;
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);

    return $empresas;
}

?>

<div class="container-fluid">
    <h1>Inserción de Servicios</h1>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="h3 mb-4 text-gray-800">Insertar un Nuevo Servicio</h1>
            <form action="php/insertarServicios.php" method="post"  enctype="multipart/form-data">

                

                <div class="form-group">
                    <label for="nombre_servicio">Nombre del Servicio:</label>
                    <input type="text" class="form-control" name="nombre_servicio" required>
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción del Servicio:</label>
                    <textarea class="form-control" name="descripcion" required></textarea>
                </div>

                
                <div class="form-group">
                    <label for="id_empresa">Empresa:</label>
                    <select name="id_empresa" class="form-control">
                        <?php

                        // Obtener las empresas
                        $empresas = getEmpresas();

                        // Iterar las empresas
                        foreach ($empresas as $empresa) {
                            // Agregar la empresa al select
                            echo "<option value=" . $empresa['id_empresa'] . ">" . $empresa['nombre_empresa'] . "</option>";
                        }

                        ?>
                    </select>
                </div>

           

                <div class="form-group">
                        <label for="imagen">Foto del Servicio:</label>
                        <input type="file" class="form-control-file" name="Imagen" accept="image/*" required>
                    </div>

                <input type="submit" class="btn btn-primary" value="Guardar">

                
            </form>

            
        </div>
    </div>
</div>

<?php
require_once "vistas/footer.php";

?>
