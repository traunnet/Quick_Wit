<?php

require_once('database.php');

class ModeloUsuario extends Database
{
    private $idUsuario;
    private $tipoDocUsuario;
    private $numDocUsuario;
    private $nombreUsuario;
    private $apellidosUsuario;
    private $direccionUsuario;
    private $telefonoUsuario;
    private $correoUsuario;
    private $claveUsuario;
    private $fotoUsuario;
    private $estadoUsuario;
    private $idRol;

    public function __construct($idUsuarioIN, $tipoDocUsuarioIN, $numDocUsuarioIN, $nombreUsuarioIN, $apellidosUsuarioIN, $direccionUsuarioIN, $telefonoUsuarioIN, $correoUsuarioIN, $claveUsuarioIN, $fotoUsuarioIN, $estadoUsuarioIN, $idRolIN)
    {
        $this->idUsuario = $idUsuarioIN;
        $this->tipoDocUsuario = $tipoDocUsuarioIN;
        $this->numDocUsuario = $numDocUsuarioIN;
        $this->nombreUsuario = $nombreUsuarioIN;
        $this->apellidosUsuario = $apellidosUsuarioIN;
        $this->direccionUsuario = $direccionUsuarioIN;
        $this->telefonoUsuario = $telefonoUsuarioIN;
        $this->correoUsuario = $correoUsuarioIN;
        $this->claveUsuario = $claveUsuarioIN;
        $this->fotoUsuario = $fotoUsuarioIN;
        $this->estadoUsuario = $estadoUsuarioIN;
        $this->idRol = $idRolIN;
    }

    public function consultaLogin()
    {
        $objConexion = new Database();
        $objPDO = $objConexion->startup();

        try {
            $sql = $objPDO->prepare("SELECT correoUsuario, claveUsuario, estadoUsuario, idRol FROM Usuario WHERE correoUsuario = :correoUsuario");
            $sql->bindParam(":correoUsuario", $this->correoUsuario);
            $sql->execute(); 
            return $sql->fetch(PDO::FETCH_OBJ); 
        } catch (\Throwable $error) {
            echo 'ERROR: ' . $error->getMessage();  
            die();
        } finally {
            $objConexion::desconectar(); // Asegúrate de desconectar en el bloque finally
        }
    }

    public function obtenerUsuarioPorCorreo($correo) 
    {
        $objConexion = new Database();
        $objPDO = $objConexion->startup();

        try {
            $sql = $objPDO->prepare("SELECT * FROM Usuario WHERE correoUsuario = :correoUsuario");
            $sql->bindParam(":correoUsuario", $correo);
            $sql->execute(); 
            return $sql->fetch(PDO::FETCH_ASSOC); // Devuelve un array asociativo con los datos del usuario
        } catch (\Throwable $error) {
            echo 'ERROR: ' . $error->getMessage();  
            die();
        } finally {
            $objConexion::desconectar(); // Asegúrate de desconectar en el bloque finally
        }
    }
}
?>
