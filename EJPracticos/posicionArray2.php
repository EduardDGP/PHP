<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $v array (1,2,3,4,5);
    unset ($v[3]);

    $v=array_fill(0,7,90);
    var_dump($v);
    ?>
</body>
</html>