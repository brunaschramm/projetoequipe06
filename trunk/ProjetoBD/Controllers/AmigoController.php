<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AmigoController
 *
 * @author thiago
 */
include_once ("../Dao/AmigoDAO.php");
include_once ("../Dao/UsuarioDAO.php");
include_once ("../Models/Usuario.php");

class AmigoController {

    private $model;

    function __construct() {
        $this->model = new AmigoDAO;

        $acao = $_GET['acao'];

        switch ($acao) {
            case 'cadastrar':
                $usuarioAmigo = new Usuario();
                $usuarioAmigo->setEmail($_POST['am_email']);
                
                echo $_POST['niv_amizade'];

                $usuarioDAO = new UsuarioDAO();
                $codigoAmigo = $usuarioDAO->pesquisarUsuario($usuarioAmigo->getEmail());

                if (is_null($codigoAmigo)) {
                    echo 'Não Existe Amigo';
                    return;
                }

                $usuarioAmigo->setCodigo($codigoAmigo);
                $this->model->setAmigo($usuarioAmigo);
                $this->model->setNivelAmizade("Amigos");
                $salvou = $this->model->salvar();
                
                if(!$salvou){
                    echo 'problema';
                }else{
                    echo 'Amigos Agora';
                }
                
                break;

            default:
                break;
        }
    }

}

$controle = new AmigoController();
?>
