<?php
require_once '../MODEL/database.php';
require_once '../MODEL/ModeloPedido.php';

class PedidoController {
    private $model;

    public function __construct() {
        $this->model = new Pedido();
    }

    public function index() {
        $pedidos = $this->model->listar();
        require '../VIEW/Pedido/Pedido.php';
    }

    public function guardar() {
        $alm = new Pedido();
        $alm->idPedido = $_REQUEST['idPedido']; 
        $alm->fechaPedido = $_REQUEST['fechaPedido']; 
        $alm->cantidadPedido = $_REQUEST['cantidadPedido'];
        $alm->valorUnitarioPedido = $_REQUEST['valorUnitarioPedido'];
        $alm->estadoPedido = $_REQUEST['estadoPedido']; 
        $alm->idUsuario = $_REQUEST['idUsuario'];
        $alm->idDomicilio = $_REQUEST['idDomicilio'];
        $alm->idProducto = $_REQUEST['idProducto']; 

        // Verificar si se debe actualizar o registrar
        if ($alm->idPedido > 0) {
            $this->model->actualizar($alm);
        } else {
            $this->model->registrar($alm);
        }

        header('Location: ../VIEW/CDPedido.php');
        exit(); // Asegura que el script se detenga después de redirigir
    }

    public function eliminar() {
        $this->model->eliminar($_REQUEST['idPedido']);
        header('Location: ../VIEW/CDPedido.php');
        exit(); // Asegura que el script se detenga después de redirigir
    }

    public function editar() {
        $alm = isset($_REQUEST['idPedido']) ? $this->model->obtener($_REQUEST['idPedido']) : new Pedido();
        require '../VIEW/Pedido/Pedido-editar.php';
    }
}
?>
