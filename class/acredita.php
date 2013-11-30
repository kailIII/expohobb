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
	Este metodo verifica los campos llenados en el formulario
	********************************************************/
	public function insetAcred($acreditacion)
	{
		if($acreditacion['nombre']=="" ||$acreditacion['apellido']=="" || $acreditacion['dni']=="" || $acreditacion['mail']=="" ){
			$acreD= "vacio";
			return $acreD;
		}else{
		$mysqli = DataBase::connex();
		$email=$mysqli->real_escape_string($acreditacion['mail']);
		$query = '
				SELECT * FROM 
					acreditacion
				WHERE 
					email = "' . $email . '"
			';
		$result = $mysqli->query($query);
		if($result->num_rows == 0)
		{		
			$datosAcre=array();
		    $datAcre['codigo']=md5(date("Y-m-d-". "H:i:s").$acreditacion['dni'].$acreditacion['apellido']);
			$datAcre['codigoC']=md5(date("Y-m-d-". "H:i:s").$acreditacion['dni'].$acreditacion['apellido'].$acreditacion['nombre']."7");
			$datAcre['nombre']=$mysqli->real_escape_string($acreditacion['nombre']);
			$datAcre['apellido']=$mysqli->real_escape_string($acreditacion['apellido']);
			$datAcre['dni']=$mysqli->real_escape_string($acreditacion['dni']);
			$datAcre['email']=$mysqli->real_escape_string($acreditacion['mail']);
			$datAcre['nomExp']=$mysqli->real_escape_string($acreditacion['nomExp']);
			$datAcre['fechExpo']=$mysqli->real_escape_string($acreditacion['fechExp']);
			$datosAcre[]=$datAcre;
			$rows = $this->format_acredt($datosAcre);
			return $rows;
		}else{
			$rows='repetido';
		  return $rows;	
		}
		}
	}
	
		/********************************************************
	Envia email con la acreditacion al formulario y si esta correcto lo 
	guarda en la base de datos
	********************************************************/
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
								<a class='link' href='http://www.expohobby.net/descargar.php?codigo=".$datAcre['codigo']."-".$datAcre['dni']."'> Haga click aqu&iacute; para visualizar su cup&oacute;n</a><br><br>
								Este link le servir&aacute; para modificar el D.N.I en caso de haberse equivocado:<br>
								<a class='link' href='http://www.expohobby.net/entradaC.php?codigoC=".$datAcre['codigoC']."&codigo=".$datAcre['codigo']."'> Haga click aqu&iacute; para cambiar el D.N.I</a><br><br>
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
						acreditacion.codigoC = "'.$datAcre['codigoC'].'",
						acreditacion.nomExp = "'.$mysqli->real_escape_string($datAcre['nomExp']).'",
						acreditacion.fechaExp = "'.$fechaExp.'"
					';

		$mysqli->query($query);
		$mysqli->close();
		$acreD= "bien";	
		return $acreD;
			}
		}
	}


	
	private function format_edition($edition){
		$meses = array('01' => 'Enero','02' => 'Febrero','03' => 'Marzo','04' => 'Abril','05' => 'Mayo','06' => 'Junio','07' => 'Julio','08' => 'Agosto','09' => 'Septiembre','10' => 'Octubre','11' => 'Noviembre','12' => 'Diciembre');
		$fecha = explode('-', $edition);
		$mes = $meses[$fecha[1]];
		return $mes . ' ' . $fecha[0];
	}
	
/********************************************************
Este metodo devuelve todas las acreditaciones por su dni y codigo
********************************************************/
	public function getAcredita($AcredDni,$codigo)
	{

		
		$mysqli = DataBase::connex();
		if($AcredDni != '' and $codigo != ''){
			$query = '
				SELECT * FROM 
					 acreditacion
				WHERE
					 acreditacion.dni ="' .$AcredDni. '"  AND  acreditacion.codigo ="' .$codigo. '" 
				LIMIT 1
			';
		}else{
			$dat='no hay canpos';
			return $dat;
		}
		$result = $mysqli->query($query);
		if($result->num_rows > 0){
			$acreditaciones=array();
		while ($row = $result->fetch_assoc()) 
		{
			$acreditacion['id'] = $row['id'];
			$acreditacion['nombre'] = $row['nombre'];
			$acreditacion['apellido'] = $row['apellido'];
			$acreditacion['dni'] = $row['dni'];
			$acreditacion['email'] = $row['email'];	
			$acreditacion['codigo'] = $row['codigo'];	
			$acreditacion['codigoC'] = $row['codigoC'];
			$acreditacion['nomExp'] = $row['nomExp'];
			$acreditacion['fechaExp'] = $row['fechaExp'];
			$acreditaciones[]=$acreditacion;
		}
		$result->free();
		$mysqli->close();
    	$rows = $this->format_acredt_des($acreditaciones);
		return $rows;
		}else{
			$dat='0 base de datos';
			return $dat;
		}
	}
	private function format_acredt_des($acreditaciones){
		$rows = '';
		foreach ($acreditaciones as $acreditacion) {
				$rows .= "<div id='todomens'>";
					$rows .= "<div id='titulo'><h1>Expohobby ".$acreditacion['fechaExp']."</h1><br/>";
						$rows .= " <h2>".$acreditacion['nomExp']."</h2>";
					$rows .= " </div> ";
					$rows .= "<div id='contentrada'>";
						$rows .= "<div id='entrada'>";
							$rows .= "<img src='acreditacion/img/entradaDES.jpg'>";
							$rows .="<img  id='marcaag' src='acreditacion/img/body.png'>";
							$rows .="<div id='nombre'>";
							$rows .= $acreditacion['nombre']." ".$acreditacion['apellido'];
							$rows .= "</div>";
							$rows .= "<div id='dni'>";
							$rows .= $acreditacion['dni'];
							$rows .= "</div>";
						$rows .= "</div>";
					$rows .= "</div>";
					$rows .= "<div id='conimpr'>";
					$rows .= "	<form>";
							$rows .= "<input type='button' id='imprimir' value='' name='cmdPrint' onClick='doPrint(this.form);' title='IMPRIMIR'>";
						$rows .= "</form>";
					$rows .= "</div>";
					$rows .= "<div id='contnf'>";
						$rows .= "<p>Hola <strong> ".$acreditacion['nombre']." ".$acreditacion['apellido'].":</strong><br>
							Gracias por acreditarse  a <strong>Expohobby ".$acreditacion['fechaExp']." ".$acreditacion['nomExp']." </strong>.<br>
							Corte la entrada por las l&iacute;neas discontinuas, esta entrada es personal y deber&aacute; presentarse con su DNI o Cedula de identidad en mano para 		que tenga validez.<br><br>
							* Cup&oacute;n con 50% de descuento, personal e intransferible.<br> 
							* Menores de 6 a&ntilde;os entrada sin cargo.<br>
							* <strong>Expohobby</strong> se reserva el derecho de admisi&oacute;n y permanencia.<br>
							* No valida para el d&iacute;a Domingo ".$acreditacion['fechaExp'].".<br>
							* Prohibida su reproducci&oacute;n y comercializaci&oacute;n";
					$rows .= "</div>";
				$rows .= "</div>";
				$rows .="<div id='contemafilms'>";
					$rows .= "<div id='emafilms'>";
						$rows .= "<a  href='http://estudiomultimediaeb.com.ar/'>Estudio Multimedia EB</a>";
					$rows .= "</div>";
				$rows .= "</div>";
				
		}
		return $rows;
	}
}
?>