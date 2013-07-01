<?php

include_once 'DataBase.php';

class Usuario 
{

	public function login($mail, $pwd, $recordar="") {
		$mysqli = DataBase::connex();
		
		$query = '
			SELECT * FROM 
				usuarios
			WHERE 
				mail = "' . $mysqli->real_escape_string($mail) . '"
			AND 
				pass =  "' . md5($pwd) . '"
		';
		
		$result = $mysqli->query($query);
		
		if($result->num_rows == 1)
		{
			$user = $result->fetch_assoc();
		}
		
		if(isset($user['mail']) && $user['mail'] == $mail)
		{
			session_start();
			$_SESSION['usuario'] = $user['id'];
			$_SESSION['token'] = $user['token'];
			if($recordar == 'ok') {
				$valoresDeCookie ='000000000.000000000.' . $_SESSION['usuario'] . '.%&ki;kr.' . $_SESSION['token'];
				setcookie('expohobby', $valoresDeCookie,time()+60*60*24*360);
			}
			$result->free();
			$mysqli->close();
			header("Location: listado_marquees.php");
		}
		else
		{
			$result->free();
			$mysqli->close();
			header("Location: ingresar.php?error='log_error'");
		}
	}

	public function verificar_mail_repetido($mail, $id) {

		$mysqli = DataBase::connex();
		$query = '
			SELECT * FROM 
				registro
			WHERE 
				registro.mail = "' . $mysqli->real_escape_string($mail) . '"
		';
		$result = $mysqli->query($query);
		if($result->num_rows == 0){
			$this->registrar_mail($mail, $id);
		}else{
			$user = $result->fetch_assoc();
			if($user['estado'] == 'valido'){
				session_start();
				$_SESSION['mail'] = $mail;
				echo 'ok_verificacion';
			}else{
				echo 'a_verificar';
			}
		}
	}

	private function registrar_mail($mail, $id) {
		$mysqli = DataBase::connex();
		$codigo = md5($mail);
		$query = '
			INSERT INTO 
				registro 
			SET
				registro.id = NULL,
				registro.mail = "'. mysql_real_escape_string($mail) .'",
				registro.estado = "no_validado",
				registro.codigo = "'. $codigo .'"
			';
		$result = $mysqli->query($query);
		$this->enviar_mail_validacion($mail, $codigo, $id);
		echo 'ok_registro';
	}

	private function enviar_mail_validacion($email, $codigo, $id) {
		require("PHPmailer.php");
		$mysqli = DataBase::connex();
		$classMail = new PHPMailer(); 
		
		//Con la propiedad Mailer le indicamos que vamos a usar un 
		//servidor smtp
		$classMail->Mailer = "smtp";
		 
		//Luego tenemos que iniciar la validación por SMTP: 
		$classMail->IsSMTP(); 
		$classMail->SMTPAuth = true; // True para que verifique autentificación de la cuenta o de lo contrario False 
		$classMail->Username = "marketing@expohobby.net"; // Cuenta de e-mail 
		$classMail->Password = "hugo0714"; // Password  
		 
		$classMail->Host = "mail.expohobby.net"; 

		$classMail->From = "marketing@expohobby.net"; 
		$classMail->FromName = "Expohobby"; 
		$classMail->Subject = "Expohobby Validacion de e-mail"; 
		$classMail->AddAddress("$email");
		$classMail->Port = 25;
		$classMail->WordWrap =200; 
		 
		$body  = "
			<html> 
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
							<div id='titulo'><h1>Registro Expohobby</h1></div> 
							<div id='contentrada'>
								<div id='contnf'>
									<p>
										<a class='link' href='http://localhost/expohobb/validar_mail.php?mail=$email&codigo=$codigo&id=$id'>Haga click</a><br><br>
									</p>
								</div>
							</div>
						</div>
						<p>Lo saluda atentamente <strong>Coordinadores de EXPOHOBBY 2013 </strong>info@expohobby.net<br><br></p>
					</center>
				</body>
			</html>
		"; 
		$classMail->Body = $body; 
	 	$classMail->Send();
	}
	public function validar_mail($mail, $codigo){
		
		$mysqli = DataBase::connex();
		
		$query = '
			UPDATE 
	  			registro
	  		SET
				registro.estado = "valido"
	  		WHERE 
	  			registro.mail = "' . $mail . '" 
	  		AND
	  			registro.codigo = "'. $codigo .'"
	  		LIMIT 1
	  	';
	  	
	  	$mysqli->query($query);
		
		if($mysqli->query($query)) {
			return 'ok';
		}
	}
}
?>