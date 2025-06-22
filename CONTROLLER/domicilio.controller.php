<?php
require_once '../MODEL/database.php';
require_once '../MODEL/ModeloDomicilio.php';

class DomicilioController {
    private $model;

    public function __construct() {
        $this->model = new Domicilio();
    }

    public function index() {
        $domicilios = $this->model->listar();
        require '../VIEW/Domicilio/Domicilio.php';
    }

    public function guardar() {
        $alm = new Domicilio();
        $alm->idDomicilio = $_REQUEST['idDomicilio'];
        $alm->horaDomicilio = $_REQUEST['horaDomicilio'];
        $alm->estadoDomicilio = $_REQUEST['estadoDomicilio'];
        $alm->idUsuario = $_REQUEST['idUsuario'];

        // Verificar si se debe actualizar o registrar
        if ($alm->idDomicilio > 0) {
            $this->model->actualizar($alm);
        } else {
            $this->model->registrar($alm);
        }

        header('Location: ../VIEW/CDDomicilio.php');
        exit(); // Asegura que el script se detenga después de redirigir
    }

    public function eliminar() {
        $this->model->eliminar($_REQUEST['idDomicilio']);
        header('Location: ../VIEW/CDDomicilio.php');
        exit(); // Asegura que el script se detenga después de redirigir
    }

    public function editar() {
        $alm = isset($_REQUEST['idDomicilio']) ? $this->model->obtener($_REQUEST['idDomicilio']) : new Domicilio();
        require '../VIEW/Domicilio/Domicilio-editar.php';
    }
}
?>
