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
        <h2 class="editartitulo">Agregar Publicidad</h2>
        <form id="form_reg" action="controllers.php" method="POST" enctype="multipart/form-data">
          <div class="input_wapper">
            <label>URL</label>
           <input id="url" type="text" name="url" required="required" class="input_text_publicidad input_text" />
          </div>
          <div class="input_wapper">
            <label>Tipo</label>
            <select id="tipo" class="label_reg" required="required" name="tipo">
              <option value="chica">Chica</option>
              <option value="grande">Grande</option>
            </select>
          </div>
          <div class="input_wapper">
            <label>Imagen</label>
            <input id="image" type="file" name="image" required="required" class="input_file_publicidad input_file" />
          </div>
          <div class="input_wapper">
            <label>Posicion</label>
            <input id="position" type="text" name="position" required="required" class="input_text_publicidad input_text" />
          </div>
          <div class="input_wapper">
            <label>Estado</label>
            <select id="status" class="label_reg" required="required" name="status">
              <option value="Despublicado">Despublicado</option>
              <option value="Publicado">Publicado</option>
            </select>
          </div>
          <div class="input_wapper">
            <input id="agregar_publicidad" class="btn_general btn-classic2" type="submit" value="Guardar" name="agregar_publicidad" />
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