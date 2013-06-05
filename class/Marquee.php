<?php

include_once 'DataBase.php';

/*
* Marquee
* 
* @property integer $id
* @property string $titulo
* @property string $small_image
* @property string $big_image
* @property int $queue
* @property string $descripcion
* 
*/

class Marquee 
{
	/********************************************************
	Este metodo da de alta a un nuevo Marquee en la base de datos
	lo que recibe de parametro es un array
	********************************************************/
	public function insetMarquee($marquee, $images)
	{
		$pathIgame = $this->uploadImage($images);
		$mysqli = DataBase::connex();
		$query = '
			INSERT INTO 
				marquee 
			SET
				marquee.id = NULL,
				marquee.title = "'. mysql_real_escape_string($marquee['titulo']) .'",
				marquee.small_image = "'. mysql_real_escape_string($pathIgame['small_image']) .'",
				marquee.big_image = "'. mysql_real_escape_string($pathIgame['big_image']) .'",
				marquee.queue = "'. mysql_real_escape_string($marquee['queue']) .'",
				marquee.description = "'. mysql_real_escape_string($marquee['descripcion']).'",
				marquee.status = "'. mysql_real_escape_string($marquee['status']).'"
			';
		$mysqli->query($query);
		$mysqli->close();
	}
	/********************************************************
	Este metodo devuelve genera las imagenes del maequee
	********************************************************/
	private function uploadImage($images){
		foreach ($images as $type => $image) {
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

			$uploaddir = 'upload_images/';
			$name = md5($image['name'] . date("YmdHms")) . '.jpg';
			$uploadfile = $uploaddir . basename($name);

			if (move_uploaded_file($foto, $uploadfile)) {
				$pathIgame[$type] = $uploaddir . $name;
			} else {
			 	return false;
			}
		}
		return $pathIgame;
	}
	/********************************************************
	Este metodo devuelve un Marquee especifico de la base de datos
	********************************************************/
	public function getMarquee($marqueeId)
	{
		$mysqli = DataBase::connex();
		$query = '
			SELECT * FROM 
				marquee
			WHERE
				marquee.id = "' . $marqueeId . '" 
			LIMIT 1
		';
		$result = $mysqli->query($query);
		while ($row = $result->fetch_assoc()) 
		{
			$marquee['id'] = $row['id'];
			$marquee['title'] = $row['title'];
			$marquee['small_image'] = $row['small_image'];
			$marquee['big_image'] = $row['big_image'];
			$marquee['queue'] = $row['queue'];	
			$marquee['description'] = $row['description'];
			$marquee['status'] = $row['status'];
		}
		$result->free();
		$mysqli->close();
    return $marquee;
	}
	/********************************************************
	Este metodo devuelve todos los Marquee de la base de datos
	********************************************************/
	public function getMarquees()
	{
		$mysqli = DataBase::connex();
		$query = '
			SELECT * FROM 
				marquee
			ORDER BY 
				queue
		';
		$result = $mysqli->query($query);
		while ($row = $result->fetch_assoc()) 
		{
			$marquee['id'] = $row['id'];
			$marquee['title'] = $row['title'];
			$marquee['small_image'] = $row['small_image'];
			$marquee['big_image'] = $row['big_image'];
			$marquee['queue'] = $row['queue'];	
			$marquee['description'] = $row['description'];
			$marquee['status'] = $row['status'];
			$marquees[] = $marquee;
		}
		$result->free();
		$mysqli->close();
		$rows = $this->format_list_marquee($marquees);
    return $rows;
	}

	private function format_list_marquee($list){
		$rows = '';
		foreach ($list as $marquee) {
			$rows .= '<tr>';
				$rows .= '<td>'.$marquee['title'].'</td>';
				$rows .= '<td>'.$marquee['queue'].'</td>';
				if($marquee['status']=="Publicado"){
						$rows .= '<td class="statusB">'.$marquee['status'].'</td>';
				}else{
					$rows .= '<td class="statusM">'.$marquee['status'].'</td>';
				}
				$rows .= '<td>';
					$rows .= '<form id="marquee_editar" action="editar_marquee.php" method="POST">';
						$rows .= '<input type="hidden" name="id" value="'.$marquee['id'].'"/>';
						$rows .= '<input id="btn_marquee_editar" class="btn-classic" type="submit" value="Editar" name="btn_marquee_editar" />';
					$rows .= '</form>';
				$rows .= '</td>';
				$rows .= '<td>';
				$rows .= '<a href="#modal_confirmation" class="btn-classic" id="eliminar_marquee">Eliminar</a>';
					$rows .= '<div id="modal_confirmation" class="zoom-anim-dialog mfp-hide">';
						$rows .= '<h3>Eliminar Marquee</h3>';
						$rows .= '<p>Estas seguro que deceas elimiar este Marquee?</p>';
						$rows .= '<form id="marquee_eliminar" action="controllers.php" method="POST">';
							$rows .= '<input type="hidden" name="id" value="'.$marquee['id'].'"/>';
							$rows .= '<input id="btn_cancelar" class="btn-classic" type="button" value="Cancelar" name="btn_cancelar" />'; 
							$rows .= '<input id="btn_marquee_eliminar" class="btn-classic" type="submit" value="Eliminar" name="btn_marquee_eliminar" />';
						$rows .= '</form>';
					$rows .= '</div>';
				$rows .= '</td>';
			$rows .= '</tr>';
		}
		return $rows;
	}

