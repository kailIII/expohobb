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
}
?>