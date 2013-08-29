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
            <label>Imagen</label>
            <input id="image" type="file" name="image" required="required" class="input_file_revista input_file" />
          </div>
          <div class="input_wapper">
            <label>Dias y Horarios</label>
           <input id="dias_horarios" type="text" name="dias_horarios" required="required" class="input_text_revista input_text" />
          </div>
          <div class="input_wapper">
            <label>Iframe del Mapa</label>
           <input id="maps" type="text" name="maps" required="required" class="input_text_revista input_text" />
          </div>
          <div class="input_wapper">
            <label>Plano</label>
            <input id="plano" type="file" name="plano" required="required" class="input_file_revista input_file" />
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
            <textarea id="descripcion_larga" name="descripcion_larga" class="ckeditor"></textarea>
          </div>
          <div class="input_wapper">
            <label>Descripcion Corta</label>
            <textarea id="descripcion_corta" name="descripcion_corta" class="ckeditor"></textarea>
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