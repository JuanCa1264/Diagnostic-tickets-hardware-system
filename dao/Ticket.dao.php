<?php 
	require_once('../modelos/clsTicket.php');
	require_once('../modelos/clsConexion.php');

	class TicketDao{

		public static function agregarRegistro($tic){
			$con = new clsConexion();
			$query = "INSERT INTO ticket (fechaCreacion, asunto, descripcion, adjunto, idCliente, estado) VALUES('". $tic->getFechaCreacion() ."','". $tic->getAsunto() ."','". $tic->getDescripcion() ."','". $tic->getAdjunto() ."','". $tic->getIdCliente()."','". $tic->getEstado() ."')";
			$con->ejecutarActualizacion($query,"Ticket agregado","agregar el ticket");
			$con->cerrarConexion();
		}

		public static function listarDatos($tipo,$dato){
			$con = new clsConexion();
			$query = "";
			if($tipo==1){
				$query = "SELECT idTicket, fechaCreacion, asunto, descripcion,adjunto FROM ticket WHERE estado!='0'";
			}
			else{
				$query = "SELECT idTicket, fechaCreacion, asunto, descripcion,adjunto FROM ticket WHERE idCliente='". $dato ."' AND estado!='0'";
			}
			$contenedor = $con->ejecutarConsulta($query);
			return $contenedor;
		}

	}

?>