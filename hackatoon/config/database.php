<?php
class MiConexionPDO {

    private $host = "localhost";
    private $database = "prueba";
    private $username = "root";
    private $password = "123";
    private $port = 3308; // Puerto personalizado

    function conectar() {
        try {
            // Intenta crear una instancia de PDO
            $dsn = "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->database;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
            $pdo = new PDO($dsn, $this->username, $this->password, $options);
            
            // Verifica si la conexión se estableció correctamente
            if ($pdo) {
                //echo "conectado";
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


// Uso de la clase
$miConexion = new MiConexionPDO();
$conexion = $miConexion->conectar();

// Realiza tus consultas y operaciones aquí

// Cierra la conexión cuando hayas terminado
$conexion = null;




/*
class Database {

    private $hostname = "localhost";
    private $database = "biblioteca";
    private $username = "root";
    private $password = "";
    private $chartset = "utf8"
    //$conexion = new mysqli ($hostname, $username, $password, $database, 3307);
    /*
    if ($conexion->connect_errno)
    {
        die("no conecto".$conexion->connect_errno);
    }
    else
    {
        echo"se conecto";
    }
}
*/
?>