<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CadenaPrincioFinal</title>
</head>
<body>
    
    <?php
        
        $cadena = "Buenos dias.";
        $pl = substr($cadena,0,1);
        $ul = substr($cadena,strlen($cadena)-2, 1);

        echo "<strong>".$pl." ".$ul."</strong>";
    ?>
</body>
</html>