<?php
	
	class clsConexion{
		private $servidor;
		private $usuario;
		private $clave;
		private $base;
		private $conexion;

		public function __construct(){
			$this->servidor = "localhost";
			$this->usuario = "root";
			$this->clave = "";
			$this->base = "bdauxiliar";

			$this->conexion = new mysqli($this->servidor, $this->usuario, $this->clave, $this->base);
			$this->conexion->set_charset("utf8");
		}

		public function getConexion(){
			return $this->conexion;
		}

		public function ejecutarConsulta($sql){
			$contenedor = $this->conexion->query($sql);
			return $contenedor->fetch_all();
		}

		public function cerrarConexion(){
			$this->conexion->close();
		}

		public function ejecutarActualizacion($sql, $correcto, $mal){
			require_once('../vistas/scripts.php');
			if($this->conexion->query($sql)){
				echo "<script>
					var cor = '". $correcto ."';
					setTimeout(function(){
						Swal.fire({
							type: 'success',
							title: 'Hecho!',
							text: '$correcto con éxito',
							showConfirmButton: false,
							timer: 3000,
						});
					},1);
					setTimeout(function(){
						if(cor!='Ticket agregado'){
							self.location = '../vistas/dashboard.php';
						}
						else{
							self.location = '../vistas/correo.php';
						}
					},1500);
				</script>";
			}
			else{
				echo "<script>
					setTimeout(function(){
						Swal.fire({
							type: 'error',
							title: 'Error :(',
							text: 'No se pudo $mal',
							showConfirmButton: false,
							timer: 2750,
						});
					},1);
					setTimeout(function(){
							self.location = '../vistas/dashboard.php';
						},1250);
				</script>";
			}
		}//termina ejecutarActualizacion



	}

?>