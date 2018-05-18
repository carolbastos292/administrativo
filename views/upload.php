<?php

$_UP['tamanho'] = 2 * 1024 * 1024;
//Array com as extensões permitidas
$_UP['extensoes'] = array('png','jpg','jpeg','gif');
$extensao = strtolower(end(explode('.', $_FILES['file']['name'] )));
//faz a verificação do tamanho do arquivo
	if ($_FILES['file']['size'] > $_UP['tamanho']){
		echo 'O arquivo enviado é muito grande, envie arquivos de até 2MB';
	}
	else if(array_search($extensao, $_UP['extensoes'])=== false){
		echo 'Por favor insira imagens com png, jpg, jpeg e gif';
	}
	else{	
		if(move_uploaded_file($_FILES['file']['tmp_name'],$_FILES['file']['name'])){
			echo "
				<script type=\"text/javascript\">
					alert(\"Imagem carregada com sucesso.\");
				</script>
				";
		}else{
			echo 'Erro';
		}
	}
?>