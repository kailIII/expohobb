<?php if(isset($_GET['id']) and $_GET['id'] != ""){
		include_once 'sesion.php'; 
		include_once 'includes.php';
		  $expo = new Expo();
		  if(isset($_SESSION['usuario'])){
   			 if($validador->cookieValidator($_SESSION['usuario'],$_SESSION['token']) == 'ok'){
				$newExpo = $expo->getOneExpo($_GET['id'],1);	 
			}else{
				$newExpo = $expo->getOneExpo($_GET['id'],0);
			}
		  }else{
			 $newExpo = $expo->getOneExpo($_GET['id'],0); 
		  }

			$descrip = str_replace("<p>", " ", strip_tags($newExpo['teaser']));  
		  $descrip = str_replace("</p>", " ", $descrip ); 
		  $descrip = str_replace("<em>", " ", $descrip ); 
		  $descrip = str_replace("</em>", " ", $descrip );
		  $descrip = str_replace("<strong>", " ", $descrip );
		  $descrip = str_replace("</strong>", " ", $descrip );
	}else{
			header( "Location:exposicion.php");	
		}
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
  <meta property="og:title" content='<?php echo $newExpo['title'];?> | Expohobby' />
  <meta property="og:description" content='<?php echo $descrip;?>'/>
  <meta property="og:image" content="<?php echo $newExpo['image'];?>" />
  <meta http-equiv="title" content='<?php echo $newExpo['title'];?>'> 
  <meta name="DC.Creator" content="www.estudiomultimedieaeb.com.ar"> 
  <meta name="keywords" content="Expociciones, expo, manualidades, muestras, eventos, arte, paso a paso ">
  <meta http-equiv="keywords" content="Expociciones, expo, manualidades, muestras, eventos, arte, paso a paso ">
  <meta name="description" content='<?php echo $descrip;?>'>
  <meta http-equiv="description" content='<?php echo $descrip;?>'> 
  <meta http-equiv="DC.Description" content='<?php echo $descrip;?>'> 
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
    $(function() {
    $( "#optdes_expo" ).selectable();
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
                    <?php
                      $ahora = date('Y-m-d');
                      $fin = $newExpo['fecha_fin']; 
                      if($ahora < $fin){
                        $vigente = true;
                      }else{
                        $vigente = false;
                      }
                    ?>
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
                         <?php echo $newExpo['body'];?>
                      
                    <?php if($vigente): ?>
                      <ul class="optdes_expo">
                       	<div class="itm1"></div>
                        <div class="contUlsub">
                          <?php if(!empty($newExpo['maps'])): ?>
                            <li><a href="#modal_confirmation_ver" id="seleccion1" class="seleccionar_us">Cómo llegar?</a></li>
                          <?php endif?>                          
                          <li><a href="actividades.php?id=<?php echo $_GET['id'];?>">Actividades</a></li>
                          <?php if(!empty($newExpo['img_acr'])): ?>
                          <li class="ultli"><a href="acreditacion.php?id=<?php echo $newExpo['id'];?>" id="acreditacion"  class="acreditacion">Acreditación</a></li>
                          <?php endif?> 
                        </div> 
                      </ul>
                      </div>
                    <?php endif;?>	
                  </div>
                  <div class="con-act">
                    <?php if($vigente): ?>

                  	
                    <?php $actividadesRecientes = $expoClass->ultimasDosActividades($_GET['id']);?>
                      <?php if($actividadesRecientes):?>
                      	<div class="titi-act">
                    		<h3>Actividades Recientes</h3>
                    	</div>
                        <?php  foreach ($actividadesRecientes as $key => $actividad): ?>
                          <div class="cont-act-tull">
                            <div class="cont-act-prev">
                              <div class="contImgs">
                                <img class="img_exp" src="<?php echo $actividad['foto'];?>" width="150"/>
                              </div> 
                              <div class="cont-act-prev-text">
                                <p><span><strong><?php echo $actividad['name'];?></strong></span></p>
                                <p><span><strong><?php echo $actividad['stand'];?></strong></span></p>
                                <p><?php echo $actividad['actividad'];?></p>
                              </div>
                            </div>
                          </div>
                      <?php endforeach ?>
                    <?php endif ?>
                  <div class="cont-opc-exp">
                  <div id="tabs">
                    <ul class="optdes_expo taman">
                      <?php $expositores = $expoClass->traerEmpresas($_GET['id']); ?>
                      <?php $empresas = $expoClass->traerExpositores($_GET['id']); ?>  
                      <?php if($expositores):?>
                        <li class="prili ui-widget-content"><a href="#tabs-1">Expositores</a></li>
                      <?php endif; ?>
                      <?php if($empresas): ?>
                        <li class="ui-widget-content"><a href="#tabs-2">Empresas Participantes</a></li>
                      <?php endif; ?>
                      <?php if(!empty($newExpo['plano'])): ?>
                        <li class="ui-widget-content"><a href="#tabs-3">Planos</a></li>
                      <?php endif; ?>
                      <?php if(!empty($newExpo['como_participar'])): ?>
                        <li class="ui-widget-content"><a href="#tabs-4">Cómo participar?</a></li>
                      <?php endif; ?>
                      <?php if(!empty($newExpo['reglamento'])): ?>
                        <li><a href="#tabs-5">Reglamento</a></li>
                      <?php endif; ?>
                      <?php if(!empty($newExpo['alojamiento'])): ?>
                        <li class="ui-widget-content"><a href="#tabs-6">Alojamiento</a></li>
                      <?php endif; ?>
                      <?php if(!empty($newExpo['prensa'])): ?>
                        <li class="ultli ui-widget-content"><a href="#tabs-7">Prensa</a></li>
                      <?php endif; ?>
                    </ul>
                    <div class="cont-arch" style="width:838px; display:inline-block">
                      <?php if($expositores): ?>
                      <div id="tabs-1">
                        <!-- empieza expositores -->
                          <?php if($expositores):?>
                            <?php  foreach ($expositores as $expositor): ?>
                              <div class="cont-exp">
                                  <div class="cont_exp">
                                      <img class="img_exp" src="<?php echo $expositor['image'];?>" width="110"/>
                                       <div  class="conttext">
                                          <p>  <span><strong><?php echo $expositor['name'];?></strong></span> <br><span class="ubStand"><strong><?php echo $expositor['stand'];?></strong></</span></p>
                                          <p><?php echo $expositor['description'];?></p>
                                      </div>
                                    </div>
                                    <div class="sombra8"></div>
                              </div>
                            <?php endforeach ?>
                          <?php endif ?>
                        <!-- Termina expositores-->
                      </div>
                      <?php endif ?>
                      <?php if($empresas): ?>
                      <div id="tabs-2">
                         <!-- empieza expositores -->
                         <?php if($empresas):?>
                            <?php  foreach ($empresas as $empresa): ?>
                              <div class="cont-exp">
                                  <div class="cont_exp">
                                      <img class="img_exp" src="<?php echo $empresa['image'];?>" width="110"/>
                                       <div  class="conttext">
                                          <p><span><strong><?php echo $empresa['name'];?></strong></span>  <br> <span class="ubStand"><strong><?php echo $empresa['stand'];?></strong></</span></p>
                                          <p><?php echo $empresa['description'];?></p>
                                      </div>
                                    </div>
                                    <div class="sombra8"></div>
                              </div>
                            <?php endforeach ?>
                          <?php endif ?>
                          <!-- Termina expositores-->
                      </div>
                      <?php endif?>
                      <?php if(!empty($newExpo['plano'])): ?>
                      <div id="tabs-3">
                        <img  class="planoImg" src="<?php echo $newExpo['plano'];?>" alt="Plano de <?php echo $newExpo['title'];?>"/>
                      </div>
                      <?php endif?>
                      <?php if(!empty($newExpo['como_participar'])): ?>
                      <div id="tabs-4">
                        <?php echo $newExpo['como_participar'];?>
                      </div>
                      <?php endif?>
                      <?php if(!empty($newExpo['reglamento'])): ?>
                      <div id="tabs-5">
                        <?php echo $newExpo['reglamento'];?>
                      </div>
                      <?php endif?>
                      <?php if(!empty($newExpo['alojamiento'])): ?>
                      <div id="tabs-6">
                        <?php echo $newExpo['alojamiento'];?>
                      </div>
                      <?php endif?>
                      <?php if(!empty($newExpo['prensa'])): ?>
                      <div id="tabs-7">
                        <?php echo $newExpo['prensa'];?>
                      </div>
                      <?php endif?>
                    </div>
                  </div>	
                </div>	
              <?php else:?>
              	
            <div class="cont-opc-exp">
                 <div id="tabs">
                    <ul class="optdes_expo taman">
               			<?php $images = $expoClass->traerImagenes($_GET['id']); ?>
                        
                  		<li><a href="#tabs-1">Imagenes</a></li>
                       
                       <?php if(!empty($newExpo['video'])): ?>
                        <li><a href="#tabs-2">Video</a></li>
                      <?php endif; ?>
                    </ul>
                    <div class="cont-arch" style="width:838px; display:inline-block">
                    <div id="tabs-1">
                    	<!--  comienza repit imagenes-->
                        <?php if(empty($images)): ?>
                          <p style=" width:770px !important" class="vacioAct">En breve subiremos todas las imágenes de esta gran exposición, donde podrás encontrarte si estuviste allí o bien disfrutar de todo lo que paso!. </p>
						 <?php endif; ?>
                        <?php if($images): ?>
                          <div class="zoom-gallery">
                          <?php foreach ($images as $image): ?>
                            <a href="<?php echo $image['image'];?>" title='<?php echo $newExpo['title'];?>'>
                              <img class="imgGal" title='<?php echo $newExpo['title'];?>' alt="<?php echo $newExpo['title'];?>" src="<?php echo $image['image'];?>"  width="185" />
                            </a>
                          <?php endforeach; ?>
                          </div>
                        <?php endif?>
                        <!--  fin repit de imagenes-->
             			 </div>
             		 <?php endif ?>
                    <?php if(!empty($newExpo['video'])): ?>
                      <div id="tabs-2">
                        <?php echo $newExpo['video'];?>
                      </div>
                   <?php endif?> 
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