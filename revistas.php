<!DOCTYPE html>
<?php include_once 'sesion.php'; ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Revistas | Expohobby</title>
    <?php include_once 'head.php'; ?> 

    <meta property="og:title" content="Aquí encontraras todas las revistas  EXPOHOBBY Deco Digital" />
    <meta property="og:description" content="En esta sección encontraras  todas las ediciones de la revista Expohobby digital.
Te esperamos y que las disfrutes!" />
    <meta property="og:image" content="/upload_images/revista.jpg" />
    <meta http-equiv="title" content="Revista expohobby digital"> 
    <meta name="DC.Creator" content="www.emafilms.com.ar"> 
    <meta name="keywords" content="revista, Revistas, digital, paso a paso, EXPOHOBBY Deco Digital ">
    <meta http-equiv="keywords" content="revista, Revistas, digital, paso a paso, EXPOHOBBY Deco Digital ">
    <meta name="description" content="En esta sección encontraras  todas las ediciones de la revista EXPOHOBBY Deco Digital. Los más destacados profesores del Arte y la Decoración reunidos para copmpratir todo su talento y originalidad.
Te esperamos y que las disfrutes!">
    <meta http-equiv="description" content="En esta sección encontraras  todas las ediciones de la revista EXPOHOBBY Deco Digital. Los más destacados profesores del Arte y la Decoración reunidos para copmpratir todo su talento y originalidad.
Te esperamos y que las disfrutes!"> 
    <meta http-equiv="DC.Description" content="En esta sección encontraras  todas las ediciones de la revista EXPOHOBBY Deco Digital. Los más destacados profesores del Arte y la Decoración reunidos para copmpratir todo su talento y originalidad.
Te esperamos y que las disfrutes!"> 
    <meta name="author" content="Expohobby">
    <meta name="DC.Creator" content="Estudio multimedia EB"> 
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
   		<p class="Cseccion"> Estas en > Revista</p>
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
      <?php
        include_once 'includes.php';
        $listado_revistas = new Revista();
        print $listado_revistas->getRevistas('normal_list');
      ?>
      <div id="modal_registration" class="zoom-anim-dialog mfp-hide modal_registration">
        <h3>Revista Expohobby</h3>
        <p>Para poder acceder a nuestras revistas usted debera ingresar un mail valido</p>
        <input type="hidden" id="estado_registro" value="inicio" />
        <div id="form_registro_email">
          <input id="registration_mail" type="email" onblur="" name="registration_mail" required="required" class="input_text_mail input_text" />
          <input id="revista_id" type="hidden" name="revista_id" class="input_text_mail input_text" />
          <input id="btn_registrar_mail" class="btn-classic" type="submit" value="Enviar" name="btn_registrar_mail" />
        </div>
      </div>
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