<?php
  $id_album = $_GET['id_album'];
  //executa consulta
  $result = mysql_query("SELECT * FROM galeria WHERE id_album = '$id_album' LIMIT 1");
  $resultado = mysql_fetch_assoc($result);
  $id_album = $resultado['id_album']; //pode dar erro
?>    
    
  <main role="main" class="container">
    <div class="starter-template text-left">
      <h1>Editar Album</h1>
      <div class="text-right">
        
        <a href='../processa/galeria/proc_del_galeria.php?id_album=<?php echo $resultado['id_album']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a> 
      </div>
      <form method="POST" action="../processa/galeria/proc_edit_galeria.php" enctype="multipart/form-data">
     
        <div class="form-group">
          <label for="exampleInputEmail1">Titulo</label>
          <input type="text" class="form-control" name="titulo_album" aria-describedby="name" placeholder="Titulo" value="<?php echo $resultado['titulo_album']; ?>"/>
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Descricao</label>
          <textarea type="text" rows="7" class="form-control ckeditor" name="descricao_album" ><?php echo $resultado['descricao_album']; ?></textarea>
        </div>

        
        <div class="form-group">
            <label for="exampleFormControlFile1">Capa do Album</label> 
            <input type="file" class="form-control-file" name="capa"  />
        </div>  

        <?php 
          $foto = $resultado['capa'];
          if($foto == ""){
            ?>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">  
                Capa Antiga
              </label>
              <div class="col-sm-10">
                O album não possui capa
              </div>
            </div>
          <?php
          }
          else {  ?>
            <div class="form-group">
              <span>  
                Ultima capa do album
              </span>
              <div class="col-sm-10">
                <img src="<?php echo "../upload_album/$foto"; ?>" width="100" height="100">
                <input type="hidden" name="img_antiga" value='<?php echo $foto ?>'>
              </div>
            </div>
          <?php 
          } ?>
          <hr>

          <div class="form-group">
            <label for="exampleFormControlFile1">Fotos do album</label> 
            <input type="file" class="form-control-file" name="ficheiro[]" multiple="multiple" />
          </div>  
        
          <?php 
            $fotos = $resultado['ficheiro'];
            if($fotos == ""){
              ?>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">  
                  Ficheiro Antigo
                </label>
                <div class="col-sm-10">
                  O album não possui fotos
                </div>
              </div>
            <?php
            }
            else {  ?>
              <div class="form-group">
                <label>  
                  Últimas fotos do album
                </label>
                <div class="col-sm-10">
                  <div class="col-sm-3 col-md-12 col-lg-12">
                    <?php
                      $titulo_album = $_SESSION['titulo_album'];
                      $arquivos = glob("../upload_album/fotos/$titulo_album/*.*");
                      /*echo '<pre />';
                      print_r($arquivos);*/
                      foreach ($arquivos as $valor) {
                        printf('<img src="%s" width="150" height="100"/>',$valor);
                      }
                    ?>
                  </div>
                  <input type="hidden" name="ficheiro_antigo" value='<?php echo $arquivos ?>'>
                </div>
              </div>
            <?php } ?>

        <input type="hidden"  name="id_album" value="<?php echo $resultado['id_album']; ?>"> <!--pode dar erro-->
        <button type="submit" class="btn btn-success">Alterar</button>
       <a href='administrativo.php?link=17&id=<?php echo $resultado['id_album']; ?>'><button type='button' class='btn btn-danger'>Cancelar</button></a>
        
      </form>
    </div>

  </main><!-- /.container -->

   
