	  <?php
	  	$resultado= mysql_query("SELECT * FROM noticias ORDER BY 'id_noticia'");
	  	$linhas=mysql_num_rows($resultado);
	  ?>
    <main role="main" class="container">
      <div class="starter-template text-left">

        <h1>Lista de Noticias</h1>
        <div class="text-right">
	        <a href='administrativo.php?link=6'>
				<button type='button' class='mb-2 btn btn-sm btn-success '>Cadastrar</button>
			</a>
		</div>
        <table class="table table-bordered">
		  <thead>
		    <tr>
		      <th scope="col" >ID</th>
		      <th scope="col">Titulo</th>
		      <th scope="col">Descrição Curta</th>
		      <th scope="col">Data de Criação</th>
		      <th scope="col">Data de Modificação</th>
		      <th scope="col">Ação</th>
		    </tr>
		  </thead>
		  <tbody>
		  <?php
		  	while($linhas = mysql_fetch_array($resultado)){
		  		echo "<tr>";
			  		echo "<td>".$linhas['id_noticia']."</td>";
			  		echo "<td>".$linhas['titulo']."</td>";
			  		echo "<td>".$linhas['descricao_curta']."</td>";
			  		echo "<td>".$linhas['created']."</td>";
			  		echo "<td>".$linhas['modified']."</td>";
			  		 ?>
			  		 <td> 
			  		 		<a href='administrativo.php?link=8&id_noticia=<?php echo $linhas['id_noticia']; ?>'>
			  					<button type='button' class='btn btn-sm btn-primary'>Visualizar</button>
			  				</a>
			  				<a href='administrativo.php?link=7&id_noticia=<?php echo $linhas['id_noticia']; ?>'>
			  					<button type='button' class='btn btn-sm btn-warning'>Editar</button>
			  				</a>
			  				<a href='../processa/noticias/proc_del_noticia.php?id_noticia=<?php echo $linhas['id_noticia']; ?>'>
			  					<button type='button' class='btn btn-sm btn-danger'>Apagar</button>
			  				</a>
			  				<a href='../processa/noticias/proc_arq_noticia.php?id_noticia=<?php echo $linhas['id_noticia']; ?>'>
			  					<button type='button' class='btn btn-sm btn-dark'>Arquivar</button>
			  				</a>
			  			 <?php
		  		echo "</tr>";
		  	}
		  ?>
		   
		  </tbody>
		</table>
		<nav aria-label="Page navigation example">
		  <ul class="pagination justify-content-end">
		    <li class="page-item">
		      <a class="page-link" href="#" aria-label="Previous">
		        <span aria-hidden="true">&laquo;</span>
		        <span class="sr-only">Previous</span>
		      </a>
		    </li>
		    <li class="page-item"><a class="page-link" href="#">1</a></li>
		    <li class="page-item"><a class="page-link" href="#">2</a></li>
		    <li class="page-item"><a class="page-link" href="#">3</a></li>
		    <li class="page-item">
		      <a class="page-link" href="#" aria-label="Next">
		        <span aria-hidden="true">&raquo;</span>
		        <span class="sr-only">Next</span>
		      </a>
		    </li>
		  </ul>
		</nav>
      </div>

    </main><!-- /.container -->

   

