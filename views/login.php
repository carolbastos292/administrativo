<?php
	session_start();
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/logo.ico">

    <title>LabTEd Admin</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body>
    <?php
      unset(  $_SESSION['usuarioId'],
              $_SESSION['usuarioNome'],
              $_SESSION['usuarioLogin'],
              $_SESSION['usuarioSenha']);
    ?>
  	<div class="container text-center">
	    <form class="form-signin" method="POST" action="../valida_login.php">
	      <img class="mb-4 text-center" src="img/logo_labted.png" alt="Logo LabTEd" width="auto" height="72">
	      <h1 class="h3 mb-3 font-weight-normal">LabTEd Admin</h1>
	      <label for="inputEmail" class="sr-only">Usuario</label>
	      <input type="text" name="usuario" class="form-control mb-3" placeholder="Digite o usuário" required autofocus>
	      <label for="inputPassword" class="sr-only">Senha</label>
	      <input type="password" name="senha" class="form-control" placeholder="Digite a senha" required>
	      
	      <button class="mt-3 btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        <div class="mt-3 text-center alert-danger" >
            <?php
                if(isset($_SESSION['loginErro'])){
                    echo $_SESSION['loginErro'];
                    unset($_SESSION['loginErro']);
                }
            ?>

        </div>
	      <p class="mt- text-muted">&copy; LabTEd - Laboratório de Tecnologias Educacionais </p>
	    </form>
    </div>


    <script src="js/main.js"></script>
    <script src="js/ie-emulation-modes-warning.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>