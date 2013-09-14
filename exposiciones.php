<?php   
 // $descrip = str_replace("<p>", " ", $revista['description']);  
 // $descrip = str_replace("</p>", " ", $descrip ); 
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
  	<div id="cont-section2">
      
		<article class="con-swf">
            <header>
              <h2 class="titexpo">Titulo de la exposicion </h2>
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
					
            </header>
            <section class="secexpo">
             
              	  <div class="descripcion-expo">

                  	<p><span>Septiembre 2013 V, S, D de 13:00hs a 20:00hs</span></p>
                  
                  </div>
                  <div class="cont-descrpexp">
                  		<div class="contimg_fot">
                          <div class="cont-img">
                            <img  src="imagenes/exposiciones.png"  />
                          </div>
                          <div class="sombra7"></div>
                      </div>
                      <div class="descripcion-expo2">
                         <p>Los mejores exponentes de la decoración de fiestas, decoración de tortas, modelado en porcelana fría, souvenirs, desayunos y mucho más... Te esperamos desde el viernes 13 al domingo 15 de septiembre en Sarmiento 1867 C. de Buenos Aires de 13 a 20hs</p>
                      </div>
                     <ul class="optdes_expo">
                     	<div class="itm1"></div>
                        <li><a href="#modal_confirmation_ver" id="seleccion1" class="seleccionar_us">Cómo llegar?</a></li>
                        <li><a href="#modal_confirmation_ver" id="seleccion2"  class="seleccionar_us">Acreditación</a></li>
                        <li class="ultli"><a href="#modal_confirmation_ver" id="seleccion3"  class="seleccionar_us">Reglamento</a></li>
                    
                    </ul>				
                  </div>
                  <div class="cont-opc-exp">
                 	
                  	<ul class="optdes_expo taman">
                     	
                        <li class="prili"><a href="#">Expositores</a></li>
                        <li><a href="#">Empresas Participantes</a></li>
                        <li><a href="#">Actividades</a></li>
                        <li><a href="#">Cómo participar?</a></li>
                        <li><a href="#">Planos</a></li>
                        <li><a href="#">Alojamiento</a></li>
                        <li class="ultli"><a href="#">Prensa</a></li>
                    </ul>
                    <div class="cont-arch">
                    </div>	
                  </div>	
            </section>
        </article>
    </div>
   </div>
   <!-- modal -->
   <div id="modal_confirmation_ver" class="zoom-anim-dialog mfp-hide modal_confirmation"></div>
   <script type="text/javascript">
                    jQuery(document).ready(function($) {
                        $("#seleccion1").click(function(){						
                   		$('#modal_confirmation_ver').html('<h3 class="cont_vermap">Cómo llegar a Titulo de la exposicion?</h3><iframe width="573" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.ar/maps?f=q&amp;source=s_q&amp;hl=es&amp;geocode=&amp;q=Sarmiento+1867&amp;aq=&amp;sll=-34.614562,-58.428726&amp;sspn=0.019178,0.042014&amp;ie=UTF8&amp;hq=&amp;hnear=Sarmiento+1867,+San+Nicol%C3%A1s,+Buenos+Aires&amp;ll=-34.605704,-58.393192&amp;spn=0.002398,0.005252&amp;t=m&amp;z=14&amp;output=embed"></iframe><img src="imagenes/subtes-08.jpg" alt="Subtes"/><button class="mfp-close" type="button" title="Close (Esc)">×</button>');
                        });
						 $("#seleccion2").click(function(){						
                   		$('#modal_confirmation_ver').html('<h3 class="cont_vermap">Descarga el Cupón con descuento!</h3><div id="form_registro_entr"><label>Nombre<input  type="text" onBlur="" required="required"  class="inptEnt"/></label><br><label>Apellido<input  type="text" onBlur="" required="required" class="inptEnt"/></label><br><label>Dni<input  type="text" onBlur="" required="required" class="inptEnt"/></label><br><label>Mail<input  type="email" id="registration_mail" onBlur="" required="required" name="validar_mail" class="input_text_mail input_text inptEnt"/></label><br><label>Repetir mail<input  type="email" required="required" onBlur="" name="registration2_mail" class="input_text_mail input_text inptEnt" /></label><br><label><input id="btn_registrar_mail" class="btn-classic redircbtn" type="submit" value="Enviar" name="btn_registrar_mail" /></label></div><div class="Sulerror">Si experimenta algun error, para obtener el cupon <a href="http://estudiomultimediaeb.com.ar/servistec.php" title="Estudio Multimedia EB">Click Aquí</a></div><button class="mfp-close" type="button" title="Close (Esc)">×</button>');
                        });
						  $("#seleccion3").click(function(){						
                   		$('#modal_confirmation_ver').html('<h3 class="cont_vermap">Reglamento para Titulo de la exposicion</h3><p>Reglamento General para Expositores<br>Stands<br>El stand consiste en un espacio parcelado sin paneles divisorios en el salón designado y contiene:<br>-Acceso a conexión eléctrica, iluminación general delsalón, 4 sillas<br>Los espacios no tienen tarimas, ni alfombras y el piso es madera de roble.La participación obliga al expositor a ocupar el espacio que le ha sidoasignado y a mantenerlo debidamente presentado y atenderlo por personal capacitado que atienda al público en los horarios dispuestos por la organización hasta la clausura de la misma. La muestra abre puntualmente en el horario establecido y la no presencia de personal en el stand en dicho horario no admite reclamos por faltantes de mercadería que no podrán imputarse al organizador a pesar de tener personal de seguridad en la muestra. Si durante el horario de atención al público, el expositor se viera en la necesidad de retirar una cantidad masiva de mercadería, deberá informarlo por escrito con papel membreteado de la empresa y el detalle de lo que se retira. Los espacios deben devolverse en las mismas condiciones que se recibieron, no se puede apoyar, clavar, ni pegar sobre las paredes No estará permitido dentro de los stands el uso de ningún elemento amplificador de sonido, tanto para anunciar clases como para dictarlas. Si Ud. desea realizar algún anuncio deberá utilizar el servicio sin cargo de la organización. de la muestra. No está permitido emitir música dentro de cada stand.<br><br> Servicios<br> Limpieza nocturna de los espacios comunes: (rogamos colocar los desperdicios diarios en bolsas plásticas al finalizar la muestra cada día en los pasillos del salón). Si durante el día necesitara un servicio especial de limpieza por algún inconveniente durante la muestra, rogamos acercarse al personal más próximo para resolverlo a la brevedad.<br> Servicio sin cargo diario del guardarropas para todo el personal asignado al stand.<br> Identificaciones de Personal: 4 por stand.<br> Los stands de Empresas recibirán 50 entradas s/cargo por stand.<br>Tener en cuenta<br> Al planear el armado de su stand es importante considerar que es responsabilidad de cada expositor mantener una actitud de buen vecino con los stands contiguos.<br> Si va a colocar paneles divisorios deben estar prolijamente pintados tanto del lado interior de su stand como del lado que enfrenta al stand de sus vecinos. La altura máxima no debe exceder los 2,20 mts. Los carteles no pueden exceder dicha altura.Los pasillos comunes no pueden ser interrumpidos en su circulación, si va a dar demostraciones</p><button class="mfp-close" type="button" title="Close (Esc)">×</button>');
                        });
                    });
  </script>
  <footer>
    <?php include_once 'footer.php'; ?>
  </footer>
</body>
</html>