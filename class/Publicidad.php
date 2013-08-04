<?php

include_once 'DataBase.php';

/*
* Publicidad
* 
* @property integer $id
* @property string $url
* @property string $image
* @property int $position
* @property string $status
* 
*/

class Publicidad 
{
	/********************************************************
	Este metodo da de alta a una nueva Publicidad en la base de datos
	lo que recibe de parametro es un array
	********************************************************/
	public function insetPublicidad($publicidad, $image){
		$pathIgame = $this->uploadImage($image['image']);

		$mysqli = DataBase::connex();
		$query = '
			INSERT INTO 
				Publicidad 
			SET
				Publicidad.id = NULL,
				Publicidad.url = "'. $mysqli->real_escape_string($publicidad['url']) .'",
				Publicidad.image = "'. $mysqli->real_escape_string($pathIgame) .'",
				Publicidad.position = "'. $mysqli->real_escape_string($publicidad['position']) .'",
				Publicidad.status = "'. $mysqli->real_escape_string($publicidad['status']).'"
			';
		$mysqli->query($query);
		$mysqli->close();
	}
	/********************************************************
	Este metodo devuelve y genera las imagenes del la publicidad
	********************************************************/
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
		
		$ancho = imagesx( $original );
		$alto = imagesy( $original );
		$ancho_nuevo = 139; 
		$alto_nuevo = 83;
		$copia = imagecreatetruecolor( $ancho_nuevo , $alto_nuevo );
		imagecopyresampled( $copia , $original , 0, 0, 0, 0, $ancho_nuevo, $alto_nuevo, $ancho,$alto);

		$uploaddir = 'upload_images/';
		$name = md5($image['name'] . date("YmdHms")) . '.jpg';
		$uploadfile = $uploaddir . basename($name);
		
