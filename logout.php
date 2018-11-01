<?php
session_start();
/**
*Destroi as variaveis
*armazenadas em $_SESSION
*e redireciona pro index.php
*/
unset($_SESSION['id'],$_SESSION['usuario'],$_SESSION['email']);
$_SESSION['msg'] = "Deslogado com sucesso";
header("Location: index.php");