	/********************************************************
	Este metodo actualiza un Marquee especifico de la base de datos
	lo que recibe de parametro es el Marquee a modificar
	********************************************************/
    public function updatemarquee($marquee, $images)
    {
    	if($images['small_image']['name'] != ''){
    		$pathImageSmall = $this->updateImage($images['small_image'], $marquee['name_small_image']);

    	} else {
    		$pathImageSmall = $marquee['name_small_image'];
    	}
    	if($images['big_image']['name'] != ''){
    		$pathImageBig = $this->updateImage($images['big_image'], $marquee['name_big_image']);
    	} else {
    		$pathImageBig = $marquee['name_big_image'];
    	}
    	$mysqli = DataBase::connex();
    	$q = '
    		UPDATE 
    			marquee 
    		SET
				marquee.title = "'. mysql_real_escape_string($marquee['titulo']) .'",
				marquee.small_image = "'. mysql_real_escape_string($pathImageSmall) .'",
				marquee.big_image = "'. mysql_real_escape_string($pathImageBig) .'",
				marquee.queue = "'. mysql_real_escape_string($marquee['queue']) .'",
				marquee.description = "'. mysql_real_escape_string($marquee['descripcion']).'",
				marquee.status = "'. mysql_real_escape_string($marquee['status']).'"
    		WHERE 
    			marquee.id = "' . $marquee['marqueeid'] . '" 
    		LIMIT 1
    	';
    	$mysqli->query($q);
    	$mysqli->close();
    }
  /********************************************************
	Este metodo devuelve genera las imagenes del maequee
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

		$uploaddir = 'upload_images/';
		$name = md5($image['name'] . date("YmdHms")) . '.jpg';
		$uploadfile = $uploaddir . basename($name);

		if (move_uploaded_file($foto, $uploadfile)) {
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
	Este metodo elimina un Marquee especifico
	********************************************************/
  public function deletemarquee($id){
   	$mysqli = DataBase::connex();
		$query = '
			DELETE FROM 
				exphbb.marquee 
			WHERE 
				marquee.id = '.$id.'
			LIMIT
				1
		';
		$mysqli->query($query);
		$mysqli->close();
  }
  public function viewMarquee(){
  	$mysqli = DataBase::connex();
		$query = '
			SELECT * FROM 
				marquee
			WHERE 
				marquee.status = "Publicado"
			ORDER BY 
				queue
		';
		$result = $mysqli->query($query);
		while ($row = $result->fetch_assoc()) 
		{
			$marquee['id'] = $row['id'];
			$marquee['title'] = $row['title'];
			$marquee['small_image'] = $row['small_image'];
			$marquee['big_image'] = $row['big_image'];
			$marquee['queue'] = $row['queue'];	
			$marquee['description'] = $row['description'];
			$marquee['status'] = $row['status'];
			$marquees[] = $marquee;
		}
		$result->free();
		$mysqli->close();
		return $this->formatViewMarquee($marquees);
  }
  private function formatViewMarquee($marquees){
  	$preview = '';
  	$view = '';
		foreach ($marquees as $marquee) {
			$preview .= '<div class="uds-bb-thumb">';
				$preview .=	'<img src="'.$marquee['small_image'].'" alt="'.$marquee['title'].'" width="80" height="60" />';
			$preview .= '</div>';
			$view .= '<div class="uds-bb-slide">';
				$view .= '<a href="#" class="uds-bb-link">';
					$view .= '<img src="'.$marquee['big_image'].'" alt="'.$marquee['title'].'" class="uds-bb-bg-image" width="921" />';
				$view .= '</a>';
				$view .= '<div class="uds-bb-description uds-transparent" style="top:68px;left:45px;width:480px;height:238px;">';
					$view .= '<div class="uds-bb-description-inside">';
						$view .= $marquee['description'];
					$view .= '</div>';
				$view .= '</div>';
			$view .= '</div>';
		}
		$marquees['preview'] = $preview;
		$marquees['view'] = $view;
		return $marquees;
  }
}
?>