<!DOCTYPE html>
<?php include_once 'sesion.php'; ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <?php include_once 'head.php'; ?>
</head>
<body>
  <div id="fb-root"></div>
  <script>
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
  </script>
  <header>
    <?php include_once 'logo.php'; ?>
    <?php include_once 'main_menu.php'; ?>
  </header>
  <div id="cont-all">

  

    <div id="cont-section">
      
      <section class="val">
      <?php
        include_once 'includes.php';
        $user = new Usuario();
        if($user->validar_mail($_GET['mail'], $_GET['codigo']) == 'ok'){
          $_SESSION['mail'] = $_GET['mail'];
        	echo '<div class="cont_val"><div class="cont-tex-val"><h3>Enhorabuena!</h3>';
       		echo '<p>Ya puedes  acceder a todas nuestras revistas.</p>';
    		  echo '<a  class="bnt-ver" href="ver_revista.php?q=' . $_GET['id'] . '" title="Ir a revistas">Ir a Revistas</a></div><span class="correcto"></span></div>';
        } else {
          echo '<div class="cont_val"><div class="cont-tex-val"><h3>Error!</h3>';
          echo '<p>Error en la validacion, vuelva a intantarlo.</p></div><span class="error"></span></div>';
        }
      ?>
     

    </div>
  </div>
  <footer>
    <?php include_once 'footer.php'; ?>
  </footer>
</body>
</html>