<?php
session_start();

// Verificar si se ha seleccionado un empleado
if (isset($_POST['elegir_empleado'])) {
    // Almacenar el DNI del empleado en una sesión
    $_SESSION['empleado_dni'] = $_POST['elegir_empleado'];

    // Redirigir a la página para elegir al candidato
    header("Location: elegir_candidato.php");
    exit();
} else {
    echo 'Debes seleccionar a la persona para continuar.';
}
?>
