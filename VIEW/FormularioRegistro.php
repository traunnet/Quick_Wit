<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro Usuario</title>
    <link rel="stylesheet" href="../ASSETS/CSS/FormRegistro.css">
</head>
<body>
    <header>
        <div>
            <img src="../ASSETS/IMG/Personal/LennyOnline.png" id="logo" alt="Logo de la Empresa Lenny">
        </div>
        <nav>
            <ul>
                <li><a href="Login.php">Regresar</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
        <h2>Formulario de Registro Completo</h2>
        <form action="../CONTROLLER/GuardarRegistro.php" method="POST" enctype="multipart/form-data">
            <div>
                <label for="tipoDocUsuario">Tipo de Documento:</label>
                <select id="tipoDocUsuario" name="tipoDocUsuario" required class="select-tipo-doc">
                    <option value="C.C">Cédula de Ciudadanía</option>
                    <option value="T.I">Tarjeta de Identidad</option>
                    <option value="C.E">Cédula de Extranjería</option>
                    <option value="PAS">Pasaporte</option>
                </select>
            </div>
            <div>
                <label for="numDocUsuario">Número de Documento:</label>
                <input type="text" id="numDocUsuario" name="numDocUsuario" required pattern="[0-9]{1,15}" title="Ingrese un número de documento válido.">
            </div>
            <div>
                <label for="nombreUsuario">Nombre:</label>
                <input type="text" id="nombreUsuario" name="nombreUsuario" value="<?php echo htmlspecialchars($_SESSION['nombreUsuario']); ?>" required pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{1,40}" title="El nombre solo puede contener letras y espacios.">
            </div>
            <div>
                <label for="apellidosUsuario">Apellidos:</label>
                <input type="text" id="apellidosUsuario" name="apellidosUsuario" required pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{1,40}" title="Los apellidos solo pueden contener letras y espacios.">
            </div>
            <div>
                <label for="direccionUsuario">Dirección:</label>
                <input type="text" id="direccionUsuario" name="direccionUsuario" required pattern="[\w\s#.,-]{1,40}" title="La dirección puede contener letras, números y algunos caracteres especiales (#, ., , -).">
            </div>
            <div>
                <label for="telefonoUsuario">Teléfono:</label>
                <input type="text" id="telefonoUsuario" name="telefonoUsuario" required pattern="\d{7,12}" title="Ingrese un número de teléfono válido entre 7 y 12 dígitos.">
            </div>
            <div>
                <label for="correoUsuario">Correo Electrónico:</label>
                <input type="email" id="correoUsuario" name="correoUsuario" value="<?php echo htmlspecialchars($_SESSION['correoUsuario']); ?>" required>
            </div>
            <div>
                <label for="claveUsuario">Contraseña:</label>
                <input type="password" id="claveUsuario" name="claveUsuario" value="<?php echo htmlspecialchars($_SESSION['claveUsuario']); ?>" required pattern=".{8,20}" title="La contraseña debe tener entre 8 y 20 caracteres.">
            </div>
            <div>
                <label for="fotoUsuario">Foto:</label>
                <input type="file" id="fotoUsuario" name="fotoUsuario" accept="image/*" required>
            </div>
            <div>
                <button type="submit">Registrar</button>
            </div>
        </form>
    </main>

    <footer> 
        <p>Derechos de Autor Quick Wit &copy; 2024. Todos los derechos reservados.</p> 
    </footer>
</body>
</html>
