<!DOCTYPE html>
<html lang="pt_BR">
<head>
	<meta charset="UTF-8">
	<title>Simplepayment</title>
</head>
<body>

<?php
    require 'web/config.php';
    require 'web/connection.php';
    require 'web/dao/clienteDAO.php';

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
?>

Hello Word

</body>
</html>