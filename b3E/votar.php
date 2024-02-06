<!-- votar.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Votar</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Elige a la persona para votar</h2>

    <?php
    session_start();

    // Verificar si se ha seleccionado un empleado
    if (isset($_POST['elegir_empleado'])) {
        // Almacenar el DNI del empleado en una sesión
        $_SESSION['empleado_dni'] = $_POST['elegir_empleado'];

        // Redirigir a la página para elegir al candidato
        header("Location: elegir_candidato.php");
        exit();
    }

    // Código de procesar_votar.php
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

    <form action="votar.php" method="post">
        <?php
        // Recupera la lista de empleados
        $stmt = $pdo->query("SELECT dni, nombre, apellido1, apellido2 FROM empleados");

        // Muestra cada empleado en una lista desplegable
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<label>';
            echo '<input type="radio" name="elegir_empleado" value="' . $row['dni'] . '"> ';
            echo $row['nombre'] . ' ' . $row['apellido1'] . ' ' . $row['apellido2'];
            echo '</label><br>';
        }
        ?>

        <button type="submit">Continuar</button>
    </form>
    
    <div>
        <a href="index.php"><button>Volver al Inicio</button></a>
    </div>
</body>
</html>
