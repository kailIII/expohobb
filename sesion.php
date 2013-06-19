<?php
	session_start();
	include_once 'includes.php';
	$validador = new Validador();
	/* valida si hay cookie y si es correcta*/
	if(isset($_COOKIE['expohobby']))
	{
		$valoresDeCookie = $_COOKIE['expohobby'];
		$explodeGookie = explode('.', $valoresDeCookie);
		$valCook = $validador->cookieValidator($explodeGookie[2],$explodeGookie[4]);
		if($valCook == 'ok')
		{
			$_SESSION['usuario'] = $explodeGookie[2];
			$_SESSION['token'] = $explodeGookie[4];
		}
		else
		{
			setcookie('expohobby','borrar cookie',time()-315360000);
		}
	}
	/* valida que haya un usuario setiado*/
	if(!isset($_SESSION['usuario']))
	{
		setcookie('expohobby','borrar cookie',time()-315360000);
	}
	/* valida el usuario con el token */
	if(isset($_SESSION['usuario']))
	{
		if(!isset($valCook))
		{
			$valCook = $validador->cookieValidator($_SESSION['usuario'],$_SESSION['token']);
		}
		if($valCook != 'ok')
		{
			setcookie('expohobby','borrar cookie',time()-315360000);
		}
	}
?>