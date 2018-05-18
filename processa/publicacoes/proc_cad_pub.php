
<?php 
	session_start();
	include_once("../../seguranca.php");
	include_once("../../conexao.php");
	$ano			=$_POST["ano"];
	$titulo			=$_POST["titulo"];
	$autor			=$_POST["autor"];
	$dir_arquivo	=$_FILES['dir_arquivo']['name'];
	//pasta onde o arquivo vai ser salvo
	$_UP['pasta'] = '../../upload_pdf/';
	//tamanho máximo do arquivo 
	$_UP['tamanho'] = 2 * 1000 * 1000;

	//Array com as extensões permitidas
	$_UP['extensoes'] = array('pdf');
	// Renomeia o arquivo
	$_UP['renomeia'] = false;
	//array com os tipo de erros de upload do php
	$_UP['erros'][0] = 'Nao houve erro';
	$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do php';
	$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no html';
	$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
	$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

	//Faz a verificacao da extensao do arquivo
	$extensao = strtolower(end(explode('.', $_FILES['dir_arquivo']['name'] )));
	if(array_search($extensao, $_UP['extensoes'])=== false){
		echo "

		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=9'>
		<script type=\"text/javascript\">
			alert(\"Por favor envie arquivos com a seguinte extensao: pdf\");
		</script>
		";
	}

	//faz a verificação do tamanho do arquivo
	//define('MB', 1048576);
	if ($_FILES['dir_arquivo']['size'] > $_UP['tamanho']){
		echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=9'>
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
			$nome_final = time().'.pdf';
		}else{
			//mantem o nome original do arquivo
			$nome_final = $_FILES['dir_arquivo']['name'];
		}
		//Verificar se é possivel mover o arquivo para a pasta upload_img
		if(move_uploaded_file($_FILES['dir_arquivo']['tmp_name'],$_UP['pasta'].$nome_final)){
			//Upload efetuado com sucesso, exibe a msg
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=9'>
				<script type=\"text/javascript\">
					alert(\"Arquivo carregado com sucesso.\");
				</script>
				";
			}else{
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=9'>
					<script type=\"text/javascript\">
						alert(\"Arquivo não carregado! Tente novamente.\");
					</script>
					";

			}
	}

	$query = mysql_query("INSERT INTO publicacoes(ano,titulo,autor,dir_arquivo,created) VALUES('$ano','$titulo','$autor','$dir_arquivo', NOW()) ");



	if(mysql_affected_rows() != 0){
		echo " 

		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=9'>
		<script type=\"text/javascript\">
			alert(\"Publicação cadastrada com sucesso.\");
		</script>
		";
	}
	else {
		echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=9'>
		<script type=\"text/javascript\">
			alert(\"Publicação não cadastrada com sucesso.\");
		</script>
		";
	}
	
?>
