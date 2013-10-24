<!DOCTYPE html>
<?php include_once 'sesion.php'; ?>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <?php include_once 'head.php'; ?>
  </head>
  <body>
    <header>
      <?php include_once 'logo.php'; ?> 
      <?php include_once 'main_menu.php'; ?>
    </header>
    <div id="cont-all"> 
      <div class="cont-slider">
        <h2>Ingresar</h2>
        <form id="form_reg" action="controllers.php" method="POST" enctype="multipart/form-data">
          <div class="input_wapper">
            <label>Usuario</label>
           <input id="mail" type="text" name="mail" required="required" class="input_text_marquee input_text" />
          </div>
          <div class="input_wapper">
            <label>Contraseña</label>
            <input id="pass" type="password" name="pass" required="required" class="input_text_marquee input_text" />
          </div>
          <div class="input_wapper">
            <input id="ingresar_usuario" class="btn_general btn-classic2" type="submit" value="Ingresar" name="ingresar_usuario" />
          </div>
        </form>
      </div>
    </div>          
    <footer>
      <?php include_once 'footer.php'; ?>
    </footer>
  </body>
</html>