<!DOCTYPE html>
<html lang="pt_BR">
<head>
	<meta charset="UTF-8">
	<title>Simplepayment</title>
</head>
<body>

<?php
    require 'heroku/php/config.php';
    require 'heroku/php/connection.php';
    require 'heroku/php/dao/clienteDAO.php';

    $clienteDAO = new ClienteDAO();
    $clientes = $clienteDAO->listCliente();
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