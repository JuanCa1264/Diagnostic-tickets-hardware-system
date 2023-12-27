<?php 
	
	class Ticket{

		private $idTicket;
		private $fechaCreacion;
		private $asunto;
		private $descripcion;
		private $adjunto;
		private $idCliente;
		private $estado;

		function __construct(){
			$this->idTicket = "";
			$this->fechaCreacion="";
			$this->asunto = "";
			$this->descripcion = "";
			$this->adjunto = "";
			$this->idCliente = "";
			$this->estado = "";
		}

		function getIdTicket(){
			return $this->idTicket;
		}
		function getFechaCreacion(){
			return $this->fechaCreacion;
		}
		function getAsunto(){
			return $this->asunto;
		}
		function getDescripcion(){
			return $this->descripcion;
		}
		function getAdjunto(){
			return $this->adjunto;
		}
		function getIdCliente(){
			return $this->idCliente;
		}
		function getEstado(){
			return $this->estado;
		}

		function setIdTicket($value){
			$this->idTicket = $value;
		}
		function setFechaCreacion($value){
			$this->fechaCreacion = $value;
		}
		function setAsunto($value){
			$this->asunto = $value;
		}
		function setDescripcion($value){
			$this->descripcion = $value;
		}
		function setAdjunto($value){
			$this->adjunto = $value;
		}
		function setIdCliente($value){
			$this->idCliente = $value;
		}
		function setEstado($value){
			$this->estado = $value;
		}


	}

?>