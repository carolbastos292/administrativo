
<?php
	session_start();
	include_once("../../seguranca.php");
	include_once("../../conexao.php");
	$id_repositorio			=$_GET["id_repositorio"];
	$query = "DELETE FROM repositorio where id_repositorio = '$id_repositorio' ";
	$resultado = mysql_query($query);

	if(mysql_affected_rows() != 0){
		echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=13'>
		<script type=\"text/javascript\">
			alert(\"Repositorio apagada com sucesso.\");
		</script>
		";
	}
	else {
		echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=13'>
		<script type=\"text/javascript\">
			alert(\"Repositorio não apagada!\");
		</script>
		";
	}
?>