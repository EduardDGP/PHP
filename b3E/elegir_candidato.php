<!-- elegir_candidato.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Elegir Candidato</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
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
    ?>
    
    <div>
        <p>Gracias por tu voto. Tu elección ha sido registrada...</p>
    </div>

    <?php
        // Redirigir al index después de unos segundos
        header("refresh:3;url=index.php");
    } else {
    ?>
        <h2>Elige a tu candidato</h2>

        <form action="elegir_candidato.php" method="post">
            <?php
            // Recupera la lista de empleados candidatos
            $stmt = $pdo->query("SELECT dni, nombre, apellido1, apellido2 FROM empleados WHERE es_candidato = 1");
            
            // Muestra cada candidato en una lista desplegable
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<label>';
                echo '<input type="radio" name="elegir_candidato" value="' . $row['dni'] . '"> ';
                echo $row['nombre'] . ' ' . $row['apellido1'] . ' ' . $row['apellido2'];
                echo '</label><br>';
            }
            ?>

            <button type="submit">Votar</button>
        </form>
    <?php
    }
    ?>
</body>
</html>
