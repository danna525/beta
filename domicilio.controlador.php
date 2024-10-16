<?php
require_once '../modelo/clsDomicilio.php';

class DomicilioControlador
{
    private $model;

    public function __construct()
    {
        $this->model = new Domicilio(); // Asegúrate de tener una clase Domicilio con sus atributos públicos
    }

    public function Index()
    {
        require_once '../vistas/header.php';
        require_once '../vistas/domicilio/domicilio.php';
        require_once '../vistas/footer.php';
    }

    public function Crud()
    {
        $alm = new Domicilio();

        if (isset($_REQUEST['idDomicilio'])) {
            $alm = $this->model->Obtener($_REQUEST['idDomicilio']);
        }

        require_once '../vistas/header.php';
        require_once '../vistas/domicilio/domicilio-editar.php';
        require_once '../vistas/footer.php';
    }

    public function Guardar()
    {
        $alm = new Domicilio();

        $alm->idDomicilio = $_REQUEST['idDomicilio'];
        $alm->horaDomicilio = $_REQUEST['horaDomicilio'];
        $alm->estadoDomicilio = $_REQUEST['estadoDomicilio'];
        $alm->idpedidoFK = $_REQUEST['idpedidoFK'];
        $alm->idDomicilioFK = $_REQUEST['idDomicilioFK'];

        $alm->idDomicilio > 0
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);

        header('Location: indexDomicilio.php');
    }

    public function Eliminar()
    {
        $this->model->Eliminar($_REQUEST['idDomicilio']);
        header('Location: indexDomicilio.php');
    }
}
?>
