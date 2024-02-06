<?php

require 'config.php';

// Función para conectar a la base de datos
function conectarBD() {
    $servidor = "localhost"; // Cambia esto si tu servidor de base de datos no está en localhost
    $usuario = "user_dwes"; // Usuario de la base de datos
    $password = "userUSER2"; // Contraseña del usuario de la base de datos
    $baseDatos = "dwes"; // Nombre de la base de datos

    $conexion = new mysqli($servidor, $usuario, $password, $baseDatos);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    return $conexion;
}

// Función para conectar a la base de datos utilizando PDO
function conectarBDPDO() {
    $servidor = "localhost";
    $baseDatos = "dwes";
    $usuario = "user_dwes";
    $contrasena = "userUSER2";

    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $contrasena);
        // Establecer el modo de error de PDO a excepción
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    } catch(PDOException $e) {
        // Manejar errores de conexión
        die("Error de conexión: " . $e->getMessage());
    }
}

// Función para obtener todas las tiendas
function obtenerTiendas() {
    $conexion = conectarBD();
    $query = "SELECT * FROM TIENDA";
    $result = $conexion->query($query);
    $tiendas = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tiendas[] = $row;
        }
    }

    $conexion->close();

    return $tiendas;
}

// Función para obtener todos los productos
function obtenerProductos() {
    $conexion = conectarBD();
    $query = "SELECT * FROM PRODUCTO";
    $result = $conexion->query($query);
    $productos = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $productos[] = $row;
        }
    }

    $conexion->close();

    return $productos;
}

// Función para obtener el stock de un producto en una tienda específica
function obtenerStock($producto, $tienda) {
    $conexion = conectarBD();
    $query = "SELECT UNIDADES FROM STOCK WHERE PRODUCTO = '$producto' AND TIENDA = $tienda";
    $result = $conexion->query($query);
    $stock = 0;

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stock = $row['UNIDADES'];
    }

    $conexion->close();

    return $stock;
}

?>
