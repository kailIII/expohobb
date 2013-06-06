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
        <a title="Agregar Revista" href="agregar_revista.php">+ Agregar Revista</a>
        <table border="1">
          <tr>
            <td>Titulo</td>
            <td>Edicion</td>
            <td>Editar</td>
            <td>Borrar</td>
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