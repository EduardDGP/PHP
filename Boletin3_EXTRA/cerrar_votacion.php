<?php
// cerrar_votacion.php
include 'conexion.php';

// Verificar si hay votos antes de cerrar la votación
$stmt = $pdo->query("SELECT COUNT(*) FROM empleados WHERE es_candidato = true AND vota_a > 0");
$count = $stmt->fetchColumn();

if ($count > 0) {
    // Realizar la lógica para determinar al ganador (puede ser un desempate si es necesario)
    // ... tu lógica aquí ...

    // Actualizar la base de datos para indicar al ganador
    $stmt = $pdo->prepare("UPDATE empleados SET puede_ser_elegido = false WHERE es_candidato = true AND dni = :ganador");
    $stmt->bindParam(':ganador', $ganador);
    $stmt->execute();

    echo 'La votación ha sido cerrada. El nuevo jefe de departamento es: ' . $ganador;
} else {
    echo 'No se puede cerrar la votación sin votos.';
}
?>
