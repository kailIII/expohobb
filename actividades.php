<?php include_once 'sesion.php'; ?>
<?php include_once 'includes.php';
  

?>
<!DOCTYPE html>
<head>
  <title><?php //echo $revista['title'];?> | Expohobby</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <!-- CSS -->
  <link href="css/estilo.css" type="text/css" rel="stylesheet">
  <link href="css/modals.css" type="text/css" rel="stylesheet">
  <link href="css/jquery.ui.all.css" type="text/css" rel="stylesheet">
  <link rel="shortcut icon" type="image/x-icon" href="imagenes/favicon.ico">
  <!-- CSS -->
  <!-- JS -->

  <script type='text/javascript' src='slider/js/comment-reply.js?ver=20090102'></script>
  <script type='text/javascript' src='slider/js/jquery/jquery.js?ver=1.7.1'></script>
  <script type='text/javascript' src='js/general.js'></script>
  <script type='text/javascript' src="js/jquery.ui.core.js"></script>
  <script type='text/javascript' src="js/jquery.ui.widget.js"></script>
  <script type='text/javascript' src="js/jquery.ui.datepicker.js"></script>
  <script type='text/javascript' src="js/jquery.cookie.js"></script>
  <script src="ckeditor/ckeditor.js"></script>

  <script type='text/javascript' src="js/magnific-popup.js"></script>
      <script src="js/imagesloaded.pkgd.js"></script>
        <script src="js/modernizr-transitions.js"></script>
  <script type='text/javascript' src='js/jquery-1.7.1.min.js'></script>

   <script src="js/jquery.masonry.min.js"></script>

  <!-- JS -->
  <meta property="og:title" content="<?php //echo $revista['title'];?> | Expohobby" />
  <meta property="og:description" content="<?php //echo $revista['edition'].' '.$descrip;?>"/>
  <meta property="og:image" content="<?php //echo $revista['image'];?>" />
  <meta http-equiv="title" content="<?php //echo $revista['title'];?>"> 
  <meta name="DC.Creator" content="www.estudiomultimedieaeb.com.ar"> 
  <meta name="keywords" content="revista, Revistas, digital, paso a paso, EXPOHOBBY Deco Digital ">
  <meta http-equiv="keywords" content="revista, Revistas, digital, paso a paso, EXPOHOBBY Deco Digital ">
  <meta name="description" content="<?php //echo $descrip;?>">
  <meta http-equiv="description" content="<?php //echo $descrip;?>"> 
  <meta http-equiv="DC.Description" content="<?php //echo $descrip;?>"> 
  <meta name="author" content="Expohobby">
  <meta name="DC.Creator" content="Estudio multimedia EB "> 
  <meta name="vw96.objectype" content="Document">
  <meta name="resource-type" content="Document"> 
  <meta name="distribution" content="all"> 
  <meta name="robots" content="all"> 
  <meta name="revisit" content="30 days">
</head>
<body class="actividadBody">
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

  <div class="balanse">
    <header>
      <?php include_once 'logo.php'; ?>
      <?php include_once 'main_menu.php'; ?>
      <?php 
        $newExpo = $expoClass->getOneExpo($_GET['id']); 
        $actividades = $expoClass->actividadesExpo($_GET['id']);
      ?>
    </header>
  </div>
  <div class="cont_actividad">
  
    <div class="libret">
    </div>
  
    <article  class="homepage">
      <header>
        <div class="title-act">
          <h1>Actividades para <span><?php echo $newExpo['title'];?></span></h1>
          <p><span><?php echo $newExpo['dias_horarios'];?></span></p>
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
        <div class="cont-descrpexp">
          <div class="contimg_fot">
            <div class="cont-img">
              <img title="<?php echo $newExpo['title'];?>" alt="<?php echo $newExpo['title'];?>" src="<?php echo $newExpo['image'];?>"  />
            </div>
          </div>
          <div class="descripcion-expo2">
            <p>Los mejores exponentes de la decoración de fiestas, decoración de tortas, modelado en porcelana fría, souvenirs, desayunos y mucho más... Te esperamos desde el viernes 13 al domingo 15 de septiembre en Sarmiento 1867 C. de Buenos Aires de 13 a 20hs</p>
          </div>   
          <div class="vol-exp"> <a class="btn-classic" title="<?php echo $newExpo['title'];?>" href="exposiciones.php?id=<?php echo $newExpo['id'];?>">Volver a <?php echo $newExpo['title'];?></a>
          </div>
        </div>   
      </header>
      <section>
        <div id="container">
          <!--  comienza repit de actividades-->
          <?php foreach ($actividades as $actividad): ?>
          <div class="item">
            <img class="imgact" title="<?php echo $newExpo['title'];?>" alt="<?php echo $newExpo['title'];?>" src="<?php echo $actividad['foto'];?>"  width="250" />
            <div class="cont-art-act-exp">
              <img class="img_exp" src="upload_images/revista.jpg" width="45"/>
              <p><span><strong><?php echo $actividad['stand'];?></strong></span></p><br>
              <p><span><?php echo $actividad['name'];?></span></p>
            </div>
            <div class="descrip-act"> 
              <p><?php echo $actividad['actividad'];?></p>
            </div> 
          </div>
        <?php endforeach; ?>
          <!--  fin repit de actividades-->
        </div>
      </section>
    </article>
</div>

<script>
  $(function(){
    var $container = $('#container').masonry();
    // layout Masonry again after all images have loaded
    $container.imagesLoaded( function() {
      $container.masonry({
          itemSelector: '.item',
          columnWidth:3,
          isAnimated: !Modernizr.csstransitions
        });
    });
  });
</script>
<div class="balanse"> 
  <footer>
    <?php include_once 'footer.php'; ?>
  </footer>
</div>
</body>
</html>