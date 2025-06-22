<?php
require_once '../MODEL/database.php';
require_once '../MODEL/ModeloRol.php';

class RolController {
    private $model;

    public function __construct() {
        $this->model = new Rol();
    }

    public function index() {
        $roles = $this->model->listar();
        require '../VIEW/Rol/Rol.php';
    }

    public function guardar() {
        $alm = new Rol();
        $alm->idRol = $_REQUEST['idRol'];
        $alm->descripcionRol = $_REQUEST['descripcionRol'];

        // Verificar si se debe actualizar o registrar
        if ($alm->idRol > 0) {
            $this->model->actualizar($alm);
        } else {
            $this->model->registrar($alm);
        }

        header('Location: ../VIEW/CDRol.php');
        exit(); // Asegura que el script se detenga después de redirigir
    }

    public function eliminar() {
        $this->model->eliminar($_REQUEST['idRol']);
        header('Location: ../VIEW/CDRol.php');
        exit(); // Asegura que el script se detenga después de redirigir
    }

    public function editar() {
        $alm = isset($_REQUEST['idRol']) ? $this->model->obtener($_REQUEST['idRol']) : new Rol();
        require '../VIEW/Rol/Rol-editar.php';
    }
}
?>
