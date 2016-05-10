<?php 
//DAO->Cliente
//include "dao/clienteDAO.php";
include_once "moodels/ingrediente.php";
include_once "business/ingredienteNeg.php";
?>

<div class="container">
    <form method="POST">
        <h1 class="text-center">Ingrediente</h1>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="nome-ingrediente">Nome do Ingrediente</label>
                    <input type="text" class="form-control" name="ingrediente[nome-ingrediente]" placeholder="Nome do Ingrediente">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="dsingrediente">Descrição do Ingrediente</label>
                    <input type="text" class="form-control" name="ingrediente[dsingrediente]" placeholder="Descrição do Ingrediente">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="vlingrediente">Valor do Ingrediente</label>
                    <input type="number" class="form-control" name="ingrediente[vlingrediente]" placeholder="R$" step="0.01" min="0.01">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="qtpingrediente">Quantidade do Ingrediente</label>
                    <input type="number" class="form-control" name="ingrediente[qtingrediente]" placeholder="Quantidade">
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
if (isset($_POST['ingrediente'])) {
    
    $ingredienteModel = new Ingrediente();

    $ingredienteModel->setNmIngrediente($_POST['ingrediente']['nome-ingrediente']);
    $ingredienteModel->setDsIngrediente($_POST['ingrediente']['dsingrediente']);
    $ingredienteModel->setVlIngrediente($_POST['ingrediente']['vlingrediente']);
    $ingredienteModel->setQtIngrediente($_POST['ingrediente']['qtingrediente']);
   
    $ingrediente = new ingredienteNeg();
    
    $ingrediente->GravarIngrediente($ingredienteModel);

    echo '<h1 class="text-center">Ingrediente <b>'.$_POST['ingrediente']['nome-ingrediente'].'</b> cadastrado com sucesso.</h1>';
}
?>