<?php
	require_once('../modelos/clsConexion.php');
	if(isset($_POST['consulta'])){
		$parametro = $_POST['consulta'];
		$valor = $_POST['valor'];
		CategoriaDAO::listarDatos($parametro,$valor);
	}

	class CategoriaDAO{

		public static function agregarRegistro($cat){
			$con = new clsConexion();
			$query = "INSERT INTO categoria (tipo, nombre, descripcion,estado) VALUES('". $cat->getTipo() ."','". $cat->getNombre() ."','". $cat->getDescripcion() ."','". $cat->getEstado()."')";
			$con->ejecutarActualizacion($query,"Categoría agregada","agregar la categoría");
			$con->cerrarConexion();
		}

		public static function modificarRegistro($cat){
			$con = new clsConexion();
			$query = "UPDATE categoria set tipo='". $cat->getTipo() ."', nombre='". $cat->getNombre() ."', descripcion='". $cat->getDescripcion() ."', estado = '". $cat->getEstado() ."' WHERE idCategoria='". $cat->getIdCategoria() ."'";
			$con->ejecutarActualizacion($query,"Categoría modificada","modificar la categoría");
			$con->cerrarConexion();
		}

		public static function eliminarRegistro($cat){
			$con = new clsConexion();
			$query = "UPDATE categoria set estado='". $cat->getEstado() ."' WHERE idCategoria='". $cat->getIdCategoria() ."'";
			$con->ejecutarActualizacion($query,"Categoría eliminada","eliminar la categoría");
			$con->cerrarConexion();
		}

		public static function obtenerRegistroPorId($id){
			$con = new clsConexion();
			$query = "SELECT idCategoria, tipo, nombre, descripcion FROM categoria WHERE idCategoria='". $id ."'";
			$contenedor = $con->ejecutarConsulta($query);
			$con->cerrarConexion();
			return $contenedor[0];
		}

		public static function listarDatos($parametro,$valor){
			$con = new clsConexion();
			if($parametro==1){
				$query = "SELECT idCategoria, tipo, nombre, descripcion FROM categoria WHERE estado='1'";
			}
			if($parametro==2){
				$query = "SELECT idCategoria, tipo, nombre, descripcion FROM categoria WHERE estado='1' AND idCategoria='$valor'";
			}
			if($parametro==3){
				$query = "SELECT idCategoria, tipo, nombre, descripcion FROM categoria WHERE estado='1' AND tipo like '%$valor%'";
			}
			if($parametro==4){
				$query = "SELECT idCategoria, tipo, nombre, descripcion FROM categoria WHERE estado='1' AND nombre like '%$valor%'";
			}
			$contenedor = $con->ejecutarConsulta($query);
			$con->cerrarConexion();
			if($contenedor>0){
				$salida = "<tbody id='cuerpoTabla'> ";
				foreach($contenedor as $fila):
					$salida .= "<tr>				
					<th scope=>". $fila[0] ."</th>".
					"<td>". $fila[1] ."</td>".	
					"<td>". $fila[2] ."</td>".				
					"<td>". $fila[3] ."</td>".
					"<td><a data-controls-modal='#agregarModal2' data-backdrop='static' style='margin-top: 4%; color: white;' data-toggle='modal' id='". $fila[0] ."' data-target='#agregarModal2' class='modificar btn btn-primary btn-sm' >Modificar</a></td>".
					"<td><a style='margin-top: 4%; color: white;' id='". $fila[0] ."' class='eliminar btn btn-primary btn-sm'>Eliminar</a></td>".				
					"</tr>";
				endforeach;
				$salida.= "</tbody>";
				echo $salida;
			}else{
				echo "<tr id='cuerpoTabla'><td colspan='13'><h5>No existe un valor para la busqueda con parámetro: $valor</h5><img src='../imagenes/robot.png' height='90' width='90'></td></tr>";
			}
		}//termina listar datos

	}

?>