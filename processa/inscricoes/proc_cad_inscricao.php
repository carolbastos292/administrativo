
<?php 
	session_start();
	include_once("../../seguranca.php");
	include_once("../../conexao.php");
	$titulo			=$_POST["titulo"];
	$link			=$_POST["link"];

	$query = mysql_query("INSERT INTO inscricoes(titulo,link,data) VALUES('$titulo','$link',NOW()) ");

	if(mysql_affected_rows() != 0){
		echo " 

		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=21'>
		<script type=\"text/javascript\">
			alert(\"Inscricao cadastrada com sucesso.\");
		</script>
		";
	}
	else {
		echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=22'>
		<script type=\"text/javascript\">
			alert(\"Inscricao não cadastrada com sucesso.\");
		</script>
		";
	}
	
?>
