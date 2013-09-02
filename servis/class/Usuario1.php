<?php

include_once 'DataBase.php';

class Usuario1 
{

	private function registrar_mail1($mail, $id) {
		$mysqli = DataBase::connex();
		$codigo = md5($mail);
		$FechR	= date("Ymd");
		$query = '
			INSERT INTO 
				usuarioe
			SET
				registro.id = NULL,
				registro.mail = "'. $mysqli->real_escape_string($mail) .'",
				registro.fecha = "'. $FechR .'",
				registro.estado = "no_validado",
				registro.codigo = "'. $codigo .'"
				
			';
		$result = $mysqli->query($query);
		$this->enviar_mail_validacion1($mail, $codigo, $id);
		echo 'ok_registro';
	}

	

	private function getPager1($page, $mails)
	{
		$mysqli = DataBase::connex();
		$query = '
			SELECT COUNT(*) as entrada FROM 
					usuarioe
				WHERE 
					nombre LIKE "%'.$mails.'%" or apellido LIKE "%'.$mails.'%" or email LIKE "%'.$mails.'%"
			
		';
		$result = $mysqli->query($query);
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()) 
			{
				$entrada = $row['entrada'];
			}
			$result->free();
			$mysqli->close();
			$paginas = $entrada / 100;
			if($entrada > 100){
				$form = $this->makeSelect1(floor($paginas), $page);
				
				return $form;
			}
			return false;
		}else{
			return false;
		}
	}

	private function makeSelect1($pages, $page)
	{
		$options = '';
		for ($i=1; $i <= $pages; $i++) { 
			$options .= '<option value="'.$i.'"';
			 $options .= '>'.$i.'</option>';
		}
		$form = 'Pagina <select id="selector_pagina" name="selector_pagina1">';
			$form .= $options;
		$form .='</select>';
        return $form;
	}

	/********************************************************
	Este metodo devuelve todos los Usuarios de la base de datos
	********************************************************/
	public function getUsuarios1($page, $mails)
	{
		if($page == 1){
			$start = 0;
			$end = 50;
		}else{
			$start = $page * 50 + 1;
			$end = $page * 50 + 50;
		}
		
		$rows['pager'] = $this->getPager1($page, $mails);
		$mysqli = DataBase::connex();
		$query = '
			SELECT * FROM 
					usuarioe
				WHERE 
					nombre LIKE "%'.$mails.'%" or apellido LIKE "%'.$mails.'%" or email LIKE "%'.$mails.'%"
			
			ORDER BY nombre, apellido ASC
			LIMIT '.$start.' , '. $end
		;
		$result = $mysqli->query($query);
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()) 
			{
				$usuario['id'] = $row['id'];
				$usuario['mail'] = $row['email'];
				$usuario['nombre'] = $row['nombre'];
				$usuario['apellido'] = $row['apellido'];
				$usuario['dni'] = $row['dni'];
				$usuario['codigo'] = $row['codigo'];
				$usuario['codigoC'] = $row['codigoC'];
				$usuarios[] = $usuario;
			}
			$result->free();
			$mysqli->close();
			$rows['list'] = $this->format_list_usuarios1($usuarios);
			
	    return $rows;
		}else{
			return false;
		}
	}
	
	/********************************************************
	Genera el listado de mails de cada dia
	********************************************************/
	private function format_list_usuarios1($list){
		$rows = '';
		foreach ($list as $usuario) {
			$rows .= '<tr>';
				$rows .= '<td class="copymail">'.$usuario['nombre'].' </td>';
				$rows .= '<td>'.$usuario['apellido'].'</td>';
				$rows .= '<td>'.$usuario['mail'].'</td>';
				$rows .= '<td>'.$usuario['dni'].'</td>';
				$rows .= '<td>';
				$rows .= '<a href="#modal_confirmation_'.$usuario['id'].'" class="btn-classic eliminar_revista">Eliminar</a>';
					$rows .= '<div id="modal_confirmation_'.$usuario['id'].'" class="zoom-anim-dialog mfp-hide modal_confirmation">';
						$rows .= '<h3>Eliminar Usuario</h3>';
						$rows .= '<p>Estas seguro que deceas eliminar este Usuario?</p>';
						$rows .= '<form id="usuario_eliminar" action="controllers.php" method="POST">';
							$rows .= '<input type="hidden" name="id" value="'.$usuario['id'].'"/>';
							$rows .= '<input id="btn_cancelar" class="btn-classic" type="button" value="Cancelar" name="btn_cancelar" />'; 
							$rows .= '<input id="btn_usuario_eliminar" class="btn-classic" type="submit" value="Eliminar" name="btn_usuario_eliminar" />';
						$rows .= '</form>';
					$rows .= '</div>';
				$rows .= '</td>';
			$rows .= '</tr>';
			$rows .= '<tr>';
				$rows .= '<td  colspan="5">';
					$rows .= 'http://www.expohobby.net/formulario2013/descargar.php?codigo='.$usuario['codigo'].'-'.$usuario['dni'];
				$rows .= '</td>';
			$rows .= '<tr>';
			
		}
		return $rows;
	}
	/********************************************************
	Este metodo elimina un Usuario especifico
	********************************************************/
 	public function deleteUsuario1($id){
	   	$mysqli = DataBase::connex();
		$query = '
			DELETE FROM 
				usuarioe
			WHERE 
				usuarioe.id = '.$id.'
			LIMIT
				1
		';
		$mysqli->query($query);
		$mysqli->close();
	}
}
?>