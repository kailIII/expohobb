<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" dir="ltr" lang="en-US">
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<!--<![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Expohobby</title>
<link href="estilo.css" type="text/css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="http://code.udesignstudios.net/uBillboard/wp-content/themes/themes-ubillboard/js/html5.js" type="text/javascript"></script>
<![endif]-->
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel='stylesheet' id='uds-billboard-css'  href='slider/css/billboard.min.css?ver=3.1.1' type='text/css' media='screen' />
<script type='text/javascript' src='slider/js/comment-reply.js?ver=20090102'></script>
<script type='text/javascript' src='slider/js/jquery/jquery.js?ver=1.7.1'></script>
</head>

	<body>
   		 <div id="fb-root"></div>
				<script>(function(d, s, id) {
 					 var js, fjs = d.getElementsByTagName(s)[0];
  					 if (d.getElementById(id)) return;
 					 js = d.createElement(s); js.id = id;
  					 js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
 					 fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));
                 </script>
 		<header>
     		<div class="logoexhohobby">
       			<h1><a href="#"><span>Expohobby</span></a></h1>
     		</div> 
     		<nav>
        		<ul>
          			<li>
                      <a title="Inicio" href="#">Inicio</a>
          			</li>
                    <li>
                     <a title="Exposiciones" href="#">Exposiciones</a>
          			</li>
                    <li>
                     <a title="Revista" href="#">Revista</a>
          			</li>
                    <li>
                     <a title="Empresa" href="#">Empresa</a>
          			</li>
                    <li>
                     <a title="Contacto" href="#">Contacto</a>
          			</li>
        		</ul>
                <div id="redes-sociales">
                    <a href="#" title="Facebook Expohobby" class="face"><span>Facebook"</span></a>
                    <a href="#" title="Twitter Expohobby" class="twit"><span>Twitter"</span></a>
                    <a href="#" title="Youtube Expohobby" class="youtube"><span>Youtube"</span></a>
             	</div> 
             </nav>  
             
        <script>
  				jQuery(document).ready(function(){
  				jQuery("a[title='Exposiciones']").click(function(){
  				jQuery('.deplegablemenu').show();
  				
  				
  				});
  				jQuery(".deplegablemenu").mouseleave(function(){
  				jQuery('.deplegablemenu').hide();
  				jQuery("nav a").removeClass('select');
  				});
  				
  				jQuery('.deplegablemenu').hide();
  				});
  				
  				jQuery("nav a").click(function(){
  		
  						jQuery("nav a").removeClass('select');			   
  						jQuery(this).addClass('select');
  						jQuery('.deplegablemenu').hide();

  				});
  				jQuery(document).ready(function() {
						jQuery('#redes-sociales a').fadeTo('slow', 0.5);
						jQuery('#redes-sociales a').hover(function() {
						jQuery(this).fadeTo('slow', 1.0);
				    }, function() {
							jQuery(this).fadeTo('slow', 0.5);
				    });
  				});
				</script>
              	<div class="deplegablemenu">
                	<div class="pico"></div>
                    <div class="cont-listado">
                        <div class="list">
                        	<a href="#" title="Nombre de la expo"><img alt="expo" border="0" src="nonelist.jpg" width="86" height="113"></a>
                        	<div class="cont-datos"> 
                                <div class="fecha-list">
                                    <p>Expo: <strong>Abril  2013</strong> Mi, V, J, S, D de 18:00hs a 20:00hs</p>
                                </div>
                                <h2 class="abril"><a href="#" title="Nombre de la expo">Todo el arte en un solo lugar</a></h2>
                                <div class="decript-list">
                                    <p>El evento tiene como objetivo el mercado Empresarial
y Artístico. Por un lado están las empresas que publicitan 
sus marcas, los comercios que nos proveen de los materiales 
necesarios para el desarrollo de los diferentes. </p>
                            	</div>   
                            </div>
                            
                        </div>
                        <div class="list-invert">
                        	<a href="#" title="Nombre de la expo"><img alt="expo" border="0" width="86" height="113" src="nonelist.jpg"></a>
                        	<div class="cont-datos">
                                <div class="fecha-list">
                                    <p>Expo: <strong>Sep  2013</strong> Mi, V, J, S, D de 18:00hs a 20:00hs</p>
                                </div>
                                <h2 class="septiembre"><a href="#" title="Nombre de la expo">Todo el arte en un solo lugar</a></h2>
                                <div class="decript-list">
                                    <p>El evento tiene como objetivo el mercado Empresarial
y Artístico. Por un lado están las empresas que publicitan 
sus marcas, los comercios que nos proveen de los materiales 
necesarios para el desarrollo de los diferentes. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="cont-bon-list">
                    	<a href="#" class="ver-todas-menu">
                    	<strong>Ver todas las</strong> <span class="color-inst">Expohobby's</span>
                    	</a>
                    
                    </div>
                </div>
      		
  		</header>
        <div id="cont-all"> 
        		
                 	<div class="cont-slider">
                	<?php
					include('slider/fotosprincipales.php');
					   ?>
                 	</div>
                  
		<div id="cont-section"> 
        			   <div class="separdor">
                      </div>	
  				<section>
                	  
     				 <article class="revista">
                     		<div class="cont-art">
         						<a href="#" ><img  alt="imag" border="0px" width="144" height="173" src="none.jpg"></a>
        						<header>
          							<h2>Titulo de la ultima revista</h2>
        						</header>
								<section>
          							<p class="subtitulo">Edición <strong>25 de julio 2013</strong></p>
          							<div class="descripcion">
          								<p>Hola este es el texto descriptivo para saber que va aca tanto sea una revista o una exposicion por eso esto va aca. Hola este es el texto descriptivo para saber que va aca tanto sea una revista o una exposicion por eso esto va aca </p>
          							</div>
        						</section>
                             </div>    
                                <div class="clsContenedor">
										<div class="clsTitulo">
												<h2>Titulo de la revisata</h2>
										</div>
										<div class="clsContenido">
											<a class="bnt-ver" href="#"> Ver</a>
                                            <div class="contbtn">
											<a  class="btn-classic" href="#"> Suscribirse a la revista</a><a class="btn-classic" href="#"> Ver todas las revistas</a></div>
										</div>
								</div>
      				</article>
     				<article class="exposiciones">
     							 <a href="#" ><img alt="imag"  border="0px" width="144" height="173" src="none.jpg"></a>
        						<header>
         						 	<h2><a href="#">Titulo de la exposicion</a></h2>
        						</header>
        						<section>
           							<p class="subtitulo">Edición <strong>25 de julio 2013</strong></p>
          							<div class="descripcion">
          							<p>Hola este es el texto descriptivo para saber que va aca tanto sea una revista o una exposicion por eso esto va aca. Hola este es el texto descriptivo para saber que va aca tanto sea una revista o una exposicion por eso esto va aca </p>
          							</div>
                                    <a href="#" class="btn-classic2">Ver todas las <span class="color-inst">Expohobby's</span></a>
        						</section>
      				</article>
  			</section>
  			<aside class="facebook">
            	<div class="fb-like-box" data-href="http://www.facebook.com/pages/EXPOHOBBY/130321180395748" data-width="256" data-height="382" data-show-faces="false" data-stream="true" data-header="false">
            	</div>
    		</aside>
            <div class="separdor">
            </div>	
  			<aside class="publicidad">
            	<div class="cont-img-publ">
            		<img alt="imag" border="0" src="imgnone.jpg" width="139"> 
            	</div>
                <div class="cont-img-publ">
            		<a href="#"><img alt="imag" border="0" src="imgnone.jpg" width="139"></a>
            	</div>
                <div class="cont-img-publ">
            		<img alt="imag" border="0" src="imgnone.jpg" width="139"> 
            	</div>
                <div class="cont-img-publ">
            		<a href="#"><img alt="imag" border="0" src="imgnone.jpg" width="139"></a>
            	</div>
                <div class="cont-img-publ">
            		<img alt="imag" border="0" src="imgnone.jpg" width="139" height="83"> 
            	</div>
                <div class="cont-img-publ">
            		<a href="#"><img alt="imag" border="0" src="imgnone.jpg" width="139"></a>
            	</div>
    		</aside>
        
        </div>
        </div>          
 	 <footer>
    	<p>Copyleft 2013</p>
 	</footer>
</body>
</html>