<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $frase = "Esto es una cadena";
        $palabras = explode(" ", $frase);
        sort($palabras, SORT_STRING | SORT_FLAG_CASE);
        $frase_ordenada = implode(" ", $palabras);
        
        echo $frase_ordenada;
    ?>
</body>
</html>