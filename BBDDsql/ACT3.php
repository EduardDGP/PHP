<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda STOCK</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "user_dwes";
    $password = "userUSER2";
    $dbname = "dwes";

    // Conectividad de DB
    $dbCon = new mysqli($servername, $username, $password, $dbname);

    // Comprobación de datos y mostrarlos posteriormente en el formulario
    if ($dbCon->connect_error) {
        die("Conexión fallida: " . $dbCon->connect_error);
    }

    // Si se ha seleccionado un producto
    if(isset($_POST['Producto'])) {
        $productoSeleccionado = $_POST['Producto'];
        $sqlCodigo = "SELECT cod FROM producto WHERE nombre_corto = '$productoSeleccionado'";
        $resultCodigo = $dbCon->query($sqlCodigo);
        if ($resultCodigo->num_rows > 0) {
            $rowCodigo = $resultCodigo->fetch_assoc();
            $codigoProducto = $rowCodigo["cod"];
        }


        // Consulta para obtener la información de stock
        $sqlStock = 
        "SELECT t.NOMBRE AS nombre_tienda, SUM(s.UNIDADES) AS total_unidades
        FROM producto p
        JOIN stock s ON p.COD = s.PRODUCTO
        JOIN tienda t ON s.TIENDA = t.COD
        GROUP BY t.NOMBRE";        
        $resultStock = $dbCon->query($sqlStock);

        // Mostrar resultados en la tabla
        echo "<table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Tienda</th>
                        <th>Unidades</th>
                    </tr>
                </thead>
                <tbody>";

        if ($resultStock->num_rows > 0) {
            while($rowStock = $resultStock->fetch_assoc()) {
                echo "<tr>
                        <td>" . $productoSeleccionado . "</td>
                        <td>" . $rowStock["nombre_tienda"] . "</td>
                        <td>" . $rowStock["total_unidades"] . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No hay unidades disponibles en stock para este producto.</td></tr>";
        }

        echo "</tbody></table>";
    }

    // Mostrar formulario de selección de productos
    echo "<form method='post' action='" . $_SERVER['PHP_SELF'] . "'>";
    echo "Productos: <select name='Producto' id=''>";
    echo "<option value=''></option>";

    // Consulta para obtener productos
    $sql = "SELECT nombre_corto FROM PRODUCTO";
    $result = $dbCon->query($sql);

    // Mostrar resultados
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["nombre_corto"] . "'>" . $row["nombre_corto"] . "</option>";
        }
    } else {
        echo "<option value=''>No hay productos disponibles</option>";
    }

    echo "</select>";
    echo "<input type='submit' value='Seleccionar'>";
    echo "</form>";

    // Cerrar conexión
    $dbCon->close();
    ?>
</body>
</html>
