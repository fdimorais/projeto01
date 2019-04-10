<?php
	
	//definições de variáveis
	$servidor = 'localhost';
	$usuario  = 'root';
	$senha    = 'faccon';
	$banco    = 'monitorderedes';
	
	// conectando ao mysql
	$mysqli = new mysqli($servidor, $usuario, $senha, $banco);
	
	// teste de conexão
	if(mysqli_connect_errno()) trigger_error(mysqli_connect_error());
?>
