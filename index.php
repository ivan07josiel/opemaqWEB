<?php
	session_start();
?>


<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="Igor" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Opemaq</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="POST" action="autentica.php">
      <img class="mb-4" src="css/logo.png" alt="" width="206" height="93">

      <h1 class="h3 mb-3 font-weight-normal">Login Opemaq</h1><br>
      <input type="text" name="ctUsuario" class="form-control" placeholder="Email ou Usuario" required autofocus><br>

      <input type="password" name="ctSenha" class="form-control" placeholder="Senha" required><br>
      <input class="btn btn-lg btn-primary btn-block" type="submit" value="Entrar" name="btLogin"><br>
      <h6>Você ainda não possui uma conta?</h6>
      <a href="cadastro.php">Criar agora!</a>
      <br>
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
    </form>
  </body>
</html>
