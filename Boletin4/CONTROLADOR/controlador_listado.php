<?php
// Incluir el archivo de modelo
require_once '../MODELO/modelo_listado.php';
// Incluir el archivo de conexión a la base de datos
require_once '../MODELO/bbdd.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener la familia seleccionada
    $selectedFamilia = $_POST["familia"];

    try {
        // Establecer la conexión PDO
        $pdo = conectarBDPDO();

        // Preparar y ejecutar la consulta para obtener productos de la familia seleccionada
        $query = $pdo->prepare("SELECT COD, NOMBRE_CORTO, PVP FROM PRODUCTO WHERE FAMILIA = ?");
        $query->execute([$selectedFamilia]);

        // Bandera para verificar si hay productos
        $productosExistentes = false;

        // Encabezado para los productos de la familia seleccionada
        echo "<h2>Productos de la familia seleccionada:</h2>";
        echo "<ul>";

        // Mostrar productos
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            echo "<li>{$row['NOMBRE_CORTO']} - PVP: {$row['PVP']} <a href='../VISTA/editar.php?cod={$row['COD']}'>Editar</a></li>";
            $productosExistentes = true;
        }

        echo "</ul>";

        // Mostrar mensaje si no hay productos
        if (!$productosExistentes) {
            echo "<p>No hay productos en stock para la familia seleccionada.</p>";
        }

    } catch (PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
    }
}
?>
