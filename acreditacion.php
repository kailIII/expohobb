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
  <title>Acreditación para <?php echo $newExpo['title'];?> | Expohobby</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <!-- CSS -->
  <link href="css/estilo.css" type="text/css" rel="stylesheet">
  <link href="css/modals.css" type="text/css" rel="stylesheet">
 <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
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
 
<script src="js/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
<script  src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<!--<script  src="validationengine.jquery.json" type="text/javascript" charset="utf-8"></script>-->

	<script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#formID").validationEngine();
			$("#formID").bind("jqv.field.result", function(event, field, errorFound, prompText){ console.log(errorFound) })
		});
            
		/**
		*
		* @param {jqObject} the field where the validation applies
		* @param {Array[String]} validation rules for this field
		* @param {int} rule index
		* @param {Map} form options
		* @return an error string if validation failed
		*/
</script>

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

  <header>
    <?php include_once 'logo.php'; ?>
    <?php include_once 'main_menu.php'; ?>
  </header>
  <div id="cont-all">
  	<div id="cont-section2">
      
		<article class="con-swf">
            <header>
              <h2 class="titexpo">Acreditación para <?php echo $newExpo['title'];?></h2>
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
                  <?php if(isset($_GET['bien']) and $_GET['bien']=='mail_ok'){ ?>
                   <div class="mail_gracias">
					  <h3>Felicitaciones!!</h3>
					  <p>Ya está acreditado para <strong><?php echo $newExpo['title'];?></strong> en unos minutos llegara un mail a su casilla de correo, <strong>Atencion!</strong> si no recibió el mail asegúrese de que no esté como spam o como correo no deseado. 
						</p>
					  <span></span>
                	</div>
                   <?php }else{?>
                  <div class="contac acrForm">
                  <?php if(isset($_GET['error']) and $_GET['error']=='camp_email_mal'){ 
                    echo "<div class='alert-error'>
  						
  								<p><strong>Ocurrió un problema!</strong> No se ha podido enviar la acreditación a ese email, por favor intente nuevamente.</p>
							</div>";
                  
				  }else{ if(isset($_GET['error']) and $_GET['error']=='camp_repetido'){
					  echo "<div class='alert-error'>
  						
  								<p><strong>Ocurrió un problema!</strong> Este email ya fue registrado para esta exposición, por favor intente nuevamente con otro</p>
							</div>";
					  
					  }else{ if(isset($_GET['error']) and $_GET['error']=='camp_vacio'){
						echo "<div class='alert-error'>
  						
  								<p><strong>Ocurrió un problema!</strong> Campos vacíos? , por favor complete nuevamente el formulario</p>
							</div>";
						  
					  }
						  
					  }
					  } ?>
                        <form id="formID" class="formular" method="post" action="controllers.php">
                        <input type="hidden" name="id_expo" value="<?php echo $newExpo['id'];?>"/>
                        <input type="hidden" name="nomExp" value='<?php echo $newExpo['title'];?>'/>
                        <input type="hidden" name="fechExp" value="<?php echo $newExpo['fecha_inicio'];?>"/>
                        <div class="nomAp">
                        <fieldset class="mrigth leftForm ">
                            <label>
                               
                                <input placeholder="Nombre" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nombre'" class="validate[required] text-input inputCn nombForm" type="text" name="nombre" id="nombre" />
                            </label>
                        </fieldset>
                        <fieldset class="leftForm">
                            <label>
                                
                                <input placeholder="Apellido" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Apellido'" class="validate[required] text-input inputCn apllForm" type="text" name="apellido" id="apellido" />
                            </label>
                        </fieldset>
                       </div> 
                        
                        
                            <fieldset>
                                    <label>
                                        <input placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" class="validate[required],custom[email], ajax[ajaxUser] text-input inputCn mailForm" type="text" name="mail" id="mail"/>
                                    </label>

                                   
                            </fieldset>
                     <fieldset> 
                            	 <label>  
                                        <input placeholder="Repetir Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Repetir Email'" class="validate[required,equals[mail]] text-input inputCn mailForm" type="text" name="mail2" id="mail2" />
                                        <br/>
                                    </label>
                                </fieldset>
                                <div class="nomAp">  
                                    <fieldset class="mrigth leftForm">
                                        <label>
                                           
                                            <input placeholder="Dni" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Dni'" class="validate[required,custom[integer],min[10]] text-input inputCn dniForm" type="text" name="dni" id="dni" />
                                        </label>
                                 </fieldset>
                                <fieldset class="leftForm">
                                    <label>
                                        <span><img  class="capt" src="captcha.php"/></span>
                                        <input placeholder="Código" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Código'" class="validate[required,ajax[ajaxCaptcha]] text-input inputCn captForm" type="text" name="user" id="user" />
                                    </label>
                                </fieldset>
                       		 </div>
                        <input class="submit btn-classic" type="submit"  value="Generar cupón" name="acreditacion" id="acreditacion"/>
                        <div class="textLoad" style="display:none; ">Enviando email, por favor aguarde…</div>
                        <div id="cargador2" style="display:none; "></div>
                        </form>
                        
                <div class="ayuda2">
              	<img width="32" src="imagenes/atencion.png">
            	<p>Si presenta algún inconveniente técnico al generar la acreditación <a title="Estudio Multimedia EB" target="_blank" href="http://www.estudiomultimediaeb.com.ar/servistec.php">Click Aquí</a></p>
             
            </div>
                  </div>
                  <?php } ?>
            </section>
        </article>
    </div>
   </div>
 
  <footer>
    <?php include_once 'footer.php'; ?>
  </footer>
</body>
</html>