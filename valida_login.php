<?php
	session_start();
	$usuariot = $_POST['usuario'];
	$senhat = $_POST['senha'];
	include_once("conexao.php");

	$result = mysql_query("SELECT * FROM usuarios WHERE login='$usuariot' AND senha='$senhat' LIMIT 1");
	$resultado = mysql_fetch_assoc($result);
	//$resultado['nome'];
	//echo "Usuario: ".$resultado['nome'];
	if(empty($resultado)){ //nao encontrou o dado no banco
		//Mensagem de erro
		$_SESSION['loginErro'] = "Login ou senha inválida";
		//Manda o usuario para a tela de login
		header("Location: login.php");
	}
	else{
		//Define os valores atribuidos na sessao do usuario
		$_SESSION['usuarioId'] = $resultado['id'];
		$_SESSION['usuarioNome'] = $resultado['nome'];
		$_SESSION['usuarioLogin'] = $resultado['login'];
		$_SESSION['usuarioSenha'] = $resultado['senha'];

		
		header("Location: views/administrativo.php");
	}
 ?>