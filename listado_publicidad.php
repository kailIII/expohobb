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
    <?php
      include_once 'includes.php';
      $listado_publicidad = new Publicidad();
      $listados = $listado_publicidad->getPublicidads();
    ?>
    <div id="cont-all"> 
      <div id="cont-section"> 
        <a title="Agregar Publicidad"  class="bnt-ver Cmarg" href="agregar_publicidad.php">+ Agregar Publicidad</a>
        <table class="tb" border="0" cellpadding="0" cellspacing="0">
            <td class="tbtitulos">URL</td>
            <td class="tbtitulos">Estado</td>
            <td class="tbtitulos">Editar</td>
            <td class="tbtitulos">Borrar</td>
          </tr>
            <?php if(isset ($listados['grande'])){print  $listados['grande'];} ?>
        </table>

        <table class="tb" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td class="tbtitulos">Imagen</td>
            <td class="tbtitulos">URL</td>
            <td class="tbtitulos">Estado</td>
            <td class="tbtitulos">Editar</td>
            <td class="tbtitulos">Borrar</td>
          </tr>
            <?php if(isset($listados['chica'])){print $listados['chica'];} ?>
        </table>
      </div>
    </div>          
    <footer>
      <?php include_once 'footer.php'; ?>
    </footer>
  </body>
</html>