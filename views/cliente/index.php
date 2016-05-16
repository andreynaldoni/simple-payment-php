<?php
    include_once "business/clienteNeg.php";
    
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
        
        $_SESSION['clienteUpdate'] = $cliente;
        
        $clienteNeg = new clienteNeg();
        $clienteNeg->updateCliente();
    }
    if(isset($_POST['delete'])){
        $_SESSION['cd_cliente'] = $_POST['cd_cliente'];
                
        $clienteNeg = new clienteNeg();
        $clienteNeg->deleteCliente();
    }
?>
    <h3 class="text-center">Tabela de Clientes</h3>
    <div class="container">
        <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID          </th>
                    <th>Nome        </th>
                    <th>Sobrenome   </th>
                    <th>Telefone    </th>
                    <th>Celular     </th>
                    <th>Fís./Jur.   </th>
                    <th>CPF         </th>
                    <th>CNPJ        </th>
                    <th>Pais        </th>
                    <th>Estado      </th>
                    <th>Cidade      </th>
                    <th>CEP         </th>
                    <th>Bairro      </th>
                    <th>Logradouro  </th>
                    <th>Número      </th>
                    <th>Complemento </th>
                    <th>Email       </th>
                    <th>Cartão      </th>
                    <th>Operadora   </th>
                    <th>Validade    </th>
                </tr>
            </thead>
            <tbody>
<?php
    $ClienteNeg = new clienteNeg();
    $clientes = $ClienteNeg->getList();
    
    foreach($clientes as $cliente => $atual){
?>
<tr>
    <td><?= $atual->getCdCliente()         ?></td>
    <td><?= $atual->getNmCliente()         ?></td>
    <td><?= $atual->getNmSobrenome()       ?></td>
    <td><?= $atual->getCdTelefone()        ?></td>
    <td><?= $atual->getCdCelular()         ?></td>
    <td><?= $atual->getIcTipoDocumento()   ?></td>
    <td><?= $atual->getCdCpf()             ?></td>
    <td><?= $atual->getCdCpf()             ?></td>
    <td><?= $atual->getNmPais()            ?></td>
    <td><?= $atual->getSgEstado()          ?></td>
    <td><?= $atual->getNmCidade()          ?></td>
    <td><?= $atual->getCdCep()             ?></td>
    <td><?= $atual->getNmBairro()          ?></td>
    <td><?= $atual->getNmRua()             ?></td>
    <td><?= $atual->getCdNumero()          ?></td>
    <td><?= $atual->getDsComplemento()     ?></td>
    <td><?= $atual->getNmEmailCliente()    ?></td>
    <td><?= $atual->getCdCartaoCliente()   ?></td>
    <td><?= $atual->getCdOperadoraCartao() ?></td>
    <td><?= $atual->getDtValidadeCartao()  ?></td>
    <td><button type='button' class='btn btn-primary btn-lg' data-toggle='modal' data-target="#<?= $atual->getCdCliente() ?>"  >
        Editar
    </button></td>
</tr>

<?php } ?>

</tbody>
</div>
</table>
</div>
<?php foreach($clientes as $cliente => $atual){ ?>
<div class="modal fade" id='<?= $atual->getCdCliente() ?>' tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form method="post" action="<?= HOME_PATH ?>/cliente/index">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Editando <?= $atual->getNmCliente() . " " . $atual->getNmSobrenome() ?></h4>
        </div>
        <div class="modal-body">
            <div class="table-responsive">
            
                <table class="table table-striped">
                    <tr>
                        <td colspan="4" align="center">
                            <label for="cd_cliente">Código</label>
                            <input name="cd_cliente" type="text" value="<?= $atual->getCdCliente()?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="nm_cliente">Nome</label></td>
                        <td><input name="nm_cliente" type="text" value="<?= $atual->getNmCliente()?>"/></td>
                        <td><label for="nm_sobrenome">Sobrenome</label></td>
                        <td><input name="nm_sobrenome" type="text" value="<?= $atual->getNmSobrenome() ?>"/></td>
                    </tr>
                    <tr>
                        <td><label for="">Telefone</label></td>
                        <td><input name="cd_telefone" type="text" value="<?= $atual->getCdTelefone() ?>"/></td>
                        <td><label for="">Celular</label></td>
                        <td><input name="cd_telefone" type="text" value="<?= $atual->getCdCelular() ?>"/></td>
                    </tr>
                    <tr>
                        <td><label for="">CPF/CNPJ</label></td>
                        <td><input name="ic_tipo_documento" type="text" value="<?= $atual->getIcTipoDocumento() ?>"/></td>
                        <td><label for="">CPF</label></td>
                        <td><input name="cd_cpf" type="text" value="<?= $atual->getCdCpf() ?>"/></td>
                    </tr>
                    <tr>
                        <td><label for="">CNPJ</label></td>
                        <td><input name="cd_cnpj" type="text" value="<?= $atual->getCdCnpj() ?>"/></td>
                        <td><label for="">País</label></td>
                        <td><input name="nm_pais" type="text" value="<?= $atual->getNmPais() ?>"/></td>
                    </tr>
                    <tr>
                        <td><label for="">Estado</label></td>
                        <td><input name="sg_estado" type="text" value="<?= $atual->getSgEstado() ?>"/></td>
                        <td><label for="">Cidade</label></td>
                        <td><input name="nm_cidade" type="text" value="<?= $atual->getNmCidade() ?>"/></td>
                    </tr>
                    <tr>
                        <td><label for="">CEP</label></td>
                        <td><input name="cd_cep" type="text" value="<?= $atual->getCdCep() ?>"/></td>
                        <td><label for="">Bairro</label></td>
                        <td><input name="nm_bairro" type="text" value="<?= $atual->getNmBairro() ?>"/></td>
                    </tr>
                    <tr>
                        <td><label for="">Rua</label></td>
                        <td><input name="nm_rua" type="text" value="<?= $atual->getNmRua() ?>"/></td>
                        <td><label for="">Número</label></td>
                        <td><input name="cd_numero" type="text" value="<?= $atual->getCdNumero() ?>"/></td>
                    </tr>
                    <tr>
                        <td><label for="">Complemento</label></td>
                        <td><input name="ds_complemento" type="text" value="<?= $atual->getDsComplemento() ?>"/></td>
                        <td><label for="">Email</label></td>
                        <td><input name="nm_email_cliente" type="text" value="<?= $atual->getNmEmailCliente() ?>"/></td>
                    </tr>
                    <tr>
                        <td><label for="">Cartão</label></td>
                        <td><input name="cd_cartao_cliente" type="text" value="<?= $atual->getCdCartaoCliente() ?>"/></td>
                        <td><label for="">Operadora</label></td>
                        <td><input name="cd_operadora_cartao" type="text" value="<?= $atual->getCdOperadoraCartao()?>"/></td>
                    </tr>
                    <tr>
                        <td><label for="">Validade</label></td>
                        <td><input name="dt_validade_cartao" type="data" value="<?= $atual->getDtValidadeCartao() ?>"/></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="update" class="btn btn-primary" >Salvar</button>
            <button type="submit" name="delete" class="btn btn-primary" >Excluir</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
        </div>
    </div>
    </form>
</div>
<?php } ?>