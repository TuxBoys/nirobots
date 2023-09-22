<?php
require_once "vistas/headerBiblioteca.php";
define("KEY_TOKEN", "N1_Rob0t5-77*");

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
            $pdf_url = $row['ruta_pdf']; // Agregamos esta línea para obtener la URL del PDF
            $portada_url = $row['PortadaURL'];
            $ruta_pdf = $row['ruta_pdf']; // Agregamos esta línea para obtener la URL de la portada
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





<!-- Section -->
<div class="container py-5">
  <div class="row gx-4 gx-lg-5 align-items-center">
    <!-- Contenido a la izquierda: Título, autor y fecha -->
    <div class="col-md-6">
      <h6 class="text-muted">Fecha de publicación: <?php echo $fecha; ?></h6>
      <h1 class="display-4 mb-4"><?php echo $titulo; ?></h1>
      <p class="author mb-4">Escrito por: <?php echo $autor; ?></p>
      <p class="lead mb-4 text-justify">Sinopsis: <?php echo isset($sinopsis) ? $sinopsis : 'Sin sinopsis disponible.'; ?></p>

      <!-- Botones para leer y descargar -->
      <div class="read-buttons">
        <a href="#pdf-render" class="btn btn-primary btn-lg">Leer ahora</a>
        <a href="<?php echo $pdf_url; ?>" class="btn btn-secondary btn-lg">Descargar</a>
      </div>
    </div>
    <!-- Imagen a la derecha -->
    <div class="col-md-6">
      <div class="book-cover-container text-right">
        <img class="rounded float-end"
        src="<?php echo $rutaIMG?>"
          style="max-width: 70%; height: auto;">
      </div>
    </div>
  </div>
</div>


  <div class="container-fluid">
  <div class="row">
    <div class="col-md-1 mx-auto">
      <button class="btn btn-primary m-3" id="prev-page">
        <i class="fas fa-arrow-circle-left"></i> Prev Page
      </button>
    </div>
  </div>
  <div class="row">
    <div class="col-md-10 mx-auto">
      <canvas id="pdf-render">
        
      </canvas>
    </div>
    <span class="page-info text-center">
        Page <span id="page-num"></span> of <span id="page-count"></span>
      </span>
  </div>
  <div class="row">
    <div class="col-md-1 mx-auto">
      <button class="btn btn-primary m-3" id="next-page">
        Next Page <i class="fas fa-arrow-circle-right"></i>
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

const scale = 1.2,
  canvas = document.querySelector('#pdf-render'),
  ctx = canvas.getContext('2d');

// Render the page
const renderPage = num => {
  pageIsRendering = true;

  // Get page
  pdfDoc.getPage(num).then(page => {
    // Set scale
    const viewport = page.getViewport({ scale });
    canvas.height = 900;
    canvas.width = 700;

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

    // Output current page
    document.querySelector('#page-num').textContent = num;
  });
};

// Check for pages rendering
const queueRenderPage = num => {
  if (pageIsRendering) {
    pageNumIsPending = num;
  } else {
    renderPage(num);
  }
};

// Show Prev Page
const showPrevPage = () => {
  if (pageNum <= 1) {
    return;
  }
  pageNum--;
  queueRenderPage(pageNum);
};

// Show Next Page
const showNextPage = () => {
  if (pageNum >= pdfDoc.numPages) {
    return;
  }
  pageNum++;
  queueRenderPage(pageNum);
};

// Get Document
pdfjsLib
  .getDocument(url)
  .promise.then(pdfDoc_ => {
    pdfDoc = pdfDoc_;

    document.querySelector('#page-count').textContent = pdfDoc.numPages;

    renderPage(pageNum);
  })
  .catch(err => {
    // Display error
    const div = document.createElement('div');
    div.className = 'error';
    div.appendChild(document.createTextNode(err.message));
    document.querySelector('body').insertBefore(div, canvas);
    // Remove top bar
    document.querySelector('.top-bar').style.display = 'none';
  });

// Button Events
document.querySelector('#prev-page').addEventListener('click', showPrevPage);
document.querySelector('#next-page').addEventListener('click', showNextPage);
    </script>
</section>



<?php
require_once "vistas/footer.php";
?>
