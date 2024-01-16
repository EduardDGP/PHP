<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();

        $visi = 0;
        $visi = setcookie("visitas", "1",time() + 86400, "", "",1); 
        echo $visi;
        if(preg_match()){
            $visi + 1;
        }
    ?>
</body>
</html>