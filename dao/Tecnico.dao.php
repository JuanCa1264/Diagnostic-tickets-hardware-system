<?php
require_once('../modelos/clsConexion.php');
if(isset($_POST['consulta'])){
	$parametro = $_POST['consulta'];
	$valor = $_POST['valor'];

	
		clsTecnicoDAO::listarDatos($parametro, $valor);
	

}

class clsTecnicoDAO{

	public static function agregarRegistro($Tec){
			$con = new clsConexion();
			$query = "INSERT INTO tecnicos (idTecnico, nombreCompleto, direccion, telefono, dui, especialidad, fechaNac, userid, estado) VALUES('". $Tec->getId() ."','". $Tec->getNombre() ."','". $Tec->getDireccion()."','".$Tec->getTelefono()."','".$Tec->getDui()."','".$Tec->getEspecialidad()."','". $Tec->getFechaNac()."','". $Tec->getIdUser()."','".$Tec->getEstado()."')";
			$con->ejecutarActualizacion($query,"Técnico agregado","agregar el técnico");
			$con->cerrarConexion();
		}
//"', fechaNac='". $cli->getFechaNac() ."'
		public static function modificarRegistro($Tec){
			$con = new clsConexion();
			$query = "UPDATE tecnicos set nombreCompleto='". $Tec->getNombre() ."', direccion='". $Tec->getDireccion() ."', telefono = '". $Tec->getTelefono() ."', dui='".$Tec->getDui()."', especialidad='".$Tec->getEspecialidad()."', fechaNac='".$Tec->getFechaNac()."', userid = '".$Tec->getIdUser()."' WHERE idTecnico='". $Tec->getId() ."'";
			$con->ejecutarActualizacion($query,"Técnico modificado","modificar el técnico");
			$con->cerrarConexion();
		}

		public static function eliminarRegistro($Tec){
			$con = new clsConexion();
			$query = "UPDATE tecnicos set estado='". $Tec->getEstado() ."' WHERE idTecnico='". $Tec->getId() ."'";
			$con->ejecutarActualizacion($query,"Técnico eliminado","eliminar el técnico");
			$con->cerrarConexion();
		}

		public static function obtenerRegistroPorId($id){
			$con = new clsConexion();
			$query = "SELECT idTecnico, nombreCompleto, direccion, telefono, dui, especialidad, fechaNac, userid, estado FROM tecnicos WHERE idTecnico='". $id ."'";
			$contenedor = $con->ejecutarConsulta($query);
			$con->cerrarConexion();
			return $contenedor[0];
		}

		public static function listarUsuarios(){
			$con = new clsConexion();
			$query = "SELECT distinct C.userid, C.username from usuario as C WHERE C.rol='Tecnico' AND NOT EXISTS(SELECT * from tecnicos as P WHERE P.userid = C.userid) ORDER BY C.userid DESC;";
			$contenedor = $con->ejecutarConsulta($query);
			$con->cerrarConexion();
			return $contenedor;
		}

		public static function listarUsuariosMod($id){
			$con = new clsConexion();
			$query = "SELECT distinct C.userid, C.username from usuario as C WHERE C.rol='Tecnico' AND NOT EXISTS(SELECT * from tecnicos as P WHERE P.userid = C.userid AND P.userid!='$id') ORDER BY C.userid DESC;";
			$contenedor = $con->ejecutarConsulta($query);
			$con->cerrarConexion();
			return $contenedor;
		}

	public static function listarDatos($parametro, $valor){
		$con = new clsConexion();
		if($parametro == 1){
			$contenedor = $con->ejecutarConsulta("SELECT T1.idTecnico, T1.nombreCompleto, T1.direccion, T1.telefono, T1.dui, T1.especialidad, T1.fechaNac, T2.username from tecnicos T1 INNER JOIN usuario T2 on T1.userid = T2.userid WHERE T1.estado !='0';");	
		}else if($parametro == 2){
			$contenedor = $con->ejecutarConsulta("SELECT T1.idTecnico, T1.nombreCompleto, T1.direccion, T1.telefono, T1.dui, T1.especialidad, T1.fechaNac, T2.username from tecnicos T1 INNER JOIN usuario T2 on T1.userid = T2.userid WHERE T1.estado !='0' AND T1.idTecnico LIKE '%$valor%';" );	
		}else if($parametro == 3){
			$contenedor = $con->ejecutarConsulta("SELECT T1.idTecnico, T1.nombreCompleto, T1.direccion, T1.telefono, T1.dui, T1.especialidad, T1.fechaNac, T2.username from tecnicos T1 INNER JOIN usuario T2 on T1.userid = T2.userid WHERE T1.estado !='0' AND T1.nombreCompleto LIKE '%$valor%';");	
		}else if($parametro == 4){
			$contenedor = $con->ejecutarConsulta("SELECT T1.idTecnico, T1.nombreCompleto, T1.direccion, T1.telefono, T1.dui, T1.especialidad, T1.fechaNac, T2.username from tecnicos T1 INNER JOIN usuario T2 on T1.userid = T2.userid WHERE T1.estado !='0' AND T1.dui LIKE '%$valor%';");	
		}
		
		$con->cerrarConexion();
		if($contenedor){
			
			$salida = "<tbody id='cuerpoTablaTecnicos'> ";

			foreach($contenedor as $fila):
				
				$salida .= "<tr>".	
				
				"<td>". $fila[0] ."</td>".
				"<td>". $fila[1] ."</td>".
				"<td>". $fila[2] ."</td>".
				"<td>". $fila[3] ."</td>".	
				"<td>". $fila[4] ."</td>".				
				"<td>". $fila[5] ."</td>".	
				"<td>". $fila[6] ."</td>".	
				"<td>". $fila[7] ."</td>".
				"<td><a data-controls-modal='#agregarModal2' data-backdrop='static' style='margin-top: 4%; color: white;' data-toggle='modal' id='". $fila[0] ."' data-target='#agregarModal2' class='modificar btn btn-primary btn-sm' >Modificar</a></td>".
					"<td><a style='margin-top: 4%; color: white;' id='". $fila[0] ."' class='eliminar btn btn-primary btn-sm'>Eliminar</a></td>".
				"</tr>";
				
			endforeach;
			$salida.= "</tbody>";
			echo $salida;
		}else{
			echo "<tr id='cuerpoTablaTecnicos'><td colspan='13'><h5>No existe un valor para la busqueda con parámetro: $valor</h5><img src='../imagenes/robot.png' height='90' width='90'></td></tr>";
		}
	}

	

}

?>
