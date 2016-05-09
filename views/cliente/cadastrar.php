<?php 
//DAO->Cliente
//include "dao/clienteDAO.php";
include_once "business/clienteNeg.php";
?>

<div class="container-fluid" style="padding-left:35px;">
    <form action=$_POST[ 'user'] method="POST">
        <h1 style="padding-left:35px;">Cliente</h1>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="nome-cliente">Nome do Cliente</label>
                    <input type="text" class="form-control" id="nome-cliente" placeholder="Nome do Cliente">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="sobrenome">Sobrenome</label>
                    <input type="text" class="form-control" id="sobrenome" placeholder="Sobrenome">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="documento">Documento</label>
                    <input type="text" class="form-control" id="documento" placeholder="Número do documento">
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-1">
                <div class="form-group">
                    <label for="ddd">DDD</label>
                    <input type="number" class="form-control" id="ddd" placeholder="DDD">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="number" class="form-control" id="telefone" placeholder="Telefone">
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <label for="ddd1">DDD</label>
                    <input type="number" class="form-control" id="ddd1" placeholder="DDD">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="cel">Telefone</label>
                    <input type="number" class="form-control" id="cel" placeholder="Celular">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="cep">Cep</label>
                    <input type="number" class="form-control" id="cep" placeholder="Cep">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <input type="text" class="form-control" id="estado" placeholder="Estado">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="cidade">cidade</label>
                    <input type="text" class="form-control" id="cidade" placeholder="Cidade">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="bairro" placeholder="Bairro">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control" id="endereco" placeholder="Endereço">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="numero">Número</label>
                    <input type="number" class="form-control" id="numero" placeholder="Número">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="compl">Complemento</label>
                    <input type="text" class="form-control" id="compl" placeholder="Complemento">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="email" class="form-control" id="email" placeholder="E-mail">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="Password" class="form-control" id="senha" placeholder="Senha">
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
if (isset($_POST['cliente'])) {

    $clienteModel->nm_cliente = $_POST['nome-cliente'];
    $clienteModel->nm_sobrenome = $_POST['sobrenome'];
    $clienteModel->cd_ddd = $_POST['ddd'];
    $clienteModel->cd_telefone = $_POST['telefone'];
    $clienteModel->ic_tipo_documento = $_POST['documento'];
    $clienteModel->nm_pais = "Brasil";
    $clienteModel->sg_estado = $_POST['estado'];
    $clienteModel->nm_cidade = $_POST['cidade'];
    $clienteModel->cd_cep = $_POST['cep'];
    $clienteModel->nm_bairro = $_POST['bairro'];
    $clienteModel->nm_rua = $_POST['endereco'];
    $clienteModel->cd_numero = $_POST['numero'];
    $clienteModel->ds_complemento = $_POST['compl'];
    $clienteModel->nm_email_cliente = $_POST['email'];
    $clienteModel->cd_senha = $_POST['senha'];

    $cliente = new clienteNeg();

    $cliente->GravarCliente($clienteModel);
}
?>