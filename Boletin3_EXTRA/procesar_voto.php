<?php
include 'conexion.php';

// Verificar si se ha seleccionado un candidato
if (isset($_POST['elegir_candidato'])) {
    $candidatoDNI = $_POST['elegir_candidato'];

    // Actualizar la base de datos con la elección del candidato
    $stmt = $pdo->prepare("UPDATE empleados SET vota_a = :candidatoDNI WHERE es_candidato = 1");
    $stmt->bindParam(':candidatoDNI', $candidatoDNI);
    $stmt->execute();

    echo 'Has elegido a tu candidato. Gracias por votar.';
} else {
    echo 'Debes seleccionar un candidato para votar.';
}
?>
