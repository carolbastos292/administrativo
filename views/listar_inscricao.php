	  <?php
	  	$resultado= mysql_query("SELECT * FROM inscricoes ORDER BY 'id_inscricao'");
	  	$linhas=mysql_num_rows($resultado);
	  ?>
    <main role="main" class="container">
      <div class="starter-template text-left">

        <h1>Inscrições</h1>
        <div class="text-right">
	        <a href='administrativo.php?link=22'>
				<button type='button' class='mb-2 btn btn-sm btn-success '>Cadastrar</button>
			</a>
		</div>
        <table class="table table-bordered">
		  <thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col" >Data</th>
		      <th scope="col">Titulo</th>
		      <th scope="col">Ação</th>
		    </tr>
		  </thead>
		  <tbody>
		  <?php
		  	while($linhas = mysql_fetch_array($resultado)){
		  		echo "<tr>";
			  		echo "<td>".$linhas['id_inscricao']."</td>";
			  		echo "<td>".$linhas['data']."</td>";
			  		echo "<td>".$linhas['titulo']."</td>";
			  		 ?>
			  		 <td> 
			  		 <?php $teste = $resultado['link']; ?>
			  		 		<a target="_blank" href='<?php echo $linhas['link']; ?>'>
			  					<button type='button' class='btn btn-sm btn-primary'>Visualizar</button>
			  				</a>
			  			 <?php
		  		echo "</tr>";
		  	}
		  ?>
		   
		  </tbody>
		</table>
      </div>

    </main><!-- /.container -->

   

