<?php
include_once '../class/DataBase.php';

/* RECEIVE VALUE */

$validateValue=$_REQUEST['fieldValue'];
$validateId=$_REQUEST['fieldId'];


$validateError= "Este e-mail ya existe";
$validateSuccess= "E-mail valido";



	/* RETURN VALUE */
	
	$arrayToJs = array();
	$arrayToJs[0] = $validateId;

$mysqli = DataBase::connex();
		$query = '
				SELECT * FROM 
					acreditacion
				WHERE 
					email = "' . $validateValue . '"
			';
		$result = $mysqli->query($query);
		if($result->num_rows == 0)
		{		
	$arrayToJs[1] = true;			// RETURN TRUE
	echo json_encode($arrayToJs);			// RETURN ARRAY WITH success
}else{
	for($x=0;$x<1000000;$x++){
		if($x == 990000){
			$arrayToJs[1] = false;
			echo json_encode($arrayToJs);		// RETURN ARRAY WITH ERROR
		}
	}
		
}
$mysqli->close();













?>