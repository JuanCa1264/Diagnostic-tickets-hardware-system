<?php
	require_once('../modelos/clsConexion.php');
	if(isset($_POST['consulta'])){
		$parametro = $_POST['consulta'];
		$valor = $_POST['valor'];
		
		if($parametro==1){
			clsDiagnosticosDAO::listarDatos(1,$valor);
		}
		else if($parametro==2){
			clsDiagnosticosDAO::listarDatos(2,$valor);
		}
		else if($parametro==3){
			clsDiagnosticosDAO::listarDatos(3,$valor);
		}
	}


	class clsDiagnosticosDAO{

		public static function listarDatos($parametro, $valor){
			$con = new clsConexion();

			if($parametro == 1){
				$query = "SELECT idDiagnostico, fechaAsignacion, fechaCierre, diagnostico, solucion, idTecnico, idTicket, idCategoria, estadoDiagnostico FROM `diagnostico` WHERE estado = 1";
			}
			else if($parametro == 2){
				$query = "SELECT idDiagnostico, fechaAsignacion, fechaCierre, diagnostico, solucion, idTecnico, idTicket, idCategoria, estadoDiagnostico FROM `diagnostico` WHERE estado = 1 and idDiagnostico = $valor";
			}
			else if($parametro == 3){
				$query = "SELECT idDiagnostico, fechaAsignacion, fechaCierre, diagnostico, solucion, idTecnico, idTicket, idCategoria, estadoDiagnostico FROM `diagnostico` WHERE estado = 1 and estadoDiagnostico LIKE '%$valor%'";
			}

			$contenedor = $con->ejecutarConsulta($query);
			
			$con->cerrarConexion();
			if($contenedor){
				$aux = 1;
				$salida =  "<tbody id='cuerpoTabla'> ";
						foreach($contenedor as $fila):
						if(is_null($fila[2])){
							$cierre = "Sin cerrar";
						}
						else{
							$cierre = date("d/m/Y h:i A", strtotime($fila[2]));
						}
						if(is_null($fila[3])){
							$diagnostico = "Sin diagnostico";
						}
						else{
							$diagnostico = $fila[3];
						}
						if(is_null($fila[4])){
							$solucion = "Sin solucion";
						}
						else{
							$solucion = $fila[4];
						}
						if(is_null($fila[7])){
							$categoria = "Sin categoria";
						}
						else{
							$categoria= $fila[7];
						}

					  	$salida .= "<tr>
					  		<th scope='row'>". $fila[0] ."</th> ".
					  		"<td>". date("d/m/Y h:i A", strtotime($fila[1])) ."</td>".
					  		"<td>". $cierre ."</td>".
					  		"<td>". $diagnostico ."</td>".
					  		"<td>". $solucion ."</td>".
					  		"<td>". $fila[5] ."</td>".
					  		"<td>". $fila[6] ."</td>".
					  		"<td>". $categoria ."</td>".					  		
					  		"<td>". $fila[8] ."</td>".
					  		"<td><a data-controls-modal='your_div_id' data-backdrop='static' data-keyboard='false' style='margin-top: 4%; color: white;' data-toggle='modal' id='". $fila[0] . ".". $fila[0]. "' data-target='#agregarModal2' class='modificar btn btn-primary btn-sm' >Modificar</a></td>".
					  		"<td><a style='margin-top: 4%; color: white;' id='". $fila[0] ."' class='eliminar btn btn-primary btn-sm'>Eliminar</a></td>";
					  
					  	$salida.="</tr>";
					  	$aux++;
						endforeach;
					 $salida.=  "</tbody>";
					 echo $salida;
			}
			else{
				echo "<tr id='cuerpoTabla'><td colspan='13'><h5>No existe un valor para la busqueda con parámetro: $valor</h5><img src='../imagenes/robot.png' height='90' width='90'></td></tr>";
			}
		}

		public static function agregarRegistro($emp){
			$con = new clsConexion();
			$sql = "INSERT INTO diagnostico (fechaAsignacion, idTecnico, idTicket, estadoDiagnostico, estado) VALUES('". $emp->getFechaAsignacion() . "','". $emp->getIdTecnico() . "','". $emp->getIdTicket() ."','". $emp->getEstadoDiagnostico() . "','". $emp->getEstado() . "') ";
			$con->ejecutarActualizacion($sql,"Diagnostico agregado","agregar el diagnostico");

			$con->cerrarConexion();
		}

		public static function buscarPorId($id){
			$con = new clsConexion();
			$contenedor = $con->ejecutarConsulta("SELECT idDiagnostico, idTecnico FROM diagnostico WHERE idDiagnostico = $id");

			$con->cerrarConexion();
			return $contenedor[0];
		}

		public static function modificarRegistroPorId($emp){
			$con = new clsConexion();
			$sql = "UPDATE diagnostico set idTecnico = '". $emp->getIdTecnico() ."' WHERE idDiagnostico = '". $emp->getIdDiagnostico() . "'";
			$con->ejecutarActualizacion($sql,"Diagnostico modificado","modificar el Diagnostico");
			$con->cerrarConexion();
		}

		/*public static function eliminarPorId($id){
			$con = new clsConexion();
			$sql = "UPDATE diagnostico set estado = 0 WHERE idDiagnostico = $id";
			$con->ejecutarActualizacion($sql,"Diagnostico eliminado","eliminar el Diagnostico",6);
			$con->cerrarConexion();
		}*/

		public static function listarIdTecnicos(){
			$con = new clsConexion();
			$contenedor = $con->ejecutarConsulta("SELECT idTecnico, nombreCompleto from tecnicos where estado = 1");

			$con->cerrarConexion();
			return $contenedor;
		}

		public static function listarIdTicket(){
			$con = new clsConexion();
			$contenedor = $con->ejecutarConsulta("SELECT idTicket, asunto from ticket where estado = 1");

			$con->cerrarConexion();
			return $contenedor;
		}

		public static function listarIdCategoria(){
			$con = new clsConexion();
			$contenedor = $con->ejecutarConsulta("SELECT idCategoria, nombre from categoria where estado = 1");

			$con->cerrarConexion();
			return $contenedor;
		}

	}


?>
