<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=ç, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo "Fecha actual: ";
    echo date ("d-m-Y")."<br/>";
    // generamos una fecha nueva con mktime
    $fecha=mktime(10,15,35,10,5,2019);
    $dia=date("1, d-m-Y", $fecha);
    $hora=date("H:i:s",$fecha);
    echo "Fecha generada con mktime: $dia $hora <br/>";
    ?>
</body>
</html>