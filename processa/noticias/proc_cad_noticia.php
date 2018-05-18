<?php
	/*$_UP['tamanho'] = 2 * 1024 * 1024;
//Array com as extensões permitidas
$_UP['extensoes'] = array('png','jpg','jpeg','gif');
$extensao = strtolower(end(explode('.', $_FILES['file']['name'] )));
//faz a verificação do tamanho do arquivo
	if ($_FILES['file']['size'] > $_UP['tamanho']){
		echo 'O arquivo enviado é muito grande, envie arquivos de até 2MB';
	}
	else if(array_search($extensao, $_UP['extensoes'])=== false){
		echo 'Por favor insira imagens com png, jpg, jpeg e gif';
	}
	else{	
		if(move_uploaded_file($_FILES['file']['tmp_name'],$_FILES['file']['name'])){
			echo '
				Foi!
				';
		}else{
			echo 'Erro';
		}
	}*/
	session_start();
	include_once("../../seguranca.php");
	include_once("../../conexao.php");
	
	$titulo						=$_POST["titulo"];
	$descricao_curta			=$_POST["descricao_curta"];
	$descricao_longa			=$_POST["descricao_longa"];
	$imagem						=$_FILES['imagem']['name'];
	//pastaa onde o arquivo vai ser salvo
	$_UP['pasta'] = '../../upload_img/';
	//tamanho máximo do arquivo 
	//1048576 corresponde a 1 MB
	$_UP['tamanho'] = 2 * 1000 * 1000;

	//Array com as extensões permitidas
	$_UP['extensoes'] = array('png','jpg','jpeg','gif');
	// Renomeia o arquivo
	$_UP['renomeia'] = false;
	//array com os tipo de erros de upload do php
	$_UP['erros'][0] = 'Nao houve erro';
	$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do php';
	$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no html';
	$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
	$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
	//Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
	/*if($_FILES['imagem']['error'] != 0){
		die("Não foi possivel fazer o upload, erro: <br/>".$_UP['erros'].$_FILES['imagem']['error']);
			exit; //Pára a execucao do script
	}
	if($_FILES['imagem']['error'] != 0){
		 die($_UP['erros'].[$_FILES['imagem']['error']]);
		 exit(); //Para a execução do script
	}﻿*/
	//Faz a verificacao da extensao do arquivo
	$extensao = strtolower(end(explode('.', $_FILES['imagem']['name'] )));
	if(array_search($extensao, $_UP['extensoes'])=== false){
		echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=5'>
		<script type=\"text/javascript\">
			alert(\"Por favor envie arquivos com as seguintes extensoes: png, jpg, jpeg e gif\");
		</script>
		";

	}
	//faz a verificação do tamanho do arquivo
	//define('MB', 1048576);
	else if ($_FILES['imagem']['size'] > $_UP['tamanho']){
		echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=6'>
		<script type=\"text/javascript\">
			alert(\"O arquivo enviado é muito grande, envie arquivos de até 2M\");
		</script>
		";

	}
	//o arquivo passou em todas as verificacoes, hora de tentar move-lo para a pasta upload_img
	else {
		//verific se deve trocar o nome do arquivo
		if($_UP['renomeia'] == true) {
			//Cria um nome baseado no UNIX timestamp atual e com extensão .jpg
			$nome_final = time().'.jpg';
		}else{
			//mantem o nome original do arquivo
			$nome_final = $_FILES['imagem']['name'];
		}
		//Verificar se é possivel mover o arquivo para a pasta upload_img
		if(move_uploaded_file($_FILES['imagem']['tmp_name'],$_UP['pasta'].$nome_final)){
			//Upload efetuado com sucesso, exibe a msg
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=5'>
				<script type=\"text/javascript\">
					alert(\"Imagem carregada com sucesso.\");
				</script>
				";
			}else{
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=6'>
					<script type=\"text/javascript\">
						alert(\"Imagem não carregada! Tente novamente.\");
					</script>
					";

			}
	

			$query = mysql_query("INSERT INTO noticias(titulo,descricao_curta,descricao_longa,imagem,created) VALUES('$titulo','$descricao_curta','$descricao_longa','$imagem', NOW()) ");
			if(mysql_affected_rows() != 0){
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=5'>
				<script type=\"text/javascript\">
					alert(\"Noticia cadastrada com sucesso.\");
				</script>
				";
			}
			else {
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=5'>
				<script type=\"text/javascript\">
					alert(\"Noticia não cadastrada com sucesso.\");
				</script>
				";
			}
	}
	
?>
