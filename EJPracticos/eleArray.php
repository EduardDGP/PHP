<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function contarRepeticiones($array, $numero){
            $contador = 0;
            foreach($array as $elemento){
                if($elemento == $numero){
                    $contador++;
                }
            }
            return $contador;
        }
        
        $miArray = array(1, 2, 3, 4, 5, 2, 1, 2, 6, 2);
        $numeroABuscar = ;
        $repeticiones = contarRepeticiones($miArray, $numeroABuscar);
        
        echo "$numeroABuscar se ha repetido $repeticiones veces";
    ?>
</body>
</html>