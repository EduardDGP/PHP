<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>FORMULARIO SIMPLE UNSANDO GET</h1>
</body>
<?php
    if (isset($_GET['enviar'])){
        $nombre = $_GET['nombre'];
        $correo = $_GET["correo"];
        ?>
        <p>El nombre del usuario es <?php print $nombre ?>. Su correo corporativo es <?php print $correo ?></p>
    <?php
    }else{
    ?>
    <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="nombre">Nombre:</label>
        <input id="nombre" type="text" name="nombre"><br><br>

        <label for="correo">Correo electrónico: </label>
        <input id="correo" type="text" name="correo"><br>

        <input type="submit" value="Enviar" type="text" name="enviar" >
    </form>
    <?php
    }
?>
</html>