<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de edad</title>
</head>
<body>
    <h1>Solicitud de Edad</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <p>Ingresa un número: <input type="number" name="edad" placeholder="Edad"/></p>
        <input type="submit" value="Enviar">
    </form>
    <?php
        if(isset($_POST['edad'])){
            $edad = $_POST['edad'];
            //Compruebo y controlo la edad del usuario
            if ($edad < 18 && $edad > 0){
                echo "Eres menor de edad";
            } else if ($edad >= 18) {
                echo "Eres mayor de edad";
            } else {
                echo "Por favor, ingresa un número válido.";
            }
        }
    ?>
</body>
</html>
