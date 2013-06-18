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
      <div class="cont-slider">
        <?php include('slider/preview.php'); ?>
      </div>
    </div>          
    <footer>
      <?php include_once 'footer.php'; ?>
    </footer>
  </body>
</html>