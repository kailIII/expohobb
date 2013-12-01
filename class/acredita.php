<?php

include_once 'DataBase.php';

/*
* Expo
* 
* @property integer $id
* @property string $nombre
* @property string $apellido
* @property string $dni
* @property string $mail
* @property string $codigo
* @property string $codigoC
* 
*/

class Acred 
{

	/********************************************************
	Este metodo verifica los campos llenados en el formulario
	********************************************************/
	public function insetAcred($acreditacion)
	{
		if($acreditacion['nombre']=="" ||$acreditacion['apellido']=="" || $acreditacion['dni']=="" || $acreditacion['mail']=="" ){
		header("Location: acredita.php?id=".$acreditacion['id']."&error=camp_vacio");
		}else{
		$mysqli = DataBase::connex();
		$email=$mysqli->real_escape_string($acreditacion['mail']);
		$query = '
				SELECT * FROM 
					acreditacion
				WHERE 
					email = "' . $email . '"
			';
		$result = $mysqli->query($query);
		if($result->num_rows == 0)
		{		
			$datosAcre=array();
		    $datAcre['codigo']=md5(date("Y-m-d-". "H:i:s").$acreditacion['dni'].$acreditacion['apellido']);
			$datAcre['codigoC']=md5(date("Y-m-d-". "H:i:s").$acreditacion['dni'].$acreditacion['apellido'].$acreditacion['nombre']."7");
			$datAcre['nombre']=$mysqli->real_escape_string($acreditacion['nombre']);
			$datAcre['apellido']=$mysqli->real_escape_string($acreditacion['apellido']);
			$datAcre['dni']=$mysqli->real_escape_string($acreditacion['dni']);
			$datAcre['email']=$mysqli->real_escape_string($acreditacion['mail']);
			$datAcre['nomExp']=$mysqli->real_escape_string($acreditacion['nomExp']);
			$datAcre['fechExpo']=$mysqli->real_escape_string($acreditacion['fechExp']);
			$datAcre['id_expo']=$mysqli->real_escape_string($acreditacion['id_expo']);
			$mysqli = DataBase::connex();
			$query = '
				SELECT text_acr FROM 
					expo
				WHERE 
					id = "' . $datAcre['id_expo'] . '"
			';
			$result = $mysqli->query($query);
			while ($row = $result->fetch_assoc()) 
			{
			$datAcre['text_acr'] = $row['text_acr'];	
			
			}

			$datosAcre[]=$datAcre;
			$rows = $this->format_acredt($datosAcre);
			$result->free();
			$mysqli->close();
			return $rows;
			
		}else{
			header("Location: acreditacion.php?id=".$acreditacion['id_expo']."&error=camp_repetido");	
			}
		}
	}
	
