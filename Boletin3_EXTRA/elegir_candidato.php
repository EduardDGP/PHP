<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Elegir Candidato</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h2>Elige a tu candidato</h2>

    <form action="procesar_voto_final.php" method="post">
        <?php
        // Recupera la lista de empleados candidatos
        include 'conexion.php';
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
    
    <div>
        <a href="index.php"><button>Volver al Inicio</button></a>
    </div>
</body>
</html>
