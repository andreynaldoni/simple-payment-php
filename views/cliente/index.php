<?php
    include_once "business/clienteNeg.php";
    
    if(!admin_check()){
        redirect('/');
    }
    
    $clienteNeg = new clienteNeg();
    
    if(isset($_POST['update'])){
        $cliente = new Cliente();
        
        $cliente->setCdCliente($_POST['cliente']['codigo']);
        $cliente->setNmCliente($_POST['cliente']['nome-cliente']);
        $cliente->setNmSobrenome($_POST['cliente']['sobrenome']);
        $cliente->setIcAdminUsuario($_POST['cliente']['admin-usuario']);
        $cliente->setIcTipoDocumento($_POST['cliente']['tipo-documento']);
        $cliente->setDtNascimento($_POST['cliente']['data-nascimento']);
        
        // Telefone
        $telefone = $_POST['cliente']['telefone'];
        if(strlen($telefone) == 14){
            $telefone = str_replace(' ','', str_replace('-','', str_replace('(', '', str_replace(')', '', $telefone))));
            $cliente->setCdTelefone($telefone);
        }
        // Celular
        $celular = $_POST['cliente']['celular'];
        if(strlen($celular) == 15){
            $celular = str_replace(' ','', str_replace('-','', str_replace('(', '', str_replace(')', '', $celular))));
            $cliente->setCdCelular($celular);
        }
        // CPF
         if(isset($_POST['cliente']['cpf'])){
            $cpf = $_POST['cliente']['cpf'];
            $cpf = str_replace('-', '', str_replace('.', '', $cpf));
            $cliente->setCdCpf($cpf);
        }else{
            if(strlen($cnpj = $_POST['cliente']['cnpj']) == 18){
                $cnpj = $_POST['cliente']['cnpj'];
                $cnpj = str_replace('-', '', str_replace('.', '', $cnpj));
                $cliente->setCdCnpj($cnpj);
            }else{
                echo '<h2 class="text-center">Você informou um CNPJ inválido :(</h2>';
                return;
            }
        }
        
        $cliente->setNmPais('Brasil');
        $cliente->setSgEstado($_POST['cliente']['estado']);
        $cliente->setNmCidade($_POST['cliente']['cidade']);
        $cliente->setNmBairro($_POST['cliente']['bairro']);
        $cliente->setNmRua($_POST['cliente']['rua']);
        $cliente->setCdNumero($_POST['cliente']['numero']);
        $cliente->setDsComplemento($_POST['cliente']['complemento']);
        $cliente->setNmEmailCliente($_POST['cliente']['email']);
        /*$cliente->setCdCartaoCliente($_POST['cartao-cliente']);
        $cliente->setCdOperadoraCartao($_POST['operadora-cartao']);
        $cliente->setDtValidadeCartao($_POST['validade-cartao']);*/
        
        $clienteNeg->updateCliente($cliente);
    }
    if(isset($_POST['delete'])){
        $clienteNeg->deleteCliente($_POST['codigo']);
    }
    
    $clientes = $clienteNeg->getList();
    
    $row = 1;
    $script = '';
    
