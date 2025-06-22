<?php

require_once('../MODEL/ModLogin.php'); 

if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
    $correoIN = $_POST['username']; 
    $contraIN = $_POST['password'];

    try {
        // Crear el objeto de modeloUsuario
        $objUsuario = new modeloUsuario(NULL, NULL, NULL, NULL, NULL, NULL, NULL, $correoIN, NULL, NULL, NULL, NULL); 

        // Consultar login
        $consultaLogin = $objUsuario->consultaLogin(); 
        $usuarioBD = $consultaLogin->correoUsuario; 
        $contraBD = $consultaLogin->claveUsuario;
        $estadoUsuarioBD = $consultaLogin->estadoUsuario;
        $tipoUsuarioBD = $consultaLogin->idRol; 

        if ($correoIN === $usuarioBD) {
            if ($contraIN === $contraBD) {
                // Obtener detalles del usuario
                $usuarioDetalles = $objUsuario->obtenerUsuarioPorCorreo($correoIN);

                if ($usuarioDetalles) {
                    session_start(); 
                    $_SESSION['usuario'] = $usuarioDetalles; // Guarda los datos del usuario en la sesión

                    // Verificar estado y tipo de usuario
                    if ($estadoUsuarioBD === "Activo") {
                        if ($tipoUsuarioBD == 1) {
                            echo '<script type="text/javascript">
                                alert("INICIO DE SESIÓN EXITOSO DE ADMINISTRADOR");    
                                window.location.href="../VIEW/Administrador.php"; 
                            </script>';
                        } elseif ($tipoUsuarioBD == 2) {
                            echo '<script type="text/javascript">
                                alert("INICIO DE SESIÓN EXITOSO DE CLIENTE");    
                                window.location.href="../VIEW/PanelUsuario.php"; 
                            </script>';
                        }
                    } else {
                        echo '<script type="text/javascript">
                            alert("ERROR: ESTADO DE USUARIO INACTIVO");   
                            window.location.href="../VIEW/Login.php";  
                        </script>'; 
                    }
                } else {
                    echo '<script type="text/javascript">
                        alert("ERROR: NO SE ENCONTRARON DETALLES DEL USUARIO");   
                        window.location.href="../VIEW/Login.php";  
                    </script>'; 
                }
            } else {
                echo '<script type="text/javascript">
                    alert("ERROR: CONTRASEÑA INCORRECTA");   
                    window.location.href="../VIEW/Login.php";
                </script>'; 
            }
        } else {
            echo '<script type="text/javascript">
                alert("ERROR: USUARIO INCORRECTO");  
                window.location.href="../VIEW/Login.php";    
            </script>'; 
        }
    } catch (\Throwable $error) {
        echo 'ERROR: ' . $error->getMessage();  
        die(); 
    }
} else {
    header('Location: Index.php'); 
    exit(); // Asegura que el script se detenga después de redirigir
}
?>
