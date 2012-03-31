<?php
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

                if ($resultado == 1) {
                    header("Location: ../Views/usuarios.php?flag=f");
                } else {
                    header("Location: ../Views/cadastroUsuario.php?flag=t");
                }
                break;
            case 'excluir':
                $model->setCodigo($_GET['id']);

                $resultado = $model->excluir();

                if ($resultado == 1) {
                    header("Location: ../Views/usuarios.php?flag=f");
                } else {
                    header("Location: ../Views/usuarios.php?flag=t");
                }
                break;
        }
    }
}
$controller = new UsuarioController();
?>