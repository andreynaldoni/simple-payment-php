<?php
    include_once "business/clienteNeg.php";
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
                    <th>DDD         </th>
                    <th>Telefone    </th>
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
    $clientes = $ClienteNeg->GetList();
    
    foreach($clientes as $cliente => $atual){
?>
<tr>
    <td><?= $atual->getCdCliente()         ?></td>
    <td><?= $atual->getNmCliente()         ?></td>
    <td><?= $atual->getNmSobrenome()       ?></td>
    <td><?= $atual->getCdDdd()             ?></td>
    <td><?= $atual->getCdTelefone()        ?></td>
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
    <td><button type='button' class='btn btn-primary btn-lg' data-toggle='modal' data-target='#<?= $atual->getCdCliente() ?>'>
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
                    <td><label for="nm_cliente">Nome</label></td>
                    <td><input id="nm_cliente" type="text" value="<?= $atual->getNmCliente()?>"/></td>
                    <td><label for="nm_sobrenome">Sobrenome</label></td>
                    <td><input id="nm_sobrenome" type="text" value="<?= $atual->getNmSobrenome() ?>"/></td>
                </tr>
                <tr>
                    <td><label for="cd_ddd">DDD</label></td>
                    <td><input id="cd_ddd" type="text" value="<?= $atual->getCdDdd() ?>"/></td>
                    <td><label for="">Telefone</label></td>
                    <td><input id="cd_telefone" type="text" value="<?= $atual->getCdTelefone() ?>"/></td>
                </tr>
                <tr>
                    <td><label for="">CPF/CNPJ</label></td>
                    <td><input id="ic_tipo_documento" type="text" value="<?= $atual->getIcTipoDocumento() ?>"/></td>
                    <td><label for="">CPF</label></td>
                    <td><input id="cd_cpf" type="text" value="<?= $atual->getCdCpf() ?>"/></td>
                </tr>
                <tr>
                    <td><label for="">CNPJ</label></td>
                    <td><input id="cd_cnpj" type="text" value="<?= $atual->getCdCnpj() ?>"/></td>
                    <td><label for="">País</label></td>
                    <td><input id="nm_pais" type="text" value="<?= $atual->getNmPais() ?>"/></td>
                </tr>
                <tr>
                    <td><label for="">Estado</label></td>
                    <td><input id="sg_estado" type="text" value="<?= $atual->getSgEstado() ?>"/></td>
                    <td><label for="">Cidade</label></td>
                    <td><input id="nm_cidade" type="text" value="<?= $atual->getNmCidade() ?>"/></td>
                </tr>
                <tr>
                    <td><label for="">CEP</label></td>
                    <td><input id="cd_cep" type="text" value="<?= $atual->getCdCep() ?>"/></td>
                    <td><label for="">Bairro</label></td>
                    <td><input id="nm_bairro" type="text" value="<?= $atual->getNmBairro() ?>"/></td>
                </tr>
                <tr>
                    <td><label for="">Rua</label></td>
                    <td><input id="nm_rua" type="text" value="<?= $atual->getNmRua() ?>"/></td>
                    <td><label for="">Número</label></td>
                    <td><input id="cd_numero" type="text" value="<?= $atual->getCdNumero() ?>"/></td>
                </tr>
                <tr>
                    <td><label for="">Complemento</label></td>
                    <td><input id="ds_complemento" type="text" value="<?= $atual->getDsComplemento() ?>"/></td>
                    <td><label for="">Email</label></td>
                    <td><input id="nm_email_cliente" type="text" value="<?= $atual->getNmEmailCliente() ?>"/></td>
                </tr>
                <tr>
                    <td><label for="">Cartão</label></td>
                    <td><input id="cd_cartao_cliente" type="text" value="<?= $atual->getCdCartaoCliente() ?>"/></td>
                    <td><label for="">Operadora</label></td>
                    <td><input id="cd_operadora_cartao" type="text" value="<?= $atual->getCdOperadoraCartao()?>"/></td>
                </tr>
                <tr>
                    <td><label for="">Validade</label></td>
                    <td><input id="dt_validade_cartao" type="data" value="<?= $atual->getDtValidadeCartao() ?>"/></td>
                </tr>
            </table>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
</div>
<?php } ?>