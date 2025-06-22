<?php
session_start();

// Verificar si los datos fueron enviados desde el formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['nombreUsuario'] = $_POST['nombreUsuario'];
    $_SESSION['correoUsuario'] = $_POST['correoUsuario'];
    $_SESSION['claveUsuario'] = $_POST['claveUsuario'];

    // Redirigir al formulario de registro completo
    header("Location: ../VIEW/FormularioRegistro.php");
    exit();
}
?>
