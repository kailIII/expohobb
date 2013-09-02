<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
    <title>Servicio tecnico</title>
  
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
<script type='text/javascript' src="js/magnific-popup.js"></script>
<script type='text/javascript' src="js/jquery.ui.datepicker.js"></script>
<script type='text/javascript' src="js/jquery.cookie.js"></script>
<script src="ckeditor/ckeditor.js"></script>


      
    
    </head>
  <body>
  <?php 
  session_start();
  
  if(isset($_SESSION['user']) and $_SESSION['user']== "emanuel" or isset($_SESSION['user']) and $_SESSION['user']== "daniela"){
  ?>
    <header>
     <?php
       if(isset($_POST['mail'])){
			  			
						 $mails=$_POST['mail'];
						  }else{
						  $mails="";
						  } ?>
     
    </header>
    <div id="cont-all"> 
         <script>
		jQuery(function ($) {
		  $(".btnent").click(function () {
      	$(".cont0").hide("slow");
		      	$(".cont1").show("slow");
		
		}); 
		  $(".btnreb").click(function () {
      	$(".cont1").hide("slow");
		      	$(".cont0").show("slow");
		
		}); 
		 
		 }); 
		</script>
      <div id="cont-section"> 
         <form id="form_reg" action="index_rev.php" method="POST" enctype="multipart/form-data">
          
         
            
             
              <div class="input_wapper">
              Buscador: <input type="text" name="mail" value="<?php echo  $mails; ?>"/>
                <input id="pagina_ir" class="btn_general btn-classic" type="submit" value="IR" name="pagina_ir" style="display:inline-block !important;"/>
               <div class="btnreb btn_general btn-classic" style=" display:inline !important;">Registro de revista</div>
      <div class="btnent btn_general btn-classic " style=" display:inline !important;">Registro de Entradas</div>
              </div>
            
             
        
        </form>


     
      <div class="cont1" style="display:none">
      		<div id="modal_confirmation_ver" class="zoom-anim-dialog mfp-hide modal_confirmation">
				
			</div>
        <?php
          include_once 'class/DataBase.php';
		   include_once 'class/Usuario1.php';
          $usuarios1 = new Usuario1();
		    if(isset($_POST['selector_pagina1'])){
			
            $page1 = $_POST['selector_pagina1'];
			
			 
          }else{
			$page1 = 1;
          }
		  
          
		 
         
          $listado_usuarios1 = $usuarios1->getUsuarios1($page1, $mails);
		 
        ?>
      
        <form id="form_reg" action="index_rev.php" method="POST" enctype="multipart/form-data">
          
         <input  type="hidden" name="mail" value="<?php echo  $mails; ?>"/>
            
             
              <div class="input_wapper">
             
                
                
                <?php print $listado_usuarios1['pager']; ?><input id="pagina_ir" class="btn_general btn-classic" type="submit" value="IR" name="pagina_ir" style="display:inline-block !important;"/>
               
              </div>
            
             
        
        </form>
        <h2 style="margin:15px auto 0px auto; padding:5px; width:301px;">Entradas para expohobby</h2>
  
     <div style="margin:15px auto 0px auto; padding:5px; width:168px;"> <?php echo ' Estas en la pagina '.$page1;?></div>
        
        <table class="tb" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td class="tbtitulos">Nombre</td>
            <td class="tbtitulos">Apellido</td>
            <td class="tbtitulos">mail</td>
            <td class="tbtitulos">dni</td>
            <td class="tbtitulos">Borrar</td>
          </tr>
          <?php
            print $listado_usuarios1['list'];
          ?>
        </table>
      </div>
       <div class="cont0">
      		<div id="modal_confirmation_ver" class="zoom-anim-dialog mfp-hide modal_confirmation">
				
			</div>
        <?php
		   include_once 'class/DataBase.php';
		   include_once 'class/Usuario.php';
		if(isset($_POST['selector_pagina']) ){
			
            $page = $_POST['selector_pagina'];
			
			 
          }else{
            $page = 1;
			
          }
       
          $usuarios = new Usuario();
          $listado_usuarios = $usuarios->getUsuarios($page, $mails);
		 
        ?>
        <h2 style="margin:15px auto 0px auto; padding:5px; width:272px;">Registro para la revista</h2>
        <div style="margin:15px auto 0px auto; padding:5px; width:168px;"> <?php echo ' Estas en la pagina '.$page;?></div>
        <form id="form_reg" action="index_rev.php" method="POST" enctype="multipart/form-data">
            <input  type="hidden" name="mail" value="<?php echo  $mails; ?>"/> 
         
            
             
              <div class="input_wapper">
                
                <?php print $listado_usuarios['pager']; ?><input id="pagina_ir" class="btn_general btn-classic" type="submit" value="IR" name="pagina_ir" style="display:inline-block !important;"/>
               
              </div>
            
             
        
        </form>
  
   
        
        <table class="tb" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td class="tbtitulos">Mail</td>
            <td class="tbtitulos">Fecha</td>
            <td class="tbtitulos">Estado</td>
            <td class="tbtitulos">Borrar</td>
          </tr>
          <?php
            print $listado_usuarios['list'];
          ?>
        </table>
      </div>
     		
    </div> 
    </div> 
            
    <footer>
      
    </footer>
   
    <?php  }else{
		echo "Se necesita acreditaciones especiales para acceder a esta seccion";
		
		
	}?>

  </body>
</html>