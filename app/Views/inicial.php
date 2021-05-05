<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Code Igniter 4</title>
</head>

<body>

	<?php
	if (session()->has("message")) {
		echo session("message");
	}
	?>
	<h1>Página Inicial!!!!!</h1>

	<a href="/login-estagiario">
		<button>Cadastrar Estagiário</button>
	</a>
	<a href="/login-empregador">
		<button>Cadastrar Empresa/Empregador</button>
	</a>
</body>

</html>