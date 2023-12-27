<?php 
	
	class Categoria{
		private $idCategoria;
		private $tipo;
		private $nombre;
		private $descripcion;
		private $estado;

		function __construct(){
			$this->idCategoria = "";
			$this->tipo = "";
			$this->nombre = "";
			$this->descripcion = "";
			$this->estado = "1";
		}

		function getIdCategoria(){
			return $this->idCategoria;
		}
		function getTipo(){
			return $this->tipo;
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

		function setIdCategoria($value){
			$this->idCategoria = $value;
		}
		function setTipo($value){
			$this->tipo = $value;
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