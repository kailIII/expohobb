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
		<a title="Agregar Actividad"  class="bnt-ver Cmarg" href="agregar_actividad.php">+ Agregar Actividad</a>
        <table class="tb" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td class="tbtitulos">Estado</td>
            <td class="tbtitulos">Imagen</td>
            <td class="tbtitulos">Editar</td>
            <td class="tbtitulos">Borrar</td>
          </tr>
          <?php
            include_once 'includes.php';
            $listado_actividades = new Empresa();
            print $listado_actividades->getActividades($_SESSION['empresa']['id'], $_SESSION['empresa']['expo'], 'usuario');
          ?>
        </table>
      </div>
    </div>          
    <footer>
      <?php include_once 'footer.php'; ?>
    </footer>
  </body>
</html>