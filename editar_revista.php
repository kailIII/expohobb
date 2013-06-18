<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <?php include_once 'head.php'; ?>
  </head>
  <body>
    <header>
      <?php include_once 'logo.php'; ?>
      <nav>
        <?php include_once 'admin_menu.php'; ?>
      </nav>  
    </header>
    <div id="cont-all"> 
      <div id="cont-section"> 
        <h2 class="editartitulo">Editar Revista</h2>
        <?php
          include_once 'includes.php';
          $revista = new Revista();
          $newRevista = $revista->getRevista($_POST['id']);
          $newDate = explode('-', $newRevista['edition']);
        ?>
        <form id="form_reg" action="controllers.php" method="POST" enctype="multipart/form-data">
          <div class="input_wapper">
            <label>Titulo</label>
            <input id="revistaid" type="hidden" name="revistaid" value="<?php echo $newRevista['id'];?>"/>
           <input id="titulo" value="<?php echo $newRevista['title'];?>" type="text" onblur="" name="titulo" required="required" class="input_text_revista input_text" />
          </div>
          <div class="input_wapper">
            <label>Imagen</label>
            <div id="preview_image"><img alt="<?php echo $newRevista['title'];?>" title="<?php echo $newRevista['title'];?>" src="<?php echo $newRevista['image'];?>"/></div>
            <input type="hidden" name="name_image" value="<?php echo $newRevista['image'];?>" />
            <input id="image_revista" type="file" name="image" class="input_file_revista input_file" />
          </div>
          <div class="input_wapper">
            <label>Descripcion</label>
            <textarea id="descripcion" name="descripcion" required="required" class="ckeditor"><?php echo $newRevista['description'];?></textarea>
          </div>
          <div class="input_wapper">
            <label>Edicion</label>
           <input id="edicion" value="<?php echo $newRevista['edition'];?>" type="text" onblur="" name="edicion" required="required" class="input_text_revista input_text" />
          </div>
          <script>
            (function ($) {
              $("#edicion").datepicker();
              $("#edicion").datepicker( "setDate", "<?php echo $newDate[1] .'/'. $newDate[2] .'/'. $newDate[0];?>" );
            })(jQuery);
          </script>
          <div class="input_wapper">
            <label>PDF</label>
            <div><a href="<?php echo $newRevista['pdf'];?>" title="Descargar PDF">Descargar PDF</a></div>
            <input type="hidden" name="name_pdf" value="<?php echo $newRevista['pdf'];?>" />
            <input id="pdf" type="file" name="pdf" class="input_file_revista input_file" />
          </div>
          <div class="input_wapper">
            <label>HTML SWF</label>
            <div>
              <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10.0.0.0" width="550" height="400">
                <param name="quality" value="high" />
                <embed src="<?php echo $newRevista['swf'];?>" quality="high" type="application/x-shockwave-flash" width="550" height="400" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>
              </object>
            </div>
            <input type="hidden" name="name_swf" value="<?php echo $newRevista['swf'];?>" />
            <input id="html_swf" type="file" name="html_swf" required="required" class="input_file_revista input_file" />
          </div>
          <div class="input_wapper">
            <label>Estado</label>
            <select id="status" class="label_reg" required="required" name="status">
              <option <?php if($newRevista['status'] == 'Despublicado'){ echo 'selected'; }?> value="Despublicado">Despublicado</option>
              <option <?php if($newRevista['status'] == 'Publicado'){ echo 'selected'; }?> value="Publicado">Publicado</option>
            </select>
          </div>
          <div class="input_wapper">
            <input id="editar_revista" class="btn_general btn-classic2" type="submit" value="Guardar" name="editar_revista" />
          </div>
        </form>
      </div>
    </div>          
    <footer>
      <?php include_once 'footer.php'; ?>
    </footer>
  </body>
</html>