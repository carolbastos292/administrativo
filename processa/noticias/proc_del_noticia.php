
<?php
	session_start();
	include_once("../../seguranca.php");
	include_once("../../conexao.php");
	$id_noticia			=$_GET["id_noticia"];
	$query = "DELETE FROM noticias where id_noticia = '$id_noticia' ";
	$resultado = mysql_query($query);

	if(mysql_affected_rows() != 0){
		echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=5'>
		<script type=\"text/javascript\">
			alert(\"Noticia apagada com sucesso.\");
		</script>
		";
	}
	else {
		echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=5'>
		<script type=\"text/javascript\">
			alert(\"Noticia não apagada!\");
		</script>
		";
	}
?>