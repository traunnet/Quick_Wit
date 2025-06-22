<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Meta tags para la codificación y la vista -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Enlaces a hojas de estilo externas -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../ASSETS/CSS/LoginStyle.css">
    
    <!-- Título de la página -->
    <title>Domicilios Web</title>
</head>
<body>
    <!-- Encabezado de la página -->
    <header>
        <div id="inicio" class="header">
            <img src="../ASSETS/IMG/Personal/LennyOnline.png" width="12" height="12" alt="">
        </div>
        <nav>
            <ul>
                <li><a href="LennyOnline.php">Regresar</a></li>
                <li><a href="Login.php">Manual de Usuario</a></li>
            </ul>
        </nav>
    </header>

    <!-- Contenido principal de la página -->
    <main>
        <center>
            <div class="container" id="container">
                <!-- Sección de registro -->
                <div class="form-container sign-up">
                    <form action="../CONTROLLER/RegistroDatos.php" method="POST" enctype="multipart/form-data">
                        <h1>Crear una cuenta</h1>
                        <div class="social-icons">
                            <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                            <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                            <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                        <span>Use su correo electrónico para registrarse</span>
                        <input type="text" id="RegistroUsername" name="nombreUsuario" placeholder="Nombre" required pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]{1,40}" title="El nombre debe contener solo letras y tener entre 1 y 40 caracteres">
                        <input type="email" id="RegistroEmail" name="correoUsuario" placeholder="Email" required pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,40}$" title="Debe ser un correo electrónico válido">
                        <input type="password" id="RegistroPassword" name="claveUsuario" placeholder="Contraseña" required pattern=".{8,20}" title="La contraseña debe tener un mínimo de 8 caracteres y un máximo de 20 caracteres">
                        <button type="submit">Únete</button>
                    </form>
                </div>

                <!-- Sección de inicio de sesión -->
                <div class="form-container sign-in">
                    <form action="../CONTROLLER/controladorInicioSesion.php" method="POST" class="formlog" id="login-form">
                        <h1>Inicio sesión</h1>
                        <div class="social-icons">
                            <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                            <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                            <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                        <span>Ingrese su información</span>
                        <input type="email" name="username" placeholder="Email" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,40}$" title="Debe ser un correo electrónico válido" required>
                        <input type="password" name="password" placeholder="Password" pattern=".{8,20}" title="La contraseña debe tener un mínimo de 8 caracteres y un máximo de 20 caracteres" required>
                        <a href="#">¿Olvidaste tu contraseña?</a>
                        <button type="submit">Inicia sesión</button>
                    </form>
                </div>

                <!-- Contenedor de cambio entre registro e inicio de sesión -->
                <div class="toggle-container">
                    <div class="toggle">
                        <div class="toggle-panel toggle-left">
                            <h1>¡Bienvenido!</h1>
                            <p>Ingrese sus datos personales para usar todas las funciones del sitio</p>
                            <button type="submit" class="hidden" id="login">Inicia sesión</button>
                        </div>
                        <div class="toggle-panel toggle-right">
                            <h1>¡Hola!</h1>
                            <p>Regístrese con sus datos personales para utilizar todas las funciones del sitio</p>
                            <button class="hidden" id="register">Únete</button>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </main>

    <!-- Pie de página -->
    <footer class="footer">
        <p>Derechos de Autor Quick Wit &copy; 2024. Todos los derechos reservados.</p>
    </footer>

    <!-- Enlace al archivo de JavaScript para animaciones -->
    <script src="../ASSETS/JS/Animaciones.js"></script>
</body>
</html>
