    <main role="main" class="container">
      <div class="starter-template text-left">
        <h1>Cadastrar Album</h1>
        <form name="upload" method="POST" action="../processa/galeria/proc_cad_galeria.php" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Titulo</label>
            <input type="text" class="form-control" name="titulo_album" aria-describedby="name" placeholder="Titulo">
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="control-label">Descrição </label>
              <textarea class="form-control ckeditor" rows="6" name="descricao_album" placeholder="Descrição"></textarea>
          </div>

           <div class="form-group">
              <label for="exampleFormControlFile1">Capa do Album</label> 
              <input type="file" class="form-control-file" name="capa" />
          </div>

            <div class="form-group">
              <label for="exampleFormControlFile1">Inserir Fotos</label> 
              <input type="file" class="form-control-file" name="ficheiro[]" multiple="multiple" />
          </div>


          <button type="submit" class="btn btn-success">Salvar</button>
        </form>
      </div>

    </main><!-- /.container -->

   
