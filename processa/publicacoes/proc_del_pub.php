
<?php
	session_start();
	include_once("../../seguranca.php");
	include_once("../../conexao.php");
	$id_pub			=$_GET["id_pub"];
	$query = "DELETE FROM publicacoes where id_pub = '$id_pub' ";
	$resultado = mysql_query($query);

	if(mysql_affected_rows() != 0){
		echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=9'>
		<script type=\"text/javascript\">
			alert(\"Publicação apagada com sucesso.\");
		</script>
		";
	}
	else {//redireciona para a 
		echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=9'>
		<script type=\"text/javascript\">
			alert(\"Publicação não apagada!\");
		</script>
		";
	}
?>