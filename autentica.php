<?php
session_start();
/**
*session_start() cria uma 
*sessão ou resume a sessão
*atual.
*/
include_once("conexao.php");
/**
*include_once()
*Incluindo a conexao.php e 
*garante que ele não seja 
*incluido denovo
*/
$btLogin = filter_input(INPUT_POST,'btLogin',FILTER_SANITIZE_STRING);
/**
*$btLogin é a variavel
*do botão, que o 
*filter_input retorna
*True, se for
*pressionado.
*/
if($btLogin){
	/**
	*Se o botão for
	*pressionado
	*/
	$usuario = filter_input(INPUT_POST,'ctUsuario',FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST,'ctSenha',FILTER_SANITIZE_STRING);
	/**
	*Pega-se as caixas de texto
	*ctUsuario e ctSenha
	*e atribui as variaveis
	*$usuario e $senha.
	*/
	if((!empty($usuario))AND(!empty($senha))){
		/**
		*Caso usuario ou senha
		*não estiver vazio
		*executar procedimento
		*de procura de usuario no banco de dados.
		*echo password_hash($senha, PASSWORD_DEFAULT);
		*/
		$procuraUsuarioBD = "SELECT id,usuario,email,senha FROM login WHERE usuario = '$usuario' or email = '$usuario' LIMIT 1";
		/**
		*Configuração que procura oque foi
		*digitado no campo (usuario ou
		*email) no banco de dados.
		*/
		$resultadoUsuario = mysqli_query($conn,$procuraUsuarioBD);
		/**
		*Aqui ele cria uma query(consulta no BD)
		*com configurações de conexão da var $conn
		*e com as especificações do $procuraUsuarioBD.
		*/
		if($resultadoUsuario){
			/**
			*Caso resultadoUsuario
			*retorne o usuario
			*/
			$row_usuario = mysqli_fetch_assoc($resultadoUsuario);
			/**
			*Obtem as informações
			*da linha do usuario
			*selecionado
			*/
			if(password_verify($senha,$row_usuario['senha'])){
				header("Location: inicio.php");
				/**
				*Metodo password_verify()
				*compara a senha do usuario
				*com a senha criptografada
				*no banco de dados.
				*Caso as senhas coicidirem
				*o usuario acessa a pagina inicio
				*/
				$_SESSION['id'] = $row_usuario['id'];
				$_SESSION['usuario'] = $row_usuario['usuario'];
				$_SESSION['email'] = $row_usuario['email'];
				
			}else{
				controleHeaderMensagem("Login ou Senha incorreto","Location: index.php");
			}
		}
	}else{
		controleHeaderMensagem("Login ou Senha incorreto","Location: index.php");
	}
}else{
	controleHeaderMensagem("Pagina não encontrada","Location: index.php");
}

/**
*Função para controle de exceções
*1° Usuario certo, senha errado
*2° Usuario errado
*3° Invalidação
*/
function controleHeaderMensagem($mensagem,$pagina){
	$_SESSION['msg'] = $mensagem;
	header($pagina);
}
?>