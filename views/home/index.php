<?php
    //DAO->Cliente
   //include "dao/clienteDAO.php";
    include_once "business/clienteNeg.php";
?>
    <h3 class="text-center">Tabela de Clientes</h3>
    <div class="container">
        <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>DDD</th>
                    <th>Telefone</th>
                    <th>Fís./Jur.</th>
                    <th>CPF</th>
                    <th>CNPJ</th>
                    <th>Pais</th>
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th>CEP</th>
                    <th>Bairro</th>
                    <th>Logradouro</th>
                    <th>Número</th>
                    <th>Complemento</th>
                    <th>Email</th>
                    <th>Cartão</th>
                    <th>Operadora</th>
                    <th>Validade</th>
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
            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        </div>
        <div class="modal-body">
            <td><input type="text" value="<?= $atual->getNmCliente()            ?>"/></td>
            <td><input type="text" value="<?= $atual->getNmSobrenome()          ?>"/></td>
            <td><input type="text" value="<?= $atual->getCdDdd()                ?>"/></td>
            <td><input type="text" value="<?= $atual->getCdTelefone()           ?>"/></td>
            <td><input type="text" value="<?= $atual->getIcTipoDocumento()      ?>"/></td>
            <td><input type="text" value="<?= $atual->getCdCpf()                ?>"/></td>
            <td><input type="text" value="<?= $atual->getCdCpf()                ?>"/></td>
            <td><input type="text" value="<?= $atual->getNmPais()               ?>"/></td>
            <td><input type="text" value="<?= $atual->getSgEstado()             ?>"/></td>
            <td><input type="text" value="<?= $atual->getNmCidade()             ?>"/></td>
            <td><input type="text" value="<?= $atual->getCdCep()                ?>"/></td>
            <td><input type="text" value="<?= $atual->getNmBairro()             ?>"/></td>
            <td><input type="text" value="<?= $atual->getNmRua()                ?>"/></td>
            <td><input type="text" value="<?= $atual->getCdNumero()             ?>"/></td>
            <td><input type="text" value="<?= $atual->getDsComplemento()        ?>"/></td>
            <td><input type="text" value="<?= $atual->getNmEmailCliente()       ?>"/></td>
            <td><input type="text" value="<?= $atual->getCdCartaoCliente()      ?>"/></td>
            <td><input type="text" value="<?= $atual->getCdOperadoraCartao()    ?>"/></td>
            <td><input type="text" value="<?= $atual->getDtValidadeCartao()     ?>"/></td>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
</div>
<?php } ?>