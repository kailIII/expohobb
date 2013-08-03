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
<!DOCTYPE html>
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
        <h2 class="editartitulo">Editar Publicidad</h2>
        <?php
          include_once 'includes.php';
          $publicidad = new Publicidad();
          $newPublicidad = $publicidad->getPublicidad($_POST['id']);
        ?>
        <form id="form_reg" action="controllers.php" method="POST" enctype="multipart/form-data">
          <div class="input_wapper">
            <input id="publicidadid" type="hidden" name="publicidadid" value="<?php echo $newPublicidad['id'];?>"/>
            <label>URL</label>
            <input id="url" value="<?php echo $newPublicidad['url'];?>" type="text" name="url" required="required" class="input_text_publicidad input_text" />
          </div>
          <div class="input_wapper">
            <label>Imagen</label>
            <div id="preview_image"><img alt="<?php echo $newPublicidad['url'];?>" title="<?php echo $newPublicidad['url'];?>" src="<?php echo $newPublicidad['image'];?>"/></div>
            <input type="hidden" name="name_image" value="<?php echo $newPublicidad['image'];?>" />
            <input id="image_publicidad" type="file" name="image" class="input_file_publicidad input_file" />
          </div>
          <div class="input_wapper">
            <label>Posicion</label>
            <input id="position" value="<?php echo $newPublicidad['position'];?>" type="text" name="position" required="required" class="input_text_publicidad input_text" />
          </div>
          <div class="input_wapper">
            <label>Estado</label>
            <select id="status" class="label_reg" required="required" name="status">
              <option <?php if($newPublicidad['status'] == 'Despublicado'){ echo 'selected'; }?> value="Despublicado">Despublicado</option>
              <option <?php if($newPublicidad['status'] == 'Publicado'){ echo 'selected'; }?> value="Publicado">Publicado</option>
            </select>
          </div>
          <div class="input_wapper">
            <input id="editar_publicidad" class="btn_general btn-classic2" type="submit" value="Guardar"  name="editar_publicidad" />
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