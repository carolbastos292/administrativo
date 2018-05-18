<?php
ob_start();
if(($_SESSION['usuarioId'] == "") || ($_SESSION['usuarioNome'] == "" ) || ($_SESSION['usuarioLogin'] == "" ) || ($_SESSION['usuarioSenha'] == "" )) {
	unset(  $_SESSION['usuarioId'],
			$_SESSION['usuarioNome'],
			$_SESSION['usuarioLogin'],
			$_SESSION['usuarioSenha']);

	//Mensagem de erro
	$_SESSION['loginErro'] = "Area restrita para usuarios cadastrados";
	
	//Manda o usuário para a tela de login
	header("Location: login.php");
} 