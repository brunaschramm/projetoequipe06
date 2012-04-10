<?php
include_once("../Dao/LojaDAO.php");

class LojaController {
    function __construct() {
        $acao = $_GET['acao'];

        $model = new LojaDAO();

        switch ($acao) {
            case 'cadastrar':
                $model->setNome($_POST['loj_nome']);
                $model->setEndereco($_POST['loj_endereco']);

                $resultado = $model->salvar();

                if ($resultado == 1) {
                    header("Location: ../Views/sessaoCliente.php?flag=jloj");
                } else {
                    header("Location: ../Views/sessaoCliente.php?flag=jloj&erro");
                }
                
                break;
            case 'excluir':
                $model->setCodigo($_GET['id']);

                $resultado = $model->excluir();

                header("Location: ../Views/sessaoCliente.php?flag=jloj");
                break;
        }
    }
}
$controle = new LojaController();
?>