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
        <h2 class="editartitulo">Contactenos</h2>
        <form id="form_reg" action="controllers.php" method="POST" enctype="multipart/form-data">
          <div class="input_wapper">
            <label>Nombre</label>
           <input id="nombre" type="text" onblur="" name="nombre" required="required" class="input_text_marquee input_text" />
          </div>
          <div class="input_wapper">
            <label>Mail</label>
           <input id="registration_mail" type="email" onblur="" name="mail" required="required" class="input_text_mail input_text" />
          </div>
          <div class="input_wapper">
            <label>Comentario</label>
            <textarea id="comentario" name="comentario" class="comentario"></textarea>
          </div>
          <div class="input_wapper">
            <input id="enviar_contacto" class="btn_general btn-classic2" type="submit" value="Enviar" name="enviar_contacto" />
            <div id="cargador" style="display:none"></div>
          </div>
        </form>
      </div>
    </div>          
    <footer>
      <?php include_once 'footer.php'; ?>
    </footer>
  </body>
</html>