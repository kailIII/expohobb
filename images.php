<?php
	include_once 'head.php';
?>
<?php
	
	$imagen = $_FILES['userfile'];
	$foto = $imagen['tmp_name'] ;
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

	$uploaddir = DIR_AVATAR;
	$name = md5($_SESSION['usuario'] . date("YmdHms")) . '.jpg';
	$_SESSION['portada'] = $name;
	$uploadfile = $uploaddir . basename($name);

	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile))
	{
		echo '<img id="pre_portada" alt="Portada" name="previewPortada" class="pre_portada" src="' . $uploadfile . '" />';
	} 
	else 
	{
	  echo "error";
	}

?>