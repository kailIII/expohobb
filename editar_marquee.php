<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <?php include_once 'head.php'; ?>
  </head><?php include_once 'footer.php'; ?>
  <body>
    <header>
      <div class="logoexhohobby">
        <h1><a href="#"><span>Expohobby</span></a></h1>
      </div> 
      <nav>
        <ul>
          <?php include_once 'admin_menu.php'; ?>
        </ul>
      </nav>  
    </header>
    <div id="cont-all"> 
      <div id="cont-section"> 
        <h2 class="editartitulo">Editar Marquee</h2>
        <?php
          include_once 'includes.php';
          $marquee = new Marquee();
          $newMarquee = $marquee->getMarquee($_POST['id']);
        ?>
        <form id="form_reg" action="controllers.php" method="POST" enctype="multipart/form-data">
          <div class="input_wapper">
            <label>Titulo</label>
            <input id="marqueeid" type="hidden" name="marqueeid" value="<?php echo $newMarquee['id'];?>"/>
           <input id="titulo" value="<?php echo $newMarquee['title'];?>" type="text" onblur="" name="titulo" required="required" class="input_text_marquee input_text" />
          </div>
          <div class="input_wapper">
            <label>Posicion</label>
            <input id="queue" value="<?php echo $newMarquee['queue'];?>" type="text" onblur="queue" name="queue" required="required" class="input_text_marquee input_text" />
          </div>
          <div class="input_wapper">
            <label>Imagen Pequeña</label>
            <div id="preview_small_image"><img alt="<?php echo $newMarquee['title'];?>" title="<?php echo $newMarquee['title'];?>" src="<?php echo $newMarquee['small_image'];?>"/></div>
            <input type="hidden" name="name_small_image" value="<?php echo $newMarquee['small_image'];?>" />
            <input id="small_image_marquee" type="file" name="small_image" class="input_file_marquee input_file" />
          </div>
          <div class="input_wapper">
            <label>Imagen Grande</label>
            <div id="preview_big_image"><img alt="<?php echo $newMarquee['title'];?>" title="<?php echo $newMarquee['title'];?>" src="<?php echo $newMarquee['big_image'];?>"/></div>
            <input type="hidden" name="name_big_image" value="<?php echo $newMarquee['big_image'];?>" />
           <input id="big_image_marquee" type="file" name="big_image" class="input_file_marquee input_file" />
          </div>
          <div class="input_wapper">
            <label>Descripcion</label>
            <textarea id="descripcion" name="descripcion" required="required" class="ckeditor"><?php echo $newMarquee['description'];?></textarea>
          </div>
          <div class="input_wapper">
            <label>Estado</label>
            <select id="status" class="label_reg" required="required" name="status">
              <option <?php if($newMarquee['status'] == 'Despublicado'){ echo 'selected'; }?> value="Despublicado">Despublicado</option>
              <option <?php if($newMarquee['status'] == 'Publicado'){ echo 'selected'; }?> value="Publicado">Publicado</option>
            </select>
          </div>
          <div class="input_wapper">
            <input id="editar_marquee" class="btn_general btn-classic2" type="submit" value="Guardar" name="editar_marquee" />
          </div>
        </form>
      </div>
    </div>          
    <footer>
      <?php include_once 'footer.php'; ?>
    </footer>
  </body>
</html>