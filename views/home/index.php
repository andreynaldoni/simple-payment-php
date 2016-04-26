<?php
    //DAO->Cliente
    include "dao/clienteDAO.php";
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
                $clienteDAO = new ClienteDAO();
                $clientes = $clienteDAO->listCliente();
                
                foreach($clientes as $cliente => $atual){
                    $linha =    "<td>" . $atual->getCdCliente() . "</td>".
                                "<td>" . $atual->getNmCliente() . "</td>".
                                "<td>" . $atual->getNmSobrenome() . "</td>".
                                "<td>" . $atual->getCdDdd() . "</td>".
                                "<td>" . $atual->getCdTelefone() . "</td>".
                                "<td>" . $atual->getIcTipoDocumento() . "</td>".
                                "<td>" . $atual->getCdCpf() . "</td>".
                                "<td>" . $atual->getCdCpf() . "</td>".
                                "<td>" . $atual->getNmPais() . "</td>".
                                "<td>" . $atual->getSgEstado() . "</td>".
                                "<td>" . $atual->getNmCidade() . "</td>".
                                "<td>" . $atual->getCdCep() . "</td>".
                                "<td>" . $atual->getNmBairro() . "</td>".
                                "<td>" . $atual->getNmRua() . "</td>".
                                "<td>" . $atual->getCdNumero() . "</td>".
                                "<td>" . $atual->getDsComplemento() . "</td>".
                                "<td>" . $atual->getNmEmailCliente() . "</td>".
                                "<td>" . $atual->getCdCartaoCliente() . "</td>".
                                "<td>" . $atual->getCdOperadoraCartao() . "</td>".
                                "<td>" . $atual->getDtValidadeCartao() . "</td>".
                                "<td><button type='button' class='btn btn-primary btn-lg' data-toggle='modal' data-target='#myModal'>
                                    Editar
                                </button></td>".
                                "";
                    echo "<tr>" . $linha . "</tr>\n";
                }
            ?>
            </tbody>
        </div>
    </table>
    </div>
    
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    
    <?php
        function modalEdit(){
            
        }
    ?>