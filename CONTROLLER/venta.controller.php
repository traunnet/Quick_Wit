<?php
require_once '../MODEL/database.php';
require_once '../MODEL/ModeloVenta.php';

class VentaController {
    private $model;

    public function __construct() {
        $this->model = new Venta();
    }

    public function index() {
        $ventas = $this->model->listar();
        require '../VIEW/Venta/Venta.php';
    }

    public function guardar() {
        $alm = new Venta();
        $alm->idVenta = $_REQUEST['idVenta']; 
        $alm->categoria = $_REQUEST['categoria']; 
        $alm->nombreProducto = $_REQUEST['nombreProducto']; 
        $alm->valorUnitario = $_REQUEST['valorUnitario'];
        $alm->cantidad = $_REQUEST['cantidad']; 
        $alm->valorTotal = $_REQUEST['valorTotal']; 
        $alm->estadoProducto = $_REQUEST['estadoProducto'];
        $alm->idProducto = $_REQUEST['idProducto']; 

        // Verificar si se debe actualizar o registrar
        if ($alm->idVenta > 0) { // Cambiar idUsuario a idVenta
            $this->model->actualizar($alm);
        } else {
            $this->model->registrar($alm);
        }

        header('Location: ../VIEW/CDVenta.php');
        exit(); // Asegura que el script se detenga después de redirigir
    }

    public function eliminar() {
        $this->model->eliminar($_REQUEST['idVenta']); // Cambiar a idVenta
        header('Location: ../VIEW/CDVenta.php');
        exit(); // Asegura que el script se detenga después de redirigir
    }

    public function editar() {
        $alm = isset($_REQUEST['idVenta']) ? $this->model->obtener($_REQUEST['idVenta']) : new Venta(); // Cambiar a idVenta
        require '../VIEW/Venta/Venta-editar.php';
    }
}
?>
