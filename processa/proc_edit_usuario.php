<?php header('Content-type: text/html; charset=ISO-8859-1');?>
<?php
	session_start();
	include_once("../seguranca.php");
	include_once("../conexao.php");
	$id			    =$_POST["id"];
	$nome			=$_POST["nome"];
	$login			=$_POST["login"];
	$senha			=$_POST["senha"];
	$query = mysql_query("UPDATE usuarios SET 
		nome = '$nome', 
		login = '$login', 
		senha = '$senha', 
		modified = NOW() 
		WHERE id = '$id' ");
	if(mysql_affected_rows() != 0){
		echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=2'>
		<script type=\"text/javascript\">
			alert(\"Usuário editado com sucesso.\");
		</script>
		";
	}
	else {//redireciona para a 
		echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=2'>
		<script type=\"text/javascript\">
			alert(\"Usuário não editado com sucesso.\");
		</script>
		";
	}
?>