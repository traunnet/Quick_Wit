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
    <link rel="stylesheet" href="../ASSETS/CSS/PanelUsuario.css">
</head>
<body>
    <!-- Encabezado -->
    <header>
        <div>
            <img src="../ASSETS/IMG/EmpresaLenny.png" id="logo" alt="Logo de la empresa">
        </div>
        <nav>
            <ul>
                <li><a href="Login.php">Regresar</a></li>
            </ul>
        </nav>
    </header>

    <!-- Contenedor principal -->
    <div class="contenedor estilo-luz flex-crecer-1 contenedor-p-y">
        <h1 class="fuente-negrita py-3 mb-4">Configuraciones de la cuenta</h1>
        
        <div class="tarjeta desbordar-oculto">
            <div class="fila sin-gutters fila-borde fila-borde-luz">
                <div class="columna-md-9">
                    <form>
                        <input type="hidden" name="idUsuario" value="<?= htmlspecialchars($usuario['idUsuario']) ?>">

                        <div class="cuerpo-tarjeta media alinear-elementos-centro">
                            <img src="data:image/png;base64,<?= base64_encode($usuario['fotoUsuario']) ?>" alt="Avatar" class="d-block ui-w-80">
                            <!-- Se elimina la opción de subir o reiniciar la foto -->
                        </div>
                        <hr class="borde-luz m-0">

                        <!-- Campos del formulario -->
                        <div class="grupo-formulario">
                            <label class="etiqueta-formulario">Nombre de usuario</label>
                            <span class="control-formulario mb-1"><?= htmlspecialchars($usuario['nombreUsuario']) ?></span>
                        </div>
                        <div class="grupo-formulario">
                            <label class="etiqueta-formulario">Apellidos de usuario</label>
                            <span class="control-formulario"><?= htmlspecialchars($usuario['apellidosUsuario']) ?></span>
                        </div>
                        <div class="grupo-formulario">
                            <label class="etiqueta-formulario">Correo electrónico</label>
                            <span class="control-formulario mb-1"><?= htmlspecialchars($usuario['correoUsuario']) ?></span>
                            <div class="alerta alerta-advertencia mt-3">
                                Tu correo electrónico no está confirmado. Por favor revisa tu bandeja de entrada.<br>
                                <a href="javascript:void(0)">Reenviar confirmación</a>
                            </div>
                        </div>
                        <div class="grupo-formulario">
                            <label class="etiqueta-formulario">Dirección</label>
                            <span class="control-formulario"><?= htmlspecialchars($usuario['direccionUsuario']) ?></span>
                        </div>
                        <div class="grupo-formulario">
                            <label class="etiqueta-formulario">Teléfono</label>
                            <span class="control-formulario"><?= htmlspecialchars($usuario['telefonoUsuario']) ?></span>
                        </div>
                        <div class="grupo-formulario">
                            <label class="etiqueta-formulario">Clave</label>
                            <span class="control-formulario"><?= htmlspecialchars($usuario['claveUsuario']) ?></span>
                        </div>

                        <div class="texto-derecha mt-3">
                            <a href="EditarPanelUsu.php" class="btn btn-primary">Editar</a> <!-- Botón para cambiar datos -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie de página -->
    <footer class="footer">
        <p>Derechos de Autor Quick Wit &copy; 2023. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
