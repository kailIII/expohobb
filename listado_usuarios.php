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
        <?php
          include_once 'includes.php';
          $usuarios = new Usuario();
          if(isset($_POST['selector_pagina'])){
            $page = $_POST['selector_pagina'];
          }else{
            $page = 1;
          }
          $listado_usuarios = $usuarios->getUsuarios($page);
          print $listado_usuarios['pager'];
        ?>
        <table class="tb" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td class="tbtitulos">Mail</td>
            <td class="tbtitulos">Fecha</td>
            <td class="tbtitulos">Estado</td>
            <td class="tbtitulos">Borrar</td>
          </tr>
          <?php
            print $listado_usuarios['list'];
          ?>
        </table>
      </div>
    </div>          
    <footer>
      <?php include_once 'footer.php'; ?>
    </footer>
  </body>
</html>