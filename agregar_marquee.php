<!DOCTYPE html>
<?php include_once 'sesion.php'; ?>
<?php 
  if(isset($_SESSION['usuario'])){
    if($validador->cookieValidator($_SESSION['usuario'],$_SESSION['token']) != 'ok'){
      header("Location: index.php");
    }
  }else{
    header("Location: index.php");
  }
?>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <?php include_once 'head.php'; ?>
  </head>
  <body>
    <header>
      <?php include_once 'logo.php'; ?>
      <nav>
        <ul>
          <?php include_once 'admin_menu.php'; ?>
        </ul>
      </nav>  
    </header>
    <div id="cont-all"> 
      <div id="cont-section"> 
        <h2 class="editartitulo">Agregar Marquee</h2>
        <form id="form_reg" action="controllers.php" method="POST" enctype="multipart/form-data">
          <div class="input_wapper">
            <label>Titulo</label>
           <input id="titulo" type="text" onblur="" name="titulo" required="required" class="input_text_marquee input_text" />
          </div>
          <div class="input_wapper">
            <label>Posicion</label>
            <input id="queue" type="text" onblur="queue" name="queue" required="required" class="input_text_marquee input_text" />
          </div>
          <div class="input_wapper">
            <label>Imagen Pequeña</label>
            <input id="small_image" type="file" name="small_image" required="required" class="input_file_marquee input_file" />
          </div>
          <div class="input_wapper">
            <label>Tipo</label>
            <select id="type_marquee" class="label_reg" required="required" name="type_marquee">
              <option value="imagen">Imagen</option>
              <option value="video">Video</option>
            </select>
          </div>
          <div id="wrapper_type_marquee" class="input_wapper">
            <label>Imagen Grande</label>
           <input id="big_image" type="file" name="big_image" required="required" class="input_file_marquee input_file" />
          </div>
          <div class="input_wapper">
            <label>Descripcion</label>
            <textarea id="descripcion" name="descripcion" class="ckeditor"></textarea>
          </div>
          <div class="input_wapper">
            <label>Estado</label>
            <select id="status" class="label_reg" required="required" name="status">
              <option value="Despublicado">Despublicado</option>
              <option value="Publicado">Publicado</option>
            </select>
          </div>
          <div class="input_wapper">
            <input id="agregar_marquee" class="btn_general btn-classic2" type="submit" value="Guardar" name="agregar_marquee" />
            <div id="cargador" style="display:none"></div>
          </div>
        </form>
      </div>
    </div>          
    <footer>
      <?php include_once 'footer.php'; ?>
    </footer>
  </body>
</html>