<?php

require_once '../modelo/clsUsuario.php';

class UsuarioControlador
{
    private $model;

    public function __construct()
    {
        $this->model = new Usuario();
    }

    public function Index()
    {
        require_once '../vistas/header.php';
        require_once '../vistas/usuario/usuario.php';
        require_once '../vistas/footer.php';
    }

    public function Crud()
    {
        $alm = new Usuario();

        if (isset($_REQUEST['id_usuario'])) {
            $alm = $this->model->Obtener($_REQUEST['id_usuario']);
        }

        require_once '../vistas/header.php';
        require_once '../vistas/usuario/usuario-editar.php';
        require_once '../vistas/footer.php';
    }

    public function Guardar()
{
    $alm = new Usuario();

    $alm->id_usuario = isset($_REQUEST['id_usuario']) ? $_REQUEST['id_usuario'] : 0;
    $alm->nombre_usuario = $_REQUEST['nombre_usuario'];
    $alm->apellido_usuario = $_REQUEST['apellido_usuario'];
    $alm->correo_Usuario = $_REQUEST['correo_Usuario'];
    $alm->telefono_Usuario = $_REQUEST['telefono_Usuario'];
    $alm->direccion_usuario = $_REQUEST['direccion_usuario'];
    $alm->no_DocUsuario = $_REQUEST['no_DocUsuario']; // Agregado el número de documento
    $alm->password_usuario = $_REQUEST['password_usuario'];
    $alm->idRolusuarioFK = $_REQUEST['idRolusuarioFK'];
    $alm->estado_usuario = $_REQUEST['estado_usuario'];

    $alm->id_usuario > 0
        ? $this->model->Actualizar($alm)
        : $this->model->Registrar($alm);

    header('Location: indexUsuario.php');
}

    
    public function Eliminar()
    {
        $this->model->Eliminar($_REQUEST['id_usuario']);
        header('Location: indexUsuario.php');
    }
}    
