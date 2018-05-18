<?php
	$id_album = $_GET['id_album'];
	//Executa consulta
	$result = mysql_query("SELECT * FROM galeria WHERE id_album = '$id_album' LIMIT 1");
	$resultado = mysql_fetch_assoc($result);
?>
<div class="container theme-showcase" role="main">      
	<h1>Visualizar Album</h1>
	
	<div class="text-right">
		<a href='administrativo.php?link=17'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>
						
		<a href='administrativo.php?link=19&id_album=<?php echo $resultado['id_album']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
		
		<a href='../processa/galeria/proc_del_galeria.php?id_album=<?php echo $resultado['id_album']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
	</div>
	
	
	<div class="row">
					
		<div class="col-sm-3 col-md-12">
			<b>Capa do album:</b>
		</div>
		<div class="col-sm-9 col-md-12">
			<?php $foto = $resultado['capa']; ?>
			<img src="<?php echo "../upload_album/$foto"; ?>" width="100" height="100">
		</div>
	
		<div class=" col-sm-3 col-md-12">
			<b>Id Album:</b>
			<?php echo $resultado['id_album']; ?>
		</div>
		
		<div class="col-sm-3 col-md-12">
			<b>Titulo:</b>
			<?php echo $resultado['titulo_album']; ?>
		</div>
		
		<div class="col-sm-3 col-md-12">
			<b>Descricao:</b>
			<?php echo $resultado['descricao_album']; ?>
		</div>
			
	</div><!--Fecha row-->
	<hr/>
	<div class="row">
		<div class="col-sm-3 col-md-12">
			<b>Fotos do album:</b>
		</div>
		<div class="col-sm-3 col-md-12 col-lg-12">
			<?php
				
				$titulo_album = $_SESSION['titulo_album'];
				$arquivos = glob("../upload_album/fotos/$titulo_album/*.*");
				/*echo '<pre />';
				print_r($arquivos);*/
				foreach ($arquivos as $valor) {
					printf('<img src="%s" width="150" height="100"/>',$valor);
				}
			?>
		</div>
	</div>
	<hr/>
	
</div> <!-- /container -->
<?php


?>
