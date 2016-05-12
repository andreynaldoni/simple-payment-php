<?php 
    //DAO->Cliente
    //include "dao/clienteDAO.php";
    include_once "business/clienteNeg.php";
?>

<div class="container">
    <form method="POST">
        <h1 class="text-center">Cliente</h1>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="nome-cliente">Nome do Cliente</label>
                    <input type="text" class="form-control" name="cliente[nome-cliente]" placeholder="Nome do Cliente">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="sobrenome">Sobrenome</label>
                    <input type="text" class="form-control" name="cliente[sobrenome]" placeholder="Sobrenome">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="documento">CPF</label>
                    <input type="text" class="form-control" name="cliente[cpf]" placeholder="CPF">
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-1">
                <div class="form-group">
                    <label for="ddd">DDD</label>
                    <input type="number" class="form-control" name="cliente[ddd]" placeholder="DDD">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="number" class="form-control" name="cliente[telefone]" placeholder="Telefone">
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <label for="ddd1">DDD</label>
                    <input type="number" class="form-control" name="cliente[ddd1]" placeholder="DDD">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="cel">Celular</label>
                    <input type="number" class="form-control" name="cliente[cel]" placeholder="Celular">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="cep">Cep</label>
                    <input type="number" class="form-control" name="cliente[cep]" placeholder="Cep">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <input type="text" class="form-control" name="cliente[estado]" placeholder="Estado">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" name="cliente[cidade]" placeholder="Cidade">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" name="cliente[bairro]" placeholder="Bairro">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control" name="cliente[endereco]" placeholder="Endereço">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="numero">Número</label>
                    <input type="number" class="form-control" name="cliente[numero]" placeholder="Número">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="compl">Complemento</label>
                    <input type="text" class="form-control" name="cliente[compl]" placeholder="Complemento">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="email" class="form-control" name="cliente[email]" placeholder="E-mail">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="Password" class="form-control" name="cliente[senha]" placeholder="Senha">
                </div>
            </div>

        </div>
        <div class="control-group" style="align:right;">
            <!-- Button -->
            <div class="controls">
                <button class="btn btn-success" type="<submit></submit>">Cadastrar</button>
            </div>
        </div>
    </form>
</div>

<?php 
if (isset($_POST['cliente'])) {
    
    $clienteModel = new Cliente();
    
    $clienteModel->setNmCliente($_POST['cliente']['nome-cliente']);
    $clienteModel->setNmSobrenome($_POST['cliente']['sobrenome']);
    $clienteModel->setCdDdd($_POST['cliente']['ddd']);
    $clienteModel->setCdTelefone($_POST['cliente']['telefone']);
    $clienteModel->setIcTipoDocumento('F');
    $clienteModel->setCdCpf($_POST['cliente']['cpf']);
    $clienteModel->setNmPais('Brasil');
    $clienteModel->setSgEstado($_POST['cliente']['estado']);
    $clienteModel->setNmCidade($_POST['cliente']['cidade']);
    $clienteModel->setCdCep($_POST['cliente']['cep']);
    $clienteModel->setNmBairro($_POST['cliente']['bairro']);
    $clienteModel->setNmRua($_POST['cliente']['endereco']);
    $clienteModel->setCdNumero($_POST['cliente']['numero']);
    $clienteModel->setDsComplemento($_POST['cliente']['compl']);
    $clienteModel->setNmEmailCliente($_POST['cliente']['email']);
    $clienteModel->setCdSenha($_POST['cliente']['senha']);

    $clienteNeg = new clienteNeg();

    $clienteNeg->gravarCliente($clienteModel);
}
?>