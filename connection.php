<?php

//Abre a conexão com banco de dados
	function DBConnect(){
        $link = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        // Check connection
        if ($link->connect_error) {
            die("Connection failed: " . $link->connect_error);
        }

		mysqli_set_charset($link, DB_CHARSET) OR die(mysqli_error($link));

		return $link;
	}

//Fecha conexão com banco de dados
	function DBClose($link){
		@mysqli_close($link) or die(mysqli_error($link));
	}

//Proteção contra SQL Injection
	function DBEscape($dados){
		$link = DBConnect();
		if(!is_array($dados)){
			$dados = mysqli_real_escape_string($link,$dados);
		}else{
			$arr = $dados;
			foreach ($arr as $key => $value) {
				$key = mysqli_real_escape_string($link,$key);
				$value = mysqli_real_escape_string($link,$value);
				$dados[$key] = $value;
			}
		}
		DBClose($link);
		return $dados;
	}
?>