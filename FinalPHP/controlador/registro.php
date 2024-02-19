<?php
include '../modelo/bbdd.php';
include '../vista/vista_registro.php';

if(isset($_POST['registrar'])) {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    // Conectar a la base de datos
    $conexion = conectarBD();

    // Preparar la consulta SQL para insertar un nuevo usuario
    $consulta = $conexion->prepare("INSERT INTO Clientes (correo, contrasena) VALUES (?, ?)");
    $consulta->bind_param("ss", $correo, $contraseña);

    // Ejecutar la consulta
    if($consulta->execute()) {
        echo "¡Registro exitoso!";
        
        header('refresh:3s; url= registro.php');
        
    } else {
        echo "Error al registrar el usuario: " . $conexion->error;
    }

    // Cerrar la conexión
    $conexion->close();
}

?>
