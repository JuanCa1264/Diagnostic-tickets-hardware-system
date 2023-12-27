<?php

		class clsUsuario{
		private $id;
		private $username;
		private $password;
		private $rol;
		private $avatar;

		//Metodo constructor
		public function __construct(){
			$this->id="";
			$this->username="";
			$this->password="";
			$this->rol="";
			$this->avatar="";
		}

		//Funciones para obtener
		public function getId(){
			return $this->id;
		}

		public function getUsername(){
			return $this->username;
		}

		public function getPassword(){
			return $this->password;
		}

		public function getRol(){
			return $this->rol;
		}

		public function getAvatar(){
			return $this->avatar;
		}

		//Funciones para asignar
		public function setId($value){
			$this->id = $value;
		}

		public function setUsername($value){
			$this->username = $value;
		}

		public function setPassword($value){
			$this->password = $value;
		}

		public function setRol($value){
			$this->rol = $value;
		}

		public function setAvatar($value){
			$this->avatar = $value;
		}

	}

?>