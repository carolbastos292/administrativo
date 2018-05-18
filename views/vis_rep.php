<?php
	$id_repositorio = $_GET['id_repositorio'];
	//Executa consulta
	$result = mysql_query("SELECT * FROM repositorio WHERE id_repositorio = '$id_repositorio' LIMIT 1");
	$resultado = mysql_fetch_assoc($result);
?>
<div class="container theme-showcase" role="main">      
	<div class="page-header">
		<h1>Visualizar Repositorio</h1>
	</div>
	
	
		<div class="text-right">
			<a href='administrativo.php?link=13'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>
							
			<a href='administrativo.php?link=7&id_repositorio=<?php echo $resultado['id_repositorio']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
			
			<a href='../processa/repositorio/proc_del_repositorio.php?id_repositorio=<?php echo $resultado['id_repositorio']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
		</div>
	
	
	<div class="row">
		<div class="col-md-12">
			<div class=" col-sm-3 col-md-12">
				<b>Id Repositorio:</b>
				<?php echo $resultado['id_repositorio']; ?>
			</div>
			
			<div class="col-sm-3 col-md-12">
				<b>Titulo:</b>
				<?php echo $resultado['titulo_rep']; ?>
			</div>
					
			<div class="col-sm-3 col-md-12">
				<b>Imagem:</b>
			</div>
			<div class="col-sm-9 col-md-12">
				<?php $foto = $resultado['imagem_rep']; ?>
				<img src="<?php echo "../upload_rep/$foto"; ?>" width="100" height="100">
			</div>

			<div class="col-sm-3 col-md-12">
				<b>Arquivo:</b>
			</div>
			<div class="col-sm-9 col-md-12">
				<?php $arq = $resultado['arquivo_rep']; ?>
				<img src="<?php echo "../upload_rep/$arq"; ?>" width="100" height="100">
			</div>

		</div>
	</div>
</div> <!-- /container -->

