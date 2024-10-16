<?php
require_once '../modelo/clsPedido.php';

class PedidoClienteControlador
{
    private $model;

    public function __construct()
    {
        $this->model = new Pedido(); // Asegúrate de tener una clase Pedido con sus atributos públicos
    }

    public function Index()
    {
        require_once '../vistas/headerPedido.php';
        require_once '../vistas/pedido/pedidoCliente.php';
        require_once '../vistas/footer.php';
    }

    public function Crud()
    {
        $alm = new Pedido();

        if (isset($_REQUEST['idpedido'])) {
            $alm = $this->model->Obtener($_REQUEST['idpedido']);
        }

        require_once '../vistas/headerPedido.php';
        require_once '../vistas/pedido/pedidoCliente-editar.php';
        require_once '../vistas/footer.php';
    }

    public function Guardar()
    {
        $alm = new Pedido();

        $alm->idpedido = $_REQUEST['idpedido'];
        $alm->fechapedido = $_REQUEST['fechapedido'];
        $alm->horapedido = $_REQUEST['horapedido'];
        $alm->totalpedido = $_REQUEST['totalpedido'];
        $alm->estadopedido = $_REQUEST['estadopedido'];
        $alm->pedidoadomicilio = $_REQUEST['pedidoadomicilio'];
        $alm->idusuarioFK = $_REQUEST['idusuarioFK'];
        $alm->idProductoFK = $_REQUEST['idProductoFK'];

        $alm->idpedido > 0
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: ../vistas/indexPedidoCliente.php');
    }

    public function Eliminar()
    {
        $this->model->Eliminar($_REQUEST['idpedido']);
        header('Location: indexPedidoCliente.php');
    }
}
?>
