<?php
require_once "vistas/header.php";
?>

    <div class="container-fluid">
        <h1>Inserción de Empresas</h1>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="h3 mb-4 text-gray-800">Insertar una Nueva Empresa</h1>
                <form action="php/insertarEmpresa.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="nombreEmpresa">Nombre de la Empresa:</label>
                        <input type="text" class="form-control" name="nombreEmpresa" required>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea class="form-control" name="descripcion" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="ubicacion">Ubicación:</label>
                        <input type="text" class="form-control" name="ubicacion" required>
                    </div>

                    <div class="form-group">
                        <label for="fotoEmpresa">Foto de la Empresa:</label>
                        <input type="file" class="form-control-file" name="fotoEmpresa" accept="image/*" required>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Aceptar"></input>
                </form>
            </div>
        </div>
    </div>

<?php
require_once "vistas/footer.php";
?>