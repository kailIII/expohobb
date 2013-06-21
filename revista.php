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
      <?php for ($i = 1; $i <= 10; $i++){?>
		<article class="contHover">
        <div class="ContMult">
          <div class="cont-art">
         
            <header>
              <h2>Todo el arte en un solo lugar</h2>
              <p class="subtitulo">
            	Septiembre 2013
              </p>
            </header>
            <section>
            <a title="revista" href="#"><img  alt="imag" border="0px"  src="upload_images/revista.jpg"></a>
            </section>
          </div>
        </div>
	  
        <div class="clsContenedorAll">
           
            <div class="clsContenidoAll">
              <a class="bnt-verAll" href="#">"Todo el arte en un solo lugar"</a>
               <div class="clsTituloAll">
              	<h3>Septiembre 2013</h3>
           	 </div>
              <div class="descripcion">
                <p>
                  Hola este es el texto descriptivo para saber que va aca tanto sea una revista o una exposicion por eso esto va aca. 
                </p>
              </div>
            </div>
          </div>
          <div class="sombra"></div>
       </article> 
	 <?php } ?>
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