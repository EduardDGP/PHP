<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Multiplicar</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
        <p>Ingresa un numero: <input type="number" name="numero" placeholder="Numero"/></p>
        <p><input type="submit" /></p>
    </form>
    <?php
        if (isset($_GET['numero'])){
            $num = $_GET['numero'];
            echo $num;
            if(is_numeric($num)){
    ?>
            <p>Tabla de multiplicar del <?php echo $num; ?></p>
    
            <table>
    <?php  
            for ($i = 1; $i <= 10; $i++) {
                $resultado = $num * $i;
    ?>
                <tr><td><?php print($num." x ".$i." = ".$resultado);?></td></tr>
    <?php
            }
    ?>
            </table>
    <?php
            }else{
                ?>
                <p>No es un numero</p>
                <?php
            }
        } else {
    ?>
            <p>Por favor, ingrese un numero</p>
    <?php
        }
    ?>
</body>
</html>
