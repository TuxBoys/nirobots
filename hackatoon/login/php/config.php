<?php
function get_all_user_data($user_id) {

    // Conectarse a la base de datos
    require_once('config.php');
    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
    if ($conn->connect_error) {
        die("Error al conectar con la base de datos: " . $conn->connect_error);
    }

    // Obtener los datos del usuario
    $sql = "SELECT * FROM users WHERE id = $user_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
    } else {
        $user_data = array();
    }

    // Cerrar la conexión con la base de datos
    $conn->close();

    return $user_data;
}

?>