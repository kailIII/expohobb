<?php include( 'Connections/config.php' );
 session_start();


	  
	  if(strtoupper($_REQUEST["captcha"]) == $_SESSION["captcha"]){
		 // REMPLAZO EL CAPTCHA USADO POR UN TEXTO LARGO PARA EVITAR QUE SE VUELVA A INTENTAR
		 $_SESSION["captcha"] = md5(rand()*time());
	 	 // INSERTA EL CÓDIGO EXITOSO AQUI
		 function limpiaCadena ($cadena)
{
if (get_magic_quotes_gpc())
$cadena = stripslashes($cadena);
return mysql_real_escape_string($cadena);
} 
 $nombre=limpiaCadena ($_POST['nombre']);
 $apellido=limpiaCadena ($_POST['apellido']);
 $dni=limpiaCadena ($_POST['dni']);
 $email=limpiaCadena ($_POST['email']);
 $codigo=md5(date("Y-m-d-". "H:i:s").$dni.$apellido);
 $codigoC=md5(date("Y-m-d-". "H:i:s").$dni.$apellido.$nombre."7");



if(isset($_POST['info']) and $_POST['info']=="1"){
	
	$info=$_POST['info'];
	
}else{
$info=0;
}




if($nombre == "" || $apellido == "" || $email == "" || $dni == ""){
	header( 'Location:entradas.php?m=1' );
	
}else{
	$consulta=mysql_query("SELECT COUNT(*) FROM usuarioe WHERE email='$email'");
	if (mysql_result($consulta,0) == 1){ 
	header( 'Location:entradas.php?m=2' );
	
	}else{
	

 include('mail.php');
	}
}
	  }else{
		 // REMPLAZO EL CAPTCHA USADO POR UN TEXTO LARGO PARA EVITAR QUE SE VUELVA A INTENTAR
		 $_SESSION["captcha"] = md5(rand()*time());
	 	 // INSERTA EL CÓDIGO DE ERROR AQUÍ
		header('Location:entradas.php?m=4');
	  }


?>