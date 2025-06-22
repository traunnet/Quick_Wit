<?php
session_start();
include '../MODEL/bd.php'; // Incluye la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipoDocUsuario = $_POST['tipoDocUsuario'];
    $numDocUsuario = $_POST['numDocUsuario'];
    $nombreUsuario = $_POST['nombreUsuario'];
    $apellidosUsuario = $_POST['apellidosUsuario'];
    $direccionUsuario = $_POST['direccionUsuario'];
    $telefonoUsuario = $_POST['telefonoUsuario'];
    $correoUsuario = $_POST['correoUsuario'];
    $claveUsuario = $_POST['claveUsuario'];
    
    // Asignar valores automáticamente
    $estadoUsuario = "Activo"; // Valor fijo para el estado
    $idRol = 2; // Valor fijo para el rol

    // Manejo del archivo de foto
    $fotoUsuario = addslashes(file_get_contents($_FILES['fotoUsuario']['tmp_name']));

    $sql = "INSERT INTO Usuario (tipoDocUsuario, numDocUsuario, nombreUsuario, apellidosUsuario, direccionUsuario, telefonoUsuario, correoUsuario, claveUsuario, fotoUsuario, estadoUsuario, idRol)
            VALUES ('$tipoDocUsuario', '$numDocUsuario', '$nombreUsuario', '$apellidosUsuario', '$direccionUsuario', '$telefonoUsuario', '$correoUsuario', '$claveUsuario', '$fotoUsuario', '$estadoUsuario', '$idRol')";

    if (mysqli_query($mysqli, $sql)) {
        echo "Usuario registrado exitosamente";
        // Redirigir al usuario a una página de éxito o al login
        header("Location: ../VIEW/Login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
