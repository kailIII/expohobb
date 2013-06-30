<?php
        
		if(isset($_GET['q'])){
			$q=$_GET['q'];
			  include_once 'includes.php';
			  $revista = new Revista();
      		  $revista = $revista->getRevista($q);
		}else{
		 	header( "Location:revistas.php");	
			}
      
	
?>
<!DOCTYPE html>
<head>
<title><?php echo $revista['title'];?> | Expohobby</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<!-- CSS -->
<link href="css/estilo.css" type="text/css" rel="stylesheet">
<link href="css/modals.css" type="text/css" rel="stylesheet">
<link href="css/jquery.ui.all.css" type="text/css" rel="stylesheet">
<!-- CSS -->
<!-- JS -->
<script type='text/javascript' src='slider/js/comment-reply.js?ver=20090102'></script>
<script type='text/javascript' src='slider/js/jquery/jquery.js?ver=1.7.1'></script>
<script type='text/javascript' src='js/general.js'></script>
<script type='text/javascript' src="js/jquery.ui.core.js"></script>
<script type='text/javascript' src="js/jquery.ui.widget.js"></script>
<script type='text/javascript' src="js/magnific-popup.js"></script>
<script type='text/javascript' src="js/jquery.ui.datepicker.js"></script>
<script type='text/javascript' src="js/jquery.cookie.js"></script>
<script src="ckeditor/ckeditor.js"></script>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<!-- JS -->
<meta property="og:title" content="<?php echo $revista['title'];?> | Expohobby" />
<meta property="og:description" content="<?php echo $revista['edition'];?>, <?php echo $revista['description'];?>. " />
<meta property="og:image" content="<?php echo $revista['image'];?>" />
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
  	<div id="cont-section">
		<article class="con-swf">
         	
            <header>
              <h2><?php echo $revista['title'];?></h2>
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
            <section>
            	<div class="descripcion-swf">
                    <p>
                      <span><?php echo $revista['edition'];?></span>
                     </p>
                     
                      <?php echo $revista['description'];?>
                    
              	</div>
                <div class="cont-arch">
                	<object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="580" height="456">
                	  <param name="movie" value="<?php echo $revista['swf']; ?>">
                	  <param name="quality" value="high">
                	  <param name="wmode" value="transparent">
                	  <param name="swfversion" value="6.0.65.0">
                	  <param name="expressinstall" value="Scripts/expressInstall.swf">
                	  <param name="SCALE" value="noborder">
                	  <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
                	  <!--[if !IE]>-->
                	  <object type="application/x-shockwave-flash" data="<?php echo $revista['swf']; ?>" width="580" height="456">
                	    <!--<![endif]-->
                	    <param name="quality" value="high">
                	    <param name="wmode" value="transparent">
                	    <param name="swfversion" value="6.0.65.0">
                	    <param name="expressinstall" value="Scripts/expressInstall.swf">
                	    <param name="SCALE" value="noborder">
                	    <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                	    <div>
                	      <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
                	      <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
              	      </div>
                	    <!--[if !IE]>-->
              	    </object>
                	  <!--<![endif]-->
              	  </object>

                </div>
                <div class="cont-btn-pdf">
                 <a class="btn-classic" href="<?php echo $revista['pdf'];?>" target="_blank" title="Descargar <?php echo $revista['title'];?> en formato PDF"> Descargar <?php echo $revista['title'];?> en formato PDF</a>
                </div>
            </section>
          
          
        </article>
    </div>
   </div>
	
<footer>
    <?php include_once 'footer.php'; ?>
  </footer>
<script type="text/javascript">
swfobject.registerObject("FlashID");
  </script>
</body>
</html>