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
          $datosEmpresa = $expo->getExpoEmpresa($_POST['id_expo'], $_POST['id_empresa']);
          $empresa = new Empresa();
          $actividades = $empresa->getActividades($_POST['id_expo'], $_POST['id_empresa'], 'admin');
        ?>
        <h2 class="editartitulo">Administrar <?php print $datosEmpresa['name'];?></h2>
        <h2 class="editarsubtitulo">Administrar Informacion General</h2>
        <form id="form_reg" action="controllers.php" method="POST" enctype="multipart/form-data">
          <div class="input_wapper">
            <label>Expositor</label>
            <input type="hidden" name="id_relacion" value="<?php echo $datosEmpresa['id_relacion']; ?>"/>
            <select id="es_expositor" class="label_reg" required="required" name="es_expositor">
              <option <?php if($datosEmpresa['es_expositor'] == 'no'){ echo 'selected'; }?> value="no">No</option>
              <option <?php if($datosEmpresa['es_expositor'] == 'si'){ echo 'selected'; }?> value="si">Si</option>
            </select>
          </div>
          <div class="input_wapper">
            <label>Contraseña</label>
            <input value="<?php print $datosEmpresa['pass'];?>" id="pass" type="text" name="pass"class="input_text_publicidad input_text" />
          </div>
          <h2 class="editarsubtitulo">Administrar Adtividades</h2>
          <?php echo $actividades; ?>
          <div class="input_wapper">
            <input id="administrar_empresa" class="btn_general btn-classic2" type="submit" value="Guardar" name="administrar_empresa" />
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