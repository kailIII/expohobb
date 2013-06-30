<?php 
require("class.phpmailer.php");
$mail = new PHPMailer(); 


  //Con la propiedad Mailer le indicamos que vamos a usar un 
  //servidor smtp
 $mail->Mailer = "smtp";
 
//Luego tenemos que iniciar la validación por SMTP: 
$mail->IsSMTP(); 
$mail->SMTPAuth = true; // True para que verifique autentificación de la cuenta o de lo contrario False 
$mail->Username = "marketing@expohobby.net"; // Cuenta de e-mail 
$mail->Password = "hugo0714"; // Password 
 
 
$mail->Host = "mail.expohobby.net"; 


$mail->From = "marketing@expohobby.net"; 
$mail->FromName = "Expohobby"; 
$mail->Subject = "Expohobby Septiembre 2013 Fiestas y Decoración"; 
$mail->AddAddress("$email","$nombre"); 
 $mail->Port = 25;
$mail->WordWrap =200; 

 
$body  = "<html> 

<head> 
<style type='text/css'>
<!--
#todomens{
	margin:5px auto;
	height:auto;
	width:715px;
	border:#c1c2c3 solid thin;
	background:#f2f2f3;

}
h1{
	text-align:center;
	font-family:Verdana, Geneva, sans-serif;
	color:#FFF;
	font-size:18px;
	background:#906;
	padding:5px;
	
}
#contentrada{
	margin-top:30px 0px 21px 0px;
	height:auto;
	width:613px;
	border:#b4b4b5 dashed thin;
	padding:22px;
	text-align: left;

}
#entrada{

	width:600px;
	height:201px;
	margin:5px auto;
}



#contnf{
	padding:10px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;
	margin-top:15px;
	color:#3a3a3a;
	
	
}
.link{
	font-family:Verdana, Geneva, sans-serif;
	color:#909;
	font-size:16px;
		font-weight:bold;
		font-style:none;
		text-decoration:none;
	
		background:#FFF;
		border:#903 solid thin;
		padding:12px;
		margin:10px;
}

-->
</style>
   <title>Ultimo paso para el registro</title> 
</head> 
<body> 
<center>
<div id='todomens'>
<div id='titulo'><h1>Expohobby Septiembre 2013<br/> Fiestas y Decoraci&oacute;n</h1></div> 


<div id='contentrada'>

<div id='contnf'>
Hola <strong>$nombre $apellido:</strong><br>

Se gener&oacute; nuevamente su cup&oacute;n a <strong>Expohobby Septiembre 2013 Fiestas y Decoraci&oacute;n</strong>.<br><br>
<a class='link' href='http://www.expohobby.net/formulario2013/descargar.php?codigo=$codigo-$dni'> Haga click aqu&iacute; para visualizar su cup&oacute;n</a><br>
<br>
Este link le servir&aacute; para modificar el D.N.I en caso de haberse equivocado:<br>
<a class='link' href='http://www.expohobby.net/formulario2013/entradaC.php?codigoC=$codigoC&codigo=$codigo'> Haga click aqu&iacute; para cambiar el D.N.I</a><br><br>


* Cup&oacute;n con 50% de descuento, personal e intransferible, v&aacute;lida presentando D.N.I o Cedula de identidad.<br /> 
 
* Menores de 6 a&ntilde;os entrada sin cargo.<br/>

* No valida para el dia Domingo 15/09/13.<br/>
 
* <strong>Expohobby</strong> se reserva el derecho de admisi&oacute;n y permanencia.<br>

* Prohibida su reproducci&oacute;n y comercializaci&oacute;n


</div>
</div>

</div>
"; 
$body .= "Lo saluda atentamente <strong>Coordinadores de EXPOHOBBY 2013 </strong> info@expohobby.net<br><br>
</center>
</body></html>"; 
 
$mail->Body = $body; 
 

 
 
// Notificamos al usuario del estado del mensaje 

if(!$mail->Send()){ 

header('Location:entradaC.php?codigoC='.$codigoC.'&codigo='.$codigo.'&m=3');
}else{ 


$alta88= "UPDATE usuarioe SET  dni='$dni', info=$info WHERE codigoC='$codigoC'";
mysql_query( $alta88 , $exp); 

header( 'Location:entradaC.php?codigoC='.$codigoC.'&codigo='.$codigo.'&b=1' );}?>