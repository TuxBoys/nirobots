<?php
require_once 'config.php'; // Incluye el archivo de configuración para acceder a las variables de conexión

class MiConexionPDO {

    function conectar() {
        try {
            
            $dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
            $pdo = new PDO($dsn, DB_USER, DB_PASSWORD, $options);
            
           
            if ($pdo) {
                return $pdo;
            } else {
                die('No se pudo establecer la conexión a la base de datos.');
            }
        } catch(PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
            exit;
        }
    }
}

$miConexion = new MiConexionPDO();
$conexion = $miConexion->conectar();



// Cierra la conexión cuando hayas terminado
$conexion = null;
?>
