<!-- resultados.php -->
<?php
include 'conexion.php';

// Verificar si se envió el formulario para reiniciar la votación
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['resetear_votacion'])) {
    // Actualizar la base de datos para reiniciar los votos
    $stmtReset = $pdo->prepare("UPDATE empleados SET vota_a = NULL WHERE es_candidato = 1");
    $stmtReset->execute();

    echo 'La votación ha sido reiniciada. Puedes comenzar una nueva votación.';

    // Redirigir a la página inicial después de reiniciar la votación
    header("refresh:1;url=index.php");
    exit();
}

// Obtener la información de resultados desde la tabla de empleados
$stmt = $pdo->query("SELECT e.dni AS candidato_dni, e.nombre AS candidato_nombre, e.apellido1 AS candidato_apellido1, e.apellido2 AS candidato_apellido2, COUNT(*) AS votos_recibidos
                     FROM empleados e
                     LEFT JOIN empleados v ON e.dni = v.vota_a
                     WHERE e.vota_a IS NOT NULL
                     GROUP BY e.dni, e.nombre, e.apellido1, e.apellido2");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Resultados de la votación</h2>

    <?php
    // Verificar si hay algún resultado
    if ($stmt->rowCount() > 0) {
    ?>
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
            
            <!-- Formulario para reiniciar la votación -->
            <form action="" method="post">
                <button type="submit" name="resetear_votacion">Reiniciar Votación</button>
            </form>
        </div>
    <?php
    } else {
        echo '<p>No se ha iniciado ninguna votación.</p>';
        echo '<a href="index.php"><button>Volver al Inicio</button></a>';
    }
    ?>
</body>
</html>
