<?php

include_once 'DataBase.php';

/*
* Expo
* 
* @property integer $id
* @property string $nombre
* @property string $apellido
* @property string $dni
* @property string $mail
* @property string $codigo
* @property string $codigoC
* 
*/

class Acred 
{

	/********************************************************
	Este metodo da de alta a una nueva Expo en la base de datos
	lo que recibe de parametro es un array
	********************************************************/
	public function insetAcred($acreditacion)
	{
		if($acreditacion['nombre']=="" ||$acreditacion['apellido']=="" || $acreditacion['dni']=="" || $acreditacion['mail']=="" ){
			$_SESSION['Acredit'] = "mal";
		}else{
			
			session_start();
		    $codigo=  md5(date("Y-m-d-". "H:i:s").$acreditacion['dni'].$acreditacion['apellido']);
			$codigoC=md5(date("Y-m-d-". "H:i:s").$acreditacion['dni'].$acreditacion['apellido'].$acreditacion['nombre']."7");
			$nombre=$acreditacion['nombre'];
			$apellido=$acreditacion['apellido'];
			$dni=$acreditacion['dni'];
			
			 
			require("PHPmailer.php");
			$mysqli = DataBase::connex();
			$classMail = new PHPMailer(); 

			$classMail->Mailer = "smtp";
			 
			//Luego tenemos que iniciar la validación por SMTP: 
			$classMail->IsSMTP(); 
			$classMail->SMTPAuth = true; // True para que verifique autentificación de la cuenta o de lo contrario False 
			$classMail->Username = "marketing@expohobby.net"; // Cuenta de e-mail 
			$classMail->Password = "hugo0714"; // Password  
			 
			$classMail->Host = "mail.expohobby.net"; 
	
			$classMail->From = $acreditacion['mail']; 
			$classMail->FromName = $acreditacion['nombre'].' | Comento en la web '; 
			$classMail->Subject = "Contacto de Expohobby"; 
			$classMail->AddAddress("info@expohobby.net");
			$classMail->Port = 25;
			$classMail->WordWrap =200;
			
			 
			$body  = "<html> 
			
			<head> 
			<style type='text/css'>
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
						<div id='titulo'><h1>Expohobby Septiembre 2013<br /> Fiestas y Decoraci&oacute;n</h1></div> 
						<div id='contentrada'>
							<div id='contnf'>
								Hola <strong>$nombre $apellido:</strong><br>
								Gracias por acreditarse a <strong>Expohobby Septiembre 2013 Fiestas y Decoraci&oacute;n</strong><br><br>
								<a class='link' href='http://www.expohobby.net/formulario2013/descargar.php?codigo=$codigo-$dni'> Haga click aqu&iacute; para visualizar su cup&oacute;n</a><br><br>
								Este link le servir&aacute; para modificar el D.N.I en caso de haberse equivocado:<br>
								<a class='link' href='http://www.expohobby.net/formulario2013/entradaC.php?codigoC=$codigoC&codigo=$codigo'> Haga click aqu&iacute; para cambiar el D.N.I</a><br><br>
								* Cup&oacute;n con 50% de descuento, personal e intransferible, v&aacute;lida presentando D.N.I o Cedula de identidad.<br /> 
								* Menores de 6 a&ntilde;os entrada sin cargo.<br />
								* No valida para el dia Domingo 15/09/13.<br/>
								* <strong>Expohobby</strong> se reserva el derecho de admisi&oacute;n y permanencia.<br>
								* Prohibida su reproducci&oacute;n y comercializaci&oacute;n
							</div>
						</div>
					</div>
					"; 
					$body .= "Lo saluda atentamente <strong>Coordinadores de EXPOHOBBY 2013 </strong>info@expohobby.net<br><br>
				</center>
			</body>
		</html>"; 
			 
			$classMail->Body = $body; 
		// Notificamos al usuario del estado del mensaje 
			
			if(!$classMail->Send()){ 
			$_SESSION['Acredit'] = "mal";
			}else{

				$mysqli = DataBase::connex();
				$query = '
					INSERT INTO 
						acreditacion
					SET
						acreditacion.id = NULL,
						acreditacion.nombre = "'. $mysqli->real_escape_string($acreditacion['nombre']) .'",
						acreditacion.apellido = "'. $mysqli->real_escape_string($acreditacion['apellido']) .'",
						acreditacion.dni = "'. $mysqli->real_escape_string($acreditacion['dni']) .'",
						acreditacion.email = "'. $mysqli->real_escape_string($acreditacion['mail']).'",
						acreditacion.codigo = "'.$codigo.'",
						acreditacion.codigoC = "'.$codigoC.'"
					';

		$mysqli->query($query);
		$mysqli->close();
		$_SESSION['Acredit'] = "mal";	
			}
		}
		//return $ActiveAC;


	}
}
?>