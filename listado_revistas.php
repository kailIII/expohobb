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
        <a class="bnt-ver Cmarg" title="Agregar Revista" href="agregar_revista.php">+ Agregar Revista</a>
        <table class="tb" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td class="tbtitulos">Titulo</td>
            <td class="tbtitulos">Edicion</td>
            <td class="tbtitulos">Estado</td>
            <td class="tbtitulos">Editar</td>
            <td class="tbtitulos">Borrar</td>
          </tr>
          <?php
            include_once 'includes.php';
            $listado_revistas = new Revista();
            print $listado_revistas->getRevistas();
          ?>
        </table>
      </div>
    </div>          
    <footer>
      <?php include_once 'footer.php'; ?>
    </footer>
  </body>
</html>