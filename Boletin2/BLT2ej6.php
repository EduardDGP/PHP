<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" method="post">
        <label for="imagen">Selecciona una imagen:</label>
        <input type="file" name="imagen" accept="image/*">
        <br>
        <input type="submit" value="Cargar Imagen">
    </form>
    
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0) {
                //Guardamos la imagen temporal en directorio final
                $imagenNombre = $_FILES["imagen"]["name"];

                $imgtemporal = $_FILES["imagen"]["tmp_name"];
                $carpetaDestino = "./img/";
                $rutaCompleta = $carpetaDestino . $imagenNombre;
                //Ruta final en donde la guardo
                //Mueve el archivo de forma lo guarda en la carpeta final
                move_uploaded_file($imgtemporal, $rutaCompleta);
                
                //Quitaremos la extension de la imagen
                $postPunto = strrpos($imagenNombre, '.');
                if ($postPunto !== false){
                    $imagenNombre = substr($imagenNombre, 0, $postPunto);
                }

                // Cargar la imagen
                ?>
                <img src='<?php echo $rutaCompleta ?>' alt='Imagen Cargada'>
                <?php
            } else {
                ?><p>Error: No se ha seleccionado ninguna imagen.</p><?php
            }
        }else{
            ?><p>Error: Método de solicitud no válido.</p><?php
        }
    ?>
</body>
</html>