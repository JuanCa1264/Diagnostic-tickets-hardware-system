<?php


class clsCliente 
{
	
	private $id;
	private $nombre;
	private $fechaNac;
	private $direccion;
	private $telefono;
	private $dui;
	private $idDept;
	private $idUser;
	private $estado;


	function __construct()
	{
		$this->id = "";
		$this->nombre = "";
		$this->fechaNac = "";
		$this->direccion = "";
		$this->telefono = "";
		$this->dui = "";
		$this->idDept = "";
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

	public function getFechaNac(){
		return $this->fechaNac;
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

	public function getIdDept(){
		return $this->idDept;
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

 	public function setFechaNac($value){
 		$this->fechaNac = $value;
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

 	public function setIdDept($value){
 		$this->idDept = $value;
 	}

 	public function setIdUser($value){
 		$this->idUser = $value;
 	}

 	public function setEstado($value){
 		$this->estado = $value;
 	}

}

?>