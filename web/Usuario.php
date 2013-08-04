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

	public function register($user)
	{

		$mysqli = DataBase::connex();
		$hash_pass = md5($user['pass']);
		$token = md5($user['mail']);
		$query = '
			INSERT INTO 
				usuarios 
			SET
				id = NULL,
				nombre = "'. mysql_real_escape_string($user['name']) .'",
				apellido = "'. mysql_real_escape_string($user['last_name']) .'",
				avatar = "avatar.png",
				header = "portada.png",
				header_coord = "width: 1028px; height: 300px; margin-left: -4px; margin-top: 0px;",
				nick = "'. mysql_real_escape_string($user['user']) .'",
				pass = "'. $hash_pass .'",
				token = "'. $token .'",
				mail = "'. mysql_real_escape_string($user['mail']).'",
				sexo = "'. mysql_real_escape_string($user['sex_']).'"
			';
		$mysqli->query($query);
		mkdir('imgUsuarios/'.md5($user['mail']),0777);
		mkdir('imgUsuarios/'.md5($user['mail']).'/avatars',0777);
		mkdir('imgUsuarios/'.md5($user['mail']).'/portadas',0777);
		copy('img/avatar.png','imgUsuarios/'.md5($user['mail']).'/avatars/avatar.png');
		copy('img/header.png','imgUsuarios/'.md5($user['mail']).'/portadas/portada.png');
		$this->login($user['mail'], $user['pass']);
		$mysqli->close();
	}

	public function getUser($id)
    {
		$mysqli = DataBase::connex();
		$query = '
			SELECT 
				usuarios.id as id,
				usuarios.avatar as avatar,
				usuarios.header as header,
				usuarios.header_coord as header_coord,
				usuarios.nick as nick,
				usuarios.nombre as nombre,
				usuarios.apellido as apellido,
				usuarios.mail as mail,
				usuarios.fecha as fecha,
				usuarios.sexo as sexo_id,
				sexos.sexo as sexo,
				usuarios.pais as pais_id,
				paises.nombre as pais
			FROM 
				usuarios
			JOIN 
				sexos
			ON
				usuarios.sexo = sexos.id
			JOIN 
				paises
			ON
				usuarios.pais = paises.id
			WHERE 
				usuarios.id = "' . $id . '"
		';
		$result = $mysqli->query($query);
		while ($row = $result->fetch_assoc()) 
		{
			$user['id'] = $row['id'];
			$user['avatar'] = 'imgUsuarios/'. md5($row['mail']).'/avatars/' . $row['avatar'];
			$user['header'] = 'imgUsuarios/'. md5($row['mail']).'/portadas/' . $row['header'];
			$user['header_coord'] = $row['header_coord'];
			$user['nick'] = $row['nick'];
			$user['nombre'] = $row['nombre'];
			$user['apellido'] = $row['apellido'];	
			$user['mail'] = $row['mail'];
			$user['fecha'] = $row['fecha'];
			$user['sexo_id'] = $row['sexo_id'];
			$user['sexo'] = $row['sexo'];
			$user['pais_id'] = $row['pais_id'];
			$user['pais'] = $row['pais'];
		}
		$result->free();
		$mysqli->close();
        return $user;
    }

    public function changeAvatar($userId, $file)
    {
    	$mysqli = DataBase::connex();
    	$imagen = $file['imagen'];
		$foto = $imagen['tmp_name'] ;
		$tipo = $imagen['type'];
		$nombre_original = $imagen['name'];
		$corto_en_partecitas = explode( '.' , $nombre_original );
		$extension = array_pop( $corto_en_partecitas );

		switch( $extension )
		{
			case 'image/pjpg':
			case 'image/pjpeg':
			case 'jpg':
			case 'jpeg':
			case 'JPG':
			case 'JPEG':
				$original = imagecreatefromjpeg( $foto );
			break;
			case 'gif':
				$original = imagecreatefromgif( $foto );
			break;
			case 'png':
				$original = imagecreatefrompng( $foto );
			break;
		}

		$ancho = imagesx( $original );
		$alto = imagesy( $original );
		if($ancho >= $alto)
		{
			$ancho_nuevo = 190; 
			$alto_nuevo = ceil($alto * $ancho_nuevo / $ancho );
		}
		else
		{
			$alto_nuevo = 190; 
			$ancho_nuevo = ceil($ancho * $alto_nuevo / $alto );
		}
		$copia = imagecreatetruecolor( $ancho_nuevo , $alto_nuevo ) ;
		imagecopyresampled( $copia , $original , 0, 0, 0, 0, $ancho_nuevo, $alto_nuevo, $ancho,$alto);
		
		$user = $this->getUser($userId);
		$nombre_final = md5($_SESSION['usuario'] . date("YmdHms")) . '.jpg';
		$q = '
			UPDATE 
				usuarios 
			SET 
				avatar = "' . $nombre_final . '" 
			WHERE 
				usuarios.id = "' . $userId . '" 
			LIMIT 
				1
		';
		$mysqli->query($q);
		imagejpeg($copia , 'imgUsuarios/'.md5($user['mail']).'/avatars/'.$nombre_final, 200);
		$mysqli->close();
		header("Location: muro.php");
    }
    public function changePortada($userId, $portada)
    {
    	$mysqli = DataBase::connex();
    	$q = '
    		UPDATE 
    			usuarios 
    		SET 
    	';
    		if($portada['name'] != 'idem')
    		{
    			$q .= ' header = "' . $portada['name'] . '",';
    		}
    	$q .= '		
    			header_coord = "' . $portada['coor'] . '"
    		WHERE 
    			usuarios.id = "' . $userId . '" 
    		LIMIT 1
    	';
    	$mysqli->query($q);
    	$mysqli->close();
    	header("Location: muro.php");
    }
}
?>