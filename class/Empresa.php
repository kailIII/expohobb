<?php

include_once 'DataBase.php';

class Empresa 
{

	public function login($mail, $pwd) {
		$mysqli = DataBase::connex();
		
		$query = '
			SELECT 
				EE.id_expo as id_expo, 
				EE.pass as pass,
				E.id as id_emp,
				E.email as email
			FROM 
				expo_empresa EE 
			JOIN 
				empresas E
			ON 
				EE.id_empresa = E.id
			WHERE 
				E.email = "' . $mail . '"
			AND 
				EE.pass = "' . $pwd . '"
			AND
				EE.es_expositor = "si"
		';
		
		$result = $mysqli->query($query);
		if($result->num_rows == 1){
			$user = $result->fetch_assoc();
		}
		if(isset($user['email']) && $user['email'] == $mail){
			session_start();
			$_SESSION['empresa']['id'] = $user['id_emp'];
			$_SESSION['empresa']['expo'] = $user['id_expo'];
			$result->free();
			$mysqli->close();
			header("Location: admin_actividades.php");
		}else{
			$result->free();
			$mysqli->close();
			header("Location: usuarios.php?error='log_error'");
		}
	}

	public function getActividades($id_expo, $id_empresa)
	{
		$mysqli = DataBase::connex();
		$query = '
			SELECT * FROM 
				actividades_expositores
			WHERE
				id_expo = ' . $id_expo . '
			AND
				id_expositor = ' . $id_empresa . '
		';
		$result = $mysqli->query($query);
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()) 
			{
				$actividad['id'] = $row['id'];
				$actividad['foto'] = $row['foto'];
				$actividad['actividad'] = $row['actividad'];
				$actividad['autorizado'] = $row['autorizado'];
				$actividades[] = $actividad;
			}
			$result->free();
			$mysqli->close();
			$rows = $this->format_list_actividad($actividades);
	    return $rows;
		}else{
			return false;
		}
	}

	private function format_list_actividad($list){
		$rows = '';
		foreach ($list as $actividad) {
			$rows .= '<tr>';
				if($actividad['autorizado']=="si"){
						$rows .= '<td class="autorizado">Autorizado</td>';
				}else{
					$rows .= '<td class="pendiente">Pendiente</td>';
				}
				$rows .= '<td><img src="'.$actividad['foto'].'" /></td>';
				$rows .= '<td>';
					$rows .= '<form id="actividad_editar" action="editar_actividad.php" method="POST">';
						$rows .= '<input type="hidden" name="id" value="'.$actividad['id'].'"/>';
						$rows .= '<input id="btn_actividad_editar" class="btn-classic" type="submit" value="Editar" name="btn_actividad_editar" />';
					$rows .= '</form>';
				$rows .= '</td>';
				$rows .= '<td>';
				$rows .= '<a href="#modal_confirmation_'.$actividad['id'].'" class="btn-classic eliminar_marquee">Eliminar</a>';
					$rows .= '<div id="modal_confirmation_'.$actividad['id'].'" class="zoom-anim-dialog mfp-hide modal_confirmation">';
						$rows .= '<h3>Eliminar actividad</h3>';
						$rows .= '<p>Estas seguro que deceas elimiar esta actividad?</p>';
						$rows .= '<form id="actividad_eliminar" action="controllers.php" method="POST">';
							$rows .= '<input type="hidden" name="id" value="'.$actividad['id'].'"/>';
							$rows .= '<input id="btn_cancelar" class="btn-classic" type="button" value="Cancelar" name="btn_cancelar" />'; 
							$rows .= '<input id="btn_actividad_eliminar" class="btn-classic" type="submit" value="Eliminar" name="btn_actividad_eliminar" />';
						$rows .= '</form>';
					$rows .= '</div>';
				$rows .= '</td>';
			$rows .= '</tr>';
		}
		return $rows;
	}
	/********************************************************
	Este metodo da de alta a una nueva actividad en la base de datos
	lo que recibe de parametro es un array
	********************************************************/
	public function insetActividad($actividad, $image)
	{
		$pathIgame = $this->uploadImage($image);

		
		$mysqli = DataBase::connex();
		$query = '
			INSERT INTO 
				actividades_expositores 
			SET
				actividades_expositores.id = NULL,
				actividades_expositores.id_expo = "'. $mysqli->real_escape_string($actividad['id_expo']) .'",
				actividades_expositores.id_expositor = "'. $mysqli->real_escape_string($actividad['id_empresa']) .'",
				actividades_expositores.foto = "'. $mysqli->real_escape_string($pathIgame) .'",
				actividades_expositores.actividad = "'. $mysqli->real_escape_string($actividad['descripcion']) .'",
				actividades_expositores.autorizado = "no"
			';
		$mysqli->query($query);
		$mysqli->close();
	}

	private function uploadImage($image){
		$foto = $image['tmp_name'];
		$nombre_original = $image['name'];
		$explode_name_image = explode( '.' , $nombre_original );
		$extension = array_pop( $explode_name_image);

		switch( $extension ) {
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
			default:
				return false;
			break;
		}
		
		$uploaddir = 'upload_images/';
		$name = md5($image['name'] . date("YmdHms")) . '.jpg';
		$uploadfile = $uploaddir . basename($name);

		if (move_uploaded_file($foto, $uploadfile)) {
			$pathIgame = $uploaddir . $name;
		} else {
		 	return false;
		}
		return $pathIgame;
	}
	public function deleteActividad($id){
   	$mysqli = DataBase::connex();
		$query = '
			DELETE FROM 
				actividades_expositores 
			WHERE 
				actividades_expositores.id = '.$id.'
			LIMIT
				1
		';
		$mysqli->query($query);
		$mysqli->close();
  	}
  	public function getActividad($actividadId)
	{
		$mysqli = DataBase::connex();
		$query = '
			SELECT * FROM 
				actividades_expositores
			WHERE
				actividades_expositores.id = "' . $actividadId . '" 
			LIMIT 1
		';
		$result = $mysqli->query($query);
		while ($row = $result->fetch_assoc()) 
		{
			$actividad['id'] = $row['id'];
			$actividad['id_expo'] = $row['id_expo'];
			$actividad['id_expositor'] = $row['id_expositor'];
			$actividad['foto'] = $row['foto'];
			$actividad['actividad'] = $row['actividad'];
			$actividad['autorizado'] = $row['autorizado'];
		}
		$result->free();
		$mysqli->close();
    	return $actividad;
	}

  	public function updateActividad($actividad, $image)
	{
		if($image['image']['name'] != ''){
			$pathIgame = $this->updateImage($image['image'], $actividad['name_image']);
		}else{
			$pathIgame = $actividad['name_image'];
		}
		
		$mysqli = DataBase::connex();
		$query = '
			UPDATE 
    			actividades_expositores 
    		SET
				actividades_expositores.id_expo = "'. $mysqli->real_escape_string($actividad['id_expo']) .'",
				actividades_expositores.id_expositor = "'. $mysqli->real_escape_string($actividad['id_empresa']) .'",
				actividades_expositores.foto = "'. $mysqli->real_escape_string($pathIgame) .'",
				actividades_expositores.actividad = "'. $mysqli->real_escape_string($actividad['descripcion']) .'",
				actividades_expositores.autorizado = "no"
			WHERE 
    			actividades_expositores.id = "' . $actividad['id_actividad'] . '" 
    		LIMIT 1
			';
		$mysqli->query($query);
		$mysqli->close();
	}

	private function updateImage($image, $rmImage){

		$path = $this->uploadImage($image);
		if($path){
			if($rmImage != ''){
				unlink($rmImage);
			}
		}
		return $path;
	}
}
?>