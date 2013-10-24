<?php

include_once 'DataBase.php';

/*
* Expo
* 
* @property integer $id
* @property string $titulo
* @property string $image
* @property string $teaser
* @property string $body
* @property date $fecha_inicio
* @property string $dias_vigente
* @property string $publish
* 
*/

class Expo 
{

	/********************************************************
	Este metodo da de alta a una nueva Expo en la base de datos
	lo que recibe de parametro es un array
	********************************************************/
	public function insetExpo($expo, $images)
	{
		
		$pathIgame = $this->uploadImage($images);

		$mysqli = DataBase::connex();
		$query = '
			INSERT INTO 
				expo 
			SET
				expo.id = NULL,
				expo.title = "'. $mysqli->real_escape_string($expo['titulo']) .'",
				expo.maps = "'. $mysqli->real_escape_string($expo['maps']) .'",
				expo.image = "'. $pathIgame[0] .'",
				expo.dias_horarios = "'. $mysqli->real_escape_string($expo['dias_horarios']) .'",
				expo.plano = "'.  $pathIgame[1] .'",
				expo.reglamento = "'. $mysqli->real_escape_string($expo['reglamento']).'",
				expo.como_participar = "'. $mysqli->real_escape_string($expo['como_participar']).'",
				expo.alojamiento = "'. $mysqli->real_escape_string($expo['alojamiento']).'",
				expo.prensa = "'. $mysqli->real_escape_string($expo['prensa']).'",
				expo.body = "'. $mysqli->real_escape_string($expo['descripcion_larga']).'",
				expo.teaser = "'. $mysqli->real_escape_string($expo['descripcion_corta']).'",
				expo.fecha_inicio = "'. $mysqli->real_escape_string($expo['inicio']).'",
				expo.fecha_fin = "'. $mysqli->real_escape_string($expo['fin']).'",
				expo.status = "'. $mysqli->real_escape_string($expo['status']).'"
			';
		$mysqli->query($query);
		$mysqli->close();

	}

