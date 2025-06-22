<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ASSETS/CSS/Admin.css">
    <title>Administrador</title>
</head>
<body>
    <header>
        <img src="../ASSETS/IMG/Personal/LennyOnline.png" alt="Logo de la Empresa">
        <nav class="nav">
            <ul>
                <li><a href="Login.php">Login</a></li>
                <li><a href="Empresa.php">Salir</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="contenedor">
            <div class="pestañas">
                <div class="pestaña" onclick="mostrarContenido(1)">Usuarios</div>
                <div class="pestaña" onclick="mostrarContenido(2)">Domicilios</div>
                <div class="pestaña" onclick="mostrarContenido(3)">Pedidos</div>
                <div class="pestaña" onclick="mostrarContenido(4)">Ventas</div>
                <div class="pestaña" onclick="mostrarContenido(5)">Rol</div>
                <div class="pestaña" onclick="mostrarContenido(6)">Productos</div>
                <div class="pestaña" onclick="mostrarContenido(7)">Reportes</div>
            </div>

            <div class="contenido" id="contenido1">
                <div class="usuario-actions">
                    <button onclick="location.href='?u=Usuario&f=Editar'" class="btn btn-primary">Nuevo Usuario</button>
                    <form action="?u=Usuario&f=Editar" method="get" class="form-inline">
                        <input type="hidden" name="u" value="Usuario">
                        <input type="hidden" name="f" value="Editar">
                        <label for="idUsuario">Consultar Usuario por ID:</label>
                        <input type="text" id="idUsuario" name="idUsuario" required>
                        <button type="submit" class="btn btn-info">Consultar</button>
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

            <div class="contenido" id="contenido2">
                <div class="usuario-actions">
                    <button onclick="location.href='?h=Domicilio&i=Editar'" class="btn btn-primary">Nuevo Domicilio</button>
                    <form action="?h=Domicilio&i=Editar" method="get" class="form-inline">
                        <input type="hidden" name="h" value="Domicilio">
                        <input type="hidden" name="i" value="Editar">
                        <label for="idDomicilio">Consultar Domicilio por ID:</label>
                        <input type="text" id="idDomicilio" name="idDomicilio" required>
                        <button type="submit" class="btn btn-info">Consultar</button>
                    </form>
                </div>

                <?php
                require_once '../CONTROLLER/domicilio.controller.php';
                $controller = new DomicilioController();
                if (!isset($_REQUEST['h'])) {
                    $controller->Index();
                } else {
                    $accion = isset($_REQUEST['i']) ? $_REQUEST['i'] : 'Index';
                    call_user_func(array($controller, $accion));
                }
                ?>
            </div>

            <div class="contenido" id="contenido3">
                <div class="usuario-actions">
                    <button onclick="location.href='?j=Pedido&k=Editar'" class="btn btn-primary">Nuevo Pedido</button>
                    <form action="?j=Pedido&k=Editar" method="get" class="form-inline">
                        <input type="hidden" name="j" value="Pedido">
                        <input type="hidden" name="k" value="Editar">
                        <label for="idPedido">Consultar Pedido por ID:</label>
                        <input type="text" id="idPedido" name="idPedido" required>
                        <button type="submit" class="btn btn-info">Consultar</button>
                    </form>
                </div>

                <?php
                require_once '../CONTROLLER/pedido.controller.php';
                $controller = new PedidoController();
                if (!isset($_REQUEST['j'])) {
                    $controller->Index();
                } else {
                    $accion = isset($_REQUEST['k']) ? $_REQUEST['k'] : 'Index';
                    call_user_func(array($controller, $accion));
                }
                ?>
            </div>

            <div class="contenido" id="contenido4">
                <div class="usuario-actions">
                    <button onclick="location.href='?a=Venta&b=Editar'" class="btn btn-primary">Nueva Venta</button>
                    <form action="?a=Venta&b=Editar" method="get" class="form-inline">
                        <input type="hidden" name="a" value="Venta">
                        <input type="hidden" name="b" value="Editar">
                        <label for="idProducto">Consultar Venta por ID:</label>
                        <input type="text" id="idProducto" name="idProducto" required>
                        <button type="submit" class="btn btn-info">Consultar</button>
                    </form>
                </div>

                <?php
                require_once '../CONTROLLER/venta.controller.php';
                $controller = new VentaController();
                if (!isset($_REQUEST['a'])) {
                    $controller->Index();
                } else {
                    $accion = isset($_REQUEST['b']) ? $_REQUEST['b'] : 'Index';
                    call_user_func(array($controller, $accion));
                }
                ?>
            </div>

            <div class="contenido" id="contenido5">
                <div class="usuario-actions">
                    <button onclick="location.href='?c=Rol&d=Editar'" class="btn btn-primary">Nuevo Rol</button>
                    <form action="?c=Rol&d=Editar" method="get" class="form-inline">
                        <input type="hidden" name="c" value="Rol">
                        <input type="hidden" name="d" value="Editar">
                        <label for="idRol">Consultar Rol por ID:</label>
                        <input type="text" id="idRol" name="idRol" required>
                        <button type="submit" class="btn btn-info">Consultar</button>
                    </form>
                </div>

                <?php
                require_once '../CONTROLLER/rol.controller.php';
                $controller = new RolController();
                if (!isset($_REQUEST['c'])) {
                    $controller->Index();
                } else {
                    $accion = isset($_REQUEST['d']) ? $_REQUEST['d'] : 'Index';
                    call_user_func(array($controller, $accion));
                }
                ?>
            </div>

            <div class="contenido" id="contenido6">
                <div class="usuario-actions">
                    <button onclick="location.href='?z=Producto&x=Editar'" class="btn btn-primary">Nuevo Producto</button>
                    <form action="?z=Producto&x=Editar" method="get" class="form-inline">
                        <input type="hidden" name="u" value="Producto">
                        <input type="hidden" name="f" value="Editar">
                        <label for="idProducto">Consultar Usuario por ID:</label>
                        <input type="text" id="idProducto" name="idProducto" required>
                        <button type="submit" class="btn btn-info">Consultar</button>
                    </form>
                </div>

                <?php
                require_once '../CONTROLLER/producto.controller.php';
                $controller = new ProductoController();
                if (!isset($_REQUEST['z'])) {
                    $controller->Index();
                } else {
                    $accion = isset($_REQUEST['x']) ? $_REQUEST['x'] : 'Index';
                    call_user_func(array($controller, $accion));
                }
                ?>
            </div>

            <div class="contenido" id="contenido7" style="display:none;">
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
