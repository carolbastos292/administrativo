<?php
	
	session_start();
	include_once("../../seguranca.php");
	include_once("../../conexao.php");
	
	$titulo_rep						=$_POST["titulo_rep"];
	$imagem_rep						=$_FILES['imagem_rep']['name'];
	$arquivo_rep					=$_FILES['arquivo_rep']['name'];
	//pastaa onde o arquivo vai ser salvo
	$_UP['pasta'] = '../../upload_rep/';
	//tamanho máximo do arquivo 
	//1048576 corresponde a 1 MB
	$_UP['tamanho'] = 50 * 1000 * 1000;

	//Array com as extensões permitidas
	$_UP['extensoes'] = array('png','jpg','jpeg','gif');
	//$_UP['extensoesArquivo'] = array('apk','rar');
	// Renomeia o arquivo
	$_UP['renomeia'] = false;
	//array com os tipo de erros de upload do php
	$_UP['erros'][0] = 'Nao houve erro';
	$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do php';
	$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no html';
	$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
	$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

	if($_FILES['imagem_rep']['name'] !==  ""){
		//Faz a verificacao da extensao do arquivo
		$extensao = strtolower(end(explode('.', $_FILES['imagem_rep']['name'] )));
		if(array_search($extensao, $_UP['extensoes'])=== false){
			echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=13'>
			<script type=\"text/javascript\">
				alert(\"Por favor envie arquivos com as seguintes extensoes: png, jpg, jpeg e gif 888888\");
			</script>
			";
		}
		
		//faz a verificação do tamanho do arquivo
		else if ($_FILES['imagem_rep']['size'] > $_UP['tamanho']){
			echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=13'>
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
				$nome_final = $_FILES['imagem_rep']['name'];
			}
			//Verificar se é possivel mover o arquivo para a pasta upload_img
			if(move_uploaded_file($_FILES['imagem_rep']['tmp_name'],$_UP['pasta'].$nome_final)){
				//Upload efetuado com sucesso, exibe a msg
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=13'>
					<script type=\"text/javascript\">
						alert(\"Imagem carregada com sucesso.\");
					</script>
					";
				}else{
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=13'>
						<script type=\"text/javascript\">
							alert(\"Imagem não carregada! Tente novamente.\");
						</script>
						";

				}

		/*	if(move_uploaded_file($_FILES['arquivo_rep']['tmp_name'],$_UP['pasta'].$nome_final)){
				//Upload efetuado com sucesso, exibe a msg
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=13'>
					<script type=\"text/javascript\">
						alert(\"arquivo carregada com sucesso.\");
					</script>
					";
				}else{
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=13'>
						<script type=\"text/javascript\">
							alert(\"arquivo não carregada! Tente novamente.\");
						</script>
						";

				}*/

				mkdir("../../upload_rep/arquivos/$titulo_rep", 0777, true);
				$diretorio = "../../upload_rep/arquivos/$titulo_rep/";
				$_SESSION['titulo_rep'] = "$titulo_rep";


				if (!is_dir($diretorio)){ 
				echo "Pasta $diretorio nao existe";
				} 
				else { 
					//verific se deve trocar o nome do arquivo
						if($_UP['renomeia'] == true) {
							//Cria um nome baseado no UNIX timestamp atual e com extensão .jpg
							$nome_fim = time().'.apk';
						}else{
							//mantem o nome original do arquivo
							$nome_fim = $_FILES['arquivo_rep']['name'];
						}
						//Verificar se é possivel mover o arquivo para a pasta upload_img
						if(move_uploaded_file($_FILES['arquivo_rep']['tmp_name'],$_UP['pasta'].$nome_fim)){
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
					
				} // fecha else se encontrou diretorio arquivo
		

				$query = mysql_query("INSERT INTO repositorio(titulo_rep,imagem_rep,arquivo_rep,created) VALUES('$titulo_rep','$imagem_rep','$arquivo_rep', NOW()) ");
				if(mysql_affected_rows() != 0){
					echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=13'>
					<script type=\"text/javascript\">
						alert(\"Repositorio cadastrado com sucesso.\");
					</script>
					";
				}
				else {
					echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=13'>
					<script type=\"text/javascript\">
						alert(\"Repositorio não cadastrado com sucesso.\");
					</script>
					";
				}
		}
	}//fecha if se imagem for diferente de vazio
	else {
		echo "	
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=14'>
			<script type=\"text/javascript\">
				alert(\"Você não cadastrou uma imagem.\");
			</script>
			";
	}
	
?>