	/********************************************************
	Este metodo devuelve todas las Expo publicadas de la base 
	de datos
	********************************************************/
	public function getExpos()
	{

		$mysqli = DataBase::connex();
		$query = '
			SELECT * FROM 
				expo
		';
		$result = $mysqli->query($query);
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()){
				$expo['id'] = $row['id'];
				$expo['title'] = $row['title'];
				$expo['maps'] = $row['maps'];
				$expo['image'] = $row['image'];
				$expo['dias_horarios'] = $row['dias_horarios'];
				$expo['plano'] = $row['plano'];
				$expo['reglamento'] = $row['reglamento'];
				$expo['como_participar'] = $row['como_participar'];
				$expo['alojamiento'] = $row['alojamiento'];
				$expo['prensa'] = $row['prensa'];
				$expo['body'] = $row['body'];
				$expo['teaser'] = $row['teaser'];
				$expo['fecha_inicio'] = $row['fecha_inicio'];
				$expo['fecha_fin'] = $row['fecha_fin'];
				$expo['status'] = $row['status'];
				
				$expos[] = $expo;
			}
			$result->free();
			$mysqli->close();
			$rows = $this->format_list_expo($expos);
	    	return $rows;
		}else{
			return false;
		}
	}

	private function format_list_expo($expos){
		$rows = '';

		foreach ($expos as $expo) {
			$rows .= '<tr>';
				$rows .= '<td>'.$expo['title'].'</td>';
				if($expo['status']=="Publicado"){
						$rows .= '<td class="statusB">'.$expo['status'].'</td>';
				}else{
					$rows .= '<td class="statusM">'.$expo['status'].'</td>';
				}
				$rows .= '<td>';
					$rows .= '<form id="expo_ver" method="POST">';
						$rows .= '<input type="hidden" name="id" value="'.$expo['id'].'"/>';
						$rows .= '<input id="btn_expo_ver" class="btn-classic" type="submit" value="Ver" name="btn_expo_ver" />';
					$rows .= '</form>';
				$rows .= '</td>';
				$rows .= '<td>';
					$rows .= '<form id="expo_editar" action="editar_expo.php" method="POST">';
						$rows .= '<input type="hidden" name="id" value="'.$expo['id'].'"/>';
						$rows .= '<input id="btn_expo_editar" class="btn-classic" type="submit" value="Editar" name="btn_expo_editar" />';
					$rows .= '</form>';
				$rows .= '</td>';
				$rows .= '<td>';
					$rows .= '<form id="expo_editar" action="administrar_expositores.php" method="POST">';
						$rows .= '<input type="hidden" name="id" value="'.$expo['id'].'"/>';
						$rows .= '<input id="btn_expo_editar" class="btn-classic" type="submit" value="Administrar" name="btn_expo_editar" />';
					$rows .= '</form>';
				$rows .= '</td>';
				$rows .= '<td>';
					$rows .= '<form id="expo_editar" action="editar_expo.php" method="POST">';
						$rows .= '<input type="hidden" name="id" value="'.$expo['id'].'"/>';
						$rows .= '<input id="btn_expo_editar" class="btn-classic" type="submit" value="Agregar o Quiter" name="btn_expo_editar" />';
					$rows .= '</form>';
				$rows .= '</td>';
				$rows .= '<td>';
				$rows .= '<a href="#modal_confirmation_'.$expo['id'].'" class="btn-classic eliminar_revista">Eliminar</a>';
					$rows .= '<div id="modal_confirmation_'.$expo['id'].'" class="zoom-anim-dialog mfp-hide modal_confirmation">';
						$rows .= '<h3>Eliminar Exposicion</h3>';
						$rows .= '<p>Estas seguro que deceas eliminar esta Exposicion?</p>';
						$rows .= '<form id="expo_eliminar" action="controllers.php" method="POST">';
							$rows .= '<input type="hidden" name="id" value="'.$expo['id'].'"/>';
							$rows .= '<input id="btn_cancelar" class="btn-classic" type="button" value="Cancelar" name="btn_cancelar" />'; 
							$rows .= '<input id="btn_expo_eliminar" class="btn-classic" type="submit" value="Eliminar" name="btn_expo_eliminar" />';
						$rows .= '</form>';
					$rows .= '</div>';
				$rows .= '</td>';
			$rows .= '</tr>';
		}
		return $rows;
	}

	/********************************************************
	Este metodo devuelve una Expo especifica de la base de datos
	lo que recibe de parametro es el id de la Expo
	********************************************************/
    public function getOneExpo($id)
	{

		$mysqli = DataBase::connex();
		$query = '
			SELECT * FROM 
				expo
			WHERE 
				expo.id = "' . $id . '"
			LIMIT 1
		';
		$result = $mysqli->query($query);
		while ($row = $result->fetch_assoc()) 
		{
			$expo['id'] = $row['id'];
			$expo['title'] = $row['title'];
			$expo['maps'] = $row['maps'];
			$expo['image'] = $row['image'];
			$expo['dias_horarios'] = $row['dias_horarios'];
			$expo['plano'] = $row['plano'];
			$expo['reglamento'] = $row['reglamento'];
			$expo['como_participar'] = $row['como_participar'];
			$expo['alojamiento'] = $row['alojamiento'];
			$expo['prensa'] = $row['prensa'];
			$expo['body'] = $row['body'];
			$expo['teaser'] = $row['teaser'];
			$expo['fecha_inicio'] = $row['fecha_inicio'];
			$expo['fecha_fin'] = $row['fecha_fin'];
			$expo['status'] = $row['status'];
		}
		$result->free();
		$mysqli->close();
        return $expo;
	}

	/********************************************************
	Este metodo actualiza una Expo especifica de la base de datos
	lo que recibe de parametro es el id de la Expo a modificar
	********************************************************/
    public function updateExpo($expo, $images)
    {
    	
    	if($images['image']['name'] != ''){
    		$pathImage = $this->updateImage($images['image'], $expo['name_image']);

    	} else {
    		$pathImage = $expo['name_image'];
    	}

    	if($images['plano']['name'] != ''){
    		$pathPlano = $this->updateImage($images['plano'], $expo['name_plano']);

    	} else {
    		$pathPlano = $expo['name_plano'];
    	}

    	$mysqli = DataBase::connex();
    	$q = '
    		UPDATE 
    			expo 
    		SET
    			expo.title = "'. $mysqli->real_escape_string($expo['titulo']) .'",
				expo.maps = "'. $mysqli->real_escape_string($expo['maps']) .'",
				expo.image = "'. $pathImage .'",
				expo.dias_horarios = "'. $mysqli->real_escape_string($expo['dias_horarios']) .'",
				expo.plano = "'.  $pathPlano .'",
				expo.reglamento = "'. $mysqli->real_escape_string($expo['reglamento']).'",
				expo.como_participar = "'. $mysqli->real_escape_string($expo['como_participar']).'",
				expo.alojamiento = "'. $mysqli->real_escape_string($expo['alojamiento']).'",
				expo.prensa = "'. $mysqli->real_escape_string($expo['prensa']).'",
				expo.body = "'. $mysqli->real_escape_string($expo['descripcion_larga']).'",
				expo.teaser = "'. $mysqli->real_escape_string($expo['descripcion_corta']).'",
				expo.fecha_inicio = "'. $mysqli->real_escape_string($expo['inicio']).'",
				expo.fecha_fin = "'. $mysqli->real_escape_string($expo['fin']).'",
				expo.status = "'. $mysqli->real_escape_string($expo['status']).'"
    		WHERE 
    			expo.id = "' . $expo['expo_id'] . '" 
    		LIMIT 1
    	';
    	$mysqli->query($q);
    	$mysqli->close();
    }

    /********************************************************
	Este metodo elimina una Expo especifica
	********************************************************/
	public function deleteExpo($expoId){
		$mysqli = DataBase::connex();
		$query = '
			DELETE FROM 
				expo 
			WHERE 
				expo.id = '.$expoId.'
			LIMIT
				1
		';
		$mysqli->query($query);
		$mysqli->close();
	}

    /********************************************************
	Este metodo da de alta a una nueva Empresa en la base de datos
	lo que recibe de parametro es un array
	********************************************************/
	public function insetEmpresa($empresa, $images)
	{

		$pathIgame = $this->uploadImage($images);	
		
		$mysqli = DataBase::connex();
		$query = '
			INSERT INTO 
				empresas 
			SET
				empresas.id = NULL,
				empresas.name = "'. $mysqli->real_escape_string($empresa['name']) .'",
				empresas.email = "'. $mysqli->real_escape_string($empresa['mail']) .'",
				empresas.web = "'. $mysqli->real_escape_string($empresa['web']) .'",
				empresas.description = "'. $mysqli->real_escape_string($empresa['descripcion']) .'",
				empresas.image = "'. $mysqli->real_escape_string($pathIgame[0]) .'"
			';
		$mysqli->query($query);
		$mysqli->close();

	}

	/********************************************************
	Este metodo devuelve genera la imagen de la Empresa o
	las imagenes de los expositores
	********************************************************/
	private function uploadImage($images){
		$pathIgame = array();
		foreach ($images as $type => $image) {
			if(!empty($image['tmp_name'])){
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
					$pathIgame[] = $uploaddir . $name;
				} else {
					if(isset($pathIgame)){
						return $pathIgame;
					}else{
				 		return false;
					}
				}
			}
		}
		return $pathIgame;
	}

	/********************************************************
	Este metodo todas las Empresa en la base de datos
	lo que recibe de parametro es un array
	********************************************************/
	public function getListEmpresa(){
		
		$mysqli = DataBase::connex();
		$query = '
			SELECT id, name, email FROM
				empresas 
			';
		$result = $mysqli->query($query);
		$empresas = array();
		while ($row = $result->fetch_assoc()) 
		{
			$empresa['id'] = $row['id'];
			$empresa['name'] = $row['name'];
			$empresa['email'] = $row['email'];
			$empresas[] = $empresa;
		}
		$result->free();
		$mysqli->close();
		return $this->formatListEmpresa($empresas);

	}

	private function formatListEmpresa($empresas){
  		$rows = '';
		foreach ($empresas as $empresa) {
			$rows .= '<tr>';
				$rows .= '<td>'.$empresa['name'].'</td>';
				$rows .= '<td>';
					$rows .= '<form id="empresa_editar" action="editar_empresa.php" method="POST">';
						$rows .= '<input type="hidden" name="id" value="'.$empresa['id'].'"/>';
						$rows .= '<input id="btn_empresa_administrar" class="btn-classic" type="submit" value="Administrar" name="btn_empresa_administrar" />';
					$rows .= '</form>';
				$rows .= '</td>';
				$rows .= '<td>';
				$rows .= '<a href="#modal_confirmation_'.$empresa['id'].'" class="btn-classic eliminar_marquee">Eliminar</a>';
					$rows .= '<div id="modal_confirmation_'.$empresa['id'].'" class="zoom-anim-dialog mfp-hide modal_confirmation">';
						$rows .= '<h3>Eliminar Empresa</h3>';
						$rows .= '<p>Estas seguro que deceas elimiar esta Empresa?</p>';
						$rows .= '<form id="empresa_eliminar" action="controllers.php" method="POST">';
							$rows .= '<input type="hidden" name="id" value="'.$empresa['id'].'"/>';
							$rows .= '<input id="btn_cancelar" class="btn-classic" type="button" value="Cancelar" name="btn_cancelar" />'; 
							$rows .= '<input id="btn_empresa_eliminar" class="btn-classic" type="submit" value="Eliminar" name="btn_empresa_eliminar" />';
						$rows .= '</form>';
					$rows .= '</div>';
				$rows .= '</td>';
			$rows .= '</tr>';
		}
		return $rows;
  	}

  	public function getListAsignarEmpresa($expoId){
		
		$mysqli = DataBase::connex();
		
		$query = '
			SELECT 
				exp.id as id_relacion,
				exp.id_expo as id_expo,
				exp.id_empresa as id_empresa,
				exp.es_expositor as es_expositor
			FROM
				expo_empresa exp
			WHERE
				id_expo = ' . $expoId . '
		';
		$result = $mysqli->query($query);
		$expoEmpresas = array();
		while ($row = $result->fetch_assoc()){
			$expoEmpresa['id_relacion'] = $row['id_relacion'];
			$expoEmpresa['id_empresa'] = $row['id_empresa'];
			$expoEmpresa['id_expo'] = $row['id_expo'];
			$expoEmpresa['es_expositor'] = $row['es_expositor'];
			$expoEmpresas[] = $expoEmpresa;
		}

		$query = '
			SELECT 
				emp.id as empid, 
				emp.name as name, 
				emp.email as email
			FROM
				empresas emp
		';
		$result = $mysqli->query($query);
		$arrayEmpresas = array();
		while ($row = $result->fetch_assoc()){
			$arrayEmpresa['id'] = $row['empid'];
			$arrayEmpresa['name'] = $row['name'];
			$arrayEmpresa['email'] = $row['email'];
			$arrayEmpresa['id_relacion'] = '';
			$arrayEmpresa['id_expo'] = '';
			$arrayEmpresa['es_expositor'] = '';

			foreach ($expoEmpresas as $expoEmpresa) {
				if($expoEmpresa['id_empresa'] == $arrayEmpresa['id']){
					$arrayEmpresa['id_relacion'] = $expoEmpresa['id_relacion'];
					$arrayEmpresa['id_expo'] = $expoEmpresa['id_expo'];
					$arrayEmpresa['es_expositor'] = $expoEmpresa['es_expositor'];
				}
			}
			$arrayEmpresas[] = $arrayEmpresa;
		}
		$mergeArrayEmpresas = array();
		foreach ($arrayEmpresas as $empresa) {
			if($empresa['es_expositor'] == 'si'){
				$mergeArrayEmpresas['expositores'][] = $empresa;
			}elseif($empresa['id_relacion']){
				$mergeArrayEmpresas['empresa'][] = $empresa;
			} else {
				$mergeArrayEmpresas['asignar'][] = $empresa;
			}
		}
		return $this->listAsignarEmpresa($expoId, $mergeArrayEmpresas);
	}

  	private function listAsignarEmpresa($expoId, $empresas){
  		$rows = '';
		$rows .= '<input type="hidden" name="expo_id" value="'.$expoId.'"/>';
  		foreach ($empresas as $tipo => $empresasPorTipo) {
			foreach ($empresasPorTipo as $empresa) {
				$rows .= '<tr>';
					$rows .= '<td>';
						if($tipo != 'asignar'){
							$rows .= '<input type="hidden" name="expoEmpresas['.$empresa['id'].'][id_relacion]" value="'.$empresa['id_relacion'].'"/>';
						}else{
							$rows .= '<input type="hidden" name="expoEmpresas['.$empresa['id'].'][id_relacion]" value=""/>';
						}
						$rows .= '<input type="hidden" name="expoEmpresas['.$empresa['id'].'][id_empresa]" value="'.$empresa['id'].'"/>';
						$rows .= $empresa['name'];
					$rows .= '</td>';
					$rows .= '<td>'.$empresa['email'].'</td>';
					$rows .= '<td>';
						$rows .= '<select id="asignar" class="label_reg" name="expoEmpresas['.$empresa['id'].'][asignar]">';
							if($empresa['id_expo']){
								$rows .= '<option value="no">No</option>';
			              		$rows .= '<option selected value="si">Si</option>';
							}else{
			              		$rows .= '<option selected value="no">No</option>';
			              		$rows .= '<option value="si">Si</option>';
							}
			            $rows .= '</select>';
					$rows .= '</td>';
					$rows .= '<td>';
						$rows .= '<select id="es_expositor" class="label_reg" name="expoEmpresas['.$empresa['id'].'][es_expositor]">';
							if($empresa['es_expositor'] == 'si'){
								$rows .= '<option value="no">No</option>';
			              		$rows .= '<option selected value="si">Si</option>';
							}else{
			              		$rows .= '<option selected value="no">No</option>';
			              		$rows .= '<option value="si">Si</option>';
							}
			            $rows .= '</select>';
					$rows .= '</td>';
				$rows .= '</tr>';
			}
  		}
		return $rows;
  	}

	/********************************************************
	Este metodo elimina una Empresa especifico
	********************************************************/
	public function deleteEmpresa($empresaId){
		$mysqli = DataBase::connex();
		$query = '
			DELETE FROM 
				empresas 
			WHERE 
				empresas.id = '.$empresaId.'
			LIMIT
				1
		';
		$mysqli->query($query);
		$mysqli->close();
	}

	/********************************************************
	Este metodo devuelve una Empresa especifica de la base de datos
	lo que recibe de parametro es el id de la Empresa
	********************************************************/
    public function getOneEmpresa($id)
	{
		$mysqli = DataBase::connex();
		$query = '
			SELECT * FROM 
				empresas
			WHERE 
				empresas.id = "' . $id . '"
			LIMIT 1
		';
		$result = $mysqli->query($query);
		while ($row = $result->fetch_assoc()) 
		{
			$empresa['id'] = $row['id'];
			$empresa['name'] = $row['name'];
			$empresa['email'] = $row['email'];
			$empresa['web'] = $row['web'];
			$empresa['description'] = $row['description'];
			$empresa['image'] = $row['image'];
		}
		$result->free();
		$mysqli->close();
        return $empresa;
	}

	/********************************************************
	Este metodo actualiza una Empresa en la base de datos
	lo que recibe de parametro es un array
	********************************************************/
	public function updateEmpresa($empresa, $image){

		if($image['name'] != ''){
    		$pathImage = $this->updateImage($image, $empresa['name_image']);
    	} else {
    		$pathImage = $empresa['name_image'];
    	}
		
		$mysqli = DataBase::connex();
		$query = '
			UPDATE
				empresas 
			SET
				empresas.name = "'. $mysqli->real_escape_string($empresa['name']) .'",
				empresas.email = "'. $mysqli->real_escape_string($empresa['mail']) .'",
				empresas.description = "'. $mysqli->real_escape_string($empresa['descripcion']) .'",
				empresas.web = "'. $mysqli->real_escape_string($empresa['web']) .'",
				empresas.image = "'. $pathImage .'"
			WHERE 
    			empresas.id = "' . $empresa['id'] . '" 
    		LIMIT 1
			';
		$mysqli->query($query);
		$mysqli->close();
	}


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
	Este metodo llama al los metodos para guardar imagenes 
	y actividades
	*********************************************************/
	public function insertImagesActivities($expositores, $images)
	{
		$this->imagesExpositores($expositores, $images);
		$this->insetActividad($expositores);
	}

    /********************************************************
	Este metodo da de alta a las imagenes de los Expositores
	en la base de datos.
	Lo que recibe de parametro son dos arrays
	********************************************************/
	private function imagesExpositores($expositores, $images)
	{
		$pathIgames = $this->uploadImage($images);
		$mysqli = DataBase::connex();
		foreach ($pathIgames as $pathIgame) {
			$query = '
				INSERT INTO 
					fotos_expositores 
				SET
					fotos_expositores.id = NULL,
					fotos_expositores.id_expo = "'. $mysqli->real_escape_string($expositores['expo']) .'",
					fotos_expositores.id_expositor = "'. $mysqli->real_escape_string($expositores['empresa']) .'",
					fotos_expositores.foto = "'. $mysqli->real_escape_string($pathIgame) .'";
				';
			/*echo '<br />';
			echo $query;
			echo '<br />';*/
			$mysqli->query($query);	
		}
		$mysqli->close();
	}

    /********************************************************
	Este metodo da de alta a una nueva Activdad en la base de datos
	lo que recibe de parametro es un array
	********************************************************/
	private function insetActividad($expositores)
	{
		
		$mysqli = DataBase::connex();
		$query = '
			INSERT INTO 
				actividades_expositores 
			SET
				actividades_expositores.id = NULL,
				actividades_expositores.id_expo = "'. $mysqli->real_escape_string($expositores['expo']) .'",
				actividades_expositores.id_expositor = "'. $mysqli->real_escape_string($expositores['empresa']) .'",
				actividades_expositores.actividad = "'. $mysqli->real_escape_string($expositores['actividad']) .'";
			';
			/*echo '<br />';
			echo $query;
			echo '<br />';*/
		$mysqli->query($query);
		$mysqli->close();
	}
	/********************************************************
	Este metodo todas las Empresa en la base de datos
	lo que recibe de parametro es un array
	********************************************************/
	public function getListExpoEmpresas($expoId){
		
		$mysqli = DataBase::connex();
		$query = '
			SELECT 
				emp.id as id, 
				emp.name as name, 
				emp.email as email,
				exp.id_expo as id_expo,
				exp.id_empresa as id_empresa,
				exp.es_expositor as es_expositor,
				exp.pass as pass
			FROM
				empresas emp,
				expo_empresa exp
			WHERE 
    			id_expo = "' . $expoId . '"
    		AND
    			id_empresa = emp.id
			';
		$result = $mysqli->query($query);
		$expoEmpresas = array();
		while ($row = $result->fetch_assoc()) 
		{
			$expoEmpresa['id'] = $row['id'];
			$expoEmpresa['name'] = $row['name'];
			$expoEmpresa['email'] = $row['email'];
			$expoEmpresa['id_expo'] = $row['id_expo'];
			$expoEmpresa['es_expositor'] = $row['es_expositor'];
			$expoEmpresa['pass'] = $row['pass'];
			$expoEmpresas[] = $expoEmpresa;
		}
		$result->free();
		$mysqli->close();
		
		return $this->formatListAdministrarEmpresa($expoEmpresas);
	}
	private function formatListAdministrarEmpresa($ExpoEmpresas){
  		$rows = '';
		foreach ($ExpoEmpresas as $key => $ExpoEmpresa) {
			$rows .= '<tr>';
				$rows .= '<td>Pendiente</td>';
				$rows .= '<td>'.$ExpoEmpresa['name'].'</td>';
				$rows .= '<td>';
	              if($ExpoEmpresa['es_expositor'] == 'si'){
	              	$rows .= 'Expositor';
	              }else{
	              	$rows .= 'Empresa';
	              }
				$rows .= '</td>';
				$rows .= '<td>';
					$rows .= '<form id="contenido_expositores" action="administrar_empresa.php" method="POST">';
						$rows .= '<input type="hidden" name="id_empresa" value="'.$ExpoEmpresa['id'].'"/>';
						$rows .= '<input type="hidden" name="id_expo" value="'.$ExpoEmpresa['id_expo'].'"/>';
						$rows .= '<input id="btn_contenido_expositores" class="btn-classic" type="submit" value="Administrar" name="btn_contenido_expositores" />';
					$rows .= '</form>';
				$rows .= '</td>';
			$rows .= '</tr>';
		}
		return $rows;
  	}

  	/********************************************************
	Este metodo devuelve una Empresa especifica de la base de datos
	lo que recibe de parametro es el id de la Empresa
	********************************************************/
    public function getExpoEmpresa($id_expo, $id_empresa)
	{
		$mysqli = DataBase::connex();
		$query = '
			SELECT 
				emp.id as id, 
				emp.name as name, 
				ee.es_expositor as es_expositor, 
				ee.id as id_relacion,
				ee.pass as pass 
			FROM 
				empresas emp 
			JOIN 
				expo_empresa ee
			ON 
				emp.id = ee.id_empresa
			WHERE 
				emp.id = "' . $id_empresa . '"
			AND
				ee.id_expo= "' . $id_expo . '"
		';
		$result = $mysqli->query($query);
		while ($row = $result->fetch_assoc()) 
		{
			$empresa['id'] = $row['id'];
			$empresa['name'] = $row['name'];
			$empresa['id_relacion'] = $row['id_relacion'];
			$empresa['es_expositor'] = $row['es_expositor'];
			$empresa['pass'] = $row['pass'];
		}
		$result->free();
		$mysqli->close();
        return $empresa;
	}

	public function setExpoEmpresas($expoEmpresas){
		$mysqli = DataBase::connex();
		foreach ($expoEmpresas['expoEmpresas'] as $empresa) {
			if($empresa['id_relacion'] != ''){
				if($empresa['asignar'] == 'no'){
					//borra
					$query = 'DELETE FROM expo_empresa WHERE expo_empresa.id = ' . $empresa['id_relacion'] . '	LIMIT 1;';
					echo $query . '<br />';
					$mysqli->query($query);
				}else{
					//actualiza
					$query = '
			    		UPDATE  
			    			expo_empresa 
			    		SET  
			    			expo_empresa.es_expositor =  "'. $mysqli->real_escape_string($empresa['es_expositor']) .'" 
			    		WHERE  
			    			expo_empresa.id = "' . $empresa['id_relacion'] . '"
			    	;';
					echo $query . '<br />';
					$mysqli->query($query);
				}
			}else{
				if($empresa['asignar'] == 'si'){
					//guarda
					$query = '
						INSERT INTO 
							expo_empresa 
						SET
							expo_empresa.id = NULL,
							expo_empresa.id_expo = "'. $mysqli->real_escape_string($expoEmpresas['expo_id']) .'",
							expo_empresa.id_empresa = "'. $mysqli->real_escape_string($empresa['id_empresa']) .'",
							expo_empresa.es_expositor = "'. $mysqli->real_escape_string($empresa['es_expositor']) .'",
							expo_empresa.pass = ""
						;';
					echo $query . '<br />';
					$mysqli->query($query);
				}
			}
		}
		$mysqli->close();
	}
}
?>