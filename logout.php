<?php
	session_start();
	session_destroy();
	setcookie('expohobby','borrar cookie',time()-315360000);
	header( 'Location: index.php' );
?>