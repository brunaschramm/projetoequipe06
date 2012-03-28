<?php

include_once("../Dao/LojaDAO.php");

class LojaController {

    function __construct() {
        $acao = $_GET['acao'];

        $model = new LojaDAO();

        switch ($acao) {
            case 'cadastrar':

                $model->setNome($_POST['loj_nome']);
                $model->setEmail($_POST['loj_email']);
                $model->setEndereco($_POST['loj_endereco']);

                $resultado = $model->salvar();

                if ($resultado == 1) {
                    header("Location: ../Views/cadastrado.html");
                } else {
                    header("Location: ../Views/cadastroLoja.php");
                }
                break;
            case 'excluir':
                echo 'Mudou';
                break;
            case 'pesquisarTodas':
                $todasLojas = $model->todasLojas();                                
                
                break;
        }
    }

}

$controle = new LojaController();
?>