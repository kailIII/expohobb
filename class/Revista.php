<?php

include_once 'DataBase.php';

/*
* Revista
* 
* @property integer $id
* @property string $titulo
* @property string $image
* @property string $description
* @property string $edition
* @property string $pdf
* @property string $swf
* 
*/

class Revista 
{

	/********************************************************
	Este metodo da de alta a una nueva Revista en la base de datos
	lo que recibe de parametro es un array
	********************************************************/
	public function insetRevista($revista, $files)
	{
		
		$pathIgame = $this->uploadImage($files['image']);
		$pathPDF = $this->uploadPDF($files['pdf']);
		$mysqli = DataBase::connex();
		$query = '
			INSERT INTO 
				revistas 
			SET
				revistas.id = NULL,
				revistas.title = "'. mysql_real_escape_string($revista['titulo']) .'",
				revistas.image = "'. mysql_real_escape_string($pathIgame) .'",
				revistas.description = "'. mysql_real_escape_string($revista['descripcion']) .'",
				revistas.edition = "'. mysql_real_escape_string(date($revista['edicion'])) .'",
				revistas.pdf = "'. mysql_real_escape_string($pathPDF).'",
				revistas.swf = "'. mysql_real_escape_string($revista['html_swf']).'"
			';
		$mysqli->query($query);
		$mysqli->close();
	}
	/********************************************************
	Este metodo devuelve genera las imagenes del revista
	********************************************************/
	private function uploadImage($image){
		$foto = $image['tmp_name'] ;
		$nombre_original = $image['name'];
		$explode_name_image = explode( '.' , $nombre_original );
		$extension = array_pop( $explode_name_image);

		switch( $extension ) {
			case 'image/pjpg':
			case 'image/pjpeg':
			case 'jpg':
			case 'jpeg':
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
		$name = md5(date("YmdHms")) . '.jpg';
		$uploadfile = $uploaddir . basename($name);

		if (move_uploaded_file($foto, $uploadfile)) {
			$pathImage = $uploaddir . $name;
		} else {
		 	return false;
		}
		return $pathImage;
	}
	/********************************************************
	Este metodo devuelve genera las imagenes del revista
	********************************************************/
	private function uploadPDF($pdf){
		$newPDF = $pdf['tmp_name'] ;
		$nombre_original = $pdf['name'];
		$explode_name_pdf = explode( '.' , $nombre_original );
		$extension = array_pop($explode_name_pdf);

		switch( $extension ) {
			case 'pdf':
			case 'PDF':
				$uploaddir = 'upload_revistas_pdf/';
				$name = md5(date("YmdHms")) . '.pdf';
				$uploadfile = $uploaddir . basename($name);

				if (move_uploaded_file($newPDF, $uploadfile)) {
					$pathPDF = $uploaddir . $name;
				} else {
				 	return false;
				}
				return $pathPDF;
			break;
			default:
				return false;
			break;
		}

	}
	/********************************************************
	Este metodo devuelve todas las Revistas de la base de datos
	********************************************************/
	public function getRevistas()
	{
		$mysqli = DataBase::connex();
		$query = '
			SELECT * FROM 
				revistas
		';
		$result = $mysqli->query($query);
		while ($row = $result->fetch_assoc()) 
		{
			$revista['id'] = $row['id'];
			$revista['title'] = $row['title'];
			$revista['image'] = $row['image'];
			$revista['description'] = $row['description'];
			$revista['edition'] = $row['edition'];	
			$revista['pdf'] = $row['pdf'];
			$revista['swf'] = $row['swf'];
			$revistas[] = $revista;
		}
		$result->free();
		$mysqli->close();
		$rows = $this->format_list_revistas($revistas);
    return $rows;
	}

	private function format_list_revistas($list){
		$rows = '';
		foreach ($list as $revista) {
			$rows .= '<tr>';
				$rows .= '<td>'.$revista['title'].'</td>';
				$rows .= '<td>'.$revista['edition'].'</td>';
				$rows .= '<td>';
					$rows .= '<form id="revista_editar" action="editar_revista.php" method="POST">';
						$rows .= '<input type="hidden" name="id" value="'.$revista['id'].'"/>';
						$rows .= '<input id="btn_revista_editar" class="btn_general" type="submit" value="Editar" name="btn_revista_editar" />';
					$rows .= '</form>';
				$rows .= '</td>';
				$rows .= '<td>';
					$rows .= '<form id="revista_eliminar" action="controllers.php" method="POST">';
						$rows .= '<input type="hidden" name="id" value="'.$revista['id'].'"/>';
						$rows .= '<input id="btn_revista_eliminar" class="btn_general" type="submit" value="Eliminar" name="btn_revista_eliminar" />';
					$rows .= '</form>';
				$rows .= '</td>';
			$rows .= '</tr>';
		}
		return $rows;
	}
	/********************************************************
	Este metodo devuelve todas las Revistas de la base de datos
	********************************************************/
	public function getRevista($revistaId)
	{
		$mysqli = DataBase::connex();
		$query = '
			SELECT * FROM 
				revistas
			WHERE
				revistas.id = "' . $revistaId . '" 
			LIMIT 1
		';
		$result = $mysqli->query($query);
		while ($row = $result->fetch_assoc()) 
		{
			$revista['id'] = $row['id'];
			$revista['title'] = $row['title'];
			$revista['image'] = $row['image'];
			$revista['description'] = $row['description'];
			$revista['edition'] = $row['edition'];	
			$revista['pdf'] = $row['pdf'];
			$revista['swf'] = $row['swf'];
		}
		$result->free();
		$mysqli->close();
    return $revista;
	}
	/********************************************************
	Este metodo actualiza una Revista especifica de la base de datos
	lo que recibe de parametro es el id de la Revista a modificar
	********************************************************/
  public function updaterevista($revista, $files)
  {
  	if($files['image']['name'] != ''){
  		$pathImage = $this->updateImage($files['image'], $revista['name_image']);
  	} else {
  		$pathImage = $revista['name_image'];
  	}
  	if($files['pdf']['name'] != ''){
  		$pathPDF = $this->updatePDF($files['pdf'], $revista['name_pdf']);
  	} else {
  		$pathPDF = $revista['name_pdf'];
  	}
  	$mysqli = DataBase::connex();
  	$q = '
  		UPDATE 
  			revistas
  		SET
			revistas.title = "'. mysql_real_escape_string($revista['titulo']) .'",
			revistas.image = "'. mysql_real_escape_string($pathImage) .'",
			revistas.description = "'. mysql_real_escape_string($revista['descripcion']) .'",
			revistas.edition = "'. mysql_real_escape_string(date($revista['edicion'])) .'",
			revistas.pdf = "'. mysql_real_escape_string($pathPDF).'",
			revistas.swf = "'. mysql_real_escape_string($revista['html_swf']).'"
  		WHERE 
  			revistas.id = "' . $revista['revistaid'] . '" 
  		LIMIT 1
  	';

  	$mysqli->query($q);
  	$mysqli->close();
  }

  /********************************************************
	Este metodo devuelve genera la imagen de la revista
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
	Este metodo devuelve genera el PDF de la revista
	********************************************************/
	private function updatePDF($oldPDF, $rmPDF){
		echo '<pre>';
		print_r($oldPDF);
		print_r($rmPDF);
		echo '</pre>';
		
		$pdf = $oldPDF['tmp_name'] ;
		$nombre_original = $oldPDF['name'];
		$explode_name_pdf = explode( '.' , $nombre_original );
		$extension = array_pop( $explode_name_pdf);

		switch( $extension ) {
			case 'pdf':
			case 'PDF':
				$uploaddir = 'upload_revistas_pdf/';
				$name = md5(date("YmdHms")) . '.pdf';
				$uploadfile = $uploaddir . basename($name);

				if (move_uploaded_file($pdf, $uploadfile)) {
					$pathPDF = $uploaddir . $name;
				} else {
				 	return false;
				}
			break;
			default:
				return false;
			break;
		}

		if($rmPDF != ''){
			unlink($rmPDF);
		}
		echo '<br />'. $pathPDF;
		return $pathPDF;
	}
	/********************************************************
	Este metodo elimina una Revista especifica
	********************************************************/
  public function deleteRevista($id){
   	$mysqli = DataBase::connex();
		$query = '
			DELETE FROM 
				exphbb.revistas 
			WHERE 
				revistas.id = '.$id.'
			LIMIT
				1
		';
		$mysqli->query($query);
		$mysqli->close();
  }
}
?>