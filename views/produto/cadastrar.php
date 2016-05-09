<?php 
//DAO->Cliente
//include "dao/clienteDAO.php";
include_once "moodels/produto.php";
include_once "business/produtoNeg.php";
?>

<div class="container">
    <form method="POST">
        <h1 class="text-center">Produto</h1>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="nome-produto">Nome do Produto</label>
                    <input type="text" class="form-control" name="produto[nome-produto]" placeholder="Nome do Produto">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="dsproduto">Descrição Produto</label>
                    <input type="text" class="form-control" name="produto[dsproduto]" placeholder="Descrição Produto">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="vlproduto">Valor do Produto</label>
                    <input type="number" class="form-control" name="produto[vlproduto]" placeholder="R$">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="qtproduto">Quantidade do produto</label>
                    <input type="number" class="form-control" name="produto[qtproduto]" placeholder="Quantidade">
                </div>
            </div>
        </div>        
        <div class="control-group" style="align:right;">
            <!-- Button -->
            <div class="controls">
                <button class="btn btn-success">Cadastrar</button>
            </div>
        </div>

    </form>
</div>

<?php 
if (isset($_POST['produto'])) {
    
    $produtoModel = new Produto();

    $produtoModel->setNmProduto($_POST['produto']['nome-produto']);
    $produtoModel->setDsProduto($_POST['produto']['dsproduto']);
    $produtoModel->setVlProduto($_POST['produto']['vlproduto']);
    $produtoModel->setQtProduto($_POST['produto']['qtproduto']);
   

    $produto = new produtoNeg();
    
    $produto->GravarProduto($produtoModel);

    echo '<h1 class="text-center">Produto <b>'.$_POST['produto']['nome-produto'].'</b> cadastrado com sucesso.</h1>';
}
?>