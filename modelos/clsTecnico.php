<?php


class clsTecnico
{
	
	private $id;
	private $nombre;
	private $direccion;
	private $telefono;
	private $dui;
	private $especialidad;
	private $fechaNac;
	private $idUser;
	private $estado;


	function __construct()
	{
		$this->id = "";
		$this->nombre = "";
		$this->direccion = "";
		$this->telefono = "";
		$this->dui = "";
		$this->especialidad = "";
		$this->fechaNac = "";
		$this->idUser = "";
		$this->estado = "";

	}

	//Getters

	public function getId(){
		return $this->id;
	}

	public function getNombre(){
		return $this->nombre;
	}


	public function getDireccion(){
		return $this->direccion;
	}

	public function getTelefono(){
		return $this->telefono;
	}

	public function getDui(){
		return $this->dui;
	}

	public function getEspecialidad(){
		return $this->especialidad;
	}

	public function getFechaNac(){
		return $this->fechaNac;
	}

	public function getIdUser(){
		return $this->idUser;
	}

	public function getEstado(){
		return $this->estado;
	}

 	//Setters

 	public function setId($value){
 		$this->id = $value;
 	}

 	public function setNombre($value){
 		$this->nombre = $value;
 	}

 	

 	public function setDireccion($value){
 		$this->direccion = $value;
 	}

 	public function setTelefono($value){
 		$this->telefono = $value;
 	}

 	public function setDui($value){
 		$this->dui = $value;
 	}

 	public function setEspecialidad($value){
 		$this->especialidad = $value;
 	}

 	public function setFechaNac($value){
 		$this->fechaNac = $value;
 	}

 	public function setIdUser($value){
 		$this->idUser = $value;
 	}

 	public function setEstado($value){
 		$this->estado = $value;
 	}

}

?>