<?php
include 'conexion.php';
session_start();

// Verificar si se ha seleccionado un candidato
if (isset($_POST['elegir_candidato'])) {
    // Obtener el DNI del empleado y del candidato
    $empleadoDNI = $_SESSION['empleado_dni'];
    $candidatoDNI = $_POST['elegir_candidato'];

    // Actualizar la base de datos con la elección del candidato
    $stmt = $pdo->prepare("UPDATE empleados SET vota_a = :candidatoDNI WHERE dni = :empleadoDNI");
    $stmt->bindParam(':candidatoDNI', $candidatoDNI);
    $stmt->bindParam(':empleadoDNI', $empleadoDNI);
    $stmt->execute();

    echo 'Has elegido a tu candidato. Gracias por votar.';
    
    // Redirigir al index después de unos segundos
    header("refresh:3;url=index.php");
} else {
    echo 'Debes seleccionar un candidato para votar...';
}
?>