		if (imagejpeg($copia , $uploadfile, 200)) {
			$pathIgame = $uploaddir . $name;
		} else {
		 	return false;
		}
		return $pathIgame;
	}

	/********************************************************
	Este metodo devuelve un Publicidad especifico de la base de datos
	********************************************************/
	public function getPublicidad($publicidadId)
	{
		$mysqli = DataBase::connex();
		$query = '
			SELECT * FROM 
				publicidad
			WHERE
				publicidad.id = "' . $publicidadId . '" 
			LIMIT 1
		';
		$result = $mysqli->query($query);
		while ($row = $result->fetch_assoc()) 
		{
			$Publicidad['id'] = $row['id'];
			$Publicidad['url'] = $row['url'];
			$Publicidad['image'] = $row['image'];
			$Publicidad['position'] = $row['position'];
			$Publicidad['status'] = $row['status'];
		}
		$result->free();
		$mysqli->close();
    return $Publicidad;
	}
	/********************************************************
	Este metodo devuelve todos los Publicidad de la base de datos
	********************************************************/
	public function getPublicidads()
	{
		$mysqli = DataBase::connex();
		$query = '
			SELECT * FROM 
				publicidad
			ORDER BY 
				position
		';
		$result = $mysqli->query($query);
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()) 
			{
				$publicidad['id'] = $row['id'];
				$publicidad['url'] = $row['url'];
				$publicidad['image'] = $row['image'];
				$publicidad['position'] = $row['position'];
				$publicidad['status'] = $row['status'];
				$publicidades[] = $publicidad;
			}
			$result->free();
			$mysqli->close();
			$rows = $this->format_list_publicidad($publicidades);
	    return $rows;
		}else{
			return false;
		}
	}

	private function format_list_publicidad($list){
		$rows = '';
		foreach ($list as $publicidad) {
			$rows .= '<tr>';
				$rows .= '<td><img src="'.$publicidad['image'].'" title="'.$publicidad['url'].'" alt="'.$publicidad['url'].'" /></td>';
				$rows .= '<td>'.$publicidad['url'].'</td>';
				if($publicidad['status']=="Publicado"){
						$rows .= '<td class="statusB">'.$publicidad['status'].'</td>';
				}else{
					$rows .= '<td class="statusM">'.$publicidad['status'].'</td>';
				}
				$rows .= '<td>';
					$rows .= '<form action="editar_publicidad.php" method="POST">';
						$rows .= '<input type="hidden" name="id" value="'.$publicidad['id'].'"/>';
						$rows .= '<input id="btn_publicidad_editar" class="btn-classic" type="submit" value="Editar" name="btn_publicidad_editar" />';
					$rows .= '</form>';
				$rows .= '</td>';
				$rows .= '<td>';
				$rows .= '<a href="#modal_confirmation_'.$publicidad['id'].'" class="btn-classic eliminar_publicidad">Eliminar</a>';
					$rows .= '<div id="modal_confirmation_'.$publicidad['id'].'" class="zoom-anim-dialog mfp-hide modal_confirmation">';
						$rows .= '<h3>Eliminar Publicidad</h3>';
						$rows .= '<p>Estas seguro que deceas elimiar esta publicidad?</p>';
						$rows .= '<form action="controllers.php" method="POST">';
							$rows .= '<input type="hidden" name="id" value="'.$publicidad['id'].'"/>';
							$rows .= '<input id="btn_cancelar" class="btn-classic" type="button" value="Cancelar" name="btn_cancelar" />'; 
							$rows .= '<input id="btn_publicidad_eliminar" class="btn-classic" type="submit" value="Eliminar" name="btn_publicidad_eliminar" />';
						$rows .= '</form>';
					$rows .= '</div>';
				$rows .= '</td>';
			$rows .= '</tr>';
		}
		return $rows;
	}

	/********************************************************
	Este metodo actualiza una Publicidad especifica de la base de datos
	lo que recibe de parametro es la Publicidad a modificar
	********************************************************/
    public function updatePublicidad($publicidad, $image)
    {
    	if($image['image']['name'] != ''){
    		$pathIgame = $this->updateImage($image['image'], $publicidad['name_image']);
    	} else {
    		$pathIgame = $publicidad['name_image'];
    	}
    	    	
    	$mysqli = DataBase::connex();
    	$q = '
    		UPDATE 
    			publicidad 
    		SET
				publicidad.url = "'. $mysqli->real_escape_string($publicidad['url']) .'",
				publicidad.image = "'. $mysqli->real_escape_string($pathIgame) .'",
				publicidad.position = "'. $mysqli->real_escape_string($publicidad['position']) .'",
				publicidad.status = "'. $mysqli->real_escape_string($publicidad['status']).'"
    		WHERE 
    			publicidad.id = "' . $publicidad['publicidadid'] . '" 
    		LIMIT 1
    	';
    	$mysqli->query($q);
    	$mysqli->close();
    }
  /********************************************************
	Este metodo actualiza la imagen de la publicidad
	********************************************************/
	private function updateImage($image, $rmImage){
		$foto = $image['tmp_name'] ;
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

		$ancho = imagesx( $original );
		$alto = imagesy( $original );
		$ancho_nuevo = 139; 
		$alto_nuevo = 83;
		$copia = imagecreatetruecolor( $ancho_nuevo , $alto_nuevo );
		imagecopyresampled( $copia , $original , 0, 0, 0, 0, $ancho_nuevo, $alto_nuevo, $ancho,$alto);

		$uploaddir = 'upload_images/';
		$name = md5($image['name'] . date("YmdHms")) . '.jpg';
		$uploadfile = $uploaddir . $name;

		if (imagejpeg($copia , $uploadfile, 200)) {
			$pathImage = $uploaddir . $name;
		} else {
		 	return false;
		}
		if($rmImage != ''){
			unlink($rmImage);
		}
		return $pathImage;
	}
  /********************************************************
	Este metodo elimina una Publicidad especifica
	********************************************************/
  public function deletePublicidad($id){
   	$mysqli = DataBase::connex();
		$query = '
			DELETE FROM 
				publicidad 
			WHERE 
				publicidad.id = '.$id.'
			LIMIT
				1
		';
		$mysqli->query($query);
		$mysqli->close();
  }

  public function viewPublicidad(){
  	$mysqli = DataBase::connex();
		$query = '
			SELECT * FROM 
				publicidad
			WHERE 
				publicidad.status = "Publicado"
			ORDER BY 
				position
			LIMIT
				6
		';
		$result = $mysqli->query($query);
		while ($row = $result->fetch_assoc()) 
		{
			$publicidad['id'] = $row['id'];
			$publicidad['url'] = $row['url'];
			$publicidad['image'] = $row['image'];
			$publicidad['position'] = $row['position'];
			$publicidad['status'] = $row['status'];
			$publicidades[] = $publicidad;
		}
		$result->free();
		$mysqli->close();
		return $this->formatViewPublicidad($publicidades);
  }

  private function formatViewPublicidad($publicidades){

		$html = '<aside class="galeria-pub"><div>';
		foreach ($publicidades as $publicidad) {
			$html .= '<div style="float:left; display:block; ">';
				$html .= '<div class="cont-img-publ">';
					$html .= '<a target="_blank" href="'.$publicidad['url'].'">';
						$html .= '<img alt="'.$publicidad['url'].'" border="0" src="'.$publicidad['image'].'" width="139">';
					$html .= '</a>';
				$html .= '</div>';
				$html .= '<div class="sombra5"></div> ';
			$html .= '</div>';
		}
		$html .= '</div></aside>';
		echo $html;
		die;
		return $html;
  }
}
?>