
<?php 
	session_start();
	include_once("../../seguranca.php");
	include_once("../../conexao.php");

	$id_album			    	=$_POST["id_album"];
	$titulo_album				=$_POST["titulo_album"];
	$descricao_album			=$_POST["descricao_album"];
	$capa						=$_FILES['capa']['name'];
	$img_antiga					=$_POST["img_antiga"];

	if($capa == ""){
		$query = mysql_query("UPDATE galeria SET
		titulo_album	=			'$titulo_album',
		descricao_album	=			'$descricao_album',
		modified = NOW() WHERE id_album='$id_album' ");

		if(mysql_affected_rows() != 0){
			echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=17'>
			<script type=\"text/javascript\">
				alert(\"Album editado com sucesso.\");
			</script>
			";
		}
		else {
			echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=17'>
			<script type=\"text/javascript\">
				alert(\"Album não editado com sucesso.\");
			</script>
			";
		}

	} else {
				//pasta onde o arquivo vai ser salvo
				$_UP['pasta'] = '../../upload_album/';
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

				//Faz a verificacao da extensao do arquivo
				$extensao = strtolower(end(explode('.', $_FILES['capa']['name'] )));
				if(array_search($extensao, $_UP['extensoes'])=== false){
					$query = mysql_query("UPDATE galeria SET
					titulo_album					=			'$titulo_album',
					descricao_album	=			'$descricao_album',
					modified = NOW() WHERE id_album='$id_album' ");

					if(mysql_affected_rows() != 0){
						echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=17'>
						<script type=\"text/javascript\">
							alert(\"A capa não foi alterada for favor, envie arquivos com as seguintes extensões: png, jpg, jpeg e gif. As informações do album foram alteradas.\");
						</script>
						";
					}
					else {
						echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=17'>
						<script type=\"text/javascript\">
							alert(\"Album não editado com sucesso.\");
						</script>
						";
					}

				}
				//faz a verificação do tamanho do arquivo
				//define('MB', 1048576);
				else if ($_FILES['capa']['size'] > $_UP['tamanho']){
					$query = mysql_query("UPDATE galeria SET
					titulo_album	=			'$titulo_album',
					descricao_album	=			'$descricao_album',
					modified = NOW() WHERE id_album='$id_album' ");

					if(mysql_affected_rows() != 0){
						echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=17'>
						<script type=\"text/javascript\">
							alert(\"O arquivo enviado é muito grande, envie arquivos de até 2mb. As informações da Album foram alteradas com sucesso.\");
						</script>
						";
					}
					else {//redireciona para a 
						echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=17'>
						<script type=\"text/javascript\">
							alert(\"Album não editado com sucesso.\");
						</script>
						";
					}

				}
				//o arquivo passou em todas as verificacoes, hora de tentar move-lo para a pasta upload_img
				else {
					//verific se deve trocar o nome do arquivo
					if($_UP['renomeia'] == true) {
						//Cria um nome baseado no UNIX timestamp atual e com extensão .jpg
						$nome_final = time().'.jpg';
					}else{
						//mantem o nome original do arquivo
						$nome_final = $_FILES['capa']['name'];
					}
					//Verificar se é possivel mover o arquivo para a pasta upload_img
					if(move_uploaded_file($_FILES['capa']['tmp_name'],$_UP['pasta'].$nome_final)){
						//Upload efetuado com sucesso, exibe a msg
						$query = mysql_query("UPDATE galeria SET
						titulo_album	=			'$titulo_album',
						descricao_album	=			'$descricao_album',
						capa 			=         '$nome_final',
						modified = NOW() WHERE id_album='$id_album' ");

						echo "
							<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=17'>
							<script type=\"text/javascript\">
								alert(\"capa carregada com sucesso.\");
							</script>
							";
						}else{
							echo "
								<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=17'>
								<script type=\"text/javascript\">
									alert(\"capa não carregada! Tente novamente.\");
								</script>
								";

						}
				}
		}

		
?>