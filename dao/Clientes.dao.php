<?php
require_once('../modelos/clsConexion.php');
if(isset($_POST['consulta'])){
	$parametro = $_POST['consulta'];
	$valor = $_POST['valor'];
	clsClienteDAO::listarDatos($parametro, $valor);
}

class clsClienteDAO{

	public static function agregarRegistro($cli){
			$con = new clsConexion();
			$query = "INSERT INTO cliente (idCliente, nombreCompleto, fechaNac, direccion, telefono, dui, idDepartamento, userid, estado) VALUES('". $cli->getId() ."','". $cli->getNombre() ."','". $cli->getFechaNac() ."','". $cli->getDireccion()."','".$cli->getTelefono()."','".$cli->getDui()."','".$cli->getIdDept()."','".$cli->getIdUser()."','".$cli->getEstado()."')";
			$con->ejecutarActualizacion($query,"Cliente agregado","agregar el cliente");
			$con->cerrarConexion();
		}

		public static function modificarRegistro($cli){
			$con = new clsConexion();
			$query = "UPDATE cliente set nombreCompleto='". $cli->getNombre() ."', fechaNac='". $cli->getFechaNac() ."', direccion='". $cli->getDireccion() ."', telefono = '". $cli->getTelefono() ."', dui='".$cli->getDui()."', userid='".$cli->getIdUser()."', idDepartamento = '".$cli->getIdDept()."', estado = '".$cli->getEstado()."' WHERE idCliente='". $cli->getId() ."'";
			$con->ejecutarActualizacion($query,"Cliente modificado","modificar el cliente");
			$con->cerrarConexion();
		}

		public static function eliminarRegistro($cli){
			$con = new clsConexion();
			$query = "UPDATE cliente set estado='". $cli->getEstado() ."' WHERE idCliente='". $cli->getId() ."'";
			$con->ejecutarActualizacion($query,"Cliente eliminado","eliminar el cliente");
			$con->cerrarConexion();
		}

		public static function obtenerRegistroPorId($id){
			$con = new clsConexion();
			$query = "SELECT idCliente, nombreCompleto, fechaNac, direccion, telefono, dui, idDepartamento, userid, estado FROM cliente WHERE idCliente='". $id ."'";
			$contenedor = $con->ejecutarConsulta($query);
			$con->cerrarConexion();
			return $contenedor[0];
		}

		public static function listarUsuarios(){
			$con = new clsConexion();
			$query = "SELECT distinct C.userid, C.username from usuario as C WHERE C.rol='Cliente' AND NOT EXISTS(SELECT * from cliente as P WHERE P.userid = C.userid) ORDER BY C.userid DESC;";
			$contenedor = $con->ejecutarConsulta($query);
			$con->cerrarConexion();
			return $contenedor;
		}

		public static function listarUsuariosMod($id){
			$con = new clsConexion();
			$query = "SELECT distinct C.userid, C.username from usuario as C WHERE C.rol='Cliente' AND NOT EXISTS(SELECT * from cliente as P WHERE P.userid = C.userid AND P.userid!='$id') ORDER BY C.userid DESC;";
			$contenedor = $con->ejecutarConsulta($query);
			$con->cerrarConexion();
			return $contenedor;
		}

		public static function listarDepartamentos(){
			$con = new clsConexion();
			$query = "SELECT idDepartamento, nombre from departamento";
			$contenedor = $con->ejecutarConsulta($query);
			$con->cerrarConexion();
			return $contenedor;
		}

	public static function listarDatos($parametro, $valor){
		$con = new clsConexion();
		if($parametro == 1){
			$contenedor = $con->ejecutarConsulta("SELECT T1.idCliente, T1.nombreCompleto, T1.fechaNac, T1.direccion, T1.telefono, T1.dui, T2.nombre, T3.username from cliente T1 INNER JOIN departamento T2 on T1.idDepartamento = T2.idDepartamento INNER JOIN usuario T3 on T1.userid = T3.userid WHERE T1.estado !='0';");	
		}else if($parametro == 2){
			$contenedor = $con->ejecutarConsulta("SELECT T1.idCliente, T1.nombreCompleto, T1.fechaNac, T1.direccion, T1.telefono, T1.dui, T2.nombre, T3.username from cliente T1 INNER JOIN departamento T2 on T1.idDepartamento = T2.idDepartamento INNER JOIN usuario T3 on T1.userid = T3.userid WHERE T1.estado !='0' AND T1.idCliente LIKE '%$valor%'");	
		}else if($parametro == 3){
			$contenedor = $con->ejecutarConsulta("SELECT T1.idCliente, T1.nombreCompleto, T1.fechaNac, T1.direccion, T1.telefono, T1.dui, T2.nombre, T3.username from cliente T1 INNER JOIN departamento T2 on T1.idDepartamento = T2.idDepartamento INNER JOIN usuario T3 on T1.userid = T3.userid WHERE T1.estado !='0' AND T1.nombreCompleto LIKE '%$valor%';");	
		}else if($parametro == 4){
			$contenedor = $con->ejecutarConsulta("SELECT T1.idCliente, T1.nombreCompleto, T1.fechaNac, T1.direccion, T1.telefono, T1.dui, T2.nombre, T3.username from cliente T1 INNER JOIN departamento T2 on T1.idDepartamento = T2.idDepartamento INNER JOIN usuario T3 on T1.userid = T3.userid WHERE T1.estado !='0' AND T1.dui LIKE '%$valor%'");	
		}
		
		$con->cerrarConexion();
		if($contenedor){
			
			$salida = "<tbody id='cuerpoTablaClientes'> ";

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
			echo "<tr id='cuerpoTablaClientes'><td colspan='13'><h5>No existe un valor para la busqueda con parámetro: $valor</h5><img src='../imagenes/robot.png' height='90' width='90'></td></tr>";
		}
	}

	

}

?>
