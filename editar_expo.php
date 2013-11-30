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
        <?php
          include_once 'includes.php';
          $expo = new Expo();
          $newExpo = $expo->getOneExpo($_POST['id']);
          $newStartDate = explode('-', $newExpo['fecha_inicio']);
          $newEndDate = explode('-', $newExpo['fecha_fin']);
        ?>
        <form id="form_reg" action="controllers.php" method="POST" enctype="multipart/form-data">
          <div class="input_wapper">
            <label>Titulo</label>
            <input id="expo_id" type="hidden" name="expo_id" value="<?php echo $newExpo['id'];?>"/>
            <input value = '<?php echo $newExpo['title'];?>' id="titulo" type="text" name="titulo" required="required" class="input_text_revista input_text" />
          </div>
          <div class="input_wapper">
            <label>Imagen</label>
            <div id="preview_image_expo"><img alt='<?php echo $newExpo['title'];?>' title='<?php echo $newExpo['title'];?>' src="<?php echo $newExpo['image'];?>"/></div>
            <input type="hidden" name="name_image" value="<?php echo $newExpo['image'];?>" />
            <input id="image" type="file" name="image" class="input_file_revista input_file" />
          </div>
          <div class="input_wapper">
            <label>Dias y Horarios</label>
           <input value="<?php echo $newExpo['dias_horarios'];?>" id="dias_horarios" type="text" name="dias_horarios" required="required" class="input_text_revista input_text" />
          </div>
          <div class="input_wapper">
            <label>Iframe del Mapa (Medidas aconsejables width="573" height="350")</label>
            <input value='<?php echo $newExpo['maps'];?>' id="maps" type="text" name="maps" required="required" class="input_text_revista input_text" />
          </div>
          <div class="input_wapper">
            <label>Plano</label>
            <div id="preview_plano"><img alt='<?php echo $newExpo['title'];?>' title='<?php echo $newExpo['title'];?>' src="<?php echo $newExpo['plano'];?>"/></div>
            <input type="hidden" name="name_plano" value="<?php echo $newExpo['plano'];?>" />
            <input id="plano" type="file" name="plano" class="input_file_revista input_file" />
          </div>
          <div class="input_wapper">
            <label>Reglamento</label>
            <textarea id="reglamento" name="reglamento" class="ckeditor"><?php echo $newExpo['reglamento'];?></textarea>
          </div>
          <div class="input_wapper">
            <label>Como Participar</label>
            <textarea id="como_participar" name="como_participar" class="ckeditor"><?php echo $newExpo['como_participar'];?></textarea>
          </div>
          <div class="input_wapper">
            <label>Alojamiento</label>
            <textarea id="alojamiento" name="alojamiento" class="ckeditor"><?php echo $newExpo['alojamiento'];?></textarea>
          </div>
          <div class="input_wapper">
            <label>Prensa</label>
            <textarea id="prensa" name="prensa" class="ckeditor"><?php echo $newExpo['prensa'];?></textarea>
          </div>
          <div class="input_wapper">
            <label>Descripcion Larga</label>
            <textarea id="descripcion_larga" name="descripcion_larga" class="ckeditor"><?php echo $newExpo['body'];?></textarea>
          </div>
          <div class="input_wapper">
            <label>Descripcion Corta</label>
            <textarea id="descripcion_corta" name="descripcion_corta" class="ckeditor"><?php echo $newExpo['teaser'];?></textarea>
          </div>
          <div class="input_wapper">
            <label>Fecha de Inicio</label>
           <input id="inicio" type="text" name="inicio" required="required" class="input_text_revista input_text" />
          </div>
          <div class="input_wapper">
            <label>Fecha de Finalizacion</label>
           <input id="fin" type="text" name="fin" required="required" class="input_text_revista input_text" />
          </div>
          <script>
            (function ($) {
              $("#inicio").datepicker();
              $("#inicio").datepicker( "setDate", <?php echo '"' . $newStartDate[1] .'/'. $newStartDate[2] .'/'. $newStartDate[0]. '"';?> );
              $("#fin").datepicker();
              $("#fin").datepicker( "setDate", <?php echo '"' . $newEndDate[1] .'/'. $newEndDate[2] .'/'. $newEndDate[0]. '"';?> );
            })(jQuery);
          </script>
          <div class="input_wapper">
            <label>Estado</label>
            <select id="status" class="label_reg" required="required" name="status">
              <option <?php if($newExpo['status'] == 'Despublicado'){ echo 'selected'; }?> value="Despublicado">Despublicado</option>
              <option <?php if($newExpo['status'] == 'Publicado'){ echo 'selected'; }?> value="Publicado">Publicado</option>
            </select>
          </div>
          <div class="input_wapper">
            <input id="editar_expo" class="btn_general" type="submit" value="Guardar" name="editar_expo" />
          </div>
        </form>
      </div>
    </div>          
    <footer>
      <?php include_once 'footer.php'; ?>
    </footer>
  </body>
</html>