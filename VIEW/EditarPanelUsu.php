<?php
session_start();
// Redirigir a login si no hay sesión activa
if (!isset($_SESSION['usuario'])) {
    header('Location: Login.php');
    exit();
}

$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../ASSETS/CSS/EditarPanelUsu.css">
</head>
<body>
    <!-- Encabezado -->
    <header>
        <div>
            <img src="../ASSETS/IMG/Personal/LennyOnline.png" id="logo" alt="Logo de la empresa">
        </div>
    </header>

    <!-- Contenedor principal -->
    <div class="contenedor estilo-luz">
        <h1 class="fuente-negrita">Configuraciones de la cuenta</h1>
        
        <div class="tarjeta">
            <form action="../CONTROLLER/ActualizarUsuario.php" method="POST">
                <input type="hidden" name="idUsuario" value="<?= htmlspecialchars($usuario['idUsuario']) ?>">

                <div class="cuerpo-tarjeta media">
                    <img src="data:image/png;base64,<?= base64_encode($usuario['fotoUsuario']) ?>" alt="Avatar" class="d-block ui-w-80">
                    <div class="media-cuerpo">
                        <label class="btn btn-outline-primary">
                            Subir nueva foto
                            <input type="file" name="fotoUsuario" class="archivo-ajustes-cuenta" style="display: none;">
                        </label>
                        <div class="texto-claro pequeño">JPG, GIF o PNG permitidos. Tamaño máximo de 800K</div>
                    </div>
                </div>
                <hr>

                <!-- Campos del formulario -->
                <div class="cuerpo-tarjeta">
                    <div class="grupo-formulario">
                        <label class="etiqueta-formulario">Nombre de usuario</label>
                        <input type="text" name="nombreUsuario" class="control-formulario" value="<?= htmlspecialchars($usuario['nombreUsuario']) ?>" 
                               maxlength="40" required pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" title="El nombre solo puede contener letras y espacios.">
                    </div>
                    <div class="grupo-formulario">
                        <label class="etiqueta-formulario">Apellidos de usuario</label>
                        <input type="text" name="apellidosUsuario" class="control-formulario" value="<?= htmlspecialchars($usuario['apellidosUsuario']) ?>" 
                               maxlength="40" required pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" title="Los apellidos solo pueden contener letras y espacios.">
                    </div>
                    <div class="grupo-formulario">
                        <label class="etiqueta-formulario">Correo electrónico</label>
                        <input type="email" name="correoUsuario" class="control-formulario" value="<?= htmlspecialchars($usuario['correoUsuario']) ?>" 
                               maxlength="40" required>
                        <div class="alerta alerta-advertencia">
                            Tu correo electrónico no está confirmado. Por favor revisa tu bandeja de entrada.<br>
                            <a href="javascript:void(0)">Reenviar confirmación</a>
                        </div>
                    </div>
                    <div class="grupo-formulario">
                        <label class="etiqueta-formulario">Dirección</label>
                        <input type="text" name="direccionUsuario" class="control-formulario" value="<?= htmlspecialchars($usuario['direccionUsuario']) ?>" 
                               maxlength="40" required pattern="[\w\s#.,-]+" title="La dirección puede contener letras, números y algunos caracteres especiales (#, ., , -).">
                    </div>
                    <div class="grupo-formulario">
                        <label class="etiqueta-formulario">Teléfono</label>
                        <input type="text" name="telefonoUsuario" class="control-formulario" value="<?= htmlspecialchars($usuario['telefonoUsuario']) ?>" 
                               maxlength="12" required pattern="\d{7,12}" title="Ingrese un número de teléfono válido entre 7 y 12 dígitos.">
                    </div>
                    <div class="grupo-formulario">
                        <label class="etiqueta-formulario">Clave</label>
                        <input type="text" name="claveUsuario" class="control-formulario" value="<?= htmlspecialchars($usuario['claveUsuario']) ?>" 
                               maxlength="20" required pattern=".{8,20}" title="La contraseña debe tener entre 8 y 20 caracteres.">
                    </div>
                </div>
                <div class="texto-derecha">
                    <button type="submit" class="btn btn-success">Guardar</button> <!-- Botón Guardar -->
                    <a href="PanelUsuario.php" class="btn btn-primary">Cancelar</a> <!-- Botón para cancelar -->
                </div>
            </form>
        </div>
    </div>

    <!-- Pie de página -->
    <footer class="footer">
        <p>Derechos de Autor Quick Wit &copy; 2024. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
