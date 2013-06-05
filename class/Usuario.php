<?php

include_once 'DataBase.php';

class Usuario 
{

	public function login($mail, $pwd, $recordar="")
	{
		
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
			
			$_SESSION['usuario'] = $user['id'];
			$_SESSION['token'] = $user['token'];
			if($recordar == 'ok')
			{
				$valoresDeCookie ='000000000.000000000.' . $_SESSION['usuario'] . '.%&ki;kr.' . $_SESSION['token'];
				setcookie('animenotochi', $valoresDeCookie,time()+60*60*24*360);
			}
			$result->free();
			$mysqli->close();
			header("Location: muro.php");
		}
		else
		{
			$result->free();
			$mysqli->close();
			header("Location: index.php?error='log_error'");
		}
		
	}

?>