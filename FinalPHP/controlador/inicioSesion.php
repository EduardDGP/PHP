<?php
include "../vista/inicio_noLogin.php";

include '../modelo/bbdd.php';

session_start();

if(isset($_POST['iniciar_sesion'])) {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    // Conectar a la base de datos
    $conexion = conectarBD();

    // Preparar la consulta SQL para verificar las credenciales del usuario
    $consulta = $conexion->prepare("SELECT correo FROM Clientes WHERE correo = ? AND contrasena = ?");
    $consulta->bind_param("ss", $correo, $contraseña);

    // Ejecutar la consulta
    $consulta->execute();
    $resultado = $consulta->get_result();

    // Verificar si se encontraron resultados
    if($resultado->num_rows == 1) {
        // Iniciar sesión
        $_SESSION['correo'] = $correo;
        header('refresh:3s; Location: inicio_login.php'); // Redirigir a la página restringida
        exit();
    } else {
        echo "Credenciales incorrectas";
    }

    // Cerrar la conexión
    $conexion->close();
}
?>