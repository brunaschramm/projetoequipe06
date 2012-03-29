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
                    header("Location: ../Views/cadastrado.html");
                } else {
                    header("Location: ../Views/cadastroFornecedor.php?flag=t");
                }
                break;
        }
    }

    function getAll(){
        $model = new FabricanteDAO();
        
        $fabricantes = $model->getAll();
        
        return $fabricantes;
    }
}
$controle = new FabricanteController();
?>
