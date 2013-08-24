<?php include_once 'sesion.php'; 
  if(isset($_SESSION['usuario'])){
    if($validador->cookieValidator($_SESSION['usuario'],$_SESSION['token']) != 'ok'){
      header("Location: index.php");
    }
  }else{
    header("Location: index.php");
  }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <?php include_once 'head.php'; ?>
  </head>
  <body>
    <header>
      <?php include_once 'logo.php'; ?>
      <nav>
        <ul>
          <?php include_once 'admin_menu.php'; ?>
        </ul>
      </nav>  
    </header>
    <div id="cont-all"> 
      <div id="cont-section"> 
     		 
      		<div id="modal_confirmation_ver" class="zoom-anim-dialog mfp-hide modal_confirmation">
				
			</div>
        <?php
          include_once 'includes.php';
          $usuarios = new Usuario();
          if(isset($_POST['selector_pagina'])){
            $page = $_POST['selector_pagina'];
          }else{
            $page = 1;
          }
          if(isset($_POST['fecha'])){
            $fecha = $_POST['fecha'];
          }else{
            $fecha = date("Y-m-d");
          }
          $listado_usuarios = $usuarios->getUsuarios($page, $fecha);
        ?>
        <form id="form_reg" action="listado_usuarios.php" method="POST" enctype="multipart/form-data">
          <div class="input_wapper" >
            <div style="margin:0px auto; width:220px;">
            <?php print $listado_usuarios['pager']; ?>
              <div class="input_wapper">
                <label>Fecha</label>
               <input id="fecha" value="" type="text" onblur="" name="fecha" required="required" class="input_text_revista input_text" />
               <input id="pagina_ir" class="btn_general btn-classic" type="submit" value="IR" name="pagina_ir" style="display:inline-block !important;"/>
              </div>
              <script>
                (function ($) {
                  $("#fecha").datepicker();
                })(jQuery);
              </script>
             
              <a href="#modal_confirmation_ver" class="btn-classic seleccionar_us" id="seleccion" style="display:inline-block !important; margin:8px 48px  !important;">Seleccionar mails</a>
            </div>
          </div>
        </form>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
    		<script type="text/javascript">
    			$(document).ready(function(){
    				$("#seleccion").click(function(){
						 
    				var str = $(".copymail").text();
    				$('#modal_confirmation_ver').html('<p>\n\
					<?php print $listado_usuarios['email'];?>
					\n\</p><br/><br/><div style="margin:0px auto; width:422px;"><p><a id="btn_cancelar" name="btn_cancelar" class="btn-classic2" href="#btn_cancelar">Cerrar</a><p></div>');
    				});
    			});
    		</script>
        
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
    <footer>
      <?php include_once 'footer.php'; ?>
    </footer>
  </body>
</html>