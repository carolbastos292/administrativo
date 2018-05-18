<?php header('Content-type: text/html; charset=ISO-8859-1');?>
<?php
	session_start();
	include_once("../seguranca.php");
	include_once("../conexao.php");
	$id			=$_GET["id"];
	$query = "DELETE FROM usuarios where id = '$id' ";
	$resultado = mysql_query($query);

	if(mysql_affected_rows() != 0){
		echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=2'>
		<script type=\"text/javascript\">
			alert(\"Usuário apagado com sucesso.\");
		</script>
		";
	}
	else {//redireciona para a 
		echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=2'>
		<script type=\"text/javascript\">
			alert(\"Usuário não apagado com sucesso.\");
		</script>
		";
	}
?>