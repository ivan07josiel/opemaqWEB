<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Opemaq</title>

	<!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!-- JQuery -->
    <script src="scripts/jquery.js" type="text/javascript"></script>
    
    <!-- Bootstrap core JS -->
    <script src="scripts/bootstrap.js" type="text/javascript"></script>
</head>
<body>
	<!-- Incluindo menu da página -->
	<?php require_once "templates/header.php"; ?>

	<?php 
		/**
		*Checa se a variavel ta vazia
		*parte do codigo responsavel por
		*segurança da rentrada na pagina.
		*/
		if(!empty($_SESSION['id']) OR $_SESSION['id'] == 0){
			echo "OLA ".$_SESSION['usuario']."<br>";
			echo "<a href='logout.php'>Sair</a>";
		}else{
			$_SESSION['msg'] = "Deslogado com sucesso";
			header("Location: index.php");
		}
	?>
</body>
</html>