<?php
require_once '../MODEL/database.php';
require_once '../MODEL/ModeloUsuario.php';

class UsuarioController {
    private $model;

    public function __construct() {
        $this->model = new Usuario();
    }

    public function index() {
        $usuarios = $this->model->listar();
        require '../VIEW/Usuario/Usuario.php';
    }

    public function guardar() {
        $alm = new Usuario();
        $alm->idUsuario = $_REQUEST['idUsuario'];
        $alm->tipoDocUsuario = $_REQUEST['tipoDocUsuario'];
        $alm->numDocUsuario = $_REQUEST['numDocUsuario'];
        $alm->nombreUsuario = $_REQUEST['nombreUsuario'];
        $alm->apellidosUsuario = $_REQUEST['apellidosUsuario'];
        $alm->direccionUsuario = $_REQUEST['direccionUsuario'];
        $alm->telefonoUsuario = $_REQUEST['telefonoUsuario'];
        $alm->correoUsuario = $_REQUEST['correoUsuario'];
        $alm->claveUsuario = $_REQUEST['claveUsuario'];
        $alm->fotoUsuario = $_REQUEST['fotoUsuario'];
        $alm->estadoUsuario = $_REQUEST['estadoUsuario'];
        $alm->idRol = $_REQUEST['idRol'];

        // Verificar si se debe actualizar o registrar
        if ($alm->idUsuario > 0) {
            $this->model->actualizar($alm);
        } else {
            $this->model->registrar($alm);
        }

        header('Location: ../VIEW/CDUsuario.php');
        exit(); // Asegura que el script se detenga después de redirigir
    }

    public function eliminar() {
        $this->model->eliminar($_REQUEST['idUsuario']);
        header('Location: ../VIEW/CDUsuario.php');
        exit(); // Asegura que el script se detenga después de redirigir
    }

    public function editar() {
        $alm = isset($_REQUEST['idUsuario']) ? $this->model->obtener($_REQUEST['idUsuario']) : new Usuario();
        require '../VIEW/Usuario/Usuario-editar.php';
    }
}
?>
