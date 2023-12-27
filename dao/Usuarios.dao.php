<?php
require_once('../modelos/clsConexion.php');
if(isset($_POST['consulta'])){
	$parametro = $_POST['consulta'];
	$valor = $_POST['valor'];

	if($parametro==1){
		clsUsuarioDAO::listarDatos(1, $valor);
	}
	else if($parametro==2){
		clsUsuarioDAO::listarDatos(2, $valor);
	}
	else if($parametro==3){
		clsUsuarioDAO::listarDatos(3, $valor);
	}
	else if($parametro==4){
		clsUsuarioDAO::listarDatos(4, $valor);
	}

}

class clsUsuarioDAO{

	public static function listarDatos($parametro, $valor){
		$con = new clsConexion();
		if($parametro == 1){
			$contenedor = $con->ejecutarConsulta("SELECT userid, avatar, username, rol from usuario");	
		}else if($parametro == 2){
			$contenedor = $con->ejecutarConsulta("SELECT userid, avatar, username, rol from usuario WHERE userid = $valor");	
		}else if($parametro == 3){
			$contenedor = $con->ejecutarConsulta("SELECT userid, avatar, username, rol from usuario WHERE username LIKE '%$valor%'");
		}else if($parametro == 4){
			$contenedor = $con->ejecutarConsulta("SELECT userid, avatar, username, rol from usuario WHERE rol LIKE '%$valor%'");	
		}

		$con->cerrarConexion();
		if($contenedor){
			$aux = 1;
			$salida = "<tbody id='cuerpoTabla'> ";

			foreach($contenedor as $fila):
				$aux = $fila[3];
				if($aux==1){
					$aux = "Administrador";
				}
				if($aux==2){
					$aux = "Cliente";
				}
				if($aux==3){
					$aux = "Director de proyecto";
				}
				$salida .= "<tr>				
				<th scope=><img style=' width: 50px; height: 50px;  border-radius:160px; border: 3px solid gray; margin: auto;' src='userpics/". $fila[1] ."'></th>".
				"<td>". $fila[0] ."</td>".	
				"<td>". $fila[2] ."</td>".				
				"<td>". $aux ."</td>".				
				"</tr>";
				$aux++;
			endforeach;
			$salida.= "</tbody>";
			echo $salida;
		}else{
			echo "<tr id='cuerpoTabla'><td colspan='13'><h5>No existe un valor para la busqueda con parámetro: $valor</h5><img src='../../imagenes/robot.png' height='90' width='90'></td></tr>";
		}
	}

	public static function agregarRegistro($user){
			$con = new clsConexion();
			$sql = "INSERT INTO usuario (username,password,rol,avatar) VALUES ('". $user->getUsername() ."' ,'". $user->getPassword() ."','". $user->getRol() ."', '". $user->getAvatar() ."') ";
			$con->ejecutarActualizacion($sql,"Usuario agregado","agregar el usuario");      
			$con->cerrarConexion();
	}


	public static function buscarPorId($id){
		$con = new clsConexion();
		$contenedor = $con->ejecutarConsulta("SELECT * FROM usuario WHERE userid = $id");

		$con->cerrarConexion();
		return $contenedor[0];
	}

}

?>