		/********************************************************
	Envia email con la acreditacion al formulario y si esta correcto lo 
	guarda en la base de datos
	********************************************************/
	private function format_acredt($datosAcre){
		foreach ($datosAcre as $datAcre) {
			
			$fechaExp= $this->format_edition($datAcre['fechExpo']);
			require("PHPmailer.php");
			$mysqli = DataBase::connex();
			$classMail = new PHPMailer(); 

			$classMail->Mailer = "smtp";
			 
			//Luego tenemos que iniciar la validación por SMTP: 
			$classMail->IsSMTP(); 
			$classMail->SMTPAuth = true; // True para que verifique autentificación de la cuenta o de lo contrario False 
			$classMail->Username = "marketing@expohobby.net"; // Cuenta de e-mail 
			$classMail->Password = "hugo0714"; // Password  
			 
			$classMail->Host = "mail.expohobby.net"; 
	
			$classMail->From = "marketing@expohobby.net"; 
			$classMail->FromName = "Expohobby"; 
			$classMail->Subject = "Acreditación a Expohobby ".$fechaExp." ".$datAcre['nomExp']; 
			$classMail->AddAddress($datAcre['email'],$datAcre['nombre']); 
			$classMail->Port = 25;
			$classMail->WordWrap =200;
			
			 
			$body  = "<html> 
			
			<head> 
			<style type='text/css'>
				#todomens{
				margin:5px auto;
				height:auto;
				width:715px;
				border:#c1c2c3 solid thin;
				background:#f2f2f3;
			}
			h1{
				text-align:center;
				font-family:Verdana, Geneva, sans-serif;
				color:#FFF;
				font-size:18px;
				background:#906;
				padding:5px;
				
			}
			#contentrada{
				margin-top:30px 0px 21px 0px;
				height:auto;
				width:613px;
				border:#b4b4b5 dashed thin;
				padding:22px;
				text-align: left;
			}
			#entrada{
				width:600px;
				height:201px;
				margin:5px auto;
			}
			#contnf{
				padding:10px;
				font-family:Verdana, Geneva, sans-serif;
				font-size:14px;
				margin-top:15px;
				color:#3a3a3a;
			}
			.link{
					font-family:Verdana, Geneva, sans-serif;
					color:#909;
					font-size:16px;
					font-weight:bold;
					font-style:none;
					text-decoration:none;
					background:#FFF;
					border:#903 solid thin;
					padding:12px;
					margin:10px;
			}
			
			-->
			</style>
			   <title>Ultimo paso para el registro</title> 
			</head> 
			<body> 
				<center>
					<div id='todomens'>
						<div id='titulo'><h1>Expohobby".$fechaExp."<br />".$datAcre['nomExp']."</h1></div> 
						<div id='contentrada'>
							<div id='contnf'>
								Hola <strong>".$datAcre['nombre']." ".$datAcre['apellido'].":</strong><br>
								Gracias por acreditarse a <strong>Expohobby ".$fechaExp." ".$datAcre['nomExp'].".</strong><br><br>
								<a class='link' href='http://www.expohobby.net/descargar.php?codigo=".$datAcre['codigo']."-".$datAcre['dni']."'> Haga click aqu&iacute; para visualizar su cup&oacute;n</a><br><br>
								
								<p>".$datAcre['text_acr']."</p>
							</div>
						</div>
					</div>
					"; 
					$body .= "Lo saluda atentamente <strong>Coordinadores de EXPOHOBBY </strong>info@expohobby.net<br><br>
				</center>
			</body>
		</html>"; 
			 
			$classMail->Body = $body; 
		// Notificamos al usuario del estado del mensaje 
			
			if(!$classMail->Send()){ 
			header("Location: acreditacion.php?id=".$datAcre['id_expo']."&error=camp_email_mal");	
			}else{

				$mysqli = DataBase::connex();
				$query = '
					INSERT INTO 
						acreditacion
					SET
						acreditacion.id = NULL,
						acreditacion.nombre = "'. $mysqli->real_escape_string($datAcre['nombre']) .'",
						acreditacion.apellido = "'. $mysqli->real_escape_string($datAcre['apellido']) .'",
						acreditacion.dni = "'. $mysqli->real_escape_string($datAcre['dni']) .'",
						acreditacion.email = "'. $mysqli->real_escape_string($datAcre['email']).'",
						acreditacion.codigo = "'.$datAcre['codigo'].'",
						acreditacion.codigoC = "'.$datAcre['codigoC'].'",
						acreditacion.nomExp = "'.$mysqli->real_escape_string($datAcre['nomExp']).'",
						acreditacion.fechaExp = "'.$fechaExp.'",
						acreditacion.idExp = '.$datAcre['id_expo'].'
					';

		$mysqli->query($query);
		$mysqli->close();
		header("Location: acreditacion.php?id=".$datAcre['id_expo']."&bien=mail_ok");	
			}
		}
	}


	
	private function format_edition($edition){
		$meses = array('01' => 'Enero','02' => 'Febrero','03' => 'Marzo','04' => 'Abril','05' => 'Mayo','06' => 'Junio','07' => 'Julio','08' => 'Agosto','09' => 'Septiembre','10' => 'Octubre','11' => 'Noviembre','12' => 'Diciembre');
		$fecha = explode('-', $edition);
		$mes = $meses[$fecha[1]];
		return $mes . ' ' . $fecha[0];
	}
	
