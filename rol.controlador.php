<?php
require_once '../modelo/clsRol.php';

class RolControlador
{
    private $model;

    public function __construct()
    {
        $this->model = new Rol(); // Asegúrate de tener una clase Rol con sus métodos set y get
    }

    public function Index(){
        require_once '../vistas/header.php';
        require_once '../vistas/rol/rol.php';
        require_once '../vistas/footer.php';
    }
    
    public function Crud(){
        $alm = new Rol();
        
        if(isset($_REQUEST['idRolusuario'])){
            $alm = $this->model->Obtener($_REQUEST['idRolusuario']);
        }
        
        require_once '../vistas/header.php';
        require_once '../vistas/rol/rol-editar.php';
        require_once '../vistas/footer.php';
    }

    public function Guardar(){
        $alm = new Rol();
        
        $alm->idRolusuario = $_REQUEST['idRolusuario'];
        $alm->descripRolusuario = $_REQUEST['descripRolusuario'];
        $alm->estadoRolusuario = $_REQUEST['estadoRolusuario'];


        $alm->idRolusuario > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: indexRol.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['idRolusuario']);
        header('Location: indexRol.php');
    }
}