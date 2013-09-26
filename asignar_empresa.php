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
        <nav>
          <ul>
            <?php include_once 'expo_menu.php'; ?>
          </ul>
        </nav> 
        <form id="expo_eliminar" action="controllers.php" method="POST">
          <table class="tb" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="tbtitulos">Nombre</td>
              <td class="tbtitulos">Email</td>
              <td class="tbtitulos">Asignar</td>
              <td class="tbtitulos">Expositor</td>
            </tr>
            <?php
              include_once 'includes.php';
              $listado_empresas = new Expo();
              print $listado_empresas->getListAsignarEmpresa($_POST['id']);
            ?>
          </table>
          <input name="asignar_empresas" type="submit" value="guardar"/>
        </form>
      </div>
    </div>          
    <footer>
      <?php include_once 'footer.php'; ?>
    </footer>
  </body>
</html>