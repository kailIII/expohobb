<?php
  include_once 'sesion.php';
  header('Content-Type: text/html; charset=UTF-8'); 
?>
<!DOCTYPE html>
<head>
  <title>Expociciones | Expohobby </title>
 <?php include_once 'head.php'; ?> 
  
  <meta property="og:title" content="Todas las Expohobbys en un solo lugar" />
  <meta property="og:description" content="En expohobby nos dedicamos a la difusión del mundo del arte y la decoración, desarrollando distintas actividades como exposiciones, cursos, revistas, newsletteria y demás herramientas que promueven las obras de los mas diversos y reconocidos exponentes del rubro."/>
  <meta property="og:image" content="/imagenes/logoexp.jpg" />

  <meta http-equiv="title" content="Todas las Expohobbys en un solo lugar"> 
  <meta name="DC.Creator" content="www.estudiomultimedieaeb.com.ar"> 
  <meta name="keywords" content="Expociciones, expo, manualidades, muestras, eventos, arte, paso a paso ">
  <meta http-equiv="keywords" content="Expociciones, expo, manualidades, muestras, eventos, arte, paso a paso ">
  <meta name="description" content="En expohobby nos dedicamos a la difusión del mundo del arte y la decoración, desarrollando distintas actividades como exposiciones, cursos, revistas, newsletteria y demás herramientas que promueven las obras de los mas diversos y reconocidos exponentes del rubro.">
  <meta http-equiv="description" content="En expohobby nos dedicamos a la difusión del mundo del arte y la decoración, desarrollando distintas actividades como exposiciones, cursos, revistas, newsletteria y demás herramientas que promueven las obras de los mas diversos y reconocidos exponentes del rubro."> 
  <meta http-equiv="DC.Description" content="En expohobby nos dedicamos a la difusión del mundo del arte y la decoración, desarrollando distintas actividades como exposiciones, cursos, revistas, newsletteria y demás herramientas que promueven las obras de los mas diversos y reconocidos exponentes del rubro."> 
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
    <?php 
      include_once 'logo.php'; 
      include_once 'main_menu.php'; 
      $expos = $expoClass->expoPorMes();
    ?>
  </header>
  <div id="cont-all">

    <div class="cont-slider">
      <?php include('slider/fotosprincipales.php'); ?>
    </div>

    <div id="cont-section">
    <div class="sombra2"></div>
     <div class="contredesysecc">
      <p class="Cseccion"> Estas en > Exposiciones</p>
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
      <section class="sec-exp">
      	<article>
          <div class="cont-exp-ind">
          	<header class="con-exp-header">
              <div class="cont-exp-ind-tit">
              
                <h2>Expohobby Abril</h2>
                <p>Aqui encontraras todo nuestro historial sobre las exposiciones de Abril</p>
              </div>
            </header>
            <section>
              <img src="imagenes/exposiciones.png" width="350"/>
              <ul class="list-exp">
                <?php 
                  foreach ($expos['04'] as $expo) {
                    echo '<li><a href="exposiciones.php?id=' . $expo['id'] . '" title="' . $expo['title'] . '">' . $expo['title'] . '</a></li>';
                  }
                ?>
              </ul>
			</section>
            
           </div>
        
 		</article>
        
        <article>
          <div class="cont-exp-ind">
          	<header class="con-exp-header">
              <div class="cont-exp-ind-tit">
              
                <h2>Expohobby Septiembre</h2>
                <p>Aqui encontraras todo nuestro historial sobre las exposiciones de Septiembre</p>
              </div>
            </header>
            <section>
              <img src="imagenes/exposiciones.png" width="350"/>
              <ul class="list-exp">
               <?php 
                  foreach ($expos['09'] as $expo) {
                    echo '<li><a href="exposiciones.php?id=' . $expo['id'] . '" title="' . $expo['title'] . '">' . $expo['title'] . '</a></li>';
                  }
                ?>
              </ul>
			</section>
           </div>
 		</article>
      </section> 
       <div class="separdor"></div>
        <?php
        $publicidad = new Publicidad();
        print $publicidad->viewPublicidad('chica');
      ?>
    </div>
  </div>
 
  

  <footer>
    <?php include_once 'footer.php'; ?>
  </footer>
</body>
</html>