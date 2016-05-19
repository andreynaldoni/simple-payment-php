<?php
    include_once "business/clienteNeg.php";
    
    if(!admin_check()){
        redirect('/');
    }
    
    $clienteNeg = new clienteNeg();
    
    if(isset($_POST['update'])){
        $cliente = new Cliente();
        
        $cliente->setCdCliente($_POST['cd_cliente']);
        $cliente->setNmCliente($_POST['nm_cliente']);
        $cliente->setNmSobrenome($_POST['nm_sobrenome']);
        $cliente->setCdTelefone($_POST['cd_telefone']); 
        $cliente->setCdCelular($_POST['cd_celular']); 
        $cliente->setIcTipoDocumento($_POST['ic_tipo_documento']);
        $cliente->setCdCpf($_POST['cd_cpf']);
        $cliente->setCdCnpj($_POST['cd_cnpj']);  
        $cliente->setNmPais($_POST['nm_pais']);
        $cliente->setSgEstado($_POST['sg_estado']);
        $cliente->setNmCidade($_POST['nm_cidade']);
        $cliente->setCdCep($_POST['cd_cep']);
        $cliente->setNmBairro($_POST['nm_bairro']);
        $cliente->setNmRua($_POST['nm_rua']);
        $cliente->setCdNumero($_POST['cd_numero']);
        $cliente->setDsComplemento($_POST['ds_complemento']);
        $cliente->setNmEmailCliente($_POST['nm_email_cliente']);
        $cliente->setCdCartaoCliente($_POST['cd_cartao_cliente']);
        $cliente->setCdOperadoraCartao($_POST['cd_operadora_cartao']);
        $cliente->setDtValidadeCartao($_POST['dt_validade_cartao']);
        
        $clienteNeg->updateCliente($cliente);
    }
    if(isset($_POST['delete'])){
        $clienteNeg->deleteCliente($_POST['cd_cliente']);
    }
    
    $clientes = $clienteNeg->getList();
