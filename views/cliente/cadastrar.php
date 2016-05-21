<?php 
    if(isset($_SESSION['cliente'])){
        header('Location:' . HOME_PATH);
    }
    include_once "business/clienteNeg.php";
?>

<div class="container">
    <?php 
        if(count($this->params) > 1){
            if($this->params[0] == 'erropedido'){
                echo '<h1 class="text-center">É necessário se registrar antes de efetuar o pedido :)</h1><br>'.
                '<h3 class="text-center">Caso seja cadastrado, efetue o login pelo menu acima.</h3>';
            }    
        }
    ?>
    <form method="POST">
        <h1 class="text-center">Cliente</h1>
        <div class="row">
            <div class="col-sm-3 col-sm-offset-2">
                <div class="form-group">
                    <label for="nome-cliente"><i class="obrigatorio">*</i> Nome:</label>
                    <input type="text" class="form-control" name="cliente[nome-cliente]" placeholder="Ex.: João" maxlength="60" required>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="sobrenome"><i class="obrigatorio">*</i> Sobrenome:</label>
                    <input type="text" class="form-control" name="cliente[sobrenome]" placeholder="Ex.: da Silva" required>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="cpf"><i class="obrigatorio">*</i> CPF:</label>
                    <input type="text" class="form-control" name="cliente[cpf]" data-mask="000.000.000-00" data-mask-reverse="true" placeholder="CPF" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-2 col-sm-offset-2">
                <div class="form-group">
                    <label for="telefone">Data de Nascimento:</label>
                    <input type="text" class="form-control" name="cliente[data-nascimento]" data-mask="00/00/0000" data-mask-reverse="true" placeholder="01/01/1990">
                </div>    
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" class="form-control" name="cliente[telefone]" data-mask="(00) 0000-0000" data-mask-reverse="true" placeholder="(13) 3333-3333">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="celular">Celular:</label>
                    <input type="text" class="form-control" name="cliente[celular]" data-mask="(00) 00000-0000" data-mask-reverse="true" placeholder="(13) 99999-9999">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 col-sm-offset-2">
                <div class="form-group">
                    <label for="cep">CEP:</label>
                    <input type="text" class="form-control" name="cliente[cep]" data-mask="00000-000" data-mask-reverse="true" placeholder="CEP">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select name="cliente[estado]" class="form-control" style="">
                        <option value="AC">AC - Acre</option>
                        <option value="AL">AL - Alagoas</option>
                        <option value="AP">AP - Amapá</option>
                        <option value="AM">AM - Amazonas</option>
                        <option value="BA">BA - Bahia</option>
                        <option value="CE">CE - Ceará</option>
                        <option value="DF">DF - Distrito Federal</option>
                        <option value="ES">ES - Espírito Santo</option>
                        <option value="GO">GO - Goiás</option>
                        <option value="MA">MA - Maranhão</option>
                        <option value="MT">MT - Mato Grosso</option>
                        <option value="MS">MS - Mato Grosso do Sul</option>
                        <option value="MG">MG - Minas Gerais</option>
                        <option value="PA">PA - Pará</option>
                        <option value="PB">PB - Paraíba</option>
                        <option value="PR">PR - Paraná</option>
                        <option value="PE">PE - Pernambuco</option>
                        <option value="PI">PI - Piauí</option>
                        <option value="RJ">RJ - Rio de Janeiro</option>
                        <option value="RN">RN - Rio Grande do Norte</option>
                        <option value="RS">RS - Rio Grande do Sul</option>
                        <option value="RO">RO - Rondônia</option>
                        <option value="RR">RR - Roraima</option>
                        <option value="SC">SC - Santa Catarina</option>
                        <option value="SP" selected>SP - São Paulo</option>
                        <option value="SE">SE - Sergipe</option>
                        <option value="TO">TO - Tocantins</option>
                    </select>
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
            <div class="col-sm-4 col-sm-offset-2">
                <div class="form-group">
                    <label for="endereco">Endereço:</label>
                    <input type="text" class="form-control" name="cliente[endereco]" placeholder="Endereço">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="numero">Número:</label>
                    <input type="text" class="form-control" name="cliente[numero]" data-mask="000000" data-mask-reverse="true" placeholder="Número">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="compl">Complemento:</label>
                    <input type="text" class="form-control" name="cliente[compl]" placeholder="Complemento" maxlength="40">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-2">
                <div class="form-group">
                    <label for="email"><i class="obrigatorio">*</i> E-mail:</label>
                    <input type="email" class="form-control" name="cliente[email]" placeholder="seu@email.com" required>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="senha"><i class="obrigatorio">*</i> Senha:</label>
                    <input type="Password" class="form-control" name="cliente[senha]" placeholder="Senha" required>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="senha2"><i class="obrigatorio">*</i> Confirmar senha:</label>
                    <input type="Password" class="form-control" name="cliente[senha2]" placeholder="Confirmar senha" required>
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
    
    if($_POST['cliente']['senha'] ==  "" || $_POST['cliente']['senha2'] == ""){
        echo '<h2 class="text-center">Você não pode usar uma senha "vazia" :(</h2>';
        return false;
    }
        
    if($_POST['cliente']['senha'] != $_POST['cliente']['senha2']){
        echo '<h2 class="text-center">A senha digitada não confere :(</h2>';
        return false;
    }
    
    $clienteModel->setNmCliente($_POST['cliente']['nome-cliente']);
    $clienteModel->setNmSobrenome($_POST['cliente']['sobrenome']);
    $clienteModel->setIcAdminUsuario('U');
    // Data de Nascimento
    $dtnascimento = $_POST['cliente']['data-nascimento'];
    $dtnascimento = str_replace('/','', $dtnascimento);
    $clienteModel->setDtNascimento($dtnascimento);
    // Telefone
    $telefone = $_POST['cliente']['telefone'];
    $telefone = str_replace(' ','', str_replace('-','', str_replace('(', '', str_replace(')', '', $telefone))));
    $clienteModel->setCdTelefone($telefone);
    // Celular
    $celular = $_POST['cliente']['celular'];
    $celular = str_replace(' ','', str_replace('-','', str_replace('(', '', str_replace(')', '', $celular))));
    $clienteModel->setCdCelular($celular);
    // CPF
    $cpf = $_POST['cliente']['cpf'];
    $cpf = str_replace('-', '', str_replace('.', '', $cpf));
    $clienteModel->setCdCpf($cpf);
    // CEP
    $cep = $_POST['cliente']['cep'];
    $cep = str_replace('-', '', $cep);
    $clienteModel->setCdCep($cep);
    
    $clienteModel->setIcTipoDocumento('F');
    $clienteModel->setNmPais('Brasil');
    $clienteModel->setSgEstado($_POST['cliente']['estado']);
    $clienteModel->setNmCidade($_POST['cliente']['cidade']);
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