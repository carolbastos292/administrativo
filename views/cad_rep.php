 
    <main role="main" class="container">
      <div class="starter-template text-left">
        <h1>Cadastrar Repositorio</h1>
        <form method="POST" action="../processa/repositorio/proc_cad_repositorio.php" enctype="multipart/form-data" >
            <div class="form-group">
              <label for="exampleInputEmail1">Titulo</label>
              <input type="text" class="form-control" name="titulo_rep" aria-describedby="name" placeholder="Titulo">
            </div>

        
            <div class="form-group">
                <label for="exampleFormControlFile1">Imagem</label> 
                <input type="file" class="form-control-file" name="imagem_rep"  />
            </div>
           <div class="form-group">
                <label for="exampleFormControlFile1">Arquivo</label> 
                <input type="file" class="form-control-file" name="arquivo_rep"  />
            </div>
          

          <button class="btn btn-primary"  type="submit" >Salvar</button>
     
        </form>
      </div>

      

    </main><!-- /.container -->

