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
        <form action="agregar_imagen.php" method="POST">
          <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
		      <input type="submit" class="bnt-ver Cmarg" value="+ Agregar Imagen" />
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