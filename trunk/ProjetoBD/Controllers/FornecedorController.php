<?php

include_once ("../Dao/FornecedorDAO.php");

class FornecedorController {

    function __construct() {
        $model = new FornecedorDAO();

        $acao = $_GET['acao'];

        switch ($acao) {
            case 'cadastrar':
                $model->setNome($_POST['for_nome']);

                $resultado = $model->salvar();

                if ($resultado == 1) {
                    header("Location: ../Views/sessaoCliente.php?flag=jfor");
                } else {
                    header("Location: ../Views/sessaoCliente.php?flag=jfor&erro");
                }
                break;
            case 'excluir':
                $model->setCodigo($_GET['id']);

                $resultado = $model->excluir();

                header("Location: ../Views/sessaoCliente.php?flag=jfor");
                break;
        }
    }
}
$controle = new FornecedorController();
?>