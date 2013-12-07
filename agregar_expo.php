<?php include_once 'sesion.php'; ?>
<?php 
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
        <?php include_once 'admin_menu.php'; ?>
      </nav>  
    </header>
    <div id="cont-all"> 
      <div id="cont-section"> 
        <h2>Agregar Exposicion</h2>
        <form id="form_reg" action="controllers.php" method="POST" enctype="multipart/form-data">
          <div class="input_wapper">
            <label>Titulo</label>
           <input id="titulo" type="text" name="titulo" required="required" class="input_text_revista input_text" />
          </div>
          <div class="input_wapper">
            <label>Imagen (227x307)</label>
            <input id="image" type="file" name="image" required="required" class="input_file_revista input_file" />
          </div>
           <div class="input_wapper">
            <label>Video (width="800" height="450")</label>
            <input id="video" type="text" name="video"  class="input_text_revista input_text" />
          </div>
          
          <div class="input_wapper">
            <label>Dias y Horarios</label>
           <input id="dias_horarios" type="text" name="dias_horarios" required="required" class="input_text_revista input_text" />
          </div>
          <div class="input_wapper">
            <label>Iframe del Mapa (width="573" height="350")</label>
           <input id="maps" type="text" name="maps"  class="input_text_revista input_text" />
          </div>
          <div class="input_wapper">
            <label>Plano ( ancho de 800px)</label>
            <input id="plano" type="file" name="plano"  class="input_file_revista input_file" />
          </div>
          <div class="input_wapper">
            <label>Reglamento</label>
            <textarea id="reglamento" name="reglamento" class="ckeditor"></textarea>
          </div>
          <div class="input_wapper">
            <label>Como Participar</label>
            <textarea id="como_participar" name="como_participar" class="ckeditor"></textarea>
          </div>
          <div class="input_wapper">
            <label>Alojamiento</label>
            <textarea id="alojamiento" name="alojamiento" class="ckeditor"></textarea>
          </div>
          <div class="input_wapper">
            <label>Prensa</label>
            <textarea id="prensa" name="prensa" class="ckeditor"></textarea>
          </div>
          <div class="input_wapper">
            <label>Descripcion Larga</label>
            <textarea id="descripcion_larga" name="descripcion_larga"  required="required" class="ckeditor"></textarea>
          </div>
          <div class="input_wapper">
            <label>Descripcion Corta</label>
            <textarea id="descripcion_corta" name="descripcion_corta" required="required" class="ckeditor"></textarea>
          </div>
          <div class="input_wapper">
            <label>Fecha de Inicio</label>
           <input id="inicio" type="text" name="inicio" required="required" class="input_text_revista input_text" />
          </div>
          <div class="input_wapper">
            <label>Fecha de Finalizacion</label>
           <input id="fin" type="text" name="fin" required="required" class="input_text_revista input_text" />
          </div>
           <div class="input_wapper">
            <label>Acreditacion (medida unica! 600x201)</label>
            <input id="img_acr" type="file" name="img_acr"  class="input_file_revista input_file" />
          </div>
           <div class="input_wapper">
            <label>Reglamento acreditacion</label>
            <textarea id="text_acr" name="text_acr"  class="ckeditor"></textarea>
          </div>
          <div class="input_wapper">
            <label>Estado</label>
            <select id="status" class="label_reg" required="required" name="status">
              <option value="Despublicado">Despublicado</option>
              <option value="Publicado">Publicado</option>
            </select>
          </div>
          <div class="input_wapper">
            <input id="agregar_expo" class="btn_general" type="submit" value="Guardar" name="agregar_expo" />
          </div>
        </form>
      </div>
    </div>          
    <footer>
      <?php include_once 'footer.php'; ?>
    </footer>
  </body>
</html>