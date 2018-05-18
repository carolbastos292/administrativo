<?php
  $id_pub = $_GET['id_pub'];
  //executa consulta
  $result = mysql_query("SELECT * FROM publicacoes WHERE id_pub = '$id_pub' LIMIT 1");
  $resultado = mysql_fetch_assoc($result);
  $id_pub = $resultado['id_pub'];
?>    
    <main role="main" class="container">
      <div class="starter-template text-left">
        <h1>Editar Publicações</h1>
        <div class="text-right">
          <a href='administrativo.php?link=9&id=<?php echo $resultado['id_pub']; ?>'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>

          <a href='../processa/publicacoes/proc_del_pub.php?id_pub=<?php echo $resultado['id_pub']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a> 
        </div>
        <form method="POST" action="../processa/publicacoes/proc_edit_pub.php" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Ano</label>
            <input type="text" class="form-control" name="ano" aria-describedby="name" placeholder="ano" value="<?php echo $resultado['ano']; ?>">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Titulo</label>
            <input type="text" class="form-control" name="titulo" placeholder="Titulo" value="<?php echo $resultado['titulo']; ?>" >
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Autor</label>
            <input type="text" class="form-control" name="autor" placeholder="Autor" value="<?php echo $resultado['autor']; ?>">
          </div>

           <div class="form-group">
              <label for="exampleFormControlFile1">Arquivo</label> 
              <input type="file" class="form-control-file" name="dir_arquivo" />
          </div> 

          <?php 
            $pdf = $resultado['dir_arquivo'];
            if($pdf == ""){
              ?>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">  
                  Pdf antigo
                </label>
                <div class="col-sm-10">
                  A publicacao não possui pdf
                </div>
              </div>
            <?php
            }
            if($pdf != ""){?>
              <div class="form-group">
                <label>  
                  Pdf antigo da publicacao
                </label>
                <div class="col-sm-10">
                  <iframe src="<?php echo "../upload_pdf/$pdf"; ?>" width="600" height="400" style="border: none;"></iframe>
                  <input type="hidden" name="pdf_antigo" value='<?php echo $pdf ?>'>
                </div>
              </div>
            <?php } ?>

          <input type="hidden"  name="id_pub" value="<?php echo $resultado['id_pub']; ?>">
          <button type="submit" class="btn btn-success">Alterar</button>
        </form>
      </div>

    </main><!-- /.container -->

   
