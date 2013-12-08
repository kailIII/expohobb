<?php include_once 'sesion.php'; ?>
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
        <h2 class="editartitulo">Agregar Imagen</h2>
        <form id="form_reg" action="controllers.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id_expo" value="<?php echo $_GET['id']; ?>"/>
          <div class="input_wapper_image">
            <div class = "add-image">
              <input id="agregar_image" type="file" name="agregar_image" class="input_file_publicidad input_file" />
            </div>
          </div>
          <div class="input_wapper">
            <input id="agregar_imagen" class="btn_general btn-classic2" type="submit" value="Guardar" name="agregar_imagen" />
            <div id="cargador" style="display:none"></div>
          </div>
        </form>
        <table class="tb" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td class="tbtitulos">Imagen</td>
            <td class="tbtitulos">Ver</td>
            <td class="tbtitulos">Borrar</td>
          </tr>
          <?php
            include_once 'includes.php';
            $expo = new Expo();
            print $expo->getListImages($_GET['id']);
          ?>
        </table>
      </div>
    </div>          
    <footer>
      <?php include_once 'footer.php'; ?>
    </footer>
  </body>
</html>