<?php

// Conexión a la base de datos
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "dwes";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Iniciar la transacción
$conn->begin_transaction();                              

try {
    // Actualizar el stock de la tienda 1 restando 1 unidad
    $queryTienda1 = "UPDATE STOCK SET unidades = unidades - 1 WHERE tienda_id = 1 AND producto_codigo = '3DSNG'";
    $conn->query($queryTienda1);

    // Verificar si hay suficientes unidades en la tienda 1 antes de la transferencia
    $verificarStock = "SELECT unidades FROM STOCK WHERE tienda_id = 1 AND producto_codigo = '3DSNG'";
    $result = $conn->query($verificarStock);

    if ($result->num_rows == 0 || $result->fetch_assoc()['unidades'] < 0) {
        throw new Exception("Error: No hay suficientes unidades en la tienda 1 para la transferencia.");
    }

    // Actualizar el stock de la tienda 3 sumando 1 unidad
    $queryTienda3 = "UPDATE STOCK SET unidades = unidades + 1 WHERE tienda_id = 3 AND producto_codigo = '3DSNG'";
    $conn->query($queryTienda3);

    // Confirmar la transacción
    $conn->commit();
    echo "Transferencia completada con éxito.";

} catch (Exception $e) {
    // En caso de error, revertir la transacción
    $conn->rollback();
    echo "Error en la transferencia: " . $e->getMessage();
}

// Cerrar la conexión
$conn->close();

?>
