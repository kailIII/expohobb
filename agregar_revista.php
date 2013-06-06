<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <?php include_once 'head.php'; ?>
  </head>
  <body>
    <header>
      <div class="logoexhohobby">
        <h1><a href="#"><span>Expohobby</span></a></h1>
      </div> 
      <nav>
        <?php include_once 'admin_menu.php'; ?>
      </nav>  
    </header>
    <div id="cont-all"> 
      <div id="cont-section"> 
        <h2>Agregar Revista</h2>
        <form id="form_reg" action="controllers.php" method="POST" enctype="multipart/form-data">
          <div class="input_wapper">
            <label>Titulo</label>
           <input id="titulo" type="text" onblur="" name="titulo" required="required" class="input_text_revista input_text" />
          </div>
          <div class="input_wapper">
            <label>Imagen</label>
            <input id="image" type="file" name="image" required="required" class="input_file_revista input_file" />
          </div>
          <div class="input_wapper">
            <label>Descripcion</label>
            <textarea id="descripcion" name="descripcion" class="ckeditor"></textarea>
          </div>
          <div class="input_wapper">
            <label>Edicion</label>
           <input id="edicion" type="text" onblur="" name="edicion" required="required" class="input_text_revista input_text" />
          </div>
          <div class="input_wapper">
            <label>PDF</label>
            <input id="pdf" type="file" name="pdf" required="required" class="input_file_revista input_file" />
          </div>
          <div class="input_wapper">
            <label>HTML SWF</label>
           <input id="html_swf" type="text" onblur="" name="html_swf" required="required" class="input_text_revista input_text" />
          </div>
          <div class="input_wapper">
            <input id="agregar_revista" class="btn_general" type="submit" value="Guardar" name="agregar_revista" />
          </div>
        </form>
      </div>
    </div>          
    <footer>
      <?php include_once 'footer.php'; ?>
    </footer>
  </body>
</html>