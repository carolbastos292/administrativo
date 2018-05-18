<?php
	$id_pub = $_GET['id_pub'];
	//Executa consulta
	$result = mysql_query("SELECT * FROM publicacoes WHERE id_pub = '$id_pub' LIMIT 1");
	$resultado = mysql_fetch_assoc($result);
?>
<div class="container theme-showcase" role="main">      
	<div class="page-header">
		<h1>Visualizar Publicação</h1>
	</div>
	
	
		<div class="text-right">
			<a href='administrativo.php?link=9'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>
							
			<a href='administrativo.php?link=11&id_pub=<?php echo $resultado['id_pub']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
			
			<a href='../processa/publicacoes/proc_del_pub.php?id_pub=<?php echo $resultado['id_pub']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
		</div>
	
	
	<div class="row">
		<div class="col-md-12">
			<div class=" col-sm-3 col-md-12">
				<b>Id Publicação:</b>
				<?php echo $resultado['id_pub']; ?>
			</div>

			<div class="col-sm-3 col-md-12">
				<b>Ano:</b>
				<?php echo $resultado['ano']; ?>
			</div>
			
			<div class="col-sm-3 col-md-12">
				<b>Titulo:</b>
				<?php echo $resultado['titulo']; ?>
			</div>
			
			<div class="col-sm-3 col-md-12">
				<b>Autor:</b>
				<?php echo $resultado['autor']; ?>
			</div>
			
			<div class="col-sm-3 col-md-12">
				<b>Arquivo:</b>
			</div>
			<div class="col-sm-3 col-md-12" >
				<?php $pdf = $resultado['dir_arquivo']; ?>
				<iframe src="<?php echo "../upload_pdf/$pdf"; ?>" width="600" height="400" style="border: none;"></iframe>
			</div>

			<hr/>
			
			
		</div>
	</div>
</div> <!-- /container -->

