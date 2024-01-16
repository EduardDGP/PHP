<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
global $name = $lastname = $address = $city = $gender = $terms = "";
$accepted = false;

$name = $_POST["name"];
$lastname = $_POST["lastname"];
$address = $_POST["address"];
$city = $_POST["city"];
$gender = $_POST["gender"];
if (isset($_POST['terms'])) {
    $terms = $_POST["terms"];
    $accepted = true;
}

if ($name == null || $lastname == null || $address == null || $city ==null || $gender == null){
    echo "Debes de rellenar el formulario completo";
}else if ($accepted) {
    echo "Formulario enviado correctamente.";
} else {
    echo "Debes aceptar los términos y condiciones para enviar el formulario.";
}

?>
</body>
</html>