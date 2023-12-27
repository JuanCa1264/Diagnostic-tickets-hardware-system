<?php

	class clsDiagnosticos{
		private $idDiagnostico;
		private $fechaAsignacion;
		private $fechaCierre;
		private $diagnostico;
		private $solucion;
		private $idTecnico;
		private $idTicket;
		private $idCategoria;
		private $estadoDiagnostico;
		private $estado;

		//metodo constructor
		public function __construct(){
			$this->idDiagnostico="";
			$this->fechaAsignacion="";
			$this->fechaCierre="";
			$this->diagnostico="";
			$this->solucion="";
			$this->idTecnico="";
			$this->idTicket="";
			$this->idCategoria="";
			$this->estadoDiagnostico="";
			$this->estado="";
		}

		//Metodo para obtener
		public function getIdDiagnostico(){
			return $this->idDiagnostico;
		}

		public function getFechaAsignacion(){
			return $this->fechaAsignacion;
		}

		public function getFechaCierre(){
			return $this->fechaCierre;
		}

		public function getDiagnostico(){
			return $this->diagnostico;
		}

		public function getSolucion(){
			return $this->solucion;
		}

		public function getIdTecnico(){
			return $this->idTecnico;
		}

		public function getIdTicket(){
			return $this->idTicket;
		}

		public function getIdCategoria(){
			return $this->idCategoria;
		}

		public function getEstadoDiagnostico(){
			return $this->estadoDiagnostico;
		}

		public function getEstado(){
			return $this->estado;
		}

		//Metodo para asignar
		public function setIdDiagnostico($value){
			$this->idDiagnostico=$value;
		}

		public function setFechaAsignacion($value){
			$this->fechaAsignacion=$value;
		}

		public function setFechaCierre($value){
			$this->fechaCierre=$value;
		}

		public function setDiagnostico($value){
			$this->diagnostico=$value;
		}

		public function setSolucion($value){
			$this->solucion=$value;
		}

		public function setIdTecnico($value){
			$this->idTecnico=$value;
		}

		public function setIdTicket($value){
			$this->idTicket=$value;
		}

		public function setIdCategoria($value){
			$this->idCategoria=$value;
		}

		public function setEstadoDiagnostico($value){
			$this->estadoDiagnostico=$value;
		}

		public function setEstado($value){
			$this->estado=$value;
		}

	}

?>