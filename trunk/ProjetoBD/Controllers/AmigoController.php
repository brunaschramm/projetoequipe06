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

class AmigoController { 
    private $model;
    function __construct() {
        $model = new AmigoDAO;
        
        $acao = $_POST['acao'];
        
        switch ($acao) {
            case 'cadastrar':
//                $model->get

                break;

            default:
                break;
        }
        
    }

}
$controle = new AmigoController();
?>
