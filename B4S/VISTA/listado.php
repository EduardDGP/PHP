<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Productos</title>
    <link rel="stylesheet" href="LAYOUT/listado.css"> 
</head>
<body>
    <div class="container">
        <h1>Listado de Productos por Familia</h1>

        <form action="../CONTROLADOR/controlador_listado.php" method="post">
            <label for="familia">Selecciona una familia:</label>
            <select name="familia" id="familia">
                <?php
                    // Cargar las opciones del desplegable con las familias
                    require_once '../MODELO/modelo_listado.php';
                    $familias = obtenerFamilias();
                    
                    foreach ($familias as $familia) {
                        echo "<option value='" . $familia['COD'] . "'>" . $familia['NOMBRE'] . "</option>";
                    }
                ?>
            </select>
            <button type="submit">Mostrar</button>
        </form>

        <?php
            // Incluir el controlador para mostrar los productos
            require_once '../CONTROLADOR/controlador_listado.php';
        ?>
    </div>
</body>
</html>
