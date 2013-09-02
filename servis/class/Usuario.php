<?php

include_once 'DataBase.php';

class Usuario 
{

	private function registrar_mail($mail, $id) {
		$mysqli = DataBase::connex();
		$codigo = md5($mail);
		$FechR	= date("Ymd");
		$query = '
			INSERT INTO 
				registro 
			SET
				registro.id = NULL,
				registro.mail = "'. $mysqli->real_escape_string($mail) .'",
				registro.fecha = "'. $FechR .'",
				registro.estado = "no_validado",
				registro.codigo = "'. $codigo .'"
				
			';
		$result = $mysqli->query($query);
		$this->enviar_mail_validacion($mail, $codigo, $id);
		echo 'ok_registro';
	}

	

	private function getPager($page, $mails)
	{
		$mysqli = DataBase::connex();
		$query = '
			SELECT COUNT(*) as registros FROM 
					registro 
				WHERE 
					mail LIKE "%'.$mails.'%"
			
		';
		$result = $mysqli->query($query);
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()) 
			{
				$registros = $row['registros'];
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
	public function getUsuarios($page, $mails)
	{
		if($page == 1){
			$start = 0;
			$end = 50;
		}else{
			$start = $page * 50 + 1;
			$end = $page * 50 + 50;
		}
		
		$rows['pager'] = $this->getPager($page, $mails);
		$mysqli = DataBase::connex();
		$query = '
			SELECT * FROM 
				registro WHERE mail LIKE "%'.$mails.'%"
			
			ORDER BY fecha DESC
			LIMIT '.$start.' , '. $end
		;
		$result = $mysqli->query($query);
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()) 
			{
				$usuario['id'] = $row['id'];
				$usuario['mail'] = $row['mail'];
				$usuario['estado'] = $row['estado'];
				$usuario['fecha'] = $row['fecha'];
				$usuario['codigo'] = $row['codigo'];
				$usuarios[] = $usuario;
			}
			$result->free();
			$mysqli->close();
			$rows['list'] = $this->format_list_usuarios($usuarios);
			
	    return $rows;
		}else{
			return false;
		}
	}
	
	/********************************************************
	Genera el listado de mails de cada dia
	********************************************************/
	private function format_list_usuarios($list){
		$rows = '';
		foreach ($list as $usuario) {
			$rows .= '<tr>';
				$rows .= '<td class="copymail">'.$usuario['mail'].' </td>';
				$rows .= '<td>'.$usuario['fecha'].'</td>';
				if($usuario['estado']=="valido"){
						$rows .= '<td class="statusB">'.$usuario['estado'].'</td>';
				}else{
					$rows .= '<td class="statusM">'.$usuario['estado'].'</td>';
				}
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
			if($usuario['estado']!="valido"){
			$rows .= '<tr>';
				$rows .= '<td  colspan="4" class="statusM">';
					$rows .= 'http://www.expohobby.net/validar_mail.php?mail='.$usuario['mail'].'&codigo='.$usuario['codigo'];
				$rows .= '</td>';
			$rows .= '<tr>';
			}
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
				registro 
			WHERE 
				registro.id = '.$id.'
			LIMIT
				1
		';
		$mysqli->query($query);
		$mysqli->close();
	}
}
?>