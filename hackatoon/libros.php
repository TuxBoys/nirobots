<?php
$header_type ='header1';
require_once "vistas/header.php";

$ID_Biblioteca = isset($_GET['ID_Biblioteca']) ? $_GET['ID_Biblioteca'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if ($ID_Biblioteca == '' || $token == '') {
    echo 'Error';
    exit;
} else {
    $token_tmp = hash_hmac('sha512', $ID_Biblioteca, KEY_TOKEN);

    if (trim($token) == trim($token_tmp)) {
        $query = "SELECT count(ID_Biblioteca) FROM libros WHERE ID_Biblioteca=?";
        $sql = $conexion->prepare($query);
        $sql->execute([$ID_Biblioteca]);
        $count = $sql->fetchColumn();

        if ($count > 0) {
            $query = "SELECT ID_Biblioteca, Titulo, Autor, Sinopsis, PortadaURL, ruta_pdf , Fecha_Publicacion, ruta_pdf FROM libros WHERE ID_Biblioteca=?";
            $sql = $conexion->prepare($query);
            $sql->execute([$ID_Biblioteca]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $titulo = $row['Titulo'];
            $autor = $row['Autor'];
            $sinopsis = $row['Sinopsis'];
            $fecha = $row['Fecha_Publicacion'];
            $pdf_url = $row['ruta_pdf']; 
            $portada_url = $row['PortadaURL'];
            $ruta_pdf = $row['ruta_pdf']; 
        } else {
            echo 'Error: No se encontraron datos con el ID especificado';
        }
    } else {
        echo 'Error: El token no coincide';
    }

  


// Construir la ruta completa al archivo PDF
  $rutaPDF = '../adminitracion/librosPDF/' . $ruta_pdf;
  $rutaIMG = '../adminitracion/imagenesServidor/' . $portada_url;
  
}
?>




<div class="container py-5">
 
  <div class="row gx-4 gx-lg-5 align-items-center">
    <!-- Contenido -->
    <div class="col-md-6">
      <h6 class="text-muted">Fecha de publicación: <?php echo $fecha; ?></h6>
      <h1 class="display-4 mb-4"><?php echo $titulo; ?></h1>
      <p class="author mb-4">Escrito por: <?php echo $autor; ?></p>
      <p class="lead mb-4 text-justify">Sinopsis: <?php echo isset($sinopsis) ? $sinopsis : 'Sin sinopsis disponible.'; ?></p>

      <!-- Botones para leer y descargar -->
      <div class="read-buttons text-center">
        <a href="#pdf-render" class="btn btn-primary btn-lg">Leer ahora</a>
        <a href="<?php echo $pdf_url; ?>" class="btn btn-secondary btn-lg">Descargar</a>
      </div>
    </div>
    
    <div class="col-md-6 text-center">
      <img class="rounded"
        src="<?php echo $rutaIMG?>"
        style="max-width: 70%; height: auto; margin: 10px auto;">
    </div>
  </div>
</div>



<h2 class="projcard-title text-center mt-4"> Que encuentras sabiduria entre Sus páginas</h2>

<div class="container-fluid">

  <div class="row">
    <div class="col-md-1 mx-auto text-center">
      <button class="btn btn-primary custom-btn" id="prev-page">
        Anterior
      </button>
    </div>
  </div>
  <div class="row">
    <div class="col-md-10 mx-auto text-center">
      <canvas id="pdf-render" class="custom-canvas">
      </canvas>
    </div>
    <span class="page-info text-center">
        Página <span id="page-num"></span> de <span id="page-count"></span>
      </span>
  </div>
  <div class="row">
    <div class="col-md-1 mx-auto text-center">
      <button class="btn btn-primary custom-btn" id="next-page">
        Siguiente
      </button>
    </div>
  </div>
  
</div>





 

    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    <script>
     const url = '<?php echo $rutaPDF; ?>';

let pdfDoc = null,
  pageNum = 1,
  pageIsRendering = false,
  pageNumIsPending = null;

const scale = 1.7,
  canvas = document.querySelector('#pdf-render'),
  ctx = canvas.getContext('2d');

const renderPage = num => {
  pageIsRendering = true;

  pdfDoc.getPage(num).then(page => {
    const viewport = page.getViewport({ scale });
    canvas.width = viewport.width;
    canvas.height = viewport.height;

    const renderCtx = {
      canvasContext: ctx,
      viewport
    };

    page.render(renderCtx).promise.then(() => {
      pageIsRendering = false;

      if (pageNumIsPending !== null) {
        renderPage(pageNumIsPending);
        pageNumIsPending = null;
      }
    });

    document.querySelector('#page-num').textContent = num;
  });
};

const queueRenderPage = num => {
  if (pageIsRendering) {
    pageNumIsPending = num;
  } else {
    renderPage(num);
  }
};

const showPrevPage = () => {
  if (pageNum <= 1) {
    return;
  }
  pageNum--;
  queueRenderPage(pageNum);
};

const showNextPage = () => {
  if (pageNum >= pdfDoc.numPages) {
    return;
  }
  pageNum++;
  queueRenderPage(pageNum);
};

pdfjsLib
  .getDocument(url)
  .promise.then(pdfDoc_ => {
    pdfDoc = pdfDoc_;
    document.querySelector('#page-count').textContent = pdfDoc.numPages;
    renderPage(pageNum);
  })
  .catch(err => {
    console.error('Error al cargar el PDF:', err);
  });

// Función para ajustar el canvas según el tamaño de la ventana
const adjustCanvasSize = () => {
  const isMobile = window.innerWidth <= 767;

  if (isMobile) {
    // Establece el ancho del canvas para dispositivos móviles
    canvas.style.width = '100%';
  } else {
    // Establece el ancho del canvas para PC
    canvas.style.width = '70%';
  }
};

// Escucha el evento de cambio de tamaño de la ventana
window.addEventListener('resize', adjustCanvasSize);

// Ajusta el tamaño del canvas al cargar la página y al cambiar el tamaño de la ventana
adjustCanvasSize();

// Button Events
document.querySelector('#prev-page').addEventListener('click', showPrevPage);
document.querySelector('#next-page').addEventListener('click', showNextPage);

    </script>




<?php
require_once "vistas/footerPrincipal.php";
?>