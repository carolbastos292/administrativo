	  <?php
	  	
	  	$resultado= mysql_query("SELECT * FROM publicacoes ORDER BY 'id_pub' ");
	  	$linhas=mysql_num_rows($resultado);
	  ?>
    <main role="main" class="container">
      <div class="starter-template text-left">

        <h1>Lista de Publicações</h1>
        <div class="text-right">
	        <a href='administrativo.php?link=10'>
				<button type='button' class='mb-2 btn btn-sm btn-success '>Cadastrar</button>
			</a>
		</div>
        <table class="table table-bordered">
		  <thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">Titulo</th>
		      <th scope="col">Autor</th>
		      <th scope="col">Data de Criação</th>
		      <th scope="col">Data de Modificação</th>
		      <th scope="col">Ação</th>
		    </tr>
		  </thead>
		  <tbody>
		  <?php
		  	while($linhas = mysql_fetch_array($resultado)){
		  		echo "<tr>";
			  		echo "<td>".$linhas['id_pub']."</td>";
			  		echo "<td>".$linhas['titulo']."</td>";
			  		echo "<td>".$linhas['autor']."</td>";
			  		echo "<td>".$linhas['created']."</td>";
			  		echo "<td>".$linhas['modified']."</td>";
			  		 ?>
			  		 <td> 
			  		 		<a href='administrativo.php?link=12&id_pub=<?php echo $linhas['id_pub']; ?>'>
			  					<button type='button' class='btn btn-sm btn-primary'>Visualizar</button>
			  				</a>
			  				<a href='administrativo.php?link=11&id_pub=<?php echo $linhas['id_pub']; ?>'>
			  					<button type='button' class='btn btn-sm btn-warning'>Editar</button>
			  				</a>
			  				<a href='../processa/publicacoes/proc_del_pub.php?id_pub=<?php echo $linhas['id_pub']; ?>'>
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

   

