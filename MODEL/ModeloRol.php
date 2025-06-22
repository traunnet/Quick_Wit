<?php

require_once 'database.php';

class Rol
{
    private $pdo;
    public $idRol;
    public $descripcionRol;

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
            $stm = $this->pdo->prepare("SELECT * FROM rol");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtener($idRol)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM rol WHERE idRol = ?");		
            $stm->execute(array($idRol));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminar($idRol)
    {
        try {
            $stm = $this->pdo->prepare("DELETE FROM rol WHERE idRol = ?");			
            $stm->execute(array($idRol));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizar($data)
    {
        try {
            $sql = "UPDATE rol SET 
                        descripcionRol = ?
                    WHERE idRol = ?";

            $this->pdo->prepare($sql)->execute(
                array(
                    $data->descripcionRol,
                    $data->idRol
                )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrar($data)
    {
        try {
            $sql = "INSERT INTO rol (descripcionRol) 
                    VALUES (?)";

            $this->pdo->prepare($sql)->execute(
                array(
                    $data->descripcionRol
                )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>
