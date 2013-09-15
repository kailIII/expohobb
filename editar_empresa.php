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
        <nav>
          <ul>
            <?php include_once 'expo_menu.php'; ?>
          </ul>
        </nav>
        <?php
          include_once 'includes.php';         
          $expo = new Expo();
          $datosExpo = $expo->getOneEmpresa($_POST['id']);
        ?>
        <h2 class="editartitulo">Editar empresa</h2>
        <form id="form_reg" action="controllers.php" method="POST" enctype="multipart/form-data">
          <div class="input_wapper">
            <label>Nombre</label>
            <input id="id" type="hidden" name="id" value="<?php echo $datosExpo['id'];?>"/>
           <input value="<?php print $datosExpo['name'];?>" id="name" type="text" name="name" required="required" class="input_text_publicidad input_text" />
          </div>
          <div class="input_wapper">
            <label>E-Mail</label>
           <input value="<?php print $datosExpo['email'];?>" id="mail" type="email" name="mail" required="required" class="input_text_publicidad input_text" />
          </div>
          <div class="input_wapper">
            <label>Website</label>
           <input value="<?php print $datosExpo['web'];?>" id="web" type="text" name="web" class="input_text_publicidad input_text" />
          </div>
          <div class="input_wapper">
            <label>Imagen</label>
            <div id="preview_image_empresa"><img alt="<?php echo $datosExpo['name'];?>" title="<?php echo $datosExpo['name'];?>" src="<?php echo $datosExpo['image'];?>"/></div>
            <input type="hidden" name="name_image" value="<?php echo $datosExpo['image'];?>" />
            <input id="image_empresa" type="file" name="image_empresa" class="input_file_publicidad input_file" />
          </div>
          <div class="input_wapper">
            <label>Descripcion</label>
            <textarea id="descripcion" name="descripcion" class="ckeditor"><?php print $datosExpo['description'];?></textarea>
          </div>
          <div class="input_wapper">
            <input id="editar_empresa" class="btn_general btn-classic2" type="submit" value="Guardar" name="editar_empresa" />
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