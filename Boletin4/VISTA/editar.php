<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="LAYOUT/editar.css">
</head>
<body>
    <?php if (isset($producto)): ?>
        <h1>Editar Producto: <?php echo $producto['NOMBRE_CORTO']; ?></h1>
        <form action="actualizar.php" method="post">
            <input type="hidden" name="cod" value="<?php echo $_GET['cod']; ?>">
            <label for="nombreCorto">Nombre Corto:</label>
            <input type="text" name="nombreCorto" value="<?php echo $producto['NOMBRE_CORTO']; ?>" required><br>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $producto['NOMBRE']; ?>"><br>
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion"><?php echo $producto['DESCRIPCION']; ?></textarea><br>
            <label for="pvp">PVP:</label>
            <input type="text" name="pvp" value="<?php echo $producto['PVP']; ?>" required><br>
            <button type="submit">Actualizar</button>
            <button type="button" onclick="window.location='listado.php'">Cancelar</button>
        </form>
    <?php else: ?>
        <p>El producto no se ha encontrado.</p>
    <?php endif; ?>
</body>
</html>
