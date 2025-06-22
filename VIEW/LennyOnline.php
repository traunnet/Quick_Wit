<?php
require '../MODEL/database.php'; // Incluye la conexión a la base de datos

$database = new Database();
$conexion = $database->startUp();

if (!$conexion) {
    die("Error: No se pudo establecer la conexión a la base de datos.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lenny Online</title>
    <link rel="stylesheet" href="../ASSETS/CSS/LennyOnline.css">
    <link rel="shortcut icon" href="../ASSETS/IMG/Personal/LgWW.png">
</head>
<body>
    <header>
        <div class="encabezado-logo">
            <img src="../ASSETS/IMG/Personal/LennyOnline.png" alt="Logo Lenny Online" class="logo-img">
        </div>
        <nav>
            <ul class="menu-navegacion">
                <li><a href="../Index.php">Inicio</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <div class="contenedor-parallax">
        <div class="fondo-parallax" id="inicio">
            <h1>BIENVENIDO A VARIEDADES LENNNY ONLINE</h1>
        </div>
    </div>

    <section class="seccion-hero">
        <h1>Amplia gama de productos al alcance de sus manos</h1>
        <p>Descubre productos innovadores y servicios excepcionales, con calidad superior y precios irresistibles</p>
    </section>

    <section class="seccion-productos">
        <h2>Nuestros Productos</h2>

        <div class="grid-productos">
            <?php
            // Consultar productos
            $sql = "SELECT * FROM Producto";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if ($resultado) {
                foreach ($resultado as $row) {
                    // Obtener la primera imagen de la cadena separada por comas
                    $imagenes = explode(',', $row['ImgProducto']);
                    $primeraImagen = $imagenes[0];
            
                    echo '<div class="producto">';
                    echo '<a href="DetalleProducto.php?id=' . $row['idProducto'] . '" style="display: block; text-decoration: none; color: inherit;">';
                    echo '<img src="../ASSETS/IMG/Productos/' . $primeraImagen . '" alt="' . $row['nombreProducto'] . '">';
                    echo '<div class="texto-producto">';
                    echo '<h3>' . $row['nombreProducto'] . '</h3>';
                    echo '<p class="precio-producto">$' . number_format($row['valorUnitarioProducto'], 2) . '</p>';
                    echo '<a href="#" class="boton-agregar-carrito" data-id="' . $row['idProducto'] . '">Agregar Al Carrito</a>';
                    echo '</div>';
                    echo '</a>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </section>

    <footer>
        <p>Derechos de Autor Quick Wit &copy; 2024. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
