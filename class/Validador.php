<?php

include_once 'Usuario.php';
include_once 'DataBase.php';


class Validador
{
	public function __construct($id = 0) {
      
  }
  
	public function unique_mail($mail){
		$mysqli = DataBase::connex();
		$query = '
				SELECT * FROM 
					usuarios
				WHERE 
					mail = "' . $mail . '"
			';
		$result = $mysqli->query($query);
		if($result->num_rows == 0)
		{
			$mail = "ok";
		}				
		else
		{
			$mail = "error";
		}
		$mysqli->close();
		return $mail;
	}

	public function cookieValidator($id, $token)
	{
		$mysqli = DataBase::connex();
		$query = '
				SELECT * FROM 
					usuarios
				WHERE 
					id = "' . $id . '"
				AND
					token = "' . $token . '"
		';
		$result = $mysqli->query($query);
		if($result->num_rows != 0)
		{
			$token = "ok";
		}				
		else
		{
			$token = "error";
		}
		$mysqli->close();
		return $token;
	}
}

?>