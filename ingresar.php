<!DOCTYPE html>
<?php include_once 'sesion.php'; ?>
<?php 
  if(isset($_SESSION['usuario'])){
    if($validador->cookieValidator($_SESSION['usuario'],$_SESSION['token']) == 'ok'){
      header("Location: listado_marquees.php");
    }
  }
?>
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
            <span id="check_log"><input type="checkbox" name="recordar" value="ok"> Recordar en este equipo</span>
          </div>
          <div class="input_wapper">
            <input id="ingresar" class="btn_general btn-classic2" type="submit" value="Ingresar" name="ingresar" />
          </div>
        </form>
      </div>
    </div>          
    <footer>
      <?php include_once 'footer.php'; ?>
    </footer>
  </body>
</html>