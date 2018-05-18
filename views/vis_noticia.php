<?php
	$id_noticia = $_GET['id_noticia'];
	//Executa consulta
	$result = mysql_query("SELECT * FROM noticias WHERE id_noticia = '$id_noticia' LIMIT 1");
	$resultado = mysql_fetch_assoc($result);
?>
<div class="container theme-showcase" role="main">      
	<div class="page-header">
		<h1>Visualizar Noticia</h1>
	</div>
	
	
		<div class="text-right">
			<a href='administrativo.php?link=5'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>
							
			<a href='administrativo.php?link=7&id_noticia=<?php echo $resultado['id_noticia']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
			
			<a href='../processa/noticias/proc_del_noticia.php?id_noticia=<?php echo $resultado['id_noticia']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
		</div>
	
	
	<div class="row">
		<div class="col-md-12">
			<div class=" col-sm-3 col-md-12">
				<b>Id Noticia:</b>
				<?php echo $resultado['id_noticia']; ?>
			</div>
			
			<div class="col-sm-3 col-md-12">
				<b>Titulo:</b>
				<?php echo $resultado['titulo']; ?>
			</div>
			
			<div class="col-sm-3 col-md-12">
				<b>Descricao Curta:</b>
				<?php echo $resultado['descricao_curta']; ?>
			</div>
			
			<div class="col-sm-3 col-md-12">
				<b>Descricao Longa:</b>
				<?php echo $resultado['descricao_longa']; ?>
			</div>
			
			<div class="col-sm-3 col-md-12">
				<b>Imagem:</b>
			</div>
			<div class="col-sm-9 col-md-12">
				<?php $foto = $resultado['imagem']; ?>
				<img src="<?php echo "../upload_img/$foto"; ?>" width="100" height="100">
			</div>
		</div>
	</div>
</div> <!-- /container -->

