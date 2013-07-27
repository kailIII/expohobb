<nav>
  <ul>
    <li>
      <a title="Inicio" href="#">Inicio</a>
    </li>
    <li>
      <a title="Exposiciones" href="#">Exposiciones</a>
    </li>
    <li>
      <a title="Revista" href="revistas.php">Revista</a>
    </li>
    <li>
      <a title="Empresa" href="#">Empresa</a>
    </li>
    <li>
      <a title="Contacto" href="#">Contacto</a>
    </li>
  </ul>

  <div id="redes-sociales">
    <a href="#" title="Facebook Expohobby" class="face">
      <span>Facebook"</span>
    </a>
    <a href="#" title="Twitter Expohobby" class="twit">
      <span>Twitter"</span>
    </a>
    <a href="#" title="Youtube Expohobby" class="youtube">
      <span>Youtube"</span>
    </a>
  </div>

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