    <main role="main" class="container">
      <div class="starter-template text-left">
        <h1>Cadastrar Publicações</h1>
        <form method="POST" action="../processa/publicacoes/proc_cad_pub.php" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Ano</label>
            <input type="text" class="form-control" name="ano" aria-describedby="name" placeholder="Ano">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Titulo</label>
            <input type="text" class="form-control" name="titulo" placeholder="Titulo">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Autor</label>
            <input type="text" class="form-control" name="autor" placeholder="Autor">
          </div>

          <div class="form-group">
              <label for="exampleFormControlFile1">Arquivo</label> 
              <input type="file" class="form-control-file" name="dir_arquivo" />
          </div>
          
          <button type="submit" class="btn btn-success">Salvar</button>
        </form>
      </div>

    </main><!-- /.container -->

   
