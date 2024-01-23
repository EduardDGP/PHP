<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Productos</title>
    <link rel="stylesheet" href="css/listado.css"> 
</head>
<body>
    <div class="container">
        <h1>Listado de Productos por Familia</h1>

        <form action="listado.php" method="post">
            <label for="familia">Selecciona una familia:</label>
            <select name="familia" id="familia">
                <?php
                    // Cargar las opciones del desplegable con las familias
                    try {
                        // Establecer la conexión PDO
                        $pdo = new PDO("mysql:host=localhost;dbname=dwes", "user_dwes", "userUSER2");
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // Consulta para obtener las familias
                        $query = $pdo->query("SELECT COD, NOMBRE FROM FAMILIA");

                        // Mostrar opciones del desplegable
                        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='" . $row['COD'] . "'>" . $row['NOMBRE'] . "</option>";
                        }
                    } catch (PDOException $e) {
                        echo "Error en la conexión: " . $e->getMessage();
                    }
                ?>
            </select>
            <button type="submit">Mostrar</button>
        </form>

        <?php
            // Verificar si se ha enviado el formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Mostrar el listado de productos de la familia seleccionada
                $selectedFamilia = $_POST["familia"];

                try {
                    // Preparar y ejecutar la consulta para obtener productos
                    $query = $pdo->prepare("SELECT COD, NOMBRE_CORTO, PVP FROM PRODUCTO WHERE FAMILIA = ?");
                    $query->execute([$selectedFamilia]);

                    // Bandera para verificar si hay productos
                    $productosExistentes = false;

                    // Encabezado para los productos de la familia seleccionada
                    echo "<h2>Productos de la familia seleccionada:</h2>";
                    echo "<ul>";

                    // Mostrar productos
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                        echo "<li>{$row['NOMBRE_CORTO']} - PVP: {$row['PVP']} <a href='editar.php?cod={$row['COD']}'>Editar</a></li>";
                        $productosExistentes = true;
                    }

                    echo "</ul>";

                    // Mostrar mensaje si no hay productos
                    if (!$productosExistentes) {
                        echo "<p>No hay productos en stock para la familia seleccionada.</p>";
                    }

                } catch (PDOException $e) {
                    echo "Error en la consulta: " . $e->getMessage();
                }
            }
        ?>
    </div>
</body>
</html>
