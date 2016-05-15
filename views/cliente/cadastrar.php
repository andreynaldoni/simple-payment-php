<?php 
    if(isset($_SESSION['cliente'])){
        header('Location:' . HOME_PATH);
    }
    include_once "business/clienteNeg.php";
?>

<div class="container">
    <form method="POST">
        <h1 class="text-center">Cliente</h1>
        <div class="row">
            <div class="col-sm-2 col-sm-offset-2">
                <div class="form-group">
                    <label for="nome-cliente"><i class="obrigatorio">*</i> Nome:</label>
                    <input type="text" class="form-control" name="cliente[nome-cliente]" placeholder="Ex.: João" maxlength="60">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="sobrenome"> Sobrenome:</label>
                    <input type="text" class="form-control" name="cliente[sobrenome]" placeholder="Ex.: da Silva">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="documento"><i class="obrigatorio">*</i> CPF:</label>
                    <input type="text" class="form-control" name="cliente[cpf]" id="cpf" placeholder="CPF">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-1 col-sm-offset-2">
                <div class="form-group">
                    <label for="ddd">DDD:</label>
                    <input type="text" class="form-control" name="cliente[ddd]" id="ddd" placeholder="(13)">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" class="form-control" name="cliente[telefone]" id="telefone" placeholder="3333-3333">
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <label for="ddd1">DDD:</label>
                    <input type="text" class="form-control" name="cliente[ddd1]" id="ddd2" placeholder="(13)">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="cel">Celular:</label>
                    <input type="text" class="form-control" name="cliente[cel]" id="celular" placeholder="99999-9999">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 col-sm-offset-2">
                <div class="form-group">
                    <label for="cep">CEP:</label>
                    <input type="text" class="form-control" name="cliente[cep]" id="cep" placeholder="CEP">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <input type="text" class="form-control" name="cliente[estado]" placeholder="SP">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="cidade">Cidade:</label>
                    <input type="text" class="form-control" name="cliente[cidade]" placeholder="Praia Grande">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="bairro">Bairro:</label>
                    <input type="text" class="form-control" name="cliente[bairro]" placeholder="Boqueirão">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 col-sm-offset-2">
                <div class="form-group">
                    <label for="endereco">Endereço:</label>
                    <input type="text" class="form-control" name="cliente[endereco]" placeholder="Endereço">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="numero">Número:</label>
                    <input type="text" class="form-control" name="cliente[numero]" placeholder="Número">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="compl">Complemento:</label>
                    <input type="text" class="form-control" name="cliente[compl]" placeholder="Complemento">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 col-sm-offset-2">
                <div class="form-group">
                    <label for="email"><i class="obrigatorio">*</i> E-mail:</label>
                    <input type="email" class="form-control" name="cliente[email]" placeholder="seu@email.com" pattern="/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="senha"><i class="obrigatorio">*</i> Senha:</label>
                    <input type="Password" class="form-control" name="cliente[senha]" placeholder="Senha">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="senha2"><i class="obrigatorio">*</i> Confirmar senha:</label>
                    <input type="Password" class="form-control" name="cliente[senha2]" placeholder="Confirmar senha">
                </div>
            </div>
        </div>
        <div class="col-sm-offset-8">
            <div class="form-group">
                <a href="<?= HOME_PATH ?>"><button type="button" class="btn btn-primary">
                    <i class="glyphicon glyphicon-triangle-left"></i>
                    Voltar
                </button></a>
                <button type="submit" class="btn btn-success" type="submit" value="Cadastrar">
                    Cadastrar
                    <i class="glyphicon glyphicon-send"></i>
                </button>
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