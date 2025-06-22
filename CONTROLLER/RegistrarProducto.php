<?php
require '../MODEL/database.php'; // Asegúrate de incluir el archivo de conexión

$database = new Database();
$conexion = $database->startUp(); // Obtener la conexión

if (!$conexion) {
    die("Error: No se pudo establecer la conexión a la base de datos.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreProducto = $_POST['nombreProducto'];
    $descripcionProducto = $_POST['descripcionProducto'];
    $valorUnitarioProducto = $_POST['valorUnitarioProducto'];
    $estadoProducto = $_POST['estadoProducto'];
    $categoria = $_POST['categoria'];

    // Manejo de imágenes
    $imagenes = $_FILES['imgProducto'];
    $errores = [];

    // Ruta donde se guardarán las imágenes
    $rutaDestino = '../ASSETS/IMG/Productos/';
    
    // Asegúrate de que el directorio exista
    if (!is_dir($rutaDestino)) {
        mkdir($rutaDestino, 0777, true);
    }

    $nombresArchivos = []; // Array para almacenar los nombres de los archivos

    foreach ($imagenes['tmp_name'] as $key => $tmp_name) {
        $nombreArchivo = $imagenes['name'][$key];
        $rutaArchivo = $rutaDestino . basename($nombreArchivo);
        
        if (move_uploaded_file($tmp_name, $rutaArchivo)) {
            $nombresArchivos[] = $nombreArchivo; // Agregar el nombre del archivo al array
        } else {
            $errores[] = "Error al subir la imagen " . $nombreArchivo;
        }
    }

    // Convertir el array de nombres de archivo a una cadena separada por comas
    $imagenesGuardadas = implode(',', $nombresArchivos);

    // Insertar en la base de datos
    if (empty($errores)) {
        $sql = "INSERT INTO Producto (ImgProducto, nombreProducto, descripcionProducto, valorUnitarioProducto, estadoProducto, categoria) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$imagenesGuardadas, $nombreProducto, $descripcionProducto, $valorUnitarioProducto, $estadoProducto, $categoria]);
        echo "<script>alert('Producto registrado exitosamente.'); window.location.href='../VIEW/LennyOnline.php';</script>";
    } else {
        echo "<script>alert('". implode("\\n", $errores) ."');</script>";
    }
}
?>
