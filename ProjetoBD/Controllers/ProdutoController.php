<?php

include_once ("../Dao/ProdutoDAO.php");

class ProdutoController {

    function __construct() {
        $model = new ProdutoDAO();

        $acao = $_GET['acao'];

        switch ($acao) {
            case 'cadastrar':
                $model->setDescricao($_POST['descricao']);
                $model->setTitulo($_POST['titulo']);
                $model->setAno($_POST['ano']);
                $model->setPreco($_POST['preco']);
                $model->setFormato($_POST['formato']);
                $model->setGenero($_POST['genero']);
                $model->setCensura($_POST['censura']);
                $model->setRegiao($_POST['regiao']);
                $model->setGrupo($_POST['grupo']);
                $model->setFabricante($_POST['fabricante']);
                $model->setLoja($_POST['loja']);
                $model->setFornecedor($_POST['fornecedor']);
                $model->setProdutora($_POST['produtora']);
                
                echo $model->getDescricao();
                
                echo "\n".$model->getAno();
                echo "\n".$model->getPreco();
                echo "\n".$model->getFormato();
                echo "\n".$model->getTitulo();
                echo "\n".$model->getCensura();
                echo "\n".$model->getTitulo();
                echo "\n".$model->getGrupo();
                echo "\n".$model->getFabricante();
                echo "\n".$model->getLoja();
                echo "\n".$model->getFornecedor();
                echo "\n".$model->getProdutora();

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
