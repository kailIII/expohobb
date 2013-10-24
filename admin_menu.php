<ul>
	<li><a title="Marquees" href="listado_marquees.php">Marquees</a></li>
	<li><a title="Exposiciones" href="listado_expo.php">Exposiciones</a></li>
	<li><a title="Revista" href="listado_revistas.php">Revistas</a></li>
	<li><a title="Revista" href="listado_usuarios.php">Usuarios</a></li>
	<li><a title="Revista" href="listado_publicidad.php">Publicidad</a></li>
	<?php
	if(isset($_SESSION['empresa'])){
		print '
			<li>
				<a title="Inicio" href="admin_actividades.php">Actividades</a>
			</li>
		';
	}
    ?>
	<li><a title="Salir" href="logout.php">Salir</a></li>
</ul>