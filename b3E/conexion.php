<!-- conexion.php -->
<?php
$host = "localhost";
$dbname = "DEPARTAMENTOS";
$username = "gestor_empleados";
$password = "gestorGESTOR2";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
