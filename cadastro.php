<?php
	session_start();
	ob_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Opemaq - Cadastro</title>
</head>
<body>
	<h2>Cadastro</h2>
	<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		/**
		*Se a pagina for atualizada e
		*a variavel $_SESSION tiver
		*valor, ele reseta a variavel.
		*/
	?>
	<form method="POST" action="">
		<input type="text" name="ctNome" placeholder="Digite seu nome"><br><br>
		<input type="text" name="ctEmail" placeholder="Digite seu email"><br><br>
		<input type="text" name="ctUsuario" placeholder="Digite seu usuario"><br><br>
		<input type="password" name="ctSenha" placeholder="Senha"><br>
		<input type="submit" name="btCadastro" value="cadastrar">
		<h4>Ja possui uma conta?</h4>
		<a href="index.php">Entrar!</a>
	</form>
</body>
</html>