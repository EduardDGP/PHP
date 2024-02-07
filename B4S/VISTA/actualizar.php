<?php
require_once("../MODELO/config.php");
require_once("../MODELO/bbdd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Reutilizar la conexión PDO existente
        $pdo = conectarBDPDO();

        // Obtener los datos del formulario
        $cod = $_POST["cod"];
        $nombreCorto = $_POST["nombreCorto"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $pvp = $_POST["pvp"];

        // Realizar la actualización en la base de datos
        $query = $pdo->prepare("UPDATE PRODUCTO SET NOMBRE_CORTO = ?, NOMBRE = ?, DESCRIPCION = ?, PVP = ? WHERE COD = ?");
        $query->execute([$nombreCorto, $nombre, $descripcion, $pvp, $cod]);

        // Mostrar mensaje de éxito
        echo "Producto actualizado correctamente. <br>";
        // Redireccionar a la página principal después de 3 segundos
        header("refresh:3;url=listado.php");
        echo "Redireccionando a la página principal...";
    } catch (PDOException $e) {
        // Mostrar mensaje de error en caso de fallo en la actualización
        echo "Error al actualizar el producto: " . $e->getMessage();
    }
} else {
    // Mostrar mensaje si se intenta acceder al script de manera incorrecta
    echo "Acceso no permitido.";
}
?>
