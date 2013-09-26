<?php include_once 'sesion.php'; ?>
<?php 
  if(isset($_SESSION['usuario'])){
    if($validador->cookieValidator($_SESSION['usuario'],$_SESSION['token']) != 'ok'){
      header("Location: index.php");
    }
  }else{
    header("Location: index.php");
  }
  if(isset($_POST['id'])){
    $expoId = $_POST['id'];
  }elseif(isset($_GET['id'])){
    $expoId = $_GET['id'];
  }else{
    header("Location: listado_expo.php");
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
        <form action="asignar_empresa.php" method="POST">
          <input name="id" type="hidden" value="<?php echo $expoId;?>" />
		      <input type="submit" class="btn-classic" value="+ Asignar Empresa"/>
        </form>
          <table class="tb" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="tbtitulos">Autorizacion</td>
              <td class="tbtitulos">Nombre</td>
              <td class="tbtitulos">Tipo</td>
              <td class="tbtitulos">Administrar</td>
            </tr>
            <?php
              include_once 'includes.php';
              $listado_empresas = new Expo();
              print $listado_empresas->getListExpoEmpresas($expoId);
            ?>
          </table>
      </div>
    </div>          
    <footer>
      <?php include_once 'footer.php'; ?>
    </footer>
  </body>
</html>