?>
    
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading bg-primary">
                <h3 class="text-center" style="margin: 0">Tabela de <?= count($clientes) ?> Cliente(s)</h3>
            </div>
            <div class="table-responsive prod">
                <table class="table table-striped table-hover prod">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>Celular</th>
                            <th>Fís./Jur.</th>
                            <th>CPF</th>
                            <th>CNPJ</th>
                            <th>Email</th>
                            <th class="text-center">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php    
                        foreach($clientes as $cliente => $atual){
                    ?>
                        <tr>
                            <td class="text-center"><?= $atual->getCdCliente() ?></td>
                            <td><?= $atual->getNmCliente() ?></td>
                            <td data-mask="(00) 0000-0000"><?php if($atual->getCdTelefone() != '0') echo $atual->getCdTelefone() ?></td>
                            <td data-mask="(00) 0000-00000"><?php if($atual->getCdCelular() != '0') echo $atual->getCdCelular() ?></td>
                            <td class="text-center"><?= $atual->getIcTipoDocumento() ?></td>
                            <td data-mask="000.000.000-00"><?= $atual->getCdCpf() ?></td>
                            <td data-mask="00.000.000/0000-00"><?= $atual->getCdCnpj() ?></td>
                            <td><?= $atual->getNmEmailCliente()?></td>
                            <td class="text-center"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#<?= $atual->getCdCliente() ?>"  >
                                <i class="glyphicon glyphicon-pencil"></i>
                            </button></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </div>
            </table>
        </div>
    </div>
    <?php foreach($clientes as $cliente => $atual){ ?>
    <div class="modal fade" id="<?= $atual->getCdCliente() ?>"" tabindex="-1" role="dialog" aria-labelledby="ClienteEditar" aria-hidden="true">
        <form method="post" action="<?= HOME_PATH ?>/cliente/index">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h2 class="modal-title text-center" id="ClienteEditar"><b>Editando - <?= $atual->getNmCliente() . " " . $atual->getNmSobrenome() ?></b></h2>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="cliente[codigo]">Código:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input name="cliente[codigo]" type="hidden" value="<?= $atual->getCdCliente()?>"/>
                                <input name="cliente[codigo]" type="text" class="form-control" value="<?= $atual->getCdCliente()?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="cliente[nome-cliente]">Nome:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                                <input name="cliente[nome-cliente]" type="text" class="form-control" value="<?= $atual->getNmCliente()?>" placeholder="Ex.: João" maxlength="60" required>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-sm-6">
                            <label for="cliente[sobrenome]">Sobrenome:</label>
                            <div class="input-group">                                
                                <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                                <input type="text" class="form-control" name="cliente[sobrenome]" value="<?= $atual->getNmSobrenome()?>" placeholder="Ex.: da Silva" maxlength="100" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="cliente[telefone]">Telefone:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input name="cliente[telefone]" type="text" data-mask="(00) 0000-0000" class="form-control" value="<?php if($atual->getCdTelefone() != '0') echo $atual->getCdTelefone() ?>" placeholder="(13) 3333-3333">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-sm-6">
                            <label for="cliente[celular]">Celular:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                <input name="cliente[celular]" type="text" data-mask="(00) 00000-0000" class="form-control" value="<?php if($atual->getCdCelular() != '0') echo $atual->getCdCelular() ?>" placeholder="(13) 99999-9999">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="cliente[tipo-documento]">Fis./Jur.:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                                <select class="form-control" id="tipo-documento<?= $row ?>" name="cliente[tipo-documento]">
                                    <option value="F" <?php if($atual->getIcTipoDocumento() == "F") echo "selected" ?>>F - Físico</option>
                                    <option value="J" <?php if($atual->getIcTipoDocumento() == "J") echo "selected" ?>>J - Jurídico</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-sm-6">
                            <label for="cliente[cpf]">CPF:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input name="cliente[cpf]" id="cpf<?= $row ?>" type="text" class="form-control" data-mask="000.000.000-00" value="<?= $atual->getCdCpf() ?>" placeholder="CPF" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="cliente[cnpj]">CNPJ:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                                <input name="cliente[cnpj]" id="cnpj<?= $row ?>" type="text" class="form-control" data-mask="00.000.000/0000-00" value="<?= $atual->getCdCnpj() ?>" placeholder="CNPJ" required>
                            </div>
                        </div>
                        <!--<div class="col-sm-6">
                            <label for="cliente[pais]">País:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                <input name="cliente[pais]" type="text" class="form-control" value="<= $atual->getNmPais() ?>" maxlength="60">
                            </div>
                        </div>-->
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-sm-6">
                            <label for="cliente[estado]">Estado:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                <select name="cliente[estado]" class="form-control" style="">
                                    <option value="AC" <?php if($atual->getSgEstado() == "AC") echo "selected" ?>>AC - Acre</option>
                                    <option value="AL" <?php if($atual->getSgEstado() == "AL") echo "selected" ?>>AL - Alagoas</option>
                                    <option value="AP" <?php if($atual->getSgEstado() == "AP") echo "selected" ?>>AP - Amapá</option>
                                    <option value="AM" <?php if($atual->getSgEstado() == "AM") echo "selected" ?>>AM - Amazonas</option>
                                    <option value="BA" <?php if($atual->getSgEstado() == "BA") echo "selected" ?>>BA - Bahia</option>
                                    <option value="CE" <?php if($atual->getSgEstado() == "CE") echo "selected" ?>>CE - Ceará</option>
                                    <option value="DF" <?php if($atual->getSgEstado() == "DF") echo "selected" ?>>DF - Distrito Federal</option>
                                    <option value="ES" <?php if($atual->getSgEstado() == "ES") echo "selected" ?>>ES - Espírito Santo</option>
                                    <option value="GO" <?php if($atual->getSgEstado() == "GO") echo "selected" ?>>GO - Goiás</option>
                                    <option value="MA" <?php if($atual->getSgEstado() == "MA") echo "selected" ?>>MA - Maranhão</option>
                                    <option value="MT" <?php if($atual->getSgEstado() == "MT") echo "selected" ?>>MT - Mato Grosso</option>
                                    <option value="MS" <?php if($atual->getSgEstado() == "MS") echo "selected" ?>>MS - Mato Grosso do Sul</option>
                                    <option value="MG" <?php if($atual->getSgEstado() == "MG") echo "selected" ?>>MG - Minas Gerais</option>
                                    <option value="PA" <?php if($atual->getSgEstado() == "PA") echo "selected" ?>>PA - Pará</option>
                                    <option value="PB" <?php if($atual->getSgEstado() == "PB") echo "selected" ?>>PB - Paraíba</option>
                                    <option value="PR" <?php if($atual->getSgEstado() == "PR") echo "selected" ?>>PR - Paraná</option>
                                    <option value="PE" <?php if($atual->getSgEstado() == "PE") echo "selected" ?>>PE - Pernambuco</option>
                                    <option value="PI" <?php if($atual->getSgEstado() == "PI") echo "selected" ?>>PI - Piauí</option>
                                    <option value="RJ" <?php if($atual->getSgEstado() == "RJ") echo "selected" ?>>RJ - Rio de Janeiro</option>
                                    <option value="RN" <?php if($atual->getSgEstado() == "RN") echo "selected" ?>>RN - Rio Grande do Norte</option>
                                    <option value="RS" <?php if($atual->getSgEstado() == "RS") echo "selected" ?>>RS - Rio Grande do Sul</option>
                                    <option value="RO" <?php if($atual->getSgEstado() == "RO") echo "selected" ?>>RO - Rondônia</option>
                                    <option value="RR" <?php if($atual->getSgEstado() == "RR") echo "selected" ?>>RR - Roraima</option>
                                    <option value="SC" <?php if($atual->getSgEstado() == "SC") echo "selected" ?>>SC - Santa Catarina</option>
                                    <option value="SP" <?php if($atual->getSgEstado() == "SP") echo "selected" ?>>SP - São Paulo</option>
                                    <option value="SE" <?php if($atual->getSgEstado() == "SE") echo "selected" ?>>SE - Sergipe</option>
                                    <option value="TO" <?php if($atual->getSgEstado() == "TO") echo "selected" ?>>TO - Tocantins</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="cliente[cidade]">Cidade:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                <input name="cliente[cidade]" type="text" class="form-control" value="<?= $atual->getNmCidade() ?>" maxlength="60" placeholder="Cidade">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-sm-6">
                            <label for="cliente[bairro]">Bairro:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                <input name="cliente[bairro]" type="text" class="form-control" value="<?= $atual->getNmBairro() ?>" maxlength="60" placeholder="Bairro">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="cliente[cep]">CEP:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                                <input name="cliente[cep]" type="text" class="form-control" value="<?= $atual->getCdCep() ?>" data-mask="00000-000" placeholder="CEP">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-sm-6">
                            <label for="cliente[rua]">Logradouro:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                <input name="cliente[rua]" type="text" class="form-control" value="<?= $atual->getNmRua() ?>" maxlength="100" placeholder="Rua">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="cliente[numero]">Número:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                                <input name="cliente[numero]" type="text" class="form-control" value="<?= $atual->getCdNumero() ?>" data-mask="0000000000" placeholder="Nº">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-sm-6">
                            <label for="cliente[complemento]">Complemento:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                <input name="cliente[complemento]" type="text" class="form-control" value="<?= $atual->getDsComplemento() ?>" maxlength="40" placeholder="Complemento">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="cliente[email]">Email:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input name="cliente[email]" type="email" class="form-control" value="<?= $atual->getNmEmailCliente() ?>" maxlength="100" placeholder="Ex.: seu@email.com" required>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <!--<div class="col-sm-6">
                            <label for="cliente[cartao-cliente]">Cartao:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                                <input name="cliente[cartao-cliente]" type="text" class="form-control" value="<?= $atual->getCdCartaoCliente() ?>" maxlength="20">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="cliente[operadora-cartao]">Operadora:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                                <input name="cliente[operadora-cartao]" type="text" class="form-control" value="<?= $atual->getCdOperadoraCartao() ?>" maxlength="100">
                            </div>
                        </div>-->
                        <div class="col-sm-6">
                            <label for="cliente[data-nascimento]">Data de Nascimento:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <?php
                                    if($atual->getDtNascimento() != '0000-00-00'){
                                        $data = date('d-m-Y', strtotime($atual->getDtNascimento()));
                                    }else{
                                        $data = '';
                                    }
                                ?>
                                <input type="text" class="form-control" name="cliente[data-nascimento]" data-mask="00/00/0000" placeholder="01/01/1990" value="<?=  $data ?>">
                            </div>    
                        </div>
                        <div class="col-sm-6">
                            <label for="cliente[admin-usuario]">Tipo de acesso:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <select class="form-control" name="cliente[admin-usuario]">
                                    <option value="A" <?php if($atual->getIcAdminUsuario() == "A") echo "selected" ?>>A - Administrador</option>
                                    <option value="U" <?php if($atual->getIcAdminUsuario() == "U") echo "selected" ?>>U - Usuário</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!--<div class="row" style="margin-top: 10px">
                        <div class="col-sm-6">
                            <label for="cliente[validade-cartao]">Validade:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                <input name="cliente[validade-cartao]" type="text" data-mask="00/00/0000"  class="form-control" value="<?= $atual->getDtValidadeCartao() ?>" maxlength="10"/>
                            </div>
                        </div>
                    </div>-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" name="delete" class="btn btn-danger" >Excluir</button>
                    <button type="submit" name="update" class="btn btn-primary" >Salvar</button>
                </div>
                </div>
            </div>
        </form>
    </div>
<?php
        $script .=   "var change" .  $row  . " = function () {" .
                "if($('#tipo-documento" .  $row  . "').val() == 'F'){" .
                        "$('#cpf" .  $row  . "').prop('disabled', false);" .
                        "$('#cnpj" .  $row  . "').prop('disabled', true);". 
                    "}else{" .
                        "$('#cpf" .  $row  . "').prop('disabled', true);" .
                        "$('#cnpj" .  $row  . "').prop('disabled', false);" .
                    "}".
                "};".
                "change" .  $row  . "();" .
                "$('#tipo-documento" .  $row  . "').on('click', function() {" .
                    "change" .  $row  . "()" .
                "});";
        $row++;
     }
     $this->params['script'] = $script;
?>

                    