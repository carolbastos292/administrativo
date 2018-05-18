<?php
	session_start();
	session_destroy();
	//remover todas as informações contidas nas variaveis globais
	unset(  $_SESSION['usuarioId'],
			$_SESSION['usuarioNome'],
			$_SESSION['usuarioLogin'],
			$_SESSION['usuarioSenha']);
	//redirecionar o usuario para a pagina de login
	header("Location: views/login.php");
?>