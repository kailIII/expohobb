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
* @property string $status
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
		
		if($marquee['type_marquee'] != 'imagen'){
			$pathIgame['big_image'] = $marquee['type_marquee'];
		}

		$mysqli = DataBase::connex();
		$query = '
			INSERT INTO 
				marquee 
			SET
				marquee.id = NULL,
				marquee.title = "'. $mysqli->real_escape_string($marquee['titulo']) .'",
				marquee.small_image = "'. $mysqli->real_escape_string($pathIgame['small_image']) .'",
				marquee.big_image = "'. $mysqli->real_escape_string($pathIgame['big_image']) .'",
				marquee.queue = "'. $mysqli->real_escape_string($marquee['queue']) .'",
				marquee.description = "'. $mysqli->real_escape_string($marquee['descripcion']).'",
				marquee.type_marquee = "'. $mysqli->real_escape_string($marquee['type_marquee']).'",
				marquee.status = "'. $mysqli->real_escape_string($marquee['status']).'"
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
			$marquee['type_marquee'] = $row['type_marquee'];
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
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()) 
			{
				$marquee['id'] = $row['id'];
				$marquee['title'] = $row['title'];
				$marquee['small_image'] = $row['small_image'];
				$marquee['big_image'] = $row['big_image'];
				$marquee['queue'] = $row['queue'];	
				$marquee['description'] = $row['description'];
				$marquee['type_marquee'] = $row['type_marquee'];
				$marquee['status'] = $row['status'];
				$marquees[] = $marquee;
			}
			$result->free();
			$mysqli->close();
			$rows = $this->format_list_marquee($marquees);
	    return $rows;
		}else{
			return false;
		}
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
					$rows .= '<form id="marquee_ver" action="ver_marquee.php" method="POST">';
						$rows .= '<input type="hidden" name="id" value="'.$marquee['id'].'"/>';
						$rows .= '<input id="btn_marquee_ver" class="btn-classic" type="submit" value="Ver" name="btn_marquee_ver" />';
					$rows .= '</form>';
				$rows .= '</td>';
				$rows .= '<td>';
					$rows .= '<form id="marquee_editar" action="editar_marquee.php" method="POST">';
						$rows .= '<input type="hidden" name="id" value="'.$marquee['id'].'"/>';
						$rows .= '<input id="btn_marquee_editar" class="btn-classic" type="submit" value="Editar" name="btn_marquee_editar" />';
					$rows .= '</form>';
				$rows .= '</td>';
				$rows .= '<td>';
				$rows .= '<a href="#modal_confirmation_'.$marquee['id'].'" class="btn-classic eliminar_marquee">Eliminar</a>';
					$rows .= '<div id="modal_confirmation_'.$marquee['id'].'" class="zoom-anim-dialog mfp-hide modal_confirmation">';
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
    	
    	if($marquee['type_marquee'] == 'imagen'){
	    	if($images['big_image']['name'] != ''){
	    		$pathImageBig = $this->updateImage($images['big_image'], $marquee['name_big_image']);
	    	} else {
	    		$pathImageBig = $marquee['name_big_image'];
	    	}
    	}else{
    		$pathImageBig = $marquee['big_image'];
    	}
    	
    	$mysqli = DataBase::connex();
    	$q = '
    		UPDATE 
    			marquee 
    		SET
				marquee.title = "'. $mysqli->real_escape_string($marquee['titulo']) .'",
				marquee.small_image = "'. $mysqli->real_escape_string($pathImageSmall) .'",
				marquee.big_image = "'. $mysqli->real_escape_string($pathImageBig) .'",
				marquee.queue = "'. $mysqli->real_escape_string($marquee['queue']) .'",
				marquee.description = "'. $mysqli->real_escape_string($marquee['descripcion']).'",
				marquee.type_marquee = "'. $mysqli->real_escape_string($marquee['type_marquee']).'",
				marquee.status = "'. $mysqli->real_escape_string($marquee['status']).'"
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
				marquee 
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
			$marquee['type_marquee'] = $row['type_marquee'];
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
  	$count = 0;
  	$js = '';
		foreach ($marquees as $marquee) {
			$preview .= '<div class="uds-bb-thumb">';
				$preview .=	'<img src="'.$marquee['small_image'].'" alt="'.$marquee['title'].'" width="80" height="60" />';
			$preview .= '</div>';
			$view .= '<div class="uds-bb-slide">';
			if($marquee['type_marquee'] == 'imagen'){	
				$view .= '<a href="#" class="uds-bb-link">';
					$view .= '<img src="'.$marquee['big_image'].'" alt="'.$marquee['title'].'" class="uds-bb-bg-image" width="921" />';
				$view .= '</a>';
				if($marquee["description"]!=""){
				$view .= '<div class="uds-bb-description uds-transparent" style="top:68px;left:45px;width:480px;height:238px;">';				
					$view .= '<div class="uds-bb-description-inside">';
						$view .= $marquee['description'];
					$view .= '</div>';					
				$view .= '</div>';
				}
				$js .= $count.':{
									linkTarget: "",
									delay: 5000,
									transition: "slide",
									direction: "left",
									bgColor: "transparent",
									repeat: "repeat",
									stop: false,
									autoplayVideo: true
								}, 
									';
			} else {
				$view .= '<iframe width="921" height="380" src="'.$marquee['big_image'].'" frameborder="0" allowfullscreen ></iframe>';
				$js .= $count.':{
									linkTarget: "",
									delay: 5000,
									transition: "none",
									direction: "none",
									bgColor: "#0F0F0F",
									repeat: "repeat",
									stop: false,
									autoplayVideo: false
								}, 
									';
			}
			$view .= '</div>';
			$count++;
		}
		$marquees['preview'] = $preview;
		$marquees['view'] = $view;
		$marquees['js'] = $js;
		return $marquees;
  }

  public function previewMarquee($idMarquee){
  	$mysqli = DataBase::connex();
		$query = '
			SELECT * FROM 
				marquee
			WHERE 
				marquee.id = "' . $idMarquee . '"
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
			$marquee['type_marquee'] = $row['type_marquee'];
			$marquee['status'] = $row['status'];
		}
		$result->free();
		$mysqli->close();
		return $this->formatPreviewMarquee($marquee);
  }

  private function formatPreviewMarquee($marquee){
  	$preview = '';
  	$view = '';
  	$count = 0;
  	$js = '';
		$preview .= '<div class="uds-bb-thumb">';
			$preview .=	'<img src="'.$marquee['small_image'].'" alt="'.$marquee['title'].'" width="80" height="60" />';
		$preview .= '</div>';
		$view .= '<div class="uds-bb-slide">';
		if($marquee['type_marquee'] == 'imagen'){
			$view .= '<a href="#" class="uds-bb-link">';
				$view .= '<img src="'.$marquee['big_image'].'" alt="'.$marquee['title'].'" class="uds-bb-bg-image" width="921" />';
			$view .= '</a>';
			$view .= '<div class="uds-bb-description uds-transparent" style="top:68px;left:45px;width:480px;height:238px;">';
				$view .= '<div class="uds-bb-description-inside">';
					$view .= $marquee['description'];
				$view .= '</div>';
			$view .= '</div>';
			$js .= $count.':{
								linkTarget: "",
								delay: 5000,
								transition: "fade",
								direction: "bottom",
								bgColor: "transparent",
								repeat: "repeat",
								stop: false,
								autoplayVideo: true
							}, 
								';
		} else {
			$view .= '<iframe width="921" height="380" src="'.$marquee['big_image'].'" frameborder="0" allowfullscreen ></iframe>';
			$js .= $count.':{
								linkTarget: "",
								delay: 5000,
								transition: "none",
								direction: "none",
								bgColor: "#0F0F0F",
								repeat: "repeat",
								stop: false,
								autoplayVideo: false
							}, 
								';
		}
		$view .= '</div>';
		$previewMarquee['preview'] = $preview;
		$previewMarquee['view'] = $view;
		$previewMarquee['js'] = $js;
		return $previewMarquee;
  }
}
?>