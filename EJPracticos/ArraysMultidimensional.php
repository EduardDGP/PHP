<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body
    <?php
    $contactos=array("Juan"=>array("Tlfn"=>"62252523","Email"=>"grkgs@gamil.com"),"Maria"=>array("Tlfn"=>"62252523","Email"=>"grkgs@gamil.com")
    ,"Elena"=>array("Tlfn"=>"62252523","Email"=>"grkgs@gamil.com"));
    foreach($contactos as $clave1=>$contactos){
        echo "<br/><strong>Nombre contacto: $clave1: </strong><br/>";
        foreach($contactos as $clave2=>$valor){
            echo " <strong>$clave2: </strong>$valor";
        }
    }
    ?>
</body>
</html>