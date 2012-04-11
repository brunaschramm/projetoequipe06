<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once ("../Dao/UsuarioDAO.php");

class UsuarioController {

    function __construct() {

        $model = new UsuarioDAO();

        $acao = $_GET['acao'];

        switch ($acao) {
            case 'cadastrar':

                $model->setNome($_POST['us_nome']);
                $model->setApelido($_POST['us_apelido']);
                $model->setCpf($_POST['us_cpf']);
                $model->setEmail($_POST['us_email']);

                $resultado = $model->salvar();

                if (!isset($_SESSION["codigo"])){
                    header("Location: ../Views/sessaoCliente.php?flag=jlogin");
                } else if ($resultado == 1) {
                    header("Location: ../Views/sessaoCliente.php?flag=juse");
                } else {
                    header("Location: ../Views/sessaoCliente.php?flag=juse&erro");
                }
                break;
            case 'excluir':
                $model->setCodigo($_GET['id']);

                $resultado = $model->excluir();

                header("Location: ../Views/sessaoCliente.php?flag=juse");
                break;
            case 'amigo':
                $model->setEmail($_POST['am_email']);

                $resultado = $model->adicionarAmigo();

                if ($resultado == 1) {
                    header("Location: ../Views/cadastroAmigos.php?flag=f");
                } else {
                    header("Location: ../Views/cadastroAmigos.php?flag=t");
                }
                break;
            case 'excluirAmigo':
                $model->setCodigo($_GET['id']);

                $resultado = $model->removerAmigo();

                if ($resultado == 1) {
                    header("Location: ../Views/cadastroAmigos.php?flag=f");
                } else {
                    header("Location: ../Views/cadastroAmigos.php?flag=t");
                }
                break;
        }
    }
}
$controller = new UsuarioController();
?>