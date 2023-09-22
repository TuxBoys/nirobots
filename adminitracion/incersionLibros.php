<?php
require_once "vistas/header.php";

?>
<div class="container-fluid">
    <h1>Inersion de libros</h1>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="h3 mb-4 text-gray-800">Insertar un Nuevo Libro</h1>
            <form action="php/insertarLibros.php" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="titulo">Título:</label>
                    <input type="text" class="form-control" name="titulo" required>
                </div>

                <div class="form-group">
                    <label for="autor">Autor:</label>
                    <input type="text" class="form-control" name="autor" required>
                </div>

                <div class="form-group">
                    <label for="sinopsis">Sinopsis:</label>
                    <textarea class="form-control" name="sinopsis" required></textarea>
                </div>

                <div class="form-group">
                    <label for="fechaPublicacion">Fecha de Publicación:</label>
                    <input type="date" class="form-control" name="fechaPublicacion" required>
                </div>

                <div class="form-group">
                    <label for="categoria">Categoría:</label>
                    <select class="form-control" name="categoria" required>
                        <option value="Infantil">Infantil</option>
                        <option value="Adultos">Adultos</option>
                        <option value="Apoyo">Apoyo</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="portada">Portada (imagen):</label>
                    <input type="file" class="form-control-file" name="Imagen" accept="image/*" required>
                </div>

                <<div class="form-group">
                    <label for="pdf">PDF:</label>
                    <input type="file" class="form-control-file" name="archivo" accept="application/pdf" required>
        </div>


        <input type="submit" class="btn btn-primary" value="Aceptar"></input>
        </form>
    </div>
</div>


</div>
<?php
require_once "vistas/footer.php";

?>