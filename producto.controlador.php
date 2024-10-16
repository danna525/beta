<?php
require_once '../modelo/clsProducto.php';

class ProductoControlador
{
    private $model;

    public function __construct()
    {
        $this->model = new Producto(); // Asegúrate de tener una clase Producto con sus atributos públicos
    }

    public function Index()
    {
        require_once '../vistas/header.php';
        require_once '../vistas/producto/producto.php';
        require_once '../vistas/footer.php';
    }

    public function Crud()
    {
        $alm = new Producto();

        if (isset($_REQUEST['idproducto'])) {
            $alm = $this->model->Obtener($_REQUEST['idproducto']);
        }

        require_once '../vistas/header.php';
        require_once '../vistas/producto/producto-editar.php';
        require_once '../vistas/footer.php';
    }

    public function Guardar()
    {
        $alm = new Producto();

        $alm->idproducto = $_REQUEST['idproducto'];
        $alm->descripProducto = $_REQUEST['descripProducto'];
        $alm->precioproducto = $_REQUEST['precioproducto'];
        $alm->categoriaproducto = $_REQUEST['categoriaproducto'];
        $alm->estadoproducto = $_REQUEST['estadoproducto'];

        $alm->idproducto > 0
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);

        header('Location: indexProducto.php');
    }

    public function Eliminar()
    {
        $this->model->Eliminar($_REQUEST['idproducto']);
        header('Location: indexProducto.php');
    }
}
?>