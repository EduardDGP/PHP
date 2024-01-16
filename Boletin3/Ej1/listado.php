<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos por Familia</title>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "tu_usuario";
    $password = "tu_contraseña";
    $dbname = "tu_base_de_datos";

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consulta para obtener las familias
        $sqlFamilias = "SELECT id, nombre FROM familias";
        $resultFamilias = $pdo->query($sqlFamilias);

        echo "<h2>Seleccione una familia:</h2>";
        echo "<form method='post' action='listado.php'>";
        echo "<label for='familia'>Familia:</label>";
        echo "<select name='familia' id='familia'>";

        if ($resultFamilias->rowCount() > 0) {
            foreach ($resultFamilias as $rowFamilia) {
                echo "<option value='" . $rowFamilia["id"] . "'>" . $rowFamilia["nombre"] . "</option>";
            }
        } else {
            echo "<option value=''>No hay familias disponibles</option>";
        }

        echo "</select>";
        echo "<input type='submit' name='mostrarProductos' value='Mostrar'>";
        echo "</form>";

        if(isset($_POST['mostrarProductos'])) {
            $familiaSeleccionada = $_POST['familia'];

            // Consulta para obtener los productos de la familia seleccionada
            $sqlProductos = "SELECT id, nombre_corto, pvp FROM productos WHERE id_familia = ?";
            $stmtProductos = $pdo->prepare($sqlProductos);
            $stmtProductos->execute([$familiaSeleccionada]);

            if ($stmtProductos->rowCount() > 0) {
                echo "<h2>Listado de Productos:</h2>";
                echo "<ul>";
                foreach ($stmtProductos as $rowProducto) {
                    echo "<li>" . $rowProducto["nombre_corto"] . " - PVP: " . $rowProducto["pvp"] . " ";
                    echo "<form method='post' action='editar.php' style='display:inline;'>";
                    echo "<input type='hidden' name='idProducto' value='" . $rowProducto["id"] . "'>";
                    echo "<input type='submit' name='editar' value='Editar'>";
                    echo "</form></li>";
                }
                echo "</ul>";
            } else {
                echo "No hay productos disponibles para la familia seleccionada.";
            }
        }
    } catch (PDOException $e) {
        die("Error en la conexión a la base de datos: " . $e->getMessage());
    }

    // Cerrar conexión
    $pdo = null;
    ?>
</body>
</html>
