<?php
// Incluye la conexión a la base de datos
require '../MODEL/database.php';

$database = new Database();
$conexion = $database->startUp();

if (isset($_GET['id'])) {
    $idProducto = $_GET['id'];

    // Consultar detalles del producto
    $sql = "SELECT * FROM Producto WHERE idProducto = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([$idProducto]);
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$producto) {
        echo "Producto no encontrado.";
        exit;
    }
} else {
    echo "ID de producto no especificado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($producto['nombreProducto']); ?> - Lenny Online</title>
    <link rel="stylesheet" href="../ASSETS/CSS/DetalleProducto.css"> <!-- Cargar el CSS -->
    <style>
        .miniatura {
            cursor: pointer;
            border: 2px solid transparent; /* Default border */
            transition: border 0.3s ease;
        }

        .miniatura.selected {
            border: 2px solid #007bff; /* Highlight color */
        }
        
        .nav-btn {
            margin: 10px; /* Margin for navigation buttons */
            padding: 5px 10px; /* Padding for buttons */
            background-color: #007bff; /* Button color */
            color: white; /* Button text color */
            border: none; /* Remove border */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor on hover */
        }

        .nav-btn:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }
    </style>
</head>
<body>

    <div class="detalle-producto-contenedor">
        <!-- Columna de la izquierda: Galería de imágenes -->
        <div class="galeria-producto">
            <div class="imagen-principal">
                <img id="imagen-principal" src="../ASSETS/IMG/Productos/<?php echo explode(',', $producto['ImgProducto'])[0]; ?>" alt="<?php echo htmlspecialchars($producto['nombreProducto']); ?>">
            </div>

            <button id="prev-btn" class="nav-btn">Prev</button>
            <button id="next-btn" class="nav-btn">Next</button>

            <div class="miniaturas">
                <?php
                $imagenes = explode(',', $producto['ImgProducto']);
                foreach ($imagenes as $index => $imagen) {
                    echo '<img src="../ASSETS/IMG/Productos/' . htmlspecialchars($imagen) . '" alt="' . htmlspecialchars($producto['nombreProducto']) . '" class="miniatura" data-index="' . $index . '">';
                }
                ?>
            </div>
        </div>

        <!-- Columna de la derecha: Detalles del producto -->
        <div class="detalle-producto-info">
            <h1><?php echo htmlspecialchars($producto['nombreProducto']); ?></h1>
            <p class="precio">$<?php echo number_format($producto['valorUnitarioProducto'], 2); ?></p>

            <div class="opciones-producto">
                <p><strong>Categoría:</strong> <?php echo htmlspecialchars($producto['categoria']); ?></p>
                <p><strong>Estado:</strong> <?php echo htmlspecialchars($producto['estadoProducto']); ?></p>
            </div>

            <div class="caracteristicas">
                <p><?php echo htmlspecialchars($producto['descripcionProducto']); ?></p>
            </div>

            <form action="carrito.php" method="POST">
                <input type="hidden" name="idProducto" value="<?php echo htmlspecialchars($producto['idProducto']); ?>">
                <button type="submit" class="boton-agregar-carrito">Agregar al Carrito</button>
            </form>
        </div>
    </div>

    <!-- Agregamos el script JavaScript aquí -->
    <script>
        const miniaturas = document.querySelectorAll('.miniatura');
        const imagenPrincipal = document.getElementById('imagen-principal');
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');

        let currentIndex = 0; // Inicializa el índice de la imagen actual
        const imagenes = Array.from(miniaturas).map(miniatura => miniatura.src.split('/').pop()); // Array con los nombres de las imágenes

        // Función para actualizar la imagen principal y resaltar la miniatura seleccionada
        function updateImage(index) {
            currentIndex = index; // Actualiza el índice actual
            imagenPrincipal.src = "../ASSETS/IMG/Productos/" + imagenes[index]; // Cambia la imagen principal

            miniaturas.forEach((miniatura, idx) => {
                miniatura.classList.toggle('selected', idx === index); // Resaltar la miniatura seleccionada
            });
        }

        // Event listeners para las miniaturas
        miniaturas.forEach((miniatura, index) => {
            miniatura.addEventListener('mouseover', function() {
                updateImage(index); // Cambia la imagen principal al pasar el mouse
            });

            miniatura.addEventListener('click', function() {
                updateImage(index); // Cambia a la imagen correspondiente al hacer clic
            });
        });

        // Event listeners para los botones de navegación
        prevBtn.addEventListener('click', function() {
            if (currentIndex > 0) {
                updateImage(currentIndex - 1); // Ir a la imagen anterior
            }
        });

        nextBtn.addEventListener('click', function() {
            if (currentIndex < miniaturas.length - 1) {
                updateImage(currentIndex + 1); // Ir a la siguiente imagen
            }
        });

        // Inicializa la primera imagen
        updateImage(0);
    </script>

</body>
</html>
