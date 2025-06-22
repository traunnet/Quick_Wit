<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Roles</title>
    <link rel="stylesheet" href="../ASSETS/CSS/CDStyle.css">
    <script src="CRUD.js"></script>
</head>
<body>
    <div class="contenedor">
        <!-- Barra lateral -->
        <aside class="barra-lateral">
            <div class="logo">
                <h2>Lenny Online</h2>
            </div>
            <nav>
                <h3>Gestión CRUD</h3>
                <ul class="menu">
                    <li><a href="Administrador.php">Principal</a></li>
                    <li><a href="CDRol.php">Rol</a></li>
                    <li><a href="CDDomicilio.php">Domicilios</a></li>
                    <li><a href="CDProducto.php">Productos</a></li>
                    <li><a href="CDPedido.php">Pedidos</a></li>
                    <li><a href="CDVenta.php">Ventas</a></li>
                </ul>
                <h3>Reportes</h3>
                <ul class="menu">
                    <li><a href="CDReportes.php">Reportes</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Contenido principal -->
        <div class="contenido-principal">
            <header>
                <div class="acciones-usuario">
                    <img src="user-profile.png" alt="Perfil" class="icono-perfil">
                </div>
            </header>

            <section class="panel-control">
                <div class="contenido">
                <div class="acciones-usuario">
                <br>
                <center><br><center> <button onclick="location.href='?u=Usuario&f=Editar'" class="btn btn-primary">Nuevo Usuario</button><center><br><center> 
                <br>                  
                    <form action="?u=Usuario&f=Editar" method="get" class="form-inline">
                        <input type="hidden" name="u" value="Usuario">
                        <input type="hidden" name="f" value="Editar">
                        <label for="idUsuario">Consultar Usuario por ID:</label>
                        <br>
                        <input type="text" id="idUsuario" name="idUsuario" required>
                        <button type="submit" class="btn btn-info">Consultar</button>
                        <br>
                        <br>
                        <button type="submit" value="reporte">
                        <img src="../ASSETS/IMG/Logos/DomUs.png" class="icono-mediano">
                        <a class="btn-reporte" href="repusuario.php">Reporte de usuario
                        </a>
                    </button>
                    </form>
                </div>

                <?php
                require_once '../CONTROLLER/usuario.controller.php';
                $controller = new UsuarioController();
                if (!isset($_REQUEST['u'])) {
                    $controller->Index();
                } else {
                    $accion = isset($_REQUEST['f']) ? $_REQUEST['f'] : 'Index';
                    call_user_func(array($controller, $accion));
                }
                ?>
            </div>
            </section>
        </div>
    </div>
</body>
</html>
