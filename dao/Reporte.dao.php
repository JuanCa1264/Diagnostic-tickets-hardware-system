<?php 
	require_once('../modelos/clsConexion.php');
	if(isset($_POST['peticionCat'])){
		ReporteDao::obtenerCategorias();
	}
	if(isset($_POST['peticionDep'])){
		ReporteDao::obtenerDepartamentos();
	}
	if(isset($_POST['peticionTec'])){
		ReporteDao::obtenerTecnicos();
	}

	class ReporteDao{

		public static function obtenerCategorias(){
			$con = new clsConexion();
			$query = "SELECT idCategoria, nombre FROM categoria WHERE estado!='0'";
			$contenedor = $con->ejecutarConsulta($query);
			$con->cerrarConexion();

			$arreglo = array();
			$i = 0;
			if(count($contenedor)>0){
				foreach ($contenedor as $fila) {
					$arreglo[$i][0] = $fila[0];	
					$arreglo[$i][1] = $fila[1];
					$i++;			
				}
			}
			else{
				$arreglo[$i][0] = "null";
				$arreglo[$i][1] = "null";
			}
			$json = json_encode($arreglo);
			echo $json;
		}

		public static function obtenerDepartamentos(){
			$con = new clsConexion();
			$query = "SELECT idDepartamento, nombre FROM departamento WHERE estado!='0'";
			$contenedor = $con->ejecutarConsulta($query);
			$con->cerrarConexion();

			$arreglo = array();
			$i = 0;
			if(count($contenedor)>0){
				foreach ($contenedor as $fila) {
					$arreglo[$i][0] = $fila[0];	
					$arreglo[$i][1] = $fila[1];
					$i++;			
				}
			}
			else{
				$arreglo[$i][0] = "null";
				$arreglo[$i][1] = "null";
			}
			$json = json_encode($arreglo);
			echo $json;
		}

		public static function obtenerTecnicos(){
			$con = new clsConexion();
			$query = "SELECT idTecnico, nombreCompleto FROM tecnicos WHERE estado!='0'";
			$contenedor = $con->ejecutarConsulta($query);
			$con->cerrarConexion();

			$arreglo = array();
			$i = 0;
			if(count($contenedor)>0){
				foreach ($contenedor as $fila) {
					$arreglo[$i][0] = $fila[0];	
					$arreglo[$i][1] = $fila[1];
					$i++;			
				}
			}
			else{
				$arreglo[$i][0] = "null";
				$arreglo[$i][1] = "null";
			}
			$json = json_encode($arreglo);
			echo $json;
		}

	}

?>