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
                $model->setLoja($_POST['loja']);
                $model->setProdutora($_POST['produtora']);


                $resultado = $model->salvar();

                if ($resultado == 1) {
                    header("Location: ../Views/cadastroPerfil.php?flag=f");
                } else {
                    header("Location: ../Views/cadastroPerfil.php?flag=t");
                }
                break;
            case 'perfis':
                $resultado = $model->getPerfisUsuario($_GET['id']);
                
                $_SESSION['perfis'] = $resultado;
                session_commit();

                header("Location: ../Views/sessaoCliente.php");
                break;
            case 'gostar':
                $resultado = $model->inserirGosto($_GET["id"]);

                header("Location: ../Views/detalhes.php?id=" . $_GET["id"]);

                break;
        }
    }
}

$controller = new PerfilController();
?>