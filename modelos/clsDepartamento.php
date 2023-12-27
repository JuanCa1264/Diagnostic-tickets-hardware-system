<?php 
	
	class Departamento{
		private $idDepartamento;
		private $nombre;
		private $descripcion;
		private $estado;

		function __construct(){
			$this->idDepartamento = "";
			$this->nombre = "";
			$this->descripcion = "";
			$this->estado = "1";
		}

		function getIdDepartamento(){
			return $this->idCategoria;
		}
		function getNombre(){
			return $this->nombre;
		}
		function getDescripcion(){
			return $this->descripcion;
		}
		function getEstado(){
			return $this->estado;
		}

		function setIdDepartamento($value){
			$this->idCategoria = $value;
		}
		function setNombre($value){
			$this->nombre = $value;
		}
		function setDescripcion($value){
			$this->descripcion = $value;
		}
		function setEstado($value){
			$this->estado = $value;
		}

	}

?>