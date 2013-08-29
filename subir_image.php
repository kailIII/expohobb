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
        <h2 class="editartitulo">Agregar imagen</h2>
        <form id="form_reg" action="controllers.php" method="POST" enctype="multipart/form-data">
          <div class="input_wapper_image">
            <label>Imagen</label>
            <input type="hidden" value="1" name="expo" />
            <input type="hidden" value="1" name="empresa" />
            <div class = "add-image">
              <input id="agregar_image" type="file" name="agregar_image" class="input_file_publicidad input_file" />
            </div>
          </div>
          <div class="input_wapper">
            <label>Actividades</label>
            <textarea id="actividad" name="actividad" class="ckeditor"></textarea>
          </div>
          <div class="input_wapper">
            <input id="agregar_actividad" class="btn_general btn-classic2" type="submit" value="Guardar" name="agregar_actividad" />
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