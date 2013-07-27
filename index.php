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
    <div class="sombra2"></div>
      <div class="separdor"></div>
      
      <section>

        <article class="revista">
          <?php 
            $revista = new Revista();
            $revista = $revista->getRevista('');
          ?>
          <div class="cont-art">
            <a href="ver_revista.php?q=<?php echo $revista['id'];?>" >
              <img  alt="<?php echo $revista['title'];?>" title="<?php echo $revista['title'];?>" border="0px" width="144" height="173" src="<?php echo $revista['image'];?>"></a>
            <header>
              <h2><?php echo $revista['title'];?></h2>
            </header>
            <section>
              <p class="subtitulo">
                Edición
                <strong><?php echo $revista['edition'];?></strong>
              </p>
              <div class="descripcion">
                <?php echo $revista['description'];?>
              </div>
            </section>
          </div>
          <div class="clsContenedor">
            <div class="clsContenido">
              <div style="margin:0px auto; text-align:center;"><a class="bnt-ver" href="ver_revista.php?q=<?php echo $revista['id'];?>">Ver <?php echo $revista['title'];?></a></div>
              <div class="descrphover"><?php echo $revista['description'];?></div>
              <div class="contbtn">
                <a class="btn-classic2" href="revistas.php">Ver todas las revistas</a>
              </div>
            </div>
          </div>
        </article>
        <article class="exposiciones">
        	<div class="cont-art">
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
            </div>
          
        </article>
       <div class="sombra3"></div>  
      </section>
      <div style="width: 278px; float: right; display:block;">
      <aside class="facebook">
        <div class="fb-like-box" data-href="http://www.facebook.com/pages/EXPOHOBBY/130321180395748" data-width="256" data-height="382" data-show-faces="false" data-stream="true" data-header="false"></div>
      </aside>
      <div class="sombra4"></div> 
      </div>
      <div class="separdor"></div>
      
      <aside class="publicidad">
      	<div style="float:left; display:block;">
			<div class="cont-img-publ">
                <a href="#">
                    <img alt="imag" border="0" src="imagenes/imgnone.jpg" width="139">
                 </a>
          </div>
          <div class="sombra5"></div> 
        </div>
          <div style="float:left; display:block;">
			<div class="cont-img-publ">
                <a href="#">
                    <img alt="imag" border="0" src="imagenes/imgnone.jpg" width="139">
                 </a>
          </div>
          <div class="sombra5"></div> 
        </div>
        <div style="float:left; display:block;">
			<div class="cont-img-publ">
                <a href="#">
                    <img alt="imag" border="0" src="imagenes/imgnone.jpg" width="139">
                 </a>
          </div>
          <div class="sombra5"></div> 
        </div>
        <div style="float:left; display:block; ">
			<div class="cont-img-publ">
                <a href="#">
                    <img alt="imag" border="0" src="imagenes/imgnone.jpg" width="139">
                 </a>
          </div>
          <div class="sombra5"></div> 
        </div>
        <div style="float:left; display:block; ">
			<div class="cont-img-publ">
                <a href="#">
                    <img alt="imag" border="0" src="imagenes/imgnone.jpg" width="139">
                 </a>
          </div>
          <div class="sombra5"></div> 
        </div>
        <div style="float:left; display:block; ">
			<div class="cont-img-publ">
                <a href="#">
                    <img alt="imag" border="0" src="imagenes/imgnone.jpg" width="139">
                 </a>
          </div>
          <div class="sombra5"></div> 
        </div>
       
      </aside>

    </div>
  </div>
  <footer>
    <?php include_once 'footer.php'; ?>
  </footer>
</body>
</html>