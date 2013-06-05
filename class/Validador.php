<?php

include_once 'Usuario.php';
include_once 'DataBase.php';


class Validador
{
	public function __construct($id = 0)
    {
        
    }

	public function registro($user_data)
	{
		$error = "";
		if(!preg_match("/^([a-zA-Z]{2,10}[\s]{0,1}[a-zA-Z]{0,9})$/i", $user_data['name'])) 
		{
			$error['name'] = "Nombre invalido, solo puedes usas letras y un espacio";
		}

		if(!preg_match("/^([a-zA-Z]{2,10}[\s]{0,1}[a-zA-Z]{0,9})$/i", $user_data['last_name'])) 
		{
			$error['last_name'] = "Apellido invalido, solo puedes usas letras y un espacio";
		}

		if(!preg_match("/^([_-]{0,1}[a-zA-Z]{2,15}[_-]{0,1}[@]{0,1}[.]{0,1}[a-zA-Z0-9]{0,15})$/i", $user_data['user'])) 
		{
			$error['user'] = "User invalido, solo puedes usas letras, numeros, _ , - y @";
		}

		if(!preg_match("/^([_-]{0,1}[a-zA-Z0-9]{2,15}[_-]{0,1}[@]{0,1}[.]{0,1}[a-zA-Z0-9]{0,15})$/i", $user_data['pass'])) 
		{
			$error['pass'] = "Contraseña invalido, solo puedes usas letras, numeros, _ , - y @";
		}
		if ($user_data['pass'] != $user_data['re_pass'])
		{
			$error['re_pass'] = "Las contraseñas no coinciden";
		}
		if(!preg_match("/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/i", $user_data['mail'])) 
		{
			$error['mail'] = "Mail invalido";
		}
		else
		{
			if($this->unique_mail($user_data['mail']) == "error")
			{
				$error['mail'] = "Este mail esta siendo usado por otro usuario";
			}
		}
		
		if($user_data['sex_'] == "") 
		{
			$error['send_sex'] = $user_data['sex_'];
			$error['sex'] = "Seleccione un Sexo";
		}
		if(!empty($error))
		{
			$mensaje = '?errorRegistro';
			foreach($error as $key => $value)
			{
				$mensaje .= '&'.  $key . '=' . $value;
			}
			foreach($user_data as $key => $value)
			{
				$mensaje .= '&'.  'send_'.$key . '=' . $value;
			}
			header("Location: index.php". $mensaje);
		}
		else
		{
			$user = new Usuario();
			$user->register($user_data);
		}
	}
	public function unique_mail($mail)
	{
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