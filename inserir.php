<?php
	#estabelecendo conexão com o banco de dados
include("conexao.php");

	#recuperando dados do formulário
$nome =     $_POST['nome'];
$ip =       $_POST['ip'];
$usuario =  $_POST['usuario'];

	#inserindo dados
$sql = "insert into computadores (nome, ip, usuario) values ('$nome','$ip','$usuario')";


$query = $mysqli->query($sql);

	header("location:index.php");
?>