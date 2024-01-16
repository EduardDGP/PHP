<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" name="" action="">
        <input type="text" name="Medida">
        <select name="unidad1">
            <option value="Pulgadas"></option>
            <option value="Pie"></option>
            <option value="Yardas"></option>
            <option value="Millas"></option>
        </select>
    </form>
    <?php
    $medida=$_POST("Medida");
    $unida1=$_POST("unidad1");

    function cm($canti){
        $canti = $canti * 2.54;
        return $canti;
    }
    
    function m($canti){
        $canti = $canti / 100;
        return $canti;
    }
    
    function km($canti){
        $canti = $canti / 100000;
        return $canti;
    }
    ?>
</body>
</html>