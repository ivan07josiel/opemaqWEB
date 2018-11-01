<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "opemaq";

	/**
	*Conexão com banco de dados
	*servidor que é local
	*usuario do banco que é root
	*senha que é por padrão vazia
	*nome do banco de dados
	*/
	$conn = mysqli_connect($servidor,$usuario,$senha,$dbname);