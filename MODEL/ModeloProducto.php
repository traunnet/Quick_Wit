<?php

require_once 'database.php';

class Producto
{
    private $pdo;
    public $idProducto;
    public $ImgProducto;
    public $categoria;
    public $nombreProducto;
    public $descripcionProducto;
    public $valorUnitarioProducto;
    public $estadoProducto;

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
            $stm = $this->pdo->prepare("SELECT * FROM producto");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtener($idProducto)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM producto WHERE idProducto = ?");		
            $stm->execute(array($idProducto));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminar($idProducto)
    {
        try {
            $stm = $this->pdo->prepare("DELETE FROM producto WHERE idProducto = ?");			
            $stm->execute(array($idProducto));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizar($data)
    {
        try {
            $sql = "UPDATE producto SET 
                        ImgProducto = ?, 
                        categoria = ?,
                        nombreProducto = ?, 
                        descripcionProducto = ?, 
                        valorUnitarioProducto = ?, 
                        estadoProducto = ?
                    WHERE idProducto = ?";

            $this->pdo->prepare($sql)->execute(
                array(
                    $data->ImgProducto,
                    $data->categoria,
                    $data->nombreProducto,
                    $data->descripcionProducto,
                    $data->valorUnitarioProducto,
                    $data->estadoProducto,
                    $data->idProducto
                )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrar($data)
    {
        try {
            $sql = "INSERT INTO producto (ImgProducto, categoria, nombreProducto, descripcionProducto, valorUnitarioProducto, estadoProducto) 
                    VALUES (?, ?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)->execute(
                array(
                    $data->ImgProducto,
                    $data->categoria,
                    $data->nombreProducto,
                    $data->descripcionProducto,
                    $data->valorUnitarioProducto,
                    $data->estadoProducto
                )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>
