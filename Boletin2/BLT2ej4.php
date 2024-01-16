<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <h2>Calculadora</h2>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post"> 
        <p>Primer numero<input type="number" name="n1"></p>
        <p>Segundo numero<input type="number" name="n2"></p>
        <p>Operación:
            <select name="operacion">
                <option value="sumar">Sumar</option>
                <option value="restar">Restar</option>
                <option value="multiplicar">Multiplicar</option>
                <option value="dividir">Dividir</option>
            </select>
        </p>
        <input type="submit" value="Calcular">
    </form>
    <?php
        if (isset($_POST['n1']) && isset($_POST['n2']) && isset($_POST['operacion'])){
            $num1 = $_POST['n1'];
            $num2 = $_POST['n2'];
            $operacion = $_POST['operacion'];

            if (is_numeric($num1) && is_numeric($num2)) {
                switch ($operacion) {
                    case 'sumar':
                        $resultado = $num1 + $num2;
                        echo "<p>Resultado: $resultado</p>";
                        break;
                    case 'restar':
                        $resultado = $num1 - $num2;
                        echo "<p>Resultado: $resultado</p>";
                        break;
                    case 'multiplicar':
                        $resultado = $num1 * $num2;
                        echo "<p>Resultado: $resultado</p>";
                        break;
                    case 'dividir':
                        if ($num2 != 0) {
                            $resultado = $num1 / $num2;
                            echo "<p>Resultado: $resultado</p>";
                        } else {
                            echo "<p>Error: No se puede dividir por cero.</p>";
                        }
                        break;
                    default:
                        echo "<p>Error: Operación no válida.</p>";
                        break;
                }
            } else {
                echo "<p>Por favor, ingrese números válidos.</p>";
            }
        } else {
            echo "<p>Por favor, complete todos los campos.</p>";
        }
    ?>
        
        

    </form>
</body>
</html>