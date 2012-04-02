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
                    header("Location: ../Views/fornecedores.php?flag=f");
                } else {
                    header("Location: ../Views/cadastroFornecedor.php?flag=t");
                }
                break;
            case 'excluir':
                $model->setCodigo($_GET['id']);

                $resultado = $model->excluir();

                if ($resultado == 1) {
                    header("Location: ../Views/fornecedores.php?flag=f");
                } else {
                    header("Location: ../Views/fornecedores.php?flag=f");
                }
                break;
        }
    }
}
$controle = new FornecedorController();
?>