<?php
	if($_POST){
		$titulo = $_POST['titulo'];
		$descricao_curta = $_POST['descricao_curta'];
		$descricao_longa = $_POST['descricao_longa'];
		$fotografia = $_FILES['fotografia'];

		if(move_uploaded_file($fotografia['tmp_name'], $fotografia['name'])){
			echo $nome.' '.$idade;

		}else
			echo 'Erro no processo'
	}
?>
