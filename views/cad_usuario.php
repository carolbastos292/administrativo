    <main role="main" class="container">
      <div class="starter-template text-left">
        <h1>Cadastrar Usuário</h1>
        <form method="POST" action="../processa/proc_cad_usuario.php">
          <div class="form-group">
            <label for="exampleInputEmail1">Nome</label>
            <input type="text" class="form-control" name="nome" aria-describedby="name" placeholder="Nome Completo">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Login</label>
            <input type="text" class="form-control" name="login" placeholder="Login">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Senha</label>
            <input type="password" class="form-control" name="senha" placeholder="Senha">
          </div>

          
          <button type="submit" class="btn btn-success">Cadastrar</button>
        </form>
      </div>

    </main><!-- /.container -->

   
