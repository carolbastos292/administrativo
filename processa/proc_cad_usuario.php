<?php header('Content-type: text/html; charset=ISO-8859-1');?>
<?php
	session_start();
	include_once("../seguranca.php");
	include_once("../conexao.php");
	$nome			=$_POST["nome"];
	$login			=$_POST["login"];
	$senha			=$_POST["senha"];
	$query = mysql_query("INSERT INTO usuarios(nome,login,senha,created) VALUES('$nome','$login','$senha', NOW()) ");
	if(mysql_affected_rows() != 0){
		echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=2'>
		<script type=\"text/javascript\">
			alert(\"Usuário cadastrado com sucesso.\");
		</script>
		";
	}
	else {//redireciona para a 
		echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/labted/adm/views/administrativo.php?link=2'>
		<script type=\"text/javascript\">
			alert(\"Usuário não cadastrado com sucesso.\");
		</script>
		";
	}
?>