/********************************************************
Este metodo devuelve todas las acreditaciones por su dni y codigo
********************************************************/
	public function getAcredita($AcredDni,$codigo)
	{

		
		$mysqli = DataBase::connex();
		if($AcredDni != '' and $codigo != ''){
			$query = '
				SELECT 
				  A.* ,
				  E.img_acr,
				  E.text_acr
				 FROM 
				  acreditacion as A
				 JOIN
				  expo as E ON E.id = A.idExp
				 WHERE
				  A.dni ="' .$AcredDni. '"  
				 AND  
				  A.codigo ="' .$codigo. '"
			';
		}else{
			header("Location: index.php");	
		}
		$result = $mysqli->query($query);
		if($result->num_rows > 0){
			$acreditaciones=array();
		while ($row = $result->fetch_assoc()) 
		{
			$acreditacion['id'] = $row['id'];
			$acreditacion['nombre'] = $row['nombre'];
			$acreditacion['apellido'] = $row['apellido'];
			$acreditacion['dni'] = $row['dni'];
			$acreditacion['email'] = $row['email'];	
			$acreditacion['codigo'] = $row['codigo'];	
			$acreditacion['codigoC'] = $row['codigoC'];
			$acreditacion['nomExp'] = $row['nomExp'];
			$acreditacion['fechaExp'] = $row['fechaExp'];
			$acreditacion['img_acr'] = $row['img_acr'];
			$acreditacion['text_acr'] = $row['text_acr'];


			$acreditaciones[]=$acreditacion;
		}
		$result->free();
		$mysqli->close();
    	$rows = $this->format_acredt_des($acreditaciones);
		return $rows;
		}else{
		echo 'no existe';
		}
	}
	private function format_acredt_des($acreditaciones){
		$rows = '';
		foreach ($acreditaciones as $acreditacion) {
				$rows .= "<div id='todomens'>";
					$rows .= "<div id='titulo'><h1>Expohobby ".$acreditacion['fechaExp']."</h1><br/>";
						$rows .= " <h2>".$acreditacion['nomExp']."</h2>";
					$rows .= " </div> ";
					$rows .= "<div id='contentrada'>";
						$rows .= "<div id='entrada'>";
							$rows .= "<img src='".$acreditacion['img_acr']."'>";
							$rows .="<img  id='marcaag' src='acreditacion/img/body.png'>";
							$rows .="<div id='nombre'>";
							$rows .= $acreditacion['nombre']." ".$acreditacion['apellido'];
							$rows .= "</div>";
							$rows .= "<div id='dni'>";
							$rows .= $acreditacion['dni'];
							$rows .= "</div>";
						$rows .= "</div>";
					$rows .= "</div>";
					$rows .= "<div id='conimpr'>";
					$rows .= "	<form>";
							$rows .= "<input type='button' id='imprimir' value='' name='cmdPrint' onClick='doPrint(this.form);' title='IMPRIMIR'>";
						$rows .= "</form>";
					$rows .= "</div>";
					$rows .= "<div id='contnf'>";
						$rows .= "<p>Hola <strong> ".$acreditacion['nombre']." ".$acreditacion['apellido'].":</strong><br>
							Gracias por acreditarse  a <strong>Expohobby ".$acreditacion['fechaExp']." ".$acreditacion['nomExp']." </strong>.<br>
							Corte la entrada por las l&iacute;neas discontinuas, esta entrada es personal y deber&aacute; presentarse con su DNI o Cedula de identidad en mano para 		que tenga validez.<br><br>
							<p> ".$acreditacion['text_acr']."</p>";
					$rows .= "</div>";
				$rows .= "</div>";
				$rows .="<div id='contemafilms'>";
					$rows .= "<div id='emafilms'>";
						$rows .= "<a  href='http://estudiomultimediaeb.com.ar/'>Estudio Multimedia EB</a>";
					$rows .= "</div>";
				$rows .= "</div>";
				
		}
		return $rows;
	}
	
		/********************************************************
	paginador
	********************************************************/
	private function getPager($page)
	{
		$mysqli = DataBase::connex();
		$query = '
			SELECT COUNT(*) as acreditaciones FROM 
				acreditacion
			
		';
		$result = $mysqli->query($query);
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()) 
			{
				$registros = $row['acreditaciones'];
			}
			$result->free();
			$mysqli->close();
			$paginas = $registros / 100;
			if($registros > 100){
				$form = $this->makeSelect(floor($paginas), $page);
				return $form;
			}
			return false;
		}else{
			return false;
		}
	}

	private function makeSelect($pages, $page)
	{
		$options = '';
		for ($i=1; $i <= $pages; $i++) { 
			$options .= '<option value="'.$i.'"';
			if($i==$page){
				$options .= ' selected ';
			}
			 $options .= '>'.$i.'</option>';
		}
		$form = 'Pagina <select id="selector_pagina" name="selector_pagina">';
			$form .= $options;
		$form .='</select>';
        return $form;
	}
	/********************************************************
	Este metodo devuelve todos los Usuarios de la base de datos
	********************************************************/
	public function getUsuarios($page)
	{
		if($page == 1){
			$start = 0;
			$end = 200;
		}else{
			$start = $page * 200 + 1;
			$end = $page * 200 + 200;
		}
		
		$rows['pager'] = $this->getPager($page);
		$mysqli = DataBase::connex();
		$query = '
			SELECT * FROM 
				acreditacion
			ORDER BY id DESC
			LIMIT '.$start.' , '. $end
		;
		$result = $mysqli->query($query);
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()) 
			{
				$usuario['id'] = $row['id'];
				$usuario['email'] = $row['email'];
				$usuario['nombre'] = $row['nombre'];
				$usuario['apellido'] = $row['apellido'];
				$usuario['dni'] = $row['dni'];
				
				
				$usuarios[] = $usuario;
			}
			$result->free();
			$mysqli->close();
			$rows['list'] = $this->format_list_usuarios($usuarios);
			$rows['email'] = $this->format_list_usuarios_email($usuarios);
			
	    return $rows;
		}else{
			return false;
		}
	}
	/********************************************************
	Muestra solo los mails  para seleccionar
	********************************************************/
	private function format_list_usuarios_email($email){
		$rows = '';
		foreach ($email as $usuario) {
				$rows .= $usuario['email'].'<br>';
		}
		return $rows;
	}
	/********************************************************
	Genera el listado de mails de cada dia
	********************************************************/
	private function format_list_usuarios($list){
		$rows = '';
		foreach ($list as $usuario) {
			$rows .= '<tr>';
				$rows .= '<td class="copymail">'.$usuario['email'].' </td>';
				$rows .= '<td>'.$usuario['nombre'].' '.$usuario['apellido'].'</td>';
				$rows .= '<td>'.$usuario['dni'].'</td>';
	
	
				$rows .= '<td>';
				$rows .= '<a href="#modal_confirmation_'.$usuario['id'].'" class="btn-classic eliminar_revista">Eliminar</a>';
					$rows .= '<div id="modal_confirmation_'.$usuario['id'].'" class="zoom-anim-dialog mfp-hide modal_confirmation">';
						$rows .= '<h3>Eliminar Usuario</h3>';
						$rows .= '<p>Estas seguro que deceas eliminar este Usuario?</p>';
						$rows .= '<form id="usuario_eliminar" action="controllers.php" method="POST">';
							$rows .= '<input type="hidden" name="id" value="'.$usuario['id'].'"/>';
							$rows .= '<input id="btn_cancelar" class="btn-classic" type="button" value="Cancelar" name="btn_cancelar" />'; 
							$rows .= '<input id="btn_usuario_eliminar" class="btn-classic" type="submit" value="Eliminar" name="btn_usuario_eliminar2" />';
						$rows .= '</form>';
					$rows .= '</div>';
				$rows .= '</td>';
			$rows .= '</tr>';
		}
		return $rows;
	}
	/********************************************************
	Este metodo elimina un Usuario especifico
	********************************************************/
 	public function deleteUsuario($id){
	   	$mysqli = DataBase::connex();
		$query = '
			DELETE FROM 
				acreditacion 
			WHERE 
				acreditacion.id = '.$id.'
			LIMIT
				1
		';
		$mysqli->query($query);
		$mysqli->close();
	}
	/********************************************************
	Este metodo elimina todos los usuarios
	********************************************************/
 	public function deleteacred(){
	   	$mysqli = DataBase::connex();
		$query = '
			TRUNCATE TABLE 
				acreditacion 
		';
		$mysqli->query($query);
		$mysqli->close();
	}
}
?>