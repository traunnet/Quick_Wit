<?php

require_once 'database.php';

class Venta
{
    private $pdo;
    public $idVenta; 
    public $categoria; 
    public $nombreProducto; 
    public $valorUnitario; 
    public $cantidad; 
    public $valorTotal; 
    public $estadoProducto; 
    public $idProducto; 

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
            $stm = $this->pdo->prepare("SELECT * FROM venta");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtener($idVenta)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM venta WHERE idVenta = ?");		
            $stm->execute(array($idVenta));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminar($idVenta)
    {
        try {
            $stm = $this->pdo->prepare("DELETE FROM venta WHERE idVenta = ?");			
            $stm->execute(array($idVenta));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizar($data)
    {
        try {
            $sql = "UPDATE venta SET 
                        categoria = ?, 
                        nombreProducto = ?, 
                        valorUnitario = ?, 
                        cantidad = ?, 
                        valorTotal = ?, 
                        estadoProducto = ?, 
                        idProducto = ?
                    WHERE idVenta = ?";

            $this->pdo->prepare($sql)->execute(
                array(
                    $data->categoria, 
                    $data->nombreProducto, 
                    $data->valorUnitario, 
                    $data->cantidad, 
                    $data->valorTotal, 
                    $data->estadoProducto, 
                    $data->idProducto,
                    $data->idVenta 
                )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrar($data)
    {
        try {
            $sql = "INSERT INTO venta (categoria, nombreProducto, valorUnitario, cantidad, valorTotal, estadoProducto, idProducto) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)->execute(
                array(
                    $data->categoria, 
                    $data->nombreProducto, 
                    $data->valorUnitario, 
                    $data->cantidad, 
                    $data->valorTotal, 
                    $data->estadoProducto, 
                    $data->idProducto
                )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>
