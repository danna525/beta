<?php
//importamos la clase usuario
require_once('../modelo/clsUsuario.php');
    //Valida que los campos esten llenos
    if (isset($_POST) && !empty($_POST)) {
        $usuario=$_POST['txtcorreo'];
        $clave=$_POST['txtclave'];
        
        //crear objeto de la clase

        $objUsuario=new Usuario();
        //Envia datos al objeto que se acaba de crear
        $objUsuario->correo_Usuario = $usuario;
        $objUsuario->password_usuario = $clave;
        echo $objUsuario->correo_Usuario;
        
        if ($objUsuario->login()==true && $objUsuario->consultaEstado()==true){
            session_start();
            $_SESSION["user"]=$usuario;
            $_SESSION["id"] = $objUsuario-> consultaIdPorEmail();
            //HAY QUE LLEVARLO AL MENU
            if ($objUsuario->consultaRol()==true){
                $_SESSION["rol"]="Administrador";
                header('Location: ../vistas/menuprincipal.php');
            }else{
                header('Location: ../vistas/indexPedidoCliente.php');
            }
        }else if($objUsuario->consultaEstado()==true){
            header('Location: ../vistas/frmLogin.php?fallo=errorEstado');
        }
        else{
            //MOSTRARLE UN ERROR EN EL LINK DEL LOGIN
            header('Location: ../vistas/frmLogin.php?fallo=error');
        }

        
    }

?>