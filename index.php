<?php

echo '
        <!DOCTYPE html>
        <html lang="pt_BR">
        <head>
            <meta charset="UTF-8">
            <title>Simplepayment</title>
        </head>
        <body>
';

    require 'config.php';
    require 'connection.php';
    require 'dao/clienteDAO.php';

    $clienteDAO = new ClienteDAO();
    $clientes = $clienteDAO->listCliente();
    
    var_dump($clientes);
    
    echo "teste";
    
    foreach($clientes as $cliente => $atual){
        echo '<h4>';
        $linha = '';
            foreach($atual as $coluna => $value){
                $linha = $linha.$value.' ';
            }
            echo $linha;
        echo '</h4>';
    }

echo '
        Hello Word

        </body>
        </html>
';
?>