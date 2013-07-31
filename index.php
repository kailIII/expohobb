<!DOCTYPE html>
<?php include_once 'sesion.php'; ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Expohobby</title>
    <?php include_once 'head.php'; ?>
    <meta property="og:title" content="Sitio oficial Expohobby" />
    <meta property="og:description" content="Sitio oficial de expohobby, aquí encontraras todas las novedades de las próximas exposiciones y todo sobre las ediciones de expohobby digital!" />
    <meta property="og:image" content="/upload_images/revista.jpg" />
    <meta name="title" content=" Expohobby, empresa destinada a la difusion de actividades referidas al Arte y la Decoracion">
    <meta name="DC.Title" content=" Expohobby, empresa destinada a la difusion de actividades referidas al Arte y la Decoracion "> 
    <meta http-equiv="title" content=" Expohobby, empresa destinada a la difusion de actividades referidas al Arte y la Decoracion "> 
    <meta name="DC.Creator" content="www.emafilms.com.ar"> 
    <meta name="keywords" content="expo,  manualidades,  manual,  arte, decoración, fiesta, decoupage, vintage, country, scrap, decoración de tortas, demostraciones, clases paso a paso">
    <meta http-equiv="keywords" content="expo,  manualidades,  manual,  arte, decoración, fiesta, decoupage, vintage, country, scrap, decoración de tortas, demostraciones, clases paso a paso ">
    <meta name="description" content="Expohobby sitio oficial, en este sitio encontraras diversas oportunidades para la difusión de productos y actividades referentes al Arte y la Decoración. ">
    <meta http-equiv="description" content="Expohobby sitio oficial, en este sitio encontraras diversas oportunidades para la difusión de productos y actividades referentes al Arte y la Decoración "> 
    <meta http-equiv="DC.Description" content="Expohobby sitio oficial, en este sitio encontraras diversas oportunidades para la difusión de productos y actividades referentes al Arte y la Decoración "> 
    <meta name="author" content="Expohobby">
    <meta name="DC.Creator" content="Estudio multimedia EB "> 
    <meta name="vw96.objectype" content="Document">
    <meta name="resource-type" content="Document"> 
    <meta name="distribution" content="all"> 
    <meta name="robots" content="all"> 
    <meta name="revisit" content="30 days"> 
  
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
     <div class="contredesysecc">
   		<p class="Cseccion"> Estas en > Inicio</p>
         <div class="cont-redes">
                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style ">
                  <a class="addthis_button_preferred_1"></a>
                  <a class="addthis_button_preferred_2"></a>
                  <a class="addthis_button_preferred_3"></a>
                  <a class="addthis_button_preferred_4"></a>
                  <a class="addthis_button_compact"></a>
                  <a class="addthis_counter addthis_bubble_style"></a>
                </div>
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-51d0a20b5fc67a28"></script>
                <!-- AddThis Button END -->
              </div>
       </div>
      <div class="separdorC"></div>
      
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
                <img alt="imag"  border="0px" width="144" height="173" src="upload_images/fiesta.jpg"></a>
              <header>
                <h2>
                  <a href="#">"Expohobby" Fiesta y decoración </a>
                </h2>
              </header>
              <section>
                <p class="subtitulo">
                  Expo: <strong>Septiembre 2013</strong> V, S, D de 13:00hs a 20:00hs
                  
                </p>
                <div class="descripcion">
                  <p>
                    Los mejores exponentes de la decoración de fiestas, decoración de tortas, modelado en porcelana fría, souvenirs, desayunos y mucho más... Te esperamos desde el viernes 13 al domingo 15 de septiembre en Sarmiento 1867 C. de Buenos Aires de 13 a 20hs
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
      <div class="sombra6"></div> 
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