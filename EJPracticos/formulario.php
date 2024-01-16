<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Medida: <input type="text" name="medida">
  <select name="unidad1">
    <option value="pulgada">Pulgada</option>
    <option value="pie">Pie</option>
    <option value="yardas">Yardas</option>
    <option value="millas">Millas</option>
  </select>
  <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $medida = $_POST['medida'];
  $unidad1 = $_POST['unidad1'];

  switch ($unidad1) {
    case 'pulgada':
      $centimetros = $medida * 2.54;
      $decimetros = $centimetros / 10;
      $metros = $centimetros / 100;
      $kilometros = $metros / 1000;
      echo "Centímetros: " . $centimetros . "<br>";
      echo "Decímetros: " . $decimetros . "<br>";
      echo "Metros: " . $metros . "<br>";
      echo "Kilómetros: " . $kilometros . "<br>";
      break;
    case 'pie':
      $pulgada = $medida * 12;
      $centimetros = $pulgada * 2.54;
      $decimetros = $centimetros / 10;
      $metros = $centimetros / 100;
      $kilometros = $metros / 1000;
      echo "Pulgadas: " . $pulgada . "<br>";
      echo "Centímetros: " . $centimetros . "<br>";
      echo "Decímetros: " . $decimetros . "<br>";
      echo "Metros: " . $metros . "<br>";
      echo "Kilómetros: " . $kilometros . "<br>";
      break;
    case 'yardas':
      $pies = $medida * 3;
      $pulgada = $pies * 12;
      $centimetros = $pulgada * 2.54;
      $decimetros = $centimetros / 10;
      $metros = $centimetros / 100;
      $kilometros = $metros / 1000;
      echo "Pulgadas: " . $pulgada . "<br>";
      echo "Centímetros: " . $centimetros . "<br>";
      echo "Decímetros: " . $decimetros . "<br>";
      echo "Metros: " . $metros . "<br>";
      echo "Kilómetros: " . $kilometros . "<br>";
      break;
    case 'millas':
      $yardas = $medida * 1760;
      $pies = $yardas * 3;
      $pulgada = $pies * 12;
      $centimetros = $pulgada * 2.54;
      $decimetros = $centimetros / 10;
      $metros = $centimetros / 100;
      $kilometros = $metros / 1000;
      echo "Pulgadas: " . $pulgada . "<br>";
      echo "Centímetros: " . $centimetros . "<br>";
      echo "Decímetros: " . $decimetros . "<br>";
      echo "Metros: " . $metros . "<br>";
      echo "Kilómetros: " . $kilometros . "<br>";
      break;
    default:
      echo "Por favor, seleccione una unidad de medida.";
  }
}
?>

</body>
</html>
