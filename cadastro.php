<?php
	session_start();
	ob_start();
	$btCadastro = filter_input(INPUT_POST, 'btCadastro' , FILTER_SANITIZE_STRING);
  	if($btCadastro){
		include_once 'conexao.php';
		$dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
		//var_dump($dados);
		$dados['senha'] = password_hash($dados['senha'],PASSWORD_DEFAULT);

		$inserirUsuarioBD = "INSERT INTO login (usuario,email,senha) VALUES(
		'".$dados['usuario']."',
		'".$dados['email']."',
		'".$dados['senha']."'
		)";
		$resultadoUsuario = mysqli_query($conn,$inserirUsuarioBD);
		if(mysqli_insert_id($conn)){
			$_SESSION['msgcadastro'] = "Usuário cadastrado com sucesso";
			header("Location: index.php");
		}
		else{
			$_SESSION['msg'] = "Erro ao cadastrar o usuário";
		}
  	}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Opemaq - Cadastro</title>
</head>
<body class="text-center">
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
	<form class="form-signin" method="POST" action="">
		<h2 class="h3 mb-3 font-weight-normal">Cadastro</h2>
		<input type="text" name="ctNome" placeholder="Digite seu nome" class="form-control"><br><br>
		<input type="text" name="ctEmail" placeholder="Digite seu email" class="form-control"><br><br>
		<input type="text" name="ctUsuario" placeholder="Digite seu usuario" class="form-control"><br><br>
		<input type="password" name="ctSenha" placeholder="Senha" class="form-control"><br>
		<input type="submit" name="btCadastro" value="cadastrar" class="btn btn-lg btn-primary btn-block">
		<h4>Ja possui uma conta?</h4>
		<a href="index.php">Entrar!</a>
	</form>
</body>
</html>