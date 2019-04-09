<?php
	
	//definições de variáveis
	$servidor = '';
	$usuario  = '';
	$senha    = '';
	$banco    = '';
	
	// conectando ao mysql
	$mysqli = new mysqli($servidor, $usuario, $senha, $banco);
	
	// teste de conexão
	if(mysqli_connect_errno()) trigger_error(mysqli_connect_error());
	?>

<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<title>Projeto Redes</title>
</head>
<body>
		<div class="container">
	<h1>Monitor de Redes</h1>

	
	<form method="POST" >
	Nome: <input type="text" name="nome" />
	IP:   <input type="text" name="ip" />
	Usuário <input type="text" name="usuario" />
	
	<input type="submit" />
		
		
		</form>
	
	
	
	
	
	

	<table border='1' class="table bordered-table">
	<tr>
	<th>Nome</th>
	<th>IP</th>
	<th>Usuário</th>
	<th>Status</th>
	</tr>
	<?php
	$sql = "select * from computadores";
	$query = $mysqli->query($sql);
	while($dados = $query->fetch_array()) 
	{
		$nome = $dados['nome'];
		$ip = $dados['ip'];
		$usuario = $dados['usuario'];
		echo "
		<tr>
		<td>$nome</td>
		<td>$ip</td>
		<td>$usuario</td>
		<td>".verificaStatus($ip)."</td>
		<tr>";
	}
	
	?>
	
	</table>
	</div>
	<?php
		function verificaStatus($ip) {
	$ping = `ping $ip -n 1 -l 1`;
	if (preg_match("/bytes=/", $ping)) {
	return "online";} else {
	return "offline";
	}
	}
	?>
	
	
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
