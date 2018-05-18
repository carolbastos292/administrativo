	  <?php
	  	
	  	$resultado= mysql_query(" SELECT * FROM usuarios ORDER BY'id'");
	  	$linhas=mysql_num_rows($resultado);
	  ?>
    <main role="main" class="container">
      <div class="starter-template text-left">

        <h1>Lista de Usuários</h1>
        <div class="text-right">
	        <a href='administrativo.php?link=3'>
				<button type='button' class='mb-2 btn btn-sm btn-success '>Cadastrar</button>
			</a>
		</div>
        <table class="table table-sm table-bordered">
		  <thead>
		    <tr>		     
		     <th scope="col" >ID</th>
		      <th scope="col" >Nome</th>
		      <th scope="col" >Login</th>
		      <th scope="col">Data de Criação</th>
		      <th scope="col">Data de Modificação</th>
		      <th scope="col" >Ação</th>
		    </tr>
		  </thead>
		  <tbody>
		  <?php
		  	while($linhas = mysql_fetch_array($resultado)){
		  		echo "<tr>";
			  		echo "<td>".$linhas['id']."</td>";
			  		echo "<td>".$linhas['nome']."</td>";
			  		echo "<td>".$linhas['login']."</td>";
			  		echo "<td>".$linhas['created']."</td>";
			  		echo "<td>".$linhas['modified']."</td>";
			  		 ?>
			  		 <td> 
			  				<a href='administrativo.php?link=4&id=<?php echo $linhas['id']; ?>'>
			  					<button type='button' class='btn btn-sm btn-warning'>Editar</button>
			  				</a>
			  				<a href='../processa/proc_del_usuario.php?id=<?php echo $linhas['id']; ?>'>
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

   

