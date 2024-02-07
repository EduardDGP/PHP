<?php


function obtenerDetallesProductoPorNombre($pdo, $selectedNombre) {
    if(!$pdo){
        return;
    }
        try {
            // Consultar los detalles del producto por su nombre
            $query = $pdo->prepare("SELECT NOMBRE_CORTO, NOMBRE, DESCRIPCION, PVP FROM PRODUCTO WHERE NOMBRE = ?");
            $query->execute([$selectedNombre]);
            
            // Devolver los detalles del producto si se encuentra
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Devolver un mensaje de error en caso de fallo en la consulta
            return "Error: " . $e->getMessage();
        }
}
?>

