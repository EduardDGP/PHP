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
?>
