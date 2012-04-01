<?
include_once ("../Dao/PerfilDAO.php");

class PerfilController {

    function __construct() {

        $model = new PerfilDAO();

        $acao = $_GET['acao'];

        switch ($acao) {
            case 'cadastrar':
                $model->setAno($_POST['ano']);
                $model->setPreco($_POST['preco']);
                $model->setFormato($_POST['formato']);
                $model->setGenero($_POST['genero']);
                $model->setCensura($_POST['censura']);
                $model->setRegiao($_POST['regiao']);
                $model->setGrupo($_POST['grupo']);
//                $model->setFabricante($_POST['fabricante']);
                $model->setLoja($_POST['loja']);
//                $model->setFornecedor($_POST['fornecedor']);
                $model->setProdutora($_POST['produtora']);


                $resultado = $model->salvar();

                if ($resultado == 1) {
                    header("Location: ../Views/cadastroPerfil.php?flag=f");
                } else {
                    header("Location: ../Views/cadastroPerfil.php?flag=t");
                }
                break;
//            case 'excluir':
//                $model->setCodigo($_GET['id']);
//
//                $resultado = $model->excluir();
//
//                if ($resultado == 1) {
//                    header("Location: ../Views/usuarios.php?flag=f");
//                } else {
//                    header("Location: ../Views/usuarios.php?flag=t");
//                }
//                break;
        }
    }

}

$controller = new PerfilController();
?>