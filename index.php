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

        <article class="revista">
          <div class="cont-art">
            <a href="#" >
              <img  alt="imag" border="0px" width="144" height="173" src="imagenes/one.jpg"></a>
            <header>
              <h2>Titulo de la ultima revista</h2>
            </header>
            <section>
              <p class="subtitulo">
                Edición
                <strong>25 de julio 2013</strong>
              </p>
              <div class="descripcion">
                <p>
                  Hola este es el texto descriptivo para saber que va aca tanto sea una revista o una exposicion por eso esto va aca. Hola este es el texto descriptivo para saber que va aca tanto sea una revista o una exposicion por eso esto va aca
                </p>
              </div>
            </section>
          </div>
          <div class="clsContenedor">
            <div class="clsTitulo">
              <h2>Titulo de la revisata</h2>
            </div>
            <div class="clsContenido">
              <a class="bnt-ver" href="#">Ver</a>
              <div class="contbtn">
                <a  class="btn-classic" href="#">Suscribirse a la revista</a>
                <a class="btn-classic" href="#">Ver todas las revistas</a>
              </div>
            </div>
          </div>
        </article>
        <article class="exposiciones">
          <a href="#" >
            <img alt="imag"  border="0px" width="144" height="173" src="imagenes/none.jpg"></a>
          <header>
            <h2>
              <a href="#">Titulo de la exposicion</a>
            </h2>
          </header>
          <section>
            <p class="subtitulo">
              Edición
              <strong>25 de julio 2013</strong>
            </p>
            <div class="descripcion">
              <p>
                Hola este es el texto descriptivo para saber que va aca tanto sea una revista o una exposicion por eso esto va aca. Hola este es el texto descriptivo para saber que va aca tanto sea una revista o una exposicion por eso esto va aca
              </p>
            </div>
            <a href="#" class="btn-classic2">
              Ver todas las
              <span class="color-inst">Expohobby's</span>
            </a>
          </section>
        </article>
      </section>
      <aside class="facebook">
        <div class="fb-like-box" data-href="http://www.facebook.com/pages/EXPOHOBBY/130321180395748" data-width="256" data-height="382" data-show-faces="false" data-stream="true" data-header="false"></div>
      </aside>
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