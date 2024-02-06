<?php
include 'conexion.php';

// Verificar si se ha seleccionado un candidato
if (isset($_POST['elegir_candidato'])) {
    $candidatoDNI = $_POST['elegir_candidato'];

    // Actualizar la base de datos con la elección del candidato
    $stmt = $pdo->prepare("UPDATE empleados SET vota_a = :candidatoDNI WHERE dni = :candidatoDNI");
    $stmt->bindParam(':candidatoDNI', $candidatoDNI);
    $stmt->execute();

    echo 'Has elegido a tu candidato. Ahora puedes votar.';
} else {
    echo 'Debes seleccionar un candidato para continuar.';
}
?>
