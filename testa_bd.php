<?php 

    include "config.php";
    include DBAPI;

	$db = open_database(); 
	
	if ($db) {
		echo "<h1>Banco de Dados Conectado com PDO!</h1>";
		echo "<p>DSN: mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "</p>";
		echo "<p>Usuário: " . DB_USER . "</p>";
	} else {
		echo "<h1>ERRO: Não foi possível Conectar!</h1>";
	}

?>