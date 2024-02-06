<?php
function obtenerDetallesProducto($pdo, $selectedCod) {
    try {
        // Consultar los detalles del producto por su código
        $query = $pdo->prepare("SELECT NOMBRE_CORTO, NOMBRE, DESCRIPCION, PVP FROM PRODUCTO WHERE COD = ?");
        $query->execute([$selectedCod]);
        
        // Devolver los detalles del producto si se encuentra
        return $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Devolver un mensaje de error en caso de fallo en la consulta
        return "Error: " . $e->getMessage();
    }
}
?>
