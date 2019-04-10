<?php
	
	//definições de variáveis
	$servidor = 'localhost:3307';
	$usuario  = 'root';
	$senha    = 'p@ssw0rd';
	$banco    = 'monitorderedes';
	
	// conectando ao mysql
	$mysqli = new mysqli($servidor, $usuario, $senha, $banco);
	
	// teste de conexão
	if(mysqli_connect_errno()) trigger_error(mysqli_connect_error());
?>
