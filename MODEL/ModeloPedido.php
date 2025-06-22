<?php

require_once 'database.php';

class Pedido
{
    private $pdo;
    public $idPedido;       
    public $fechaPedido;       
    public $cantidadPedido;   
    public $valorUnitarioPedido;
    public $estadoPedido;       
    public $idUsuario;      
    public $idDomicilio;      
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
            $stm = $this->pdo->prepare("SELECT * FROM pedido");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtener($idPedido)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM pedido WHERE idPedido = ?");		
            $stm->execute(array($idPedido));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminar($idPedido)
    {
        try {
            $stm = $this->pdo->prepare("DELETE FROM pedido WHERE idPedido = ?");			
            $stm->execute(array($idPedido));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizar($data) 
    {
        try {
            $sql = "UPDATE pedido SET 
                        fechaPedido = ?, 
                        cantidadPedido = ?,
                        valorUnitarioPedido = ?,
                        estadoPedido = ?,           
                        idUsuario = ?,             
                        idDomicilio = ?,            
                        idProducto = ?
                    WHERE idPedido = ?";

            $this->pdo->prepare($sql)->execute(
                array(
                    $data->fechaPedido, 
                    $data->cantidadPedido,
                    $data->valorUnitarioPedido,
                    $data->estadoPedido,         
                    $data->idUsuario,           
                    $data->idDomicilio,        
                    $data->idProducto,
                    $data->idPedido
                )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrar($data)
    {
        try {
            $sql = "INSERT INTO pedido (fechaPedido, cantidadPedido, valorUnitarioPedido, estadoPedido, idUsuario, idDomicilio, idProducto) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)->execute(
                array(
                    $data->fechaPedido, 
                    $data->cantidadPedido,
                    $data->valorUnitarioPedido,
                    $data->estadoPedido,        
                    $data->idUsuario,           
                    $data->idDomicilio,       
                    $data->idProducto
                )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>
