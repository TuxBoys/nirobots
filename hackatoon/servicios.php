<?php
    $header_type = 'header2';
    require_once "vistas/header.php";
?>

<?php

if (isset($_GET['id_empresa']) && isset($_GET['token'])) {
    $idEmpresa = $_GET['id_empresa'];
    $token = $_GET['token'];

    
    $expectedToken = hash_hmac('sha1', $idEmpresa, KEY_TOKEN);
    if ($token === $expectedToken) {

        $query = "SELECT * FROM servicio WHERE id_empresa = ?";
        
        
        $stmt = $conexion->prepare($query);

        
        $stmt->bindValue(1, $idEmpresa, PDO::PARAM_INT);

       
        if ($stmt->execute()) {
           
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

          
            foreach ($result as $row) {
                echo "Nombre del Servicio: " . $row["nombre_servicio"] . "<br>";
                echo "Descripción del Servicio: " . $row["descripcion"] . "<br><br>";
            }
        } else {
            echo "Error al ejecutar la consulta: " . $stmt->errorInfo()[2];
        }
    } else {
        
        echo "Acceso no autorizado.";
    }
} else {
  
    echo "URL no válida.";
}
?>

<?php
    require_once "vistas/footerPrincipal.php";
?>