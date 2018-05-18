
<?php
	session_start();
	include_once("../../seguranca.php");
	include_once("../../conexao.php");
	
	//$id_album					=$_POST["id_album"];
	$titulo_album				=$_POST["titulo_album"];
	$descricao_album			=$_POST["descricao_album"];
	$capa						=$_FILES['capa']['name'];
	$ficheiro					=$_FILES['ficheiro']['name'];


	//pasta onde o arquivo vai ser salvo
	$_UP['pasta'] = '../../upload_album/';

	//tamanho máximo do arquivo 
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
	/*if($_FILES['capa']['error'] != 0){
		die("Não foi possivel fazer o upload, erro: <br/>".$_UP['erros'].$_FILES['capa']['error']);
			exit; //Pára a execucao do script
	}
	if($_FILES['capa']['error'] != 0){
		 die($_UP['erros'].[$_FILES['capa']['error']]);
		 exit(); //Para a execução do script
	}﻿*/
	//Faz a verificacao da extensao do arquivo
	$extensao = strtolower(end(explode('.', $_FILES['capa']['name'] )));
	if(array_search($extensao, $_UP['extensoes'])=== false){
		echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=17'>
		<script type=\"text/javascript\">
			alert(\"Por favor envie arquivos com as seguintes extensoes: png, jpg, jpeg e gif\");
		</script>
		";

	}
	//faz a verificação do tamanho do arquivo
	//define('MB', 1048576);
	else if ($_FILES['capa']['size'] > $_UP['tamanho']){
		echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=17'>
		<script type=\"text/javascript\">
			alert(\"O arquivo enviado é muito grande, envie arquivos de até 2M\");
		</script>
		";

	}
	//o arquivo passou em todas as verificacoes, hora de tentar move-lo para a pasta upload_album
	else {
		//verific se deve trocar o nome do arquivo
		if($_UP['renomeia'] == true) {
			//Cria um nome baseado no UNIX timestamp atual e com extensão .jpg
			$nome_final = time().'.jpg';
		}else{
			//mantem o nome original do arquivo
			$nome_final = $_FILES['capa']['name'];
		}
		//Verificar se é possivel mover o arquivo para a pasta upload_album
		if(move_uploaded_file($_FILES['capa']['tmp_name'],$_UP['pasta'].$nome_final)){
			//Upload efetuado com sucesso, exibe a msg
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=17'>
				<script type=\"text/javascript\">
					alert(\"Capa carregada com sucesso.\");
				</script>
				";
			}else{
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=17'>
					<script type=\"text/javascript\">
						alert(\"Capa não carregada! Tente novamente.\");
					</script>
					";

			}
			
			mkdir("../../upload_album/fotos/$titulo_album", 0777, true);
			$diretorio = "../../upload_album/fotos/$titulo_album/";
			$_SESSION['titulo_album'] = "$titulo_album";


			if (!is_dir($diretorio)){ 
			echo "Pasta $diretorio nao existe";
			} 
			else { 
				$ficheiro = isset($_FILES['ficheiro']) ? $_FILES['ficheiro'] : FALSE;
				 
					for ($k = 0; $k < count($ficheiro['name']); $k++)
						{
						   $destino = $diretorio."/".$ficheiro['name'][$k];

						    if (move_uploaded_file($ficheiro['tmp_name'][$k], $destino)) {
						    	$aviso = 1;

						    }
						    else {
						    	$aviso = 0;
						    }
						}
					if($aviso =1){
						echo "
							<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=17'>
							<script type=\"text/javascript\">
								alert(\"Ficheiro carregado com sucesso.\");
							</script>
							";
					}else{
						echo "
							<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=17'>
							<script type=\"text/javascript\">
								alert(\"Ficheiro não carregado com sucesso.\");
							</script>
							";

					}		
			} // fecha else se encontrou diretorio arquivo

			$query = mysql_query("INSERT INTO galeria(titulo_album,descricao_album,capa,ficheiro,created) VALUES('$titulo_album','$descricao_album','$capa','$ficheiro',NOW()) ");
			if(mysql_affected_rows() != 0){
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=17'>
				<script type=\"text/javascript\">
					alert(\"Album cadastrado com sucesso.\");
				</script>
				";
			}
			else {
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=17'>
				<script type=\"text/javascript\">
					alert(\"Album não cadastrado com sucesso.\");
				</script>
				";
			}
	}
	
?>