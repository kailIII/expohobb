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
$codigoC=limpiaCadena ($_POST['codigoC']);
 
$consulta=mysql_query("SELECT COUNT(*) FROM usuarioe WHERE codigoC='$codigoC'");
	if (mysql_result($consulta,0) == 1){ 
	$usu_id= mysql_query("SELECT * FROM usuarioe WHERE codigoC='$codigoC'");
    $row_usu_nombre = mysql_fetch_assoc($usu_id );
	$nombre=$row_usu_nombre['nombre'];
	$apellido=$row_usu_nombre['apellido'];
	$email=$row_usu_nombre['email'];
	$dni=limpiaCadena ($_POST['dni']);
	$codigo=$row_usu_nombre['codigo'];
	$codigoC=$row_usu_nombre['codigoC'];
	}


if(isset($_POST['info']) and $_POST['info']=="1"){
	
	$info=$_POST['info'];
	
}else{
$info=0;
}




if($nombre == "" || $apellido == "" || $email == "" || $dni == ""){
	header( 'Location:entradaC.php?codigoC='.$codigoC.'&codigo='.$codigo.'&m=1' );
	
}else{

	

 include('mail2.php');
	
}
	  }else{
		 // REMPLAZO EL CAPTCHA USADO POR UN TEXTO LARGO PARA EVITAR QUE SE VUELVA A INTENTAR
		 $_SESSION["captcha"] = md5(rand()*time());
	 	 // INSERTA EL CÓDIGO DE ERROR AQUÍ
		header('Location:entradaC.php?codigoC='.$codigoC.'&codigo='.$codigo.'&m=4');
	  }


?>