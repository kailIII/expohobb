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

    <div class="cont-slider">
      <?php include('slider/fotosprincipales.php'); ?>
    </div>

    <div id="cont-section">
      <div class="separdor"></div>
      <section>
      <?php
        include_once 'includes.php';
        $listado_revistas = new Revista();
        print $listado_revistas->getRevistas('normal_list');
      ?>
      <div id="modal_registration" class="zoom-anim-dialog mfp-hide modal_registration">
        <h3>Revista Expohobby</h3>
        <p>Para poder acceder a nuestras revistas usted debera estar ingresar un mail valido</p>
        <input type="hidden" id="estado_registro" value="inicio" />
        <div id="form_registro_email">
          <input id="registration_mail" type="email" onblur="" name="registration_mail" required="required" class="input_text_mail input_text" />
          <input id="btn_registrar_mail" class="btn-classic" type="submit" value="Enviar" name="btn_registrar_mail" />
        </div>
      </div>
      <div class="separdor"></div>
      <aside class="publicidad">
        <div class="cont-img-publ">
          <img alt="imag" border="0" src="imagenes/imgnone.jpg" width="139"></div>
        <div class="cont-img-publ">
          <a href="#">
            <img alt="imag" border="0" src="imagenes/imgnone.jpg" width="139"></a>
        </div>
        <div class="cont-img-publ">
          <img alt="imag" border="0" src="imagenes/imgnone.jpg" width="139"></div>
        <div class="cont-img-publ">
          <a href="#">
            <img alt="imag" border="0" src="imagenes/imgnone.jpg" width="139"></a>
        </div>
        <div class="cont-img-publ">
          <img alt="imag" border="0" src="imagenes/imgnone.jpg" width="139" height="83"></div>
        <div class="cont-img-publ">
          <a href="#">
            <img alt="imag" border="0" src="imagenes/imgnone.jpg" width="139"></a>
        </div>
      </aside>

    </div>
  </div>
  <footer>
    <?php include_once 'footer.php'; ?>
  </footer>
</body>
</html>