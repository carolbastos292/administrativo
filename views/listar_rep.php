	  <?php
	  	
	  	$resultado= mysql_query("SELECT * FROM repositorio ORDER BY 'id_repositorio'");
	  	$linhas=mysql_num_rows($resultado);
	  ?>
    <main role="main" class="container">
      <div class="starter-template text-left">

        <h1>Lista de repositorio</h1>
        <div class="text-right">
	        <a href='administrativo.php?link=14'>
				<button type='button' class='mb-2 btn btn-sm btn-success '>Cadastrar</button>
			</a>
		</div>
        <table class="table table-bordered">
		  <thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">Titulo</th>
		      <th scope="col">Data de Criação</th>
		      <th scope="col">Data de Modificação</th>
		      <th scope="col">Ação</th>
		    </tr>
		  </thead>
		  <tbody>
		  <?php
		  	while($linhas = mysql_fetch_array($resultado)){
		  		echo "<tr>";
			  		echo "<td>".$linhas['id_repositorio']."</td>";
			  		echo "<td>".$linhas['titulo_rep']."</td>";
			  		echo "<td>".$linhas['created']."</td>";
			  		echo "<td>".$linhas['modified']."</td>";
			  		 ?>
			  		 <td> 
			  		 		<a href='administrativo.php?link=16&id_repositorio=<?php echo $linhas['id_repositorio']; ?>'>
			  					<button type='button' class='btn btn-sm btn-primary'>Visualizar</button>
			  				</a>
			  				<a href='administrativo.php?link=15&id_repositorio=<?php echo $linhas['id_repositorio']; ?>'>
			  					<button type='button' class='btn btn-sm btn-warning'>Editar</button>
			  				</a>
			  				<a href='../processa/repositorio/proc_del_repositorio.php?id_repositorio=<?php echo $linhas['id_repositorio']; ?>'>
			  					<button type='button' class='btn btn-sm btn-danger'>Apagar</button>
			  				</a>
			  			 <?php
		  		echo "</tr>";
		  	}
		  ?>
		   
		  </tbody>
		</table>
      </div>

    </main><!-- /.container -->

   

