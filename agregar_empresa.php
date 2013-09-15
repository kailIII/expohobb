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
        <h2 class="editartitulo">Agregar empresa</h2>
        <form id="form_reg" action="controllers.php" method="POST" enctype="multipart/form-data">
          <div class="input_wapper">
            <label>Nombre</label>
           <input id="name" type="text" name="name" required="required" class="input_text_publicidad input_text" />
          </div>
          <div class="input_wapper">
            <label>E-Mail</label>
           <input id="mail" type="email" name="mail" required="required" class="input_text_publicidad input_text" />
          </div>
          <div class="input_wapper">
            <label>Website</label>
           <input id="web" type="text" name="web" class="input_text_publicidad input_text" />
          </div>
          <div class="input_wapper">
            <label>Imagen</label>
            <input id="image" type="file" name="image" required="required" class="input_file_publicidad input_file" />
          </div>
          <div class="input_wapper">
            <label>Descripcion</label>
            <textarea id="descripcion" name="descripcion" class="ckeditor"></textarea>
          </div>
          <div class="input_wapper">
            <input id="agregar_empresa" class="btn_general btn-classic2" type="submit" value="Guardar" name="agregar_empresa" />
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