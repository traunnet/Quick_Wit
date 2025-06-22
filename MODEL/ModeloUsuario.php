<?php

require_once 'database.php';

class Usuario
{
    private $pdo;
    public $idUsuario;
    public $tipoDocUsuario;
    public $numDocUsuario;
    public $nombreUsuario;
    public $apellidosUsuario;
    public $direccionUsuario;
    public $telefonoUsuario;
    public $correoUsuario;
    public $claveUsuario;
    public $fotoUsuario;   
    public $estadoUsuario;
    public $idRol;

    public function __CONSTRUCT()
    {
        try {
            $database = new Database();        
            $this->pdo = $database->startUp();     
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listar()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM usuario");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtener($idUsuario)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM usuario WHERE idUsuario = ?");		
            $stm->execute(array($idUsuario));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminar($idUsuario)
    {
        try {
            $stm = $this->pdo->prepare("DELETE FROM usuario WHERE idUsuario = ?");			
            $stm->execute(array($idUsuario));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizar($data)
    {
        try {
            $sql = "UPDATE usuario SET 
                        tipoDocUsuario = ?, 
                        numDocUsuario = ?,
                        nombreUsuario = ?,
                        apellidosUsuario = ?, 
                        direccionUsuario = ?,
                        telefonoUsuario = ?,
                        correoUsuario = ?, 
                        claveUsuario = ?,
                        fotoUsuario = ?,  
                        estadoUsuario = ?,
                        idRol = ?
                    WHERE idUsuario = ?";

            $this->pdo->prepare($sql)->execute(
                array(
                    $data->tipoDocUsuario, 
                    $data->numDocUsuario,
                    $data->nombreUsuario,
                    $data->apellidosUsuario,
                    $data->direccionUsuario, 
                    $data->telefonoUsuario,
                    $data->correoUsuario, 
                    $data->claveUsuario,
                    $data->fotoUsuario, 
                    $data->estadoUsuario,
                    $data->idRol,
                    $data->idUsuario
                )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrar($data)
    {
        try {
            $sql = "INSERT INTO usuario (tipoDocUsuario, numDocUsuario, nombreUsuario, apellidosUsuario, direccionUsuario, telefonoUsuario, correoUsuario, claveUsuario, fotoUsuario, estadoUsuario, idRol) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)->execute(
                array(
                    $data->tipoDocUsuario, 
                    $data->numDocUsuario,
                    $data->nombreUsuario,
                    $data->apellidosUsuario,
                    $data->direccionUsuario, 
                    $data->telefonoUsuario,
                    $data->correoUsuario, 
                    $data->claveUsuario,
                    $data->fotoUsuario,
                    $data->estadoUsuario,
                    $data->idRol
                )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>
