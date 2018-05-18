<?php
  $id_noticia = $_GET['id_noticia'];
  //executa consulta
  $result = mysql_query("SELECT * FROM noticias WHERE id_noticia = '$id_noticia' LIMIT 1");
  $resultado = mysql_fetch_assoc($result);
  $id_noticia = $resultado['id_noticia']; //pode dar erro
?>    
    
    <main role="main" class="container">
      <div class="starter-template text-left">
        <h1>Editar Noticia</h1>
        <div class="text-right">
         
          <a href='../processa/noticias/proc_del_noticia.php?id_noticia=<?php echo $resultado['id_noticia']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a> 
        </div>
        <form method="POST" action="../processa/noticias/proc_edit_noticia.php" enctype="multipart/form-data">
       
          <div class="form-group">
            <label for="exampleInputEmail1">Titulo</label>
            <input type="text" class="form-control" name="titulo" aria-describedby="name" placeholder="Titulo" value="<?php echo $resultado['titulo']; ?>">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Descricao curta</label>
            
            <textarea type="text" rows="2" class="form-control" name="descricao_curta" ><?php echo $resultado['descricao_curta']; ?></textarea>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Descricao Longa</label>
            <textarea type="text" rows="10" class="form-control ckeditor" name="descricao_longa" ><?php echo $resultado['descricao_longa']; ?></textarea>
          </div>

          <div class="form-group">
              <label for="exampleFormControlFile1">Imagem</label> 
              <input type="file" class="form-control-file" name="imagem" />
          </div>  

          <?php 
            $foto = $resultado['imagem'];
            if($foto == ""){
              ?>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">  
                  Foto Antiga
                </label>
                <div class="col-sm-10">
                  A noticia não possui imagem
                </div>
              </div>
            <?php
            }
            if($foto != ""){?>
              <div class="form-group">
                <label>  
                  Foto Antiga da noticia
                </label>
                <div class="col-sm-10">
                  <img src="<?php echo "../upload_img/$foto"; ?>" width="100" height="100">
                  <input type="hidden" name="img_antiga" value='<?php echo $foto ?>'>
                </div>
              </div>
            <?php } ?>


          <input type="hidden"  name="id_noticia" value="<?php echo $resultado['id_noticia']; ?>"> <!--pode dar erro-->
          <button type="submit" class="btn btn-success">Alterar</button>
          <a href='administrativo.php?link=5&id=<?php echo $resultado['id_noticia']; ?>'><button type='button' class='btn btn-danger'>Cancelar</button></a>
        </form>
      </div>

    </main><!-- /.container -->

   
