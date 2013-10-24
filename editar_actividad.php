<!DOCTYPE html>
<?php include_once 'sesion.php'; ?>
<?php 
  if(!isset($_SESSION['empresa'])){
    header("Location: index.php");
  }
  include_once 'includes.php';         
  $empresa = new Empresa();
  $newEmpresa = $empresa->getActividad($_POST['id']);

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
        <h2 class="editartitulo">Agregar actividad</h2>
        <form id="form_reg" action="controllers.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id_actividad" value="<?php echo $newEmpresa['id']; ?>"/>
          <input type="hidden" name="id_empresa" value="<?php echo $_SESSION['empresa']['id']; ?>"/>
          <input type="hidden" name="id_expo" value="<?php echo $_SESSION['empresa']['expo']; ?>"/>
          <div class="input_wapper">
            <label>Imagen</label>
            <img id="preview_image" src="<?php echo $newEmpresa['foto']; ?>" />
            <input type="hidden" name="name_image" value="<?php echo  $newEmpresa['foto'];?>" />
            <input id="image_actividad" type="file" name="image" class="input_file_publicidad input_file" />
          </div>
          <div class="input_wapper">
            <label>Descripcion</label>
            <textarea id="descripcion" name="descripcion" class="ckeditor"><?php echo  $newEmpresa['actividad'];?></textarea>
          </div>
          <div class="input_wapper">
            <input id="editar_actividad" class="btn_general btn-classic2" type="submit" value="Guardar" name="editar_actividad" />
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