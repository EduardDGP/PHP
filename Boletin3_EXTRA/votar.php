<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Votar</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h2>Elige a la persona para votar</h2>

    <form action="procesar_votar.php" method="post">
        <?php
        // Recupera la lista de empleados
        include 'conexion.php';
        
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
