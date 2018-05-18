
<?php
	session_start();
	include_once("../../seguranca.php");
	include_once("../../conexao.php");
	$id_album			=$_GET["id_album"];
	$query = "DELETE FROM galeria where id_album = '$id_album' ";
	$resultado = mysql_query($query);

	if(mysql_affected_rows() != 0){
		echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=17'>
		<script type=\"text/javascript\">
			alert(\"Album apagado com sucesso.\");
		</script>
		";
	}
	else {//redireciona para a 
		echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=17'>
		<script type=\"text/javascript\">
			alert(\"Album não apagado!\");
		</script>
		";
	}
?>