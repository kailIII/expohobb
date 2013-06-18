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
* @property string $status
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
		$pathFile = $this->uploadFile($files['pdf']);
		$pathSWF = $this->uploadFile($files['html_swf']);
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
				revistas.pdf = "'. mysql_real_escape_string($pathFile).'",
				revistas.swf = "'. mysql_real_escape_string($pathSWF).'",
				revistas.status = "'. mysql_real_escape_string($revista['status']).'"
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
	private function uploadFile($file){
		$newFile = $file['tmp_name'] ;
		$nombre_original = $file['name'];
		$explode_name_file = explode( '.' , $nombre_original );
		$extension = array_pop($explode_name_file);

		switch( $extension ) {
			case 'pdf':
			case 'PDF':
				$uploaddir = 'upload_revistas_pdf/';
				$name = md5(date("YmdHms")) . '.pdf';
				$uploadfile = $uploaddir . basename($name);

				if (move_uploaded_file($newFile, $uploadfile)) {
					$pathFile = $uploaddir . $name;
				} else {
				 	return false;
				}
				return $pathFile;
			break;
			case 'swf':
			case 'SWF':
				$uploaddir = 'upload_revistas_swf/';
				$name = md5(date("YmdHms")) . '.swf';
				$uploadfile = $uploaddir . basename($name);

				if (move_uploaded_file($newFile, $uploadfile)) {
					$pathFile = $uploaddir . $name;
				} else {
				 	return false;
				}
				return $pathFile;
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
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()) 
			{
				$revista['id'] = $row['id'];
				$revista['title'] = $row['title'];
				$revista['image'] = $row['image'];
				$revista['description'] = $row['description'];
				$revista['edition'] = $row['edition'];	
				$revista['pdf'] = $row['pdf'];
				$revista['swf'] = $row['swf'];
				$revista['status'] = $row['status'];
				$revistas[] = $revista;
			}
			$result->free();
			$mysqli->close();
			$rows = $this->format_list_revistas($revistas);
	    return $rows;
		}else{
			return false;
		}
	}

	private function format_list_revistas($list){
		$rows = '';
		foreach ($list as $revista) {
			$rows .= '<tr>';
				$rows .= '<td>'.$revista['title'].'</td>';
				$rows .= '<td>'.$revista['edition'].'</td>';
				if($revista['status']=="Publicado"){
						$rows .= '<td class="statusB">'.$revista['status'].'</td>';
				}else{
					$rows .= '<td class="statusM">'.$revista['status'].'</td>';
				}
				$rows .= '<td>';
					$rows .= '<form id="revista_editar" action="editar_revista.php" method="POST">';
						$rows .= '<input type="hidden" name="id" value="'.$revista['id'].'"/>';
						$rows .= '<input id="btn_revista_editar" class="btn-classic" type="submit" value="Editar" name="btn_revista_editar" />';
					$rows .= '</form>';
				$rows .= '</td>';
				$rows .= '<td>';
					$rows .= '<form id="revista_eliminar" action="controllers.php" method="POST">';
						$rows .= '<input type="hidden" name="id" value="'.$revista['id'].'"/>';
						$rows .= '<input id="btn_revista_eliminar" class="btn-classic" type="submit" value="Eliminar" name="btn_revista_eliminar" />';
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
			$revista['status'] = $row['status'];
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
  		$pathPDF = $this->updateFile($files['pdf'], $revista['name_pdf']);
  	} else {
  		$pathPDF = $revista['name_pdf'];
  	}
  	if($files['html_swf']['name'] != ''){
  		$pathSWF = $this->updateFile($files['html_swf'], $revista['name_swf']);
  	} else {
  		$pathSWF = $revista['name_swf'];
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
			revistas.swf = "'. mysql_real_escape_string($pathSWF).'",
			revistas.status = "'. mysql_real_escape_string($revista['status']).'"
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
	private function updateFile($oldFile, $rmFile){
		echo '<pre>';
		print_r($oldFile);
		print_r($rmFile);
		echo '</pre>';
		
		$newFile = $oldFile['tmp_name'] ;
		$nombre_original = $oldFile['name'];
		$explode_name_file = explode( '.' , $nombre_original );
		$extension = array_pop( $explode_name_file);

		switch( $extension ) {
			case 'pdf':
			case 'PDF':
				$uploaddir = 'upload_revistas_pdf/';
				$name = md5(date("YmdHms")) . '.pdf';
				$uploadfile = $uploaddir . basename($name);
			break;
			case 'swf':
			case 'SWF':
				$uploaddir = 'upload_revistas_swf/';
				$name = md5(date("YmdHms")) . '.swf';
				$uploadfile = $uploaddir . basename($name);
			break;
			default:
				return false;
			break;
		}
		
		if (move_uploaded_file($newFile, $uploadfile)) {
			$pathFile = $uploaddir . $name;
		} else {
		 	return false;
		}

		if($rmFile != ''){
			unlink($rmFile);
		}
		echo '<br />'. $pathFile;
		return $pathFile;
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