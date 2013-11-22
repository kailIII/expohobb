<?php include_once 'sesion.php'; ?>
<?php
  include_once 'includes.php';
  $expo = new Expo();
  $newExpo = $expo->getOneExpo($_GET['id']);
  header('Content-Type: text/html; charset=UTF-8'); 
?>
<!DOCTYPE html>
<head>
  <title><?php echo $newExpo['title'];?> | Expohobby</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <!-- CSS -->
  <link href="css/estilo.css" type="text/css" rel="stylesheet">
  <link href="css/modals.css" type="text/css" rel="stylesheet">

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
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

  <!-- JS -->
  <meta property="og:title" content="<?php echo $newExpo['title'];?> | Expohobby" />
  <meta property="og:description" content="<?php echo $newExpo['teaser'];?>"/>
  <meta property="og:image" content="<?php echo $newExpo['image'];?>" />
  <meta http-equiv="title" content="<?php echo $newExpo['title'];?>"> 
  <meta name="DC.Creator" content="www.estudiomultimedieaeb.com.ar"> 
  <meta name="keywords" content="Expociciones, expo, manualidades, muestras, eventos, arte, paso a paso ">
  <meta http-equiv="keywords" content="Expociciones, expo, manualidades, muestras, eventos, arte, paso a paso ">
  <meta name="description" content="<?php echo $newExpo['teaser'];?>">
  <meta http-equiv="description" content="<?php echo $newExpo['teaser'];?>"> 
  <meta http-equiv="DC.Description" content="<?php echo $newExpo['teaser'];?>"> 
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
  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
  <header>
    <?php include_once 'logo.php'; ?>
    <?php include_once 'main_menu.php'; ?>
  </header>
  <div id="cont-all">
  	<div id="cont-section2">
      
		<article class="con-swf">
            <header>
              <h2 class="titexpo"><?php echo $newExpo['title'];?></h2>
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

                  	<p><span><?php echo $newExpo['dias_horarios'];?></span></p>
                  
                  </div>
                  <div class="cont-descrpexp">
                  		<div class="contimg_fot">
                          <div class="cont-img">
                            <img title="<?php echo $newExpo['title'];?>" alt="<?php echo $newExpo['title'];?>" src="<?php echo $newExpo['image'];?>"  />
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
                        <li class="ultli"><a href="actividades.php?id=<?php echo $_GET['id'];?>">Actividades</a></li>
                    
                    </ul>				
                  </div>
                  <div class="con-act">
                  	<div class="titi-act">
                    	<h3>Actividades Recientes / <a href="actividades.php?id=<?php echo $_GET['id'];?>" target="_blank">Ver todas</a></h3>
                    </div>
                    <div class="cont-act-tull">
                    	<div class="cont-act-prev">
                      		<div class="contImgs">
                        		<img class="img_exp" src="upload_images/revista.jpg" width="150"/>
                             </div> 
                            <div class="cont-act-prev-text">
                            	<p><span><strong>Stand 003 - Creaciones Marolio</strong></span></p>
								<p>Esta es una descripcion de la actividad puede ser que sea de esta forma y solo con esta cantidad despues sigue con...</p>
                            </div>
                        </div>
                       <!-- --> 
                      <div class="cont-act-prev">
                      		<div class="contImgs">
                        		<img class="img_exp" src="upload_images/revista.jpg" width="150"/>
                             </div>   
                            <div class="cont-act-prev-text">
                            	<p><span><strong>Stand 003 - Creaciones Marolio</strong></span></p>
								<p>Esta es una descripcion de la actividad puede ser que sea de esta forma y solo con esta cantidad despues sigue con...</p>
                            </div>
                        </div>  
  			
                    </div>
                  <div class="cont-opc-exp">
                 	<div id="tabs">
                            <ul class="optdes_expo taman">
                                
                                <li class="prili"><a href="#tabs-1">Expositores</a></li>
                                <li><a href="#tabs-2">Empresas Participantes</a></li>
                                <li><a href="#tabs-3">Planos</a></li>
                                <li><a href="#tabs-4">Cómo participar?</a></li>
                                <li><a href="#tabs-5">Reglamento</a></li>
                                <li><a href="#tabs-6">Alojamiento</a></li>
                                <li class="ultli"><a href="#tabs-7">Prensa</a></li>
                            </ul>
                            <div class="cont-arch" style="width:838px; display:inline-block">
                                    <div id="tabs-1">
                                    <!-- empieza expositores -->
                                    <div class="cont-exp">
                                        <div class="cont_exp">
                                            <img class="img_exp" src="upload_images/revista.jpg" width="110"/>
                                             <div  class="conttext">
                                                <p><span><strong>Stand 003 - Creaciones Marolio</strong></span></p>
                                                <p>Una breve descripcion de la empresa que participa en el evento. nada de otro mundo provando capacidad de textp en este  recuadro hay que ver si queda mejor este con cuadrado o sin cuadrado</p>
                                            </div>
                                          </div>
                                          <div class="sombra8"></div>
                                    </div>
                                    <!-- Termina expositores-->
                                   
                            	 </div>
                                 <div id="tabs-2">
                                   <!-- empieza expositores -->
                                    <div class="cont-exp">
                                        <div class="cont_exp">
                                            <img class="img_exp" src="upload_images/revista.jpg" width="110"/>
                                             <div  class="conttext">
                                                <p><span><strong>Stand 233 - Cotillon Eva</strong></span></p>
                                                <p>Una breve descripcion de la empresa que participa en el evento. nada de otro mundo provando capacidad de textp en este  recuadro hay que ver si queda mejor este con cuadrado o sin cuadrado</p>
                                            </div>
                                          </div>
                                          <div class="sombra8"></div>
                                    </div>
                                    <!-- Termina expositores-->
                            	 </div>
                                 <div id="tabs-3">
                                  <img  class="planoImg" src="<?php echo $newExpo['plano'];?>" alt="Plano de <?php echo $newExpo['title'];?>"/>
                            	 </div>
                                 <div id="tabs-4">
                                   <?php echo $newExpo['como_participar'];?>
                            	 </div>
                                 <div id="tabs-5">
                                   <?php echo $newExpo['reglamento'];?>
                            	 </div>
                                 <div id="tabs-6">
                                   <?php echo $newExpo['alojamiento'];?>
                            	 </div>
                                 <div id="tabs-7">
                                   <?php echo $newExpo['prensa'];?>
                            	 </div>
                    	 </div>
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
                   		$('#modal_confirmation_ver').html('<h3 class="cont_vermap">Cómo llegar a <?php echo $newExpo['title'];?>?</h3><?php echo $newExpo['maps'];?><img src="imagenes/subtes-08.jpg" alt="Subtes"/><button class="mfp-close" type="button" title="Close (Esc)">×</button>');
                        });
						
                    });
  </script>
  <footer>
    <?php include_once 'footer.php'; ?>
  </footer>
</body>
</html>