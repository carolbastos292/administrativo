<?php
	session_start();
	include_once("../../seguranca.php");
	include_once("../../conexao.php");
	$id_pub			=	$_POST["id_pub"];
	$ano			=	$_POST["ano"];
	$titulo			=	$_POST["titulo"];
	$autor			=	$_POST["autor"];
	$dir_arquivo	=	$_FILES['dir_arquivo']['name'];
	$pdf_antigo	    =   $_POST["pdf_antigo"];

	if($dir_arquivo == ""){
		$query = mysql_query("UPDATE publicacoes SET 
		ano = '$ano', 
		titulo = '$titulo', 
		autor = '$autor', 
		dir_arquivo = '$dir_arquivo',
		modified = NOW() WHERE id_pub = '$id_pub' ");
		if(mysql_affected_rows() != 0){
			echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=9'>
			<script type=\"text/javascript\">
				alert(\"Publicação editada com sucesso.\");
			</script>
			";
		}
		else { 
			echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=9'>
			<script type=\"text/javascript\">
				alert(\"Publicação não editada!\");
			</script>
			";
		}
	}else{
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
			$query = mysql_query("UPDATE publicacoes SET 
			ano = '$ano', 
			titulo = '$titulo', 
			autor = '$autor', 
			modified = NOW() WHERE id_pub = '$id_pub' ");
			if(mysql_affected_rows() != 0){
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=9'>
				<script type=\"text/javascript\">
					alert(\"O arquivo não foi alterado por favor, envie arquivos com as seguintes extensões: pdf. As informações da publicacao foi alterada com sucesso.\");
				</script>
				";
			}
			else { 
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=9'>
				<script type=\"text/javascript\">
					alert(\"Publicação não editada!\");
				</script>
				";
			}
		}

		//faz a verificação do tamanho do arquivo
		//define('MB', 1048576);
		else if ($_FILES['dir_arquivo']['size'] > $_UP['tamanho']){
			$query = mysql_query("UPDATE publicacoes SET 
			ano = '$ano', 
			titulo = '$titulo', 
			autor = '$autor', 
			modified = NOW() WHERE id_pub = '$id_pub' ");
			if(mysql_affected_rows() != 0){
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=9'>
				<script type=\"text/javascript\">
					alert(\"O arquivo enviado é muito grande, envie arquivos de até 2mb. As informações da publicacao foram alteradas com sucesso.\");
				</script>
				";
			}
			else { 
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=9'>
				<script type=\"text/javascript\">
					alert(\"Publicação não editada!\");
				</script>
				";
			}

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
				$query = mysql_query("UPDATE publicacoes SET 
				ano = '$ano', 
				titulo = '$titulo', 
				autor = '$autor', 
				dir_arquivo = '$nome_final',
				modified = NOW() WHERE id_pub = '$id_pub' ");
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
	}
?>