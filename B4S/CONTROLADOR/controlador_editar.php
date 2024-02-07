<?php
require_once '../MODELO/modelo_editar.php';
require '../VISTA/editar.php';
require '../MODELO/bbdd.php';

// Verificar si se proporciona el nombre del producto
    $selectedNombre = $_GET["cod"];
    echo $selectedNombre;
    // Obtener los detalles del producto por su nombre
    $producto = obtenerDetallesProductoPorNombre($pdo, $selectedNombre);
    echo var_dump($producto);
    // Verificar si se encontró el producto
    if (is_array($producto)) {
        // Incluir la vista para mostrar el formulario de edición
        include 'editar.php';
    } else {
        // Mostrar mensaje si el producto no se encuentra
        echo "El producto no se ha encontrado.";
    }
    // Mostrar mensaje si no se proporciona el nombre del producto


?>

