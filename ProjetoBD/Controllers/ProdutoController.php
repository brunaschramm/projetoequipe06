<?php

include_once ("../Dao/ProdutoDAO.php");

class ProdutoController {

    function __construct() {
        $model = new ProdutoDAO();

        $acao = $_GET['acao'];

        switch ($acao) {
            case 'cadastrar':
                $model->setDescricao($_POST['pr_descricao']);
                $model->setTitulo($_POST['pr_titulo']);
                $model->setAno($_POST['pr_ano']);
                $model->setPreco($_POST['pr_preco']);
                $model->setFormato($_POST['pr_formato']);
                $model->setTitulo($_POST['pr_genero']);
                $model->setCensura($_POST['pr_censura']);
                $model->setTitulo($_POST['pr_regiao']);
                $model->setTitulo($_POST['pr_grupo']);
                $model->setTitulo($_POST['pr_fabricante']);
                $model->setTitulo($_POST['pr_loja']);
                $model->setTitulo($_POST['pr_fornecedor']);
                $model->setTitulo($_POST['pr_produtora']);

                $resultado = $model->salvar();

                if ($resultado == 1) {
                    header("Location: ../Views/produtos.php?flag=f");
                } else {
                    header("Location: ../Views/cadastroProduto.php?flag=t");
                }
                break;
            case 'excluir':
                $model->setCodigo($_GET['id']);

                $resultado = $model->excluir();

                if ($resultado == 1) {
                    header("Location: ../Views/produtos.php?flag=f");
                } else {
                    header("Location: ../Views/produtos.php?flag=t");
                }
                break;
        }
    }

    function getAllProdutos() {
        $model = new ProdutoDAO();

        $produtos = $model->getAll();

        return $produtos;
    }

}

$controle = new ProdutoController();
?>
