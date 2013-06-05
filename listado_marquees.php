<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <?php include_once 'head.php'; ?>
  </head>
  <body>
    <header>
      <div class="logoexhohobby">
        <h1><a href="#"><span>Expohobby</span></a></h1>
      </div> 
      <nav>
        <ul>
          <?php include_once 'admin_menu.php'; ?>
        </ul>
      </nav>  
    </header>
    <div id="cont-all"> 
      <div id="cont-section"> 
		<a title="Agregar Marquee"  class="bnt-ver Cmarg" href="agregar_marquee.php">+ Agregar Marquee</a>
        <table class="tb" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td class="tbtitulos">Titulo</td>
            <td class="tbtitulos">Pocicion</td>
            <td class="tbtitulos">Estado</td>
            <td class="tbtitulos">Editar</td>
            <td class="tbtitulos">Borrar</td>
          </tr>
          <?php
            include_once 'includes.php';
            $listado_marquee = new Marquee();
            print $listado_marquee->getMarquees();
          ?>
        </table>
      </div>
    </div>          
    <footer>
      <?php include_once 'footer.php'; ?>
    </footer>
  </body>
</html>