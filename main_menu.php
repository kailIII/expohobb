<nav>
  <ul>
    <li class="ac_inici">
      <a title="Inicio" id="inicio" href="index.php">Inicio</a>
    </li>
    <li class="ac_expo">
      <a title="Exposiciones" id="exposiciones" href="expos.html">Exposiciones</a>
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
<!-- 
<div class="deplegablemenu" style="display:none;">
  <div class="pico"></div>
  <div class="cont-listado">
    <div class="list">
      <a href="#" title="Nombre de la expo">
        <img alt="expo" border="0" src="imagenes/nonelist.jpg" width="86" height="113"></a>
      <div class="cont-datos">
        <div class="fecha-list">
          <p>
            Expo: <strong>Abril  2013</strong>
            Mi, V, J, S, D de 18:00hs a 20:00hs
          </p>
        </div>
        <h2 class="abril">
          <a href="#" title="Nombre de la expo">Todo el arte en un solo lugar</a>
        </h2>
        <div class="decript-list">
          <p>
            El evento tiene como objetivo el mercado Empresarial
y Artístico. Por un lado están las empresas que publicitan 
sus marcas, los comercios que nos proveen de los materiales 
necesarios para el desarrollo de los diferentes.
          </p>
        </div>
      </div>

    </div>
    <div class="list-invert">
      <a href="#" title="Nombre de la expo">
        <img alt="expo" border="0" width="86" height="113" src="imagenes/nonelist.jpg"></a>
      <div class="cont-datos">
        <div class="fecha-list">
          <p>
            Expo: <strong>Sep  2013</strong>
            Mi, V, J, S, D de 18:00hs a 20:00hs
          </p>
        </div>
        <h2 class="septiembre">
          <a href="#" title="Nombre de la expo">Todo el arte en un solo lugar</a>
        </h2>
        <div class="decript-list">
          <p>
            El evento tiene como objetivo el mercado Empresarial
y Artístico. Por un lado están las empresas que publicitan 
sus marcas, los comercios que nos proveen de los materiales 
necesarios para el desarrollo de los diferentes.
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="cont-bon-list">
    <a href="#" class="ver-todas-menu">
      <strong>Ver todas las</strong>
      <span class="color-inst">Expohobby's</span>
    </a>

  </div>
</div>
-->