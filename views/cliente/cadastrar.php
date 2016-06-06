<?php 

    include_once "business/clienteNeg.php";
    
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
        $clienteModel->setDtNascimento($_POST['cliente']['data-nascimento']);
        
        // Telefone
        $telefone = $_POST['cliente']['telefone'];
        if(strlen($telefone) == 14){
            $telefone = str_replace(' ','', str_replace('-','', str_replace('(', '', str_replace(')', '', $telefone))));
            $clienteModel->setCdTelefone($telefone);
        }
        // Celular
        $celular = $_POST['cliente']['celular'];
        if(strlen($celular) == 15){
            $celular = str_replace(' ','', str_replace('-','', str_replace('(', '', str_replace(')', '', $celular))));
            $clienteModel->setCdCelular($celular);
        }
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
        <h1 class="text-center"><i class="glyphicon glyphicon-user" style="vertical-align: top;"></i> Cliente – Cadastro</h1>
        <div class="row">
            <div class="col-sm-3 col-sm-offset-2">
                <div class="form-group">
                    <label for="nome-cliente"><i class="obrigatorio">*</i> Nome: </label> <span style="color: #c6c6c6">(6 caracteres)</span>
                    <input type="text" class="form-control" name="cliente[nome-cliente]" placeholder="Ex.: João" maxlength="60" minlength="6" required value="<?php if(isset($clienteModel)){echo $clienteModel->getNmCliente();} ?>">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="sobrenome"><i class="obrigatorio">*</i> Sobrenome:</label> <span style="color: #c6c6c6">(2 caracteres)</span>
                    <input type="text" class="form-control" name="cliente[sobrenome]" placeholder="Ex.: da Silva" maxlength="100" minlength="2" required value="<?php if(isset($clienteModel)){echo $clienteModel->getNmSobrenome();} ?>">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="cpf"><i class="obrigatorio">*</i> CPF:</label>
                    <input type="text" class="form-control" name="cliente[cpf]" data-mask="000.000.000-00" placeholder="CPF" minlength="14" required value="<?php if(isset($clienteModel)){echo $clienteModel->getCdCPF();} ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 col-sm-offset-2">
                <div class="form-group">
                    <label for="data-nascimento">Data de Nascimento:</label>
                    <input type="text" class="form-control" name="cliente[data-nascimento]" data-mask="00/00/0000" placeholder="01/01/1990" value="<?php if(isset($clienteModel)){echo $clienteModel->getDtNascimento();} ?>">
                </div>    
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" class="form-control" name="cliente[telefone]" data-mask="(00) 0000-0000" placeholder="(13) 3333-3333" value="<?php if(isset($clienteModel)){echo $clienteModel->getCdTelefone();} ?>">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="celular">Celular:</label>
                    <input type="text" class="form-control" name="cliente[celular]" data-mask="(00) 00000-0000" placeholder="(13) 99999-9999" value="<?php if(isset($clienteModel)){echo $clienteModel->getCdCelular();} ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 col-sm-offset-2">
                <div class="form-group">
                    <label for="cep">CEP:</label>
                    <input type="text" class="form-control" name="cliente[cep]" data-mask="00000-000" placeholder="CEP" value="<?php if(isset($clienteModel)){echo $clienteModel->getCdCEP();} ?>">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select name="cliente[estado]" class="form-control">
                        <option value="AC" <?php if(isset($clienteModel)){if($clienteModel->getSgEstado() == 'AC'){echo 'selected';}} ?>>AC - Acre</option>
                        <option value="AL" <?php if(isset($clienteModel)){if($clienteModel->getSgEstado() == 'AL'){echo 'selected';}} ?>>AL - Alagoas</option>
                        <option value="AP" <?php if(isset($clienteModel)){if($clienteModel->getSgEstado() == 'AP'){echo 'selected';}} ?>>AP - Amapá</option>
                        <option value="AM" <?php if(isset($clienteModel)){if($clienteModel->getSgEstado() == 'AM'){echo 'selected';}} ?>>AM - Amazonas</option>
                        <option value="BA" <?php if(isset($clienteModel)){if($clienteModel->getSgEstado() == 'BA'){echo 'selected';}} ?>>BA - Bahia</option>
                        <option value="CE" <?php if(isset($clienteModel)){if($clienteModel->getSgEstado() == 'CE'){echo 'selected';}} ?>>CE - Ceará</option>
                        <option value="DF" <?php if(isset($clienteModel)){if($clienteModel->getSgEstado() == 'DF'){echo 'selected';}} ?>>DF - Distrito Federal</option>
                        <option value="ES" <?php if(isset($clienteModel)){if($clienteModel->getSgEstado() == 'ES'){echo 'selected';}} ?>>ES - Espírito Santo</option>
                        <option value="GO" <?php if(isset($clienteModel)){if($clienteModel->getSgEstado() == 'GO'){echo 'selected';}} ?>>GO - Goiás</option>
                        <option value="MA" <?php if(isset($clienteModel)){if($clienteModel->getSgEstado() == 'MA'){echo 'selected';}} ?>>MA - Maranhão</option>
                        <option value="MT" <?php if(isset($clienteModel)){if($clienteModel->getSgEstado() == 'MT'){echo 'selected';}} ?>>MT - Mato Grosso</option>
                        <option value="MS" <?php if(isset($clienteModel)){if($clienteModel->getSgEstado() == 'MS'){echo 'selected';}} ?>>MS - Mato Grosso do Sul</option>
                        <option value="MG" <?php if(isset($clienteModel)){if($clienteModel->getSgEstado() == 'MG'){echo 'selected';}} ?>>MG - Minas Gerais</option>
                        <option value="PA" <?php if(isset($clienteModel)){if($clienteModel->getSgEstado() == 'PA'){echo 'selected';}} ?>>PA - Pará</option>
                        <option value="PB" <?php if(isset($clienteModel)){if($clienteModel->getSgEstado() == 'PB'){echo 'selected';}} ?>>PB - Paraíba</option>
                        <option value="PR" <?php if(isset($clienteModel)){if($clienteModel->getSgEstado() == 'PR'){echo 'selected';}} ?>>PR - Paraná</option>
                        <option value="PE" <?php if(isset($clienteModel)){if($clienteModel->getSgEstado() == 'PE'){echo 'selected';}} ?>>PE - Pernambuco</option>
                        <option value="PI" <?php if(isset($clienteModel)){if($clienteModel->getSgEstado() == 'PI'){echo 'selected';}} ?>>PI - Piauí</option>
                        <option value="RJ" <?php if(isset($clienteModel)){if($clienteModel->getSgEstado() == 'RJ'){echo 'selected';}} ?>>RJ - Rio de Janeiro</option>
                        <option value="RN" <?php if(isset($clienteModel)){if($clienteModel->getSgEstado() == 'RN'){echo 'selected';}} ?>>RN - Rio Grande do Norte</option>
                        <option value="RS" <?php if(isset($clienteModel)){if($clienteModel->getSgEstado() == 'RS'){echo 'selected';}} ?>>RS - Rio Grande do Sul</option>
                        <option value="RO" <?php if(isset($clienteModel)){if($clienteModel->getSgEstado() == 'RO'){echo 'selected';}} ?>>RO - Rondônia</option>
                        <option value="RR" <?php if(isset($clienteModel)){if($clienteModel->getSgEstado() == 'RR'){echo 'selected';}} ?>>RR - Roraima</option>
                        <option value="SC" <?php if(isset($clienteModel)){if($clienteModel->getSgEstado() == 'SC'){echo 'selected';}} ?>>SC - Santa Catarina</option>
                        <option value="SP" <?php if(isset($clienteModel)){if($clienteModel->getSgEstado() == 'SP'){echo 'selected';}}else{echo 'selected';} ?>>SP - São Paulo</option>
                        <option value="SE" <?php if(isset($clienteModel)){if($clienteModel->getSgEstado() == 'SE'){echo 'selected';}} ?>>SE - Sergipe</option>
                        <option value="TO" <?php if(isset($clienteModel)){if($clienteModel->getSgEstado() == 'TO'){echo 'selected';}} ?>>TO - Tocantins</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="cidade">Cidade:</label>
                    <input type="text" class="form-control" name="cliente[cidade]" placeholder="Praia Grande" maxlength="60" value="<?php if(isset($clienteModel)){echo $clienteModel->getNmCidade();} ?>">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="bairro">Bairro:</label>
                    <input type="text" class="form-control" name="cliente[bairro]" placeholder="Boqueirão" maxlength="60" value="<?php if(isset($clienteModel)){echo $clienteModel->getNmBairro();} ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-2">
                <div class="form-group">
                    <label for="endereco">Endereço:</label>
                    <input type="text" class="form-control" name="cliente[endereco]" placeholder="Endereço" maxlength="80" value="<?php if(isset($clienteModel)){echo $clienteModel->getNmRua();} ?>">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="numero">Número:</label>
                    <input type="text" class="form-control" name="cliente[numero]" data-mask="00000000000" placeholder="Número" value="<?php if(isset($clienteModel)){echo $clienteModel->getCdNumero();} ?>">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="compl">Complemento:</label>
                    <input type="text" class="form-control" name="cliente[compl]" placeholder="Complemento" maxlength="40" value="<?php if(isset($clienteModel)){echo $clienteModel->getDsComplemento();} ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-2">
                <div class="form-group">
                    <label for="email"><i class="obrigatorio">*</i> E-mail:</label>
                    <input type="email" class="form-control" name="cliente[email]" placeholder="seu@email.com" maxlength="100" required value="<?php if(isset($clienteModel)){echo $clienteModel->getNmEmailCliente();} ?>">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="senha"><i class="obrigatorio">*</i> Senha:</label> <span style="color: #c6c6c6">(6 caracteres)</span>
                    <input type="Password" class="form-control" name="cliente[senha]" placeholder="Senha" maxlength="32" minlength="6" required>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="senha2"><i class="obrigatorio">*</i> Confirmar senha:</label>
                    <input type="Password" class="form-control" name="cliente[senha2]" placeholder="Confirmar senha" maxlength="32" minlength="6" required>
                </div>
            </div>
        </div>
        <div class="col-sm-offset-2">
            <span class="obrigatorio">* Caracteres obrigatórios.</span><br>
            <span style="color: #c6c6c6">** Caracteres mínimos.</span>
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