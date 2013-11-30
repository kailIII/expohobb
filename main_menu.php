<?php
  include_once 'includes.php';
  $expoClass = new Expo();
  $expos = $expoClass->expoPorMesMenu();
?>
<nav>
  <ul>
    <li class="ac_inici">
      <a title="Inicio" id="inicio" href="index.php">Inicio</a>
    </li>
    <li class="ac_expo">
      <a title="Exposiciones" id="exposiciones" href="#">Exposiciones</a>
    </li>
    <li class="ac_rev">
      <a title="Revista" id="revista" href="revistas.php">Revista</a>
    </li>
    <li class="ac_empres">
      <a title="Empresa" id="empresa" href="empresa.php">Empresa</a>
    </li>
    <!--
    <li class="ac_news">
      <a title="Suscríbete aquí a nuestro Newsletter" id="empresa" href="newsletter.php">Newsletter</a>
    </li>-->
    <li class="ac_cont">
      <a title="Contacto" id="contacto" href="concatenos.php">Contacto</a>
    </li>
  </ul>

  

  <?php 
    if(isset($_SESSION['empresa'])){
      print '
        <ul>
          <li>
            <a title="Inicio" href="admin_actividades.php">Actividades</a>
          </li>
        </ul>
      ';
    }
    if(isset($_SESSION['usuario'])){
      $validador = new Validador();
      if($validador->cookieValidator($_SESSION['usuario'],$_SESSION['token']) == 'ok'){
        print '
          <ul>
            <li>
              <a title="Inicio" href="listado_marquees.php">Admin</a>
            </li>
          </ul>
        ';
      }
    }
  ?>
</nav>

<div class="deplegablemenu" style="display:none;">
  <div class="pico"></div>
  <div class="cont-listado">
    <?php foreach ($expos as $expo): ?>
      <div class="list">
        <a href="exposiciones.php?id=<?php echo $expo['id']; ?>" title="<?php echo $expo['title'];?>">
          <img alt="<?php echo $expo['title'];?>" border="0" src="<?php echo $expo['image'];?>" width="86" height="113">
        </a>
        <div class="cont-datos">
          <div class="fecha-list">
            <p>
              <?php echo $expo['dias_horarios'];?>
            </p>
          </div>
          <h2 class="<?php echo $expo['class'];?>">
            <a href="exposiciones.php?id=<?php echo $expo['id']; ?>" title="<?php echo $expo['title'];?>"><?php echo $expo['title'];?></a>
          </h2>
          <div class="decript-list">
            <p>
              <?php echo $expo['teaser'];?>
            </p>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>

  <div class="cont-bon-list">
    <a href="exposicion.php" class="ver-todas-menu">
      <strong>Ver todas las</strong>
      <span class="color-inst">Expohobby's</span>
    </a>

  </div>
</div>
