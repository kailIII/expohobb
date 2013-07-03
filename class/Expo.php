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
	private function insetExpo($expo)
	{
		
		$mysqli = DataBase::connex();
		$query = '
			INSERT INTO 
				expo 
			SET
				expo.id = NULL,
				expo.titulo = "'. $mysqli->real_escape_string($expo['title']) .'",
				expo.image = "'. $mysqli->real_escape_string($expo['image']) .'",
				expo.teaser = "'. $mysqli->real_escape_string($expo['teaser']) .'",
				expo.body = "'. $mysqli->real_escape_string($expo['body']) .'",
				expo.fecha_inicio = "'. $mysqli->real_escape_string($expo['fecha_inicio']).'",
				expo.dias_vigente = "'. $mysqli->real_escape_string($expo['dias_vigente']).'",
				expo.publish = "'. $mysqli->real_escape_string($expo['publish']).'"
			';
		$mysqli->query($query);
		$mysqli->close();

	}

	/********************************************************
	Este metodo devuelve todas las Expo publicadas de la base 
	de datos
	********************************************************/
	private function getExpo()
	{

		$query = '
			SELECT * FROM 
				expo
			WHERE 
				expo.publish = "publish"
		';
		$result = $mysqli->query($query);
		while ($row = $result->fetch_assoc()) 
		{
			$expo['id'] = $row['id'];
			$expo['title'] = $row['title'];
			$expo['image'] = $row['image'];
			$expo['teaser'] = $row['teaser'];
			$expo['fecha_inicio'] = $row['fecha_inicio'];	
			$expo['dias_vigente'] = $row['dias_vigente'];
			$expos[] = $expo;
		}
		$result->free();
		$mysqli->close();
        return $expos;
	}

	/********************************************************
	Este metodo devuelve una Expo especifica de la base de datos
	lo que recibe de parametro es el id de la Expo
	********************************************************/
    private function getOneExpo($id)
	{

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
			$expo['image'] = $row['image'];
			$expo['body'] = $row['body'];
			$expo['fecha_inicio'] = $row['fecha_inicio'];	
			$expo['dias_vigente'] = $row['dias_vigente'];
		}
		$result->free();
		$mysqli->close();
        return $expo;
	}

	/********************************************************
	Este metodo actualiza una Expo especifica de la base de datos
	lo que recibe de parametro es el id de la Expo a modificar
	********************************************************/
    private function updateExpo($expoId)
    {
    	$mysqli = DataBase::connex();
    	$q = '
    		UPDATE 
    			expo 
    		SET
    			expo.titulo = "'. $mysqli->real_escape_string($expo['title']) .'",
					expo.image = "'. $mysqli->real_escape_string($expo['image']) .'",
					expo.teaser = "'. $mysqli->real_escape_string($expo['teaser']) .'",
					expo.body = "'. $mysqli->real_escape_string($expo['body']) .'",
					expo.fecha_inicio = "'. $mysqli->real_escape_string($expo['fecha_inicio']).'",
					expo.dias_vigente = "'. $mysqli->real_escape_string($expo['dias_vigente']).'",
					expo.publish = "'. $mysqli->real_escape_string($expo['publish']).'"		
    			expo.header_coord = "' . $portada['coor'] . '"
    		WHERE 
    			expo.id = "' . $expoId . '" 
    		LIMIT 1
    	';
    	$mysqli->query($q);
    	$mysqli->close();
    	header("Location: muro.php");
    }
}
?>