<?php
    require_once("../MODELO/config.php");
    require_once("../MODELO/bbdd.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=dwes", "user_dwes", "userUSER2");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $cod = $_POST["cod"];
            $nombreCorto = $_POST["nombreCorto"];
            $nombre = $_POST["nombre"];
            $descripcion = $_POST["descripcion"];
            $pvp = $_POST["pvp"];

            //Posteriormente realizo una consulta y la guardo en una variable
            $query = $pdo->prepare("UPDATE PRODUCTO SET NOMBRE_CORTO = ?, NOMBRE = ?, DESCRIPCION = ?, PVP = ? WHERE COD = ?");
            $query->execute([$nombreCorto, $nombre, $descripcion, $pvp, $cod]);

            //Muestra el mensaje tras guardar los cambios
            echo "Producto actualizado correctamente. <br>";
            header("refresh:3;url= listado.php");
            echo "Redireccionando a la página principal...";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Acceso no permitido.";
    }
?>
