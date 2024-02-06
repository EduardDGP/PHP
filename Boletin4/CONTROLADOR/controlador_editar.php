<?php
require_once 'modelo_editar.php';

// Incluir la conexión a la base de datos
try {
    // Establecer la conexión PDO
    $pdo = new PDO("mysql:host=localhost;dbname=dwes", "user_dwes", "userUSER2");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Mostrar mensaje de error en caso de fallo en la conexión
    echo "Error en la conexión: " . $e->getMessage();
    die();
}

// Verificar si se proporciona el código del producto
if (isset($_GET["cod"])) {
    $selectedCod = $_GET["cod"];

    // Obtener los detalles del producto
    $producto = obtenerDetallesProducto($pdo, $selectedCod);

    // Verificar si se encontró el producto
    if (is_array($producto)) {
        // Incluir la vista para mostrar el formulario de edición
        include 'editar.php';
    } else {
        // Mostrar mensaje si el producto no se encuentra
        echo $producto;
    }
} else {
    // Mostrar mensaje si no se proporciona el código del producto
    echo "Código de producto no proporcionado.";
}
?>
