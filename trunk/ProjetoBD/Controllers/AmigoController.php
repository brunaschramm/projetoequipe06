<?php
include_once ("../Dao/AmigoDAO.php");
include_once ("../Dao/UsuarioDAO.php");
include_once ("../Models/Usuario.php");

class AmigoController {
    function __construct() {
        $model = new AmigoDAO();

        $acao = $_GET['acao'];

        switch ($acao) {
//            case 'cadastrar':
//                $usuarioAmigo = new Usuario();
//                $usuarioAmigo->setEmail($_POST['am_email']);
//                
//                echo $_POST['niv_amizade'];
//
//                $usuarioDAO = new UsuarioDAO();
//                $codigoAmigo = $usuarioDAO->pesquisarUsuario($usuarioAmigo->getEmail());
//
//                if (is_null($codigoAmigo)) {
//                    header("Location: ../Views/sessaoCliente.php?flag=jam?am");
//                    return;
//                }
//
//                $usuarioAmigo->setCodigo($codigoAmigo);
//                $this->model->setAmigo($usuarioAmigo);
//                $this->model->setNivelAmizade("Amigos");
//                $salvou = $this->model->salvar();
//                
//                header("Location: ../Views/sessaoCliente.php?flag=jam");
//                
//                break;
            case 'cadastrar':
                $usuarioDAO = new UsuarioDAO();
                $codigoAmigo = $usuarioDAO->pesquisarUsuario($_POST['am_email']);

                if (!$codigoAmigo) {
                    header("Location: ../Views/sessaoCliente.php?flag=jam?am");
                }

                $salvou = $model->salvar($codigoAmigo, $_POST['niv_amizade']);

                header("Location: ../Views/sessaoCliente.php?flag=jam");

                break;
            default:
                break;
        }
    }
}
$controle = new AmigoController();
?>
