 
    <main role="main" class="container">
      <div class="starter-template text-left">
        <h1>Cadastrar Inscrição</h1>
        <form method="POST" action="../processa/inscricoes/proc_cad_inscricao.php" enctype="multipart/form-data" >
          <div class="form-group">
            <label for="exampleInputEmail1">Nome do Formulário</label>
            <input type="text" class="form-control" name="titulo" aria-describedby="name" placeholder="Titulo">
          </div>

          <div class="form-group">
            <label for="inputEmail3" class=" control-label">Link Para o Formulário</label>
              <textarea class="form-control" rows="2" name="link" placeholder="Insira aqui o link para o formulário"></textarea>
          </div>          

          <button class="btn btn-primary"  type="submit" >Salvar</button>
     
        </form>
      </div>

      

    </main><!-- /.container -->

