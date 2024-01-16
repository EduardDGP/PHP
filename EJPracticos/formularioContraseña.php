<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    GLOBAL $usConj;
    $usConj = array("edu" => 345, "manolo" => 575);

    $nombreIntro = $_POST["Nombre"];
    $nombreIntro = strtolower($nombreIntro); 

    $contraseniaIntro = $_POST["Contrasenia"];
    $contraseniaIntro = strtolower($contraseniaIntro); 

    foreach ($usConj as $nombre => $contrasenia) {
        if ($nombre === $nombreIntro || $contrasenia === $contraseniaIntro) {
            echo "Inicio de sesión exitoso para el usuario: " . $nombre;
        } else {
            echo "Nombre de usuario o contraseña incorrectos";
        }
    }
?>
</body>
</html>