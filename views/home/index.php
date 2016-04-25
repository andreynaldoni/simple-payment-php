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
                    <th>Fís. ou Jur.</th>
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
                    <th>Cód. Cartão</th>
                    <th>Cód. Oper. Cartão</th>
                    <th>Validade</th>
                </tr>
            </thead>
            <tbody>
            <?php    
                $clienteDAO = new ClienteDAO();
                $clientes = $clienteDAO->listCliente();
                
                foreach($clientes as $cliente => $atual){
                    $linha =    "<td>" . $atual->getCdCliente() . "</td>".
                                "<td>" . $atual->getNmCliete() . "</td>".
                                "<td>" . $atual->getNmCliente() . "</td>".
                                "";
                    echo "<tr>" . $linha . "</tr>\n";
                }
            ?>
            </tbody>
        </div>
    </table>
    </div>