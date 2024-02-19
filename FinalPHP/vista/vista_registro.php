<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Restaurante</title>
</head>
<body>
    <h1>Registro</h1>
    <form action="registro.php" method="post">
        <label for="correo">Correo electrónico:</label><br>
        <input type="email" id="correo" name="correo" required><br>
        <label for="contraseña">Contraseña:</label><br>
        <input type="password" id="contraseña" name="contraseña" required><br>
        <button type="submit" name="registrar">Registrarse</button>
    </form>
    <p>¿Ya tienes una cuenta? <a href="inicioSesion.php">Inicia sesión aquí</a></p>
</body>
</html>
