<?php
	require_once('../modelos/clsConexion.php');
	if(isset($_POST['consulta'])){
		$parametro = $_POST['consulta'];
		$valor = $_POST['valor'];
		DepartamentoDAO::listarDatos($parametro,$valor);
	}

	class DepartamentoDAO{

		public static function agregarRegistro($dep){
			$con = new clsConexion();
			$query = "INSERT INTO departamento (nombre, descripcion,estado) VALUES('". $dep->getNombre() ."','". $dep->getDescripcion() ."','". $dep->getEstado()."')";
			$con->ejecutarActualizacion($query,"Departamento agregado","agregar departamento");
			$con->cerrarConexion();
		}

		public static function modificarRegistro($dep){
			$con = new clsConexion();
			$query = "UPDATE departamento set nombre='". $dep->getNombre() ."', descripcion='". $dep->getDescripcion() ."', estado = '". $dep->getEstado() ."' WHERE idDepartamento='". $dep->getIdDepartamento() ."'";
			$con->ejecutarActualizacion($query,"Departamento modificado","modificar departamento");
			$con->cerrarConexion();
		}

		public static function eliminarRegistro($dep){
			$con = new clsConexion();
			$query = "UPDATE departamento set estado='". $dep->getEstado() ."' WHERE idDepartamento='". $dep->getIdDepartamento() ."'";
			$con->ejecutarActualizacion($query,"Departamento eliminado","eliminar departamento");
			$con->cerrarConexion();
		}

		public static function obtenerRegistroPorId($id){
			$con = new clsConexion();
			$query = "SELECT idDepartamento, nombre, descripcion FROM departamento WHERE idDepartamento='". $id ."'";
			$contenedor = $con->ejecutarConsulta($query);
			$con->cerrarConexion();
			return $contenedor[0];
		}

		public static function listarDatos($parametro,$valor){
			$con = new clsConexion();
			if($parametro==1){
				$query = "SELECT idDepartamento, nombre, descripcion FROM departamento WHERE estado='1'";
			}
			if($parametro==2){
				$query = "SELECT idDepartamento, nombre, descripcion FROM departamento WHERE estado='1' AND idDepartamento='$valor'";
			}
			if($parametro==3){
				$query = "SELECT idDepartamento, nombre, descripcion FROM departamento WHERE estado='1' AND nombre like '%$valor%'";
			}
			/*if($parametro==4){
				$query = "SELECT idDepartamento, nombre, descripcion FROM departamento WHERE estado='1' AND descripcion like '%$valor%'";
			}*/
			$contenedor = $con->ejecutarConsulta($query);
			$con->cerrarConexion();
			if($contenedor>0){
				$salida = "<tbody id='cuerpoTabla'> ";
				foreach($contenedor as $fila):
					$salida .= "<tr>				
					<th scope=>". $fila[0] ."</th>".
					"<td>". $fila[1] ."</td>".	
					"<td>". $fila[2] ."</td>".
					"<td><a data-controls-modal='#agregarModal2' data-backdrop='static' style='margin-top: 4%; color: white;' data-toggle='modal' id='". $fila[0] ."' data-target='#agregarModal2' class='modificar btn btn-primary btn-sm' >Modificar</a></td>".
					"<td><a style='margin-top: 4%; color: white;' id='". $fila[0] ."' class='eliminar btn btn-primary btn-sm'>Eliminar</a></td>".				
					"</tr>";
				endforeach;
				$salida.= "</tbody>";
				echo $salida;
			}else{
				echo "<tr id='cuerpoTabla'><td colspan='13'><h5>No existe un valor para la busqueda con parámetro: $valor</h5><img src='../../imagenes/robot.png' height='90' width='90'></td></tr>";
			}
		}//termina listar datos

	}

?>