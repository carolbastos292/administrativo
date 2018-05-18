 
    <main role="main" class="container">
      <div class="starter-template text-left">
        <h1>Cadastrar Noticia</h1>
        <form method="POST" action="../processa/noticias/proc_cad_noticia.php" enctype="multipart/form-data" >
          <div class="form-group">
            <label for="exampleInputEmail1">Titulo</label>
            <input type="text" class="form-control" name="titulo" aria-describedby="name" placeholder="Titulo">
          </div>

          <div class="form-group">
            <label for="inputEmail3" class=" control-label">Descrição Curta</label>
              <textarea class="form-control" rows="2" name="descricao_curta" placeholder="Descrição curta da noticia"></textarea>
          </div>

           <div class="form-group">
            <label for="inputEmail3" class="control-label">Descrição Longa</label>
              <textarea class="form-control ckeditor" rows="6" name="descricao_longa" placeholder="Descrição Longa da noticia"></textarea>
          </div>
           
                 
            <div class="form-group">
                <label for="exampleFormControlFile1">Imagem</label> 
                <input type="file" class="form-control-file" name="imagem"  />
            </div>
           
          

          <button class="btn btn-primary"  type="submit" >Salvar</button>
     
        </form>
      </div>

      

    </main><!-- /.container -->

