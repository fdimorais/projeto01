<html>
<head>
<title>Projeto Redes</title>
</head>
<body>
	<h1>Teste de Conexão PHP/MySQL</h1>
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

	<?php
	$sql = "select * from computadores";
	$query = $mysqli->query($sql);
	?>

	
	<table border='1'>
	<tr>
	<th>Nome</th>
	<th>IP</th>
	<th>Usuário</th>
	<th>Status</th>
	</tr>

	<?php
	while($dados = $query->fetch_array()) 
	{
		$nome = $dados['nome'];
		$ip = $dados['ip'];
		$usuario = $dados['usuario'];
		echo "
		<tr><td>$nome</td><td>$ip</td><td>usuario</td>
		<td>".verificaStatus($ip)."</td>
		<tr/>";
	}
	

	function verificaStatus($ip) {
	$ping = `ping $ip -n 1 -l 1`;
 
	if (preg_match("/bytes=/", $ping)) {
	return "online";} else {
	return "offline";
	}
	}
	?>
	
	</table>
	
	
	
	
</body>
</html>
