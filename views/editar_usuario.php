<?php
  $id = $_GET['id'];
  //executa consulta
  $result = mysql_query("SELECT * FROM usuarios WHERE id = '$id' LIMIT 1");
  $resultado = mysql_fetch_assoc($result);
?>    
    <main role="main" class="container">
      <div class="starter-template text-left">
        <h1>Editar Usuário</h1>
        <form method="POST" action="../processa/proc_edit_usuario.php">
          <div class="form-group">
            <label for="exampleInputEmail1">Nome</label>
            <input type="text" class="form-control" name="nome" aria-describedby="name" placeholder="Nome Completo" value="<?php echo $resultado['nome']; ?>">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Login</label>
            <input type="text" class="form-control" name="login" placeholder="Login" value="<?php echo $resultado['login']; ?>" >
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Senha</label>
            <input type="password" class="form-control" name="senha" placeholder="Senha">
          </div>

          <input type="hidden"  name="id" value="<?php echo $resultado['id']; ?>">
          <button type="submit" class="btn btn-success">Alterar</button>
         
        </form>
      </div>

    </main><!-- /.container -->

   
