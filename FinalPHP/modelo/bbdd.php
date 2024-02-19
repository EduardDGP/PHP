<?php

require 'config.php';

// Función para conectar a la base de datos
function conectarBD() {
    $servidor = "localhost"; // Cambia esto si tu servidor de base de datos no está en localhost
    $usuario = "user_dwes"; // Usuario de la base de datos
    $password = "userUSER2"; // Contraseña del usuario de la base de datos
    $baseDatos = "restaurante"; // Nombre de la base de datos

    $conexion = new mysqli($servidor, $usuario, $password, $baseDatos);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    return $conexion;
}

// Función para conectar a la base de datos utilizando PDO
function conectarBDPDO() {
    $servidor = "localhost";
    $baseDatos = "restaurante";
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

?>
