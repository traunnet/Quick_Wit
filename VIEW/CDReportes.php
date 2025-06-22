<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ASSETS\CSS\reportes.css">
    <title>Administrador</title>
</head>
<body>
    <header>
        <img src="../ASSETS/IMG/Personal/LennyOnline.png" alt="Logo de la Empresa">

    </header>

    <main>
        <div class="contenedor">
            <div class="pestañas">
                <div class="pestaña" onclick="mostrarContenido(1)">Reportes</div>
            </div>

            <div class="contenido" id="contenido" style="display:none;">
                <h2>Reportes</h2>
                <div class="reporte-buttons">
                    <button type="submit" value="reporte">
                        <img src="../ASSETS/IMG/Logos/DomicilioIcono.png" class="icono-mediano">
                        <a class="btn-reporte" href="reppedidos.php">Reporte de Pedidos</a>
                    </button>
                    <button type="submit" value="reporte">
                        <img src="../ASSETS/IMG/Logos/iconoUs.png" class="icono-mediano">
                        <a class="btn-reporte" href="repusuario.php">Reporte de Usuarios</a>
                    </button>
                    <button type="submit" value="reporte">
                        <img src="../ASSETS/IMG/Logos/DomUs.png" class="icono-mediano">
                        <a class="btn-reporte" href="repDomicilio.php">Reporte de Domicilios</a>
                    </button>
                    <button type="submit" value="reporte">
                        <img src="../ASSETS/IMG/Logos/rolesIcon.png" class="icono-mediano">
                        <a class="btn-reporte" href="reprol.php">Reporte de Roles</a>
                    </button>
                    <button type="submit" value="reporte">
                        <img src="../ASSETS/IMG/Logos/ventaIcon.png" class="icono-mediano">
                        <a class="btn-reporte" href="repventa.php">Reporte de Ventas</a>
                    </button>
                </div>
            </div>
        </div>
        <script src="../ASSETS/JS/Pestañas.js"></script>
    </main>

    <footer>
        <p>Derechos de Autor Quick Wit &copy; 2024. Todos los derechos reservados.</p>
    </footer>
    
</body>
</html>
