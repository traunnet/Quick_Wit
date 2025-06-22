<?php

require_once 'database.php';

class Domicilio
{
    private $pdo;
    public $idDomicilio;
    public $horaDomicilio;
    public $estadoDomicilio;
    public $idUsuario;

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
            $stm = $this->pdo->prepare("SELECT * FROM domicilio");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtener($idDomicilio)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM domicilio WHERE idDomicilio = ?");		
            $stm->execute(array($idDomicilio));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminar($idDomicilio)
    {
        try {
            $stm = $this->pdo->prepare("DELETE FROM domicilio WHERE idDomicilio = ?");			
            $stm->execute(array($idDomicilio));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizar($data) 
    {
        try {
            $sql = "UPDATE domicilio SET 
                        horaDomicilio = ?, 
                        estadoDomicilio = ?,
                        idUsuario = ?
                    WHERE idDomicilio = ?";

            $this->pdo->prepare($sql)->execute(
                array(
                    $data->horaDomicilio,
                    $data->estadoDomicilio,
                    $data->idUsuario,
                    $data->idDomicilio
                )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrar($data)
    {
        try {
            $sql = "INSERT INTO domicilio (horaDomicilio, estadoDomicilio, idUsuario) 
                    VALUES (?, ?, ?)";

            $this->pdo->prepare($sql)->execute(
                array(
                    $data->horaDomicilio, 
                    $data->estadoDomicilio,
                    $data->idUsuario
                )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>
