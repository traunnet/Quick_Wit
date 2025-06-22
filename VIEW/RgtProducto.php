<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Producto</title>
    <link rel="stylesheet" href="../ASSETS/CSS/RegistroProductos.css">
</head>
<body>
    <!-- Encabezado -->
    <header>
        <div>
            <img src="../ASSETS/IMG/Personal/EmpresaLenny.png" id="logo" alt="Logo de la empresa">
        </div>
    </header>

    <!-- Contenedor principal -->
    <div class="contenedor">
        <h1>Subir Información del Producto</h1>
        
        <div class="tarjeta">
            <form action="../CONTROLLER/RegistrarProducto.php" method="POST" enctype="multipart/form-data">
                <div>
                    <div>
                        <label>Imágenes del Producto:</label>
                        <input type="file" name="imgProducto[]" accept="image/*" required multiple onchange="previewImages(event)">
                    </div>
                    <div class="preview-images" id="previewImages"></div>
                    
                    <div>
                        <label>Nombre del Producto:</label>
                        <input type="text" name="nombreProducto" required>
                    </div>
                    <div>
                        <label>Descripción del Producto:</label>
                        <input type="text" name="descripcionProducto" required>
                    </div>
                    <div>
                        <label>Valor Unitario:</label>
                        <input type="number" name="valorUnitarioProducto" step="0.01" required>
                    </div>
                    <div>
                        <label>Estado del Producto:</label>
                        <select name="estadoProducto" id="estadoProducto" required>
                            <option value="nuevo">Nuevo</option>
                            <option value="usado">Usado</option>
                            <option value="renovado">Renovado</option>
                        </select>
                    </div>
                    <div>
                        <label>Categoría:</label>
                        <select name="categoria" required>
                            <option value="Tecnología y Electrónica">Tecnología y Electrónica</option>
                            <option value="Hogar y Decoración">Hogar y Decoración</option>
                            <option value="Belleza y Cuidado Personal">Belleza y Cuidado Personal</option>
                            <option value="Deportes">Deportes</option>
                            <option value="Juguetes y Niños">Juguetes y Niños</option>
                            <option value="Libros y Papelería">Libros y Papelería</option>
                        </select>
                    </div>
                </div>

                <div style="text-align: right;">
                    <button type="submit">Subir Producto</button>
                    <a href="Administrador.php">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Pie de página -->
    <footer>
        <p>Derechos de Autor Quick Wit &copy; 2024. Todos los derechos reservados.</p>
    </footer>

    <script>
        function previewImages(event) {
            const previewContainer = document.getElementById('previewImages');
            previewContainer.innerHTML = ''; // Limpiar el contenedor
            const files = event.target.files; // Obtener todas las imágenes seleccionadas

            for (let i = 0; i < files.length; i++) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.width = '100px'; // Ajustar el tamaño de la imagen si es necesario
                    img.style.margin = '5px'; // Espaciado entre imágenes
                    previewContainer.appendChild(img);
                }
                reader.readAsDataURL(files[i]); // Leer cada archivo
            }
        }
    </script>
</body>
</html>
