<?php
	session_start();
	include_once("../seguranca.php");
  include_once("../conexao.php");
?>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="icon" href="img/logo.ico">
    <title>Site administrativo</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    <link href="css/starter-template.css" rel="stylesheet">
  </head>
  <body>
	  <?php
	  	include_once("menu_admin.php");
      
      $pag[1] = "bem_vindo.php";
      //usuario
      $pag[2] = "listar_usuario.php";
      $pag[3] = "cad_usuario.php";
      $pag[4] = "editar_usuario.php";
      //noticias
      $pag[5] = "listar_noticia.php";
      $pag[6] = "cad_noticia.php"; 
      $pag[7] = "editar_noticia.php";
      $pag[8] = "vis_noticia.php";
      //publicacoes
      $pag[9] = "listar_pub.php";
      $pag[10] = "cad_pub.php"; 
      $pag[11] = "editar_pub.php";
      $pag[12] = "vis_pub.php";
      //repositorio
      $pag[13] = "listar_rep.php";
      $pag[14] = "cad_rep.php"; 
      $pag[15] = "editar_rep.php";
      $pag[16] = "vis_rep.php";
      //galeria
      $pag[17] = "listar_gal.php";
      $pag[18] = "cad_gal.php"; 
      $pag[19] = "editar_album.php";
      $pag[20] = "vis_album.php";
      //processo seletivo
      $pag[21] = "listar_inscricao.php";
      $pag[22] = "cad_inscricao.php";
      $pag[23] = "vis_inscricao.php";



      
      if(!empty($_GET['link'])){
        $link = $_GET["link"];
        if(file_exists($pag[$link])){
          include $pag[$link];
        } 
        else{
            include "bem_vindo.php";
          } 
          }else{
              include "bem_vindo.php";
          }

	  ?>
    

   
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')</script>
<!--    <script src="js/jquery.js"></script> -->
    <script src="js/jquery.form.min.js"></script> 
    <script src="js/script.js"></script> <!--Serve pra validar o formulario com Ajax -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ckeditor/ckeditor.js"></script>
      
  </body>
</html>