?>
    
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading bg-primary">
                <h3 class="text-center" style="margin: 0">Tabela de <?= count($clientes) ?> Cliente(s)</h3>
            </div>
            <div class="table-responsive prod">
                <table class="table table-striped prod">
                    <thead>
                        <tr>
                            <th>ID          </th>
                            <th>Nome        </th>
                            <th>Telefone    </th>
                            <th>Celular     </th>
                            <th>Fís./Jur.   </th>
                            <th>CPF         </th>
                            <th>CNPJ        </th>
                            <th>Email       </th>
                            <th>Ação        </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php    
                        foreach($clientes as $cliente => $atual){
                    ?>
                        <tr>
                            <td><?= $atual->getCdCliente()         ?></td>
                            <td><?= $atual->getNmCliente()         ?></td>
                            <td><?= $atual->getCdTelefone()        ?></td>
                            <td><?= $atual->getCdCelular()         ?></td>
                            <td><?= $atual->getIcTipoDocumento()   ?></td>
                            <td><?= $atual->getCdCpf()             ?></td>
                            <td><?= $atual->getCdCnpj()             ?></td>
                            <td><?= $atual->getNmEmailCliente()    ?></td>
                            <td><button type='button' class='btn btn-primary btn-lg' data-toggle='modal' data-target="#<?= $atual->getCdCliente() ?>"  >
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
    <div class="modal fade" id='<?= $atual->getCdCliente() ?>' tabindex="-1" role="dialog" aria-labelledby="ClienteEditar" aria-hidden="true">
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
                            <label for="cliente[cd_cliente]">Código:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input name="cliente[cd_cliente]" type="hidden" value="<?= $atual->getCdCliente()?>"/>
                                <input name="cliente[cd_cliente]" type="text" class="form-control" value="<?= $atual->getCdCliente()?>" disabled/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="cliente[nm_cliente]">Nome:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                                <input name="cliente[nm_cliente]" type="text" class="form-control" value="<?= $atual->getNmCliente()?>" maxlength="60"/>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-sm-6">
                            <label for="cliente[cd_telefone]">Telefone:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input name="cliente[cd_telefone]" type="text" data-mask="(00) 0000-0000" class="form-control" value="<?= $atual->getCdTelefone() ?>" maxlength="15"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="cliente[cd_celular]">Celular:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                <input name="cliente[cd_celular]" type="text" data-mask="(00) 00000-0000" class="form-control" value="<?= $atual->getCdCelular() ?>" maxlength="15"/>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-sm-6">
                            <label for="cliente[ic_tipo_documento]">Fis./Jur.:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                                <select class="form-control" name="cliente[ic_tipo_documento]">
                                    <option value="F">F - Físico</option>
                                    <option value="J">J - Jurídico</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="cliente[cd_cpf]">CPF:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input name="cliente[cd_cpf]" type="text" class="form-control" data-mask="000.000.000-00" data-mask-reverse="true" value="<?= $atual->getCdCpf() ?>" maxlength="100"/>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-sm-6">
                            <label for="cliente[cd_cnpj]">CNPJ:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                                <input name="cliente[cd_cnpj]" type="text" class="form-control" data-mask="00.000.000/0000-00" data-mask-reverse="true" value="<?= $atual->getCdCnpj() ?>" maxlength="100"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="cliente[nm_pais]">País:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                <input name="cliente[nm_pais]" type="text" class="form-control" value="<?= $atual->getNmPais() ?>" maxlength="60"/>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-sm-6">
                            <label for="cliente[sg_estado]">Estado:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                <input name="cliente[sg_estado]" type="text" class="form-control" value="<?= $atual->getSgEstado() ?>" maxlength="2"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="cliente[nm_cidade]">Cidade:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                <input name="cliente[nm_cidade]" type="text" class="form-control" value="<?= $atual->getNmCidade() ?>" maxlength="60"/>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-sm-6">
                            <label for="cliente[cd_cep]">CEP:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                                <input name="cliente[cd_cep]" type="text" class="form-control" value="<?= $atual->getCdCep() ?>" data-mask="00000-000" data-mask-reverse="true"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="cliente[nm_bairro]">Bairro:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                <input name="cliente[nm_bairro]" type="text" class="form-control" value="<?= $atual->getNmBairro() ?>" maxlength="60"/>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-sm-12">
                            <label for="cliente[nm_rua]">Logradouro:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                <input name="cliente[nm_rua]" type="text" class="form-control" value="<?= $atual->getNmRua() ?>" maxlength="100"/>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-sm-6">
                            <label for="cliente[cd_numero]">Número:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                                <input name="cliente[cd_numero]" type="text" class="form-control" value="<?= $atual->getCdNumero() ?>" data-mask="000000" data-mask-reverse="true"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="cliente[ds_complemento]">Complemento:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                <input name="cliente[ds_complemento]" type="text" class="form-control" value="<?= $atual->getDsComplemento() ?>" maxlength="40"/>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-sm-12">
                            <label for="cliente[nm_email_cliente]">Email:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input name="cliente[nm_email_cliente]" type="email" class="form-control" value="<?= $atual->getNmEmailCliente() ?>" maxlength="100"/>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-sm-6">
                            <label for="cliente[cd_cartao_cliente]">Cartao:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                                <input name="cliente[cd_cartao_cliente]" type="text" class="form-control" value="<?= $atual->getCdCartaoCliente() ?>" maxlength="20"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="cliente[cd_operadora_cartao]">Operadora:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                                <input name="cliente[cd_operadora_cartao]" type="text" class="form-control" value="<?= $atual->getCdOperadoraCartao() ?>" maxlength="100"/>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-sm-6">
                            <label for="cliente[dt_validade_cartao]">Validade:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                <input name="cliente[dt_validade_cartao]" type="text" data-mask="00/00/0000" data-mask-reverse="true" class="form-control" value="<?= $atual->getDtValidadeCartao() ?>" maxlength="10"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="cliente[ic_admin_usuario]">Tipo de acesso:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <select class="form-control" name="cliente[ic_admin_usuario]">
                                    <option value="A">A - Administrador</option>
                                    <option value="U">U - Usuário</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="delete" class="btn btn-danger" >Excluir</button>
                    <button type="submit" name="update" class="btn btn-primary" >Salvar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
                </div>
            </div>
        </form>
    </div>
<?php } ?>

                    