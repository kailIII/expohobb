<?php
	include_once 'includes.php';
	
	if(isset($_POST['ingresar']))
	{
		$user = new Usuario();
		if(isset($_POST['recordar']) && $_POST['recordar'] == 'ok')
		{
			$recordar = $_POST['recordar'];
		}
		else
		{
			$recordar = 'no';
		}
		$user->login($_POST['mail'], $_POST['pass'], $recordar);
	}

	if(isset($_POST['agregar_marquee']))
	{
		$marquee = new Marquee();
		$marquee->insetMarquee($_POST, $_FILES);
		header("Location: listado_marquees.php");
	}
	if(isset($_POST['btn_marquee_eliminar']))
	{
		$marquee = new Marquee();
		$marquee->deletemarquee($_POST['id']);
		header("Location: listado_marquees.php");
	}
	if(isset($_POST['editar_marquee']))
	{
		$marquee = new Marquee();
		$marquee->updatemarquee($_POST, $_FILES);

		header("Location: listado_marquees.php");
	}
	if(isset($_POST['agregar_revista']))
	{
		$revista = new Revista();
		$revista->insetRevista($_POST, $_FILES);
		header("Location: listado_revistas.php");
	}
	if(isset($_POST['editar_revista']))
	{
		$revista = new Revista();
		$revista->updaterevista($_POST, $_FILES);
		header("Location: listado_revistas.php");
	}
	if(isset($_POST['btn_revista_eliminar']))
	{
		$revista = new Revista();
		$revista->deleteRevista($_POST['id']);
		header("Location: listado_revistas.php");
	}
	if(isset($_POST['registration_mail']))
	{
		if(preg_match("/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/i", $_POST['registration_mail'])) {
			$user = new Usuario();
			$user->verificar_mail_repetido($_POST['registration_mail'], $_POST['revista_id']);
		} else {
			header("Location: revistas.php");
		}
	}
	if(isset($_POST['btn_usuario_eliminar']))
	{
		$user = new Usuario();
		$user->deleteUsuario($_POST['id']);
		header("Location: listado_usuarios.php");
	}
	if(isset($_POST['agregar_publicidad']))
	{
		$publicidad = new Publicidad();
		$publicidad->insetPublicidad($_POST, $_FILES);
		header("Location: listado_publicidad.php");
	}
	if(isset($_POST['editar_publicidad']))
	{
		$publicidad = new Publicidad();
		$publicidad->updatePublicidad($_POST, $_FILES);
		header("Location: listado_publicidad.php");
	}
	if(isset($_POST['btn_publicidad_eliminar']))
	{
		$publicidad = new Publicidad();
		$publicidad->deletePublicidad($_POST['id']);
		header("Location: listado_publicidad.php");
	}
	if(isset($_POST['agregar_expo']))
	{
		$expo = new Expo();
		$expo->insetExpo($_POST, $_FILES);
		header("Location: listado_expo.php");	
	}
	if(isset($_POST['editar_expo']))
	{
		$expo = new Expo();
		$expo->updateExpo($_POST, $_FILES);
		header("Location: listado_expo.php");	
	}
	if(isset($_POST['btn_expo_eliminar']))
	{
		$expo = new Expo();
		$expo->deleteExpo($_POST['id']);
		header("Location: listado_expo.php");	
	}
	if(isset($_POST['btn_empresa_eliminar']))
	{
		$expo = new Expo();
		$expo->deleteEmpresa($_POST['id']);
		header("Location: listado_empresas.php");
	}
	if(isset($_POST['agregar_empresa']))
	{
		$expo = new Expo();
		$expo->insetEmpresa($_POST, $_FILES);
		header("Location: listado_empresas.php");
	}
	if(isset($_POST['btn_empresa_administrar']))
	{
		$expo = new Expo();
		$expo->insetEmpresa($_POST);
		header("Location: listado_empresas.php");
	}
	if(isset($_POST['editar_empresa']))
	{
		$expo = new Expo();
		$expo->updateEmpresa($_POST, $_FILES['image_empresa']);
		header("Location: listado_empresas.php");
	}
	if(isset($_POST['agregar_actividad']))
	{
		$expo = new Expo();
		$expo->insertImagesActivities($_POST, $_FILES);
		header("Location: subir_image.php");	
	}
	if(isset($_POST['btn_contenido_expositores']))
	{
		$expo = new Expo();
		$expo->setExpoEmpresas($_POST);
	}
	if(isset($_POST['asignar_empresas']))
	{
		$expo = new Expo();
		$expo->setExpoEmpresas($_POST);
		header("Location: administrar_expositores.php?id=".$_POST['expo_id']);	
	}









	if(isset($_POST['enviar_contacto']))
	{	
		session_start();
		require("class/PHPmailer.php");
		$mysqli = DataBase::connex();
		$classMail = new PHPMailer(); 
		
		//Con la propiedad Mailer le indicamos que vamos a usar un 
		//servidor smtp
		$classMail->Mailer = "smtp";
		 
		//Luego tenemos que iniciar la validación por SMTP: 
		$classMail->IsSMTP(); 
		$classMail->SMTPAuth = true; // True para que verifique autentificación de la cuenta o de lo contrario False 
		$classMail->Username = "marketing@expohobby.net"; // Cuenta de e-mail 
		$classMail->Password = "hugo0714"; // Password  
		 
		$classMail->Host = "mail.expohobby.net"; 

		$classMail->From = $_POST['mail']; 
		$classMail->FromName = $_POST['nombre'].' | Comento en la web '; 
		$classMail->Subject = "Contacto de Expohobby"; 
		$classMail->AddAddress("info@expohobby.net");
		$classMail->Port = 25;
		$classMail->WordWrap =200; 
		 
		$classMail->Body = 'nombre= '.$_POST['nombre'].'<br> mail= '.$_POST['mail'].'<br> comentario= '.$_POST['comentario'];
	 	
	 	if($classMail->Send()){
	 		$_SESSION['mail_expo'] = 'ok';
	 	}else{
	 		$_SESSION['mail_expo'] = 'error';
	 	}
		header("Location: concatenos.php");
	}
?>