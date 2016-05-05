<?php
//Deletar Registros
function DBDelete($table, $where = null){
	$table = DB_PREFIX . '_' . $table;
	
    if($where){
        DBEscape($where);
        $where = implode(' AND ', $where);
    }
    
    $where = ($where) ? " WHERE {$where}" : null;
           
	$query = "DELETE FROM {$table}{$where}";
	return DBExecute($query);
}

//Exemplo de utilização
/*
	$dropProduto = DBDelete('produto', 'cd_produto = 6');

	var_dump($dropProduto);
*/

//Função para Alterar Dados
	function DBUpdate($table, array $data, $where, $insertId){
		$table = DB_PREFIX . '_' . $table;
		$where = ($where) ? " WHERE {$where}" : null;
        
		foreach ($data as $key => $value) {
            $value = DBEscape($value);
			$fields[] = "{$key} = '{$value}'";
		}
		$fields = implode(', ', $fields);

		$query = "UPDATE {$table} SET {$fields}{$where}";
		return DBExecute($query, $insertId);
	}
//Exemplo de Utilização
/*
	$produto = array(
		'nm_produto' => 'Novo nome para o Produto',
		'ds_produto' => 'Nova descrição para o Produto'
	);

	var_dump(DBUpdate('produto', $produto,"cd_produto = 6", false));
*/

//Função para Ler Dados
	function DBSelect($class_name, $params, $fields){
		$table = DB_PREFIX . '_' . $class_name;
		
		if($params){
            foreach ($params as $key => $value) {
                $value = DBEscape($value);
                $where[] = "{$key} = '{$value}'";
            }
            $params = implode(' AND ', $where);
        }        
        
        $params = ($params) ? " WHERE {$params}" : null;
        
        if($fields){
            DBEscape($fields);
            $fields = implode(', ', $fields);
        } else {
            $fields = '*';
        }
        
		$query = "SELECT {$fields} FROM {$table}{$params}";
		
		$result = DBExecute($query);

		if(!mysqli_num_rows($result)){
			return false;
		}else{
			while ($res = mysqli_fetch_object($result, $class_name)){
				$data[] = $res;
			}
			return $data;
		}
	}

//Exemplo de utilização
/*
	$produtos = DBSelect('produto',"WHERE nm_produto = 'Nome do Produto'",'nm_produto, ds_produto');
	var_dump($produtos);
*/

//Função para Gravar Dados
	function DBInsert($table,array $data, $insertId){
		$table = DB_PREFIX . '_' . $table;
		$data = DBEscape($data);

		$fields = implode(', ', array_keys($data));
		$values = "'".implode("', '", $data)."'";

		$query = "INSERT INTO {$table}({$fields}) VALUES ({$values})";

		return DBExecute($query, $insertId);
	}
//Exemplo de Utilização
/*
	$produto = array(
		'nm_produto' => "Nome do Produto",
		'ds_produto' => "Descrição do Produto"
	);

	$grava = DBCreate('produto',$produto, true);

	if($grava){
		echo "Inserido com sucesso!";
	}else{
		echo "Ocorreu um erro!";
	}
*/

//Função para executar uma Query
	function DBExecute($query, $insertId = false){
		$link = DBConnect();
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		
		if($insertId){
			$result = mysqli_insert_id($link);
		}

		DBClose($link);
		return $result;
	}
//Obs.: Utilizando o insertId como true você pode verificar o retorno como boleano para verificar se o comando foi executado com sucesso ou não. Aplicável em inserção e atualização.

?>