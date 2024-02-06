<?php
include 'conexion.php';

// Obtener la información de resultados desde la tabla de empleados
$stmt = $pdo->query("SELECT e.dni AS candidato_dni, e.nombre AS candidato_nombre, e.apellido1 AS candidato_apellido1, e.apellido2 AS candidato_apellido2, COUNT(*) AS votos_recibidos
                     FROM empleados e
                     LEFT JOIN empleados v ON e.dni = v.vota_a
                     WHERE e.es_candidato = 1
                     GROUP BY e.dni, e.nombre, e.apellido1, e.apellido2");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h2>Resultados de la votación</h2>

    <table border="1">
        <tr>
            <th>Candidato</th>
            <th>Votos Recibidos</th>
        </tr>

        <?php
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row['candidato_nombre'] . ' ' . $row['candidato_apellido1'] . ' ' . $row['candidato_apellido2'] . '</td>';
            echo '<td>' . $row['votos_recibidos'] . '</td>';
            echo '</tr>';
        }
        ?>
    </table>
    
    <div>
        <a href="index.php"><button>Volver al Inicio</button></a>
    </div>
</body>
</html>
