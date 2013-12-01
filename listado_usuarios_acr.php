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
          $usuarios = new Acred();
          if(isset($_POST['selector_pagina'])){
            $page = $_POST['selector_pagina'];
          }else{
            $page = 1;
          }
         
          $listado_usuarios = $usuarios->getUsuarios($page);
        ?>
        <form id="form_reg" action="listado_usuarios_acr.php" method="POST" enctype="multipart/form-data">
          <div class="input_wapper" >
            <div style="margin:0px auto; width:220px;">
            <?php print $listado_usuarios['pager']; ?>
              <div class="input_wapper">
               <input id="pagina_ir" class="btn_general btn-classic" type="submit" value="IR" name="pagina_ir" style="display:inline-block !important;"/>
              </div>
              
             
              <a href="#modal_confirmation_ver" class="btn-classic seleccionar_us" id="seleccion" style="display:inline-block !important; margin:8px 48px  !important;">Seleccionar mails</a>
               <a href="#modal_confirmation" class="btn-classic seleccionar_us" id="seleccion" style="display:inline-block !important; margin:8px 48px  !important;">Borrar todos los usuarios</a>
            </div>
          </div>
        </form>
        <div id="modal_confirmation" class="zoom-anim-dialog mfp-hide modal_confirmation">
			<h3>Eliminar Todos los usuarios</h3>
				<p>Estas seguro que deceas eliminar todos los usuarios?</p>
				<form id="usuario_eliminar" action="controllers.php" method="POST">
						<input id="btn_cancelar" class="btn-classic" type="button" value="Cancelar" name="btn_cancelar" />
						<input id="btn_usuario_eliminar" class="btn-classic" type="submit" value="Eliminar" name="btn_usuario_eliminar_todos" />
						</form>
					</div>
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
            <td class="tbtitulos">Nombre y apellido</td>
            <td class="tbtitulos">DNI</td>
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