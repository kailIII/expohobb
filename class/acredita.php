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
			$acreD= "vacio";
			return $acreD;
		}else{
			
			$datosAcre=array();
		    $datAcre['codigo']=md5(date("Y-m-d-". "H:i:s").$acreditacion['dni'].$acreditacion['apellido']);
			$datAcre['codigoC']=md5(date("Y-m-d-". "H:i:s").$acreditacion['dni'].$acreditacion['apellido'].$acreditacion['nombre']."7");
			$datAcre['nombre']=$acreditacion['nombre'];
			$datAcre['apellido']=$acreditacion['apellido'];
			$datAcre['dni']=$acreditacion['dni'];
			$datAcre['email']=$acreditacion['mail'];
			$datAcre['nomExp']=$acreditacion['nomExp'];
			$datAcre['fechExpo']=$acreditacion['fechExp'];
			$datosAcre[]=$datAcre;
			$rows = $this->format_acredt($datosAcre);
			return $rows;
		}
	}
	private function format_acredt($datosAcre){
		foreach ($datosAcre as $datAcre) {
			$fechaExp= $this->format_edition($datAcre['fechExpo']);
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
	
			$classMail->From = "marketing@expohobby.net"; 
			$classMail->FromName = "Expohobby"; 
			$classMail->Subject = "Acreditación a Expohobby ".$fechaExp." ".$datAcre['nomExp']; 
			$classMail->AddAddress($datAcre['email'],$datAcre['nombre']); 
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
						<div id='titulo'><h1>Expohobby".$fechaExp."<br />".$datAcre['nomExp']."</h1></div> 
						<div id='contentrada'>
							<div id='contnf'>
								Hola <strong>".$datAcre['nombre']." ".$datAcre['apellido'].":</strong><br>
								Gracias por acreditarse a <strong>Expohobby ".$fechaExp." ".$datAcre['nomExp'].".</strong><br><br>
								<a class='link' href='http://www.expohobby.net/formulario2013/descargar.php?codigo=".$datAcre['codigo']."-".$datAcre['dni']."'> Haga click aqu&iacute; para visualizar su cup&oacute;n</a><br><br>
								Este link le servir&aacute; para modificar el D.N.I en caso de haberse equivocado:<br>
								<a class='link' href='http://www.expohobby.net/formulario2013/entradaC.php?codigoC=".$datAcre['codigoC']."&codigo=".$datAcre['codigo']."'> Haga click aqu&iacute; para cambiar el D.N.I</a><br><br>
								* Cup&oacute;n con 50% de descuento, personal e intransferible, v&aacute;lida presentando D.N.I o Cedula de identidad.<br /> 
								* Menores de 6 a&ntilde;os entrada sin cargo.<br />
								* No valida para el dia Domingo ".$fechaExp."<br/>
								* <strong>Expohobby</strong> se reserva el derecho de admisi&oacute;n y permanencia.<br>
								* Prohibida su reproducci&oacute;n y comercializaci&oacute;n
							</div>
						</div>
					</div>
					"; 
					$body .= "Lo saluda atentamente <strong>Coordinadores de EXPOHOBBY </strong>info@expohobby.net<br><br>
				</center>
			</body>
		</html>"; 
			 
			$classMail->Body = $body; 
		// Notificamos al usuario del estado del mensaje 
			
			if(!$classMail->Send()){ 
			 $acreD= "malEmail";
			return $acreD;
			}else{

				$mysqli = DataBase::connex();
				$query = '
					INSERT INTO 
						acreditacion
					SET
						acreditacion.id = NULL,
						acreditacion.nombre = "'. $mysqli->real_escape_string($datAcre['nombre']) .'",
						acreditacion.apellido = "'. $mysqli->real_escape_string($datAcre['apellido']) .'",
						acreditacion.dni = "'. $mysqli->real_escape_string($datAcre['dni']) .'",
						acreditacion.email = "'. $mysqli->real_escape_string($datAcre['email']).'",
						acreditacion.codigo = "'.$datAcre['codigo'].'",
						acreditacion.codigoC = "'.$datAcre['codigoC'].'"
					';

		$mysqli->query($query);
		$mysqli->close();
		$acreD= "bien";	
		return $acreD;
			}
		}
	}
		//return $ActiveAC;


	
	private function format_edition($edition){
		$meses = array('01' => 'Enero','02' => 'Febrero','03' => 'Marzo','04' => 'Abril','05' => 'Mayo','06' => 'Junio','07' => 'Julio','08' => 'Agosto','09' => 'Septiembre','10' => 'Octubre','11' => 'Noviembre','12' => 'Diciembre');
		$fecha = explode('-', $edition);
		$mes = $meses[$fecha[1]];
		return $mes . ' ' . $fecha[0];
	}
}
?>