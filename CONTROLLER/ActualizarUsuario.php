<?php
// Incluir el archivo de conexión a la base de datos
require '../MODEL/database.php';

$database = new Database();
$conn = $database->startUp();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener datos del formulario
    $idUsuario = $_POST['idUsuario'];
    $nombreUsuario = $_POST['nombreUsuario'];
    $apellidosUsuario = $_POST['apellidosUsuario'];
    $correoUsuario = $_POST['correoUsuario'];
    $direccionUsuario = $_POST['direccionUsuario'];
    $telefonoUsuario = $_POST['telefonoUsuario'];
    $claveUsuario = $_POST['claveUsuario'];

    // Manejo de la foto
    if (isset($_FILES['fotoUsuario']) && $_FILES['fotoUsuario']['error'] == UPLOAD_ERR_OK) {
        $fotoUsuario = file_get_contents($_FILES['fotoUsuario']['tmp_name']);
    } else {
        $fotoUsuario = null; // O puedes obtener la foto actual de la base de datos y usarla
    }

    // Consulta de actualización
    $sql = "UPDATE Usuario SET
                nombreUsuario = :nombreUsuario,
                apellidosUsuario = :apellidosUsuario,
                correoUsuario = :correoUsuario,
                direccionUsuario = :direccionUsuario,
                telefonoUsuario = :telefonoUsuario,
                claveUsuario = :claveUsuario" .
                ($fotoUsuario ? ", fotoUsuario = :fotoUsuario" : "") .
            " WHERE idUsuario = :idUsuario";

    $stmt = $conn->prepare($sql);

    // Vincular parámetros
    $stmt->bindParam(':nombreUsuario', $nombreUsuario);
    $stmt->bindParam(':apellidosUsuario', $apellidosUsuario);
    $stmt->bindParam(':correoUsuario', $correoUsuario);
    $stmt->bindParam(':direccionUsuario', $direccionUsuario);
    $stmt->bindParam(':telefonoUsuario', $telefonoUsuario);
    $stmt->bindParam(':claveUsuario', $claveUsuario);
    $stmt->bindParam(':idUsuario', $idUsuario);

    if ($fotoUsuario) {
        $stmt->bindParam(':fotoUsuario', $fotoUsuario, PDO::PARAM_LOB);
    }

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "<script>
                alert('Perfil actualizado exitosamente.');
                window.location.href = '../VIEW/Login.php'; // Redirigir a login
              </script>";
    } else {
        echo "<script>alert('Error al actualizar el perfil.');</script>";
    }
}
$database->desconectar();
?>
