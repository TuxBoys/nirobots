<?php
    $header_type = 'header2';
    require_once "vistas/header.php";

    $query = "SELECT id_empresa, nombre_empresa, descripcion, ubicacion, foto_empresa FROM empresa";
    $stmt = $conexion->prepare($query);
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
?>

        <div class="container py-5">
            <br>
            <br>
        <main>
            <div class="row">
            <h1 class="hero__title" id = "Explora">Seccion de empresas</h1>
                <?php foreach ($resultado as $row){
                    $rutaIMG = '../adminitracion/imagenesServidor/imagenesEmpresas/' . $row['foto_empresa'];
                    $url = "servicios.php?id_empresa={$row['id_empresa']}&token=" . hash_hmac('sha1', $row['id_empresa'], KEY_TOKEN);
                    ?>
                

                        <div class="projcard projcard-color glass">
                        <div class="projcard-innerbox">
                            <img class="projcard-img" src="<?php echo $rutaIMG?>" />
                            <div class="projcard-textbox">
                                <div class="projcard-title"><?php echo $row['nombre_empresa']; ?></div>
                                <div class="projcard-subtitle"><?php echo $row['ubicacion']; ?></div>
                                <div class="projcard-bar"></div>
                                <p class="projcard-description">
                                <?php echo $row['descripcion']; ?>
                                </p>
                                <br><a href="<?php echo $url; ?>" class="btn btn-primary">ir a la pagina</a>
                            </div>
                        </div>
                    </div><br>
                    <?php  } ?>
                    </div> <br>

                    <!--<div class="projcard projcard-color">
                        <div class="projcard-innerbox">
                            <div class="projcard-textbox">
                                <div class="projcard-title">Ottobock</div>
                                <div class="projcard-subtitle">Ottobock SE & Co. KGaA, anteriormente Otto Bock, es una
                                    empresa con sede en Duderstadt, Alemania, que opera en el campo de la tecnología
                                    ortopédica.
                                </div>
                                <div class="projcard-bar"></div>
                                <div class="projcard-description">Las soluciones protésicas Ottobock están diseñadas
                                    para mantener a los usuarios en movimiento dondequiera que estén en su viaje. Con
                                    una amplia gama de soluciones, nuestro objetivo es alcanzar su resultado ideal en
                                    cada paso del camino. Desde la C-Leg 4 hasta la última tecnología de encaje, estamos
                                    aquí para apoyar su libertad de movimiento.
                                    Desde 2012, Ottobock ha estado investigando soluciones innovadoras para hacer más
                                    ergonómicos los puestos de trabajo en el sector industrial, logístico y comercial.
                                    Nuestro objetivo es proporcionar alivio a las personas que realizan tareas
                                    físicamente exigentes, como el trabajo en exceso, creando así condiciones de trabajo
                                    más saludables. Ottobock Bionic Exoskeletons ofrece una amplia gama de exoesqueletos
                                    y soluciones para logística, montaje automotriz y aeronáutica, mantenimiento y
                                    reparación, pintura o construcción.
                                </div>
                                <br><a href="https://www.ottobock.com/es-us/soluciones/protesica"
                                    class="btn btn-primary">ir a la pagina</a>
                            </div>
                            <img class="projcard-img" src="./images/Empresas/Ottobock.jpg" />
                        </div>
                    </div> <br>

                    <div class="projcard projcard-color glass">
                        <div class="projcard-innerbox">
                            <img class="projcard-img" src="./images/Empresas/exii.jpeg" />
                            <div class="projcard-textbox">
                                <div class="projcard-title">Exii</div>
                                <div class="projcard-subtitle">Los tres ingenieros (Genta Kondo, Hiroshi Yamaura y
                                    Tetsuya Konishi) diseñaron su primer prototipo en 2013, 'handiii'</div>
                                <div class="projcard-bar"></div>
                                <p class="projcard-description">
                                    La start-up nipona Exii ha diseñado un brazo protésico electrónico con funciones
                                    completas para el agarre de objetos, cuyo precio ronda una décima parte del importe
                                    actual del mercado, lo que podría permitir generalizar el uso de prótesis
                                    robóticas.La compañía Exiii, fundada en 2014 por tres exingenieros
                                    de Sony y Panasonic, ha diseñado un prototipo de brazo eléctrico cuyo coste distaría
                                    mucho de los 1,5 millones de yenes (unos 11.015 euros) que cuesta actualmente
                                    adquirir un modelo mecánico, según el diario Nikkei.

                                    Para lograrlo, esta start-up ha construido una prótesis simple que permite agarrar
                                    objetos con facilidad sin emplear complejos y costosos sistemas como la conexión
                                    cerebral o el movimiento independiente de cada dedo mecánico.
                                </p>
                                <br><a href="" class="btn btn-primary">ir a la pagina</a>
                            </div>
                        </div>
                    </div><br>
                </div>
                <br><br> -->
                

            </div>
        
        </main>
        </div>
        
        

<?php
    require_once "vistas/footerPrincipal.php";
?>