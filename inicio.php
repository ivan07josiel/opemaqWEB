<?php
session_start();
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