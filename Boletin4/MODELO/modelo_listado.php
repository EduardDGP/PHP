<?php
// Incluir el archivo de configuración de la base de datos
require_once 'bbdd.php';


// Función para obtener todas las familias
function obtenerFamilias() {
    $conexion = conectarBD();
    $query = "SELECT * FROM FAMILIA";
    $result = $conexion->query($query);
    $familias = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $familias[] = $row;
        }
    }

    $conexion->close();

    return $familias;
}

function obtenerProductos($familia){
    // Establecer la conexión PDO
    $pdo = conectarBDPDO();

    // Preparar y ejecutar la consulta para obtener productos de la familia seleccionada
    $query = $pdo->prepare("SELECT COD, NOMBRE_CORTO, PVP FROM PRODUCTO WHERE FAMILIA = ?");
    $p = $query->execute([$familia]);
    $productos = [];

    if ($p->num_rows > 0) {
        while ($row = $p->fetch_assoc()) {
            $productos[] = $row;
        }
    }

    return $productos;
}

?>
