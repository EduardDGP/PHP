<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="css/editar.css">
</head>
<body>
    <?php
        // Incluir la conexión a la base de datos
        try {
            // Establecer la conexión PDO
            $pdo = new PDO("mysql:host=localhost;dbname=dwes", "user_dwes", "userUSER2");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Mostrar mensaje de error en caso de fallo en la conexión
            echo "Error en la conexión: " . $e->getMessage();
            die();
        }

        // Verificar si se proporciona el código del producto
        if (isset($_GET["cod"])) {
            $selectedCod = $_GET["cod"];

            try {
                // Consultar los detalles del producto por su código
                $query = $pdo->prepare("SELECT NOMBRE_CORTO, NOMBRE, DESCRIPCION, PVP FROM PRODUCTO WHERE COD = ?");
                $query->execute([$selectedCod]);

                // Verificar si se encontró el producto
                if ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    // Mostrar el formulario de edición
                    echo "<h1>Editar Producto: {$row['NOMBRE_CORTO']}</h1>";

                    echo "<form action='actualizar.php' method='post'>";
                    echo "<input type='hidden' name='cod' value='$selectedCod'>";
                    echo "<label for='nombreCorto'>Nombre Corto:</label>";
                    echo "<input type='text' name='nombreCorto' value='{$row['NOMBRE_CORTO']}' required><br>";
                    echo "<label for='nombre'>Nombre:</label>";
                    echo "<input type='text' name='nombre' value='{$row['NOMBRE']}'><br>";
                    echo "<label for='descripcion'>Descripción:</label>";
                    echo "<textarea name='descripcion'>{$row['DESCRIPCION']}</textarea><br>";
                    echo "<label for='pvp'>PVP:</label>";
                    echo "<input type='text' name='pvp' value='{$row['PVP']}' required><br>";
                    echo "<button type='submit'>Actualizar</button>";
                    echo "<button type='button' onclick='window.location=\"listado.php\"'>Cancelar</button>";
                    echo "</form>";
                } else {
                    // Mostrar mensaje si el producto no se encuentra
                    echo "Producto no encontrado.";
                }
            } catch (PDOException $e) {
                // Mostrar mensaje de error en caso de fallo en la consulta
                echo "Error: " . $e->getMessage();
            }
        } else {
            // Mostrar mensaje si no se proporciona el código del producto
            echo "Código de producto no proporcionado.";
        }
    ?>
</body>
</html>
