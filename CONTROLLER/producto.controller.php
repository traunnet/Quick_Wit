<?php
require_once '../MODEL/database.php';
require_once '../MODEL/ModeloProducto.php';

class ProductoController {
    private $model;

    public function __construct() {
        $this->model = new Producto();
    }

    public function index() {
        $productos = $this->model->listar();
        require '../VIEW/Producto/Producto.php';
    }

    public function guardar() {
        $alm = new Producto();
        $alm->idProducto = $_REQUEST['idProducto'];
        $alm->ImgProducto = $_REQUEST['ImgProducto'];
        $alm->categoria = $_REQUEST['categoria'];
        $alm->nombreProducto = $_REQUEST['nombreProducto'];
        $alm->descripcionProducto = $_REQUEST['descripcionProducto'];
        $alm->valorUnitarioProducto = $_REQUEST['valorUnitarioProducto'];
        $alm->estadoProducto = $_REQUEST['estadoProducto'];

        // Verificar si se debe actualizar o registrar
        if ($alm->idProducto > 0) {
            $this->model->actualizar($alm);
        } else {
            $this->model->registrar($alm);
        }

        header('Location: ../VIEW/CDProducto.php');
        exit(); // Asegura que el script se detenga después de redirigir
    }

    public function eliminar() {
        $this->model->eliminar($_REQUEST['idProducto']);
        header('Location: ../VIEW/CDProducto.php');
        exit(); // Asegura que el script se detenga después de redirigir
    }

    public function editar() {
        $alm = isset($_REQUEST['idProducto']) ? $this->model->obtener($_REQUEST['idProducto']) : new Producto();
        require '../VIEW/Producto/Producto-editar.php';
    }
}
?>
