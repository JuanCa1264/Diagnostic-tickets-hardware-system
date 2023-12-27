<?php 
	require_once('../modelos/clsConexion.php');
	require_once('../config/phpMailer/vendor/autoload.php');
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require '../config/phpMailer/vendor/phpmailer/phpmailer/src/Exception.php';
	require '../config/phpMailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
	require '../config/phpMailer/vendor/phpmailer/phpmailer/src/SMTP.php';

	if(isset($_POST['peticionC'])){
		Correo::enviarCorreo();
	}
	
	class Correo{
		public function __construct(){
		}

		public static function enviarCorreo(){
			session_start();
			$idC = $_SESSION['idPersona'];
			$cliente="";
			$asun = "";
			$cuerpo = "";

			$con = new clsConexion();
			$query = "SELECT C.nombreCompleto, T.asunto, T.descripcion from ticket as T inner join cliente as C WHERE C.idCliente = T.idCliente AND T.idCliente='". $idC ."' ORDER by T.idTicket DESC LIMIT 1";
			$contenedor = $con->ejecutarConsulta($query);
			$con->cerrarConexion();
			foreach ($contenedor as $fila) {
				$cliente = $fila[0];
				$asun = $fila[1];
				$cuerpo = $fila[2];
			}
			$salida = "<b>De: </b>".$cliente. "<br><br>";
			$salida.= "<b>Asunto: </b>".$asun."<br><br>";
			$salida.= "<p style='text-align: justify;'>". $cuerpo ."</p>";

			//Indica el correo de donde se envia el correo
			$emailFrom = 'compusv503itca@gmail.com';
			//Nombre de la persona que envia el correo
			$emailFromName = 'Cliente';
			//Indica la direccion de correo a donde se envia el mensaje
			$emailTo = 'compusv503itca@gmail.com';
			//Nombre de la persona a la que se le envia el correo
			$emailToName = 'CompuSV';
			$mail = new PHPMailer;
					$mail->isSMTP();
			$mail->SMTPDebug = 2;
			//Host que nos otorga google mediante una cuenta de gmail
			$mail->Host = "smtp.gmail.com";
			$mail->Port = 587;
			$mail->SMTPSecure = 'tls';
			$mail->SMTPAuth = true;

			//correo de gmail que se configuro
			$mail->Username = 'compusv503itca@gmail.com';
			//Contrasena del correo
			$mail->Password = "proyecto123%";
			$mail->setFrom($emailFrom,$emailFromName);
			$mail->addAddress($emailTo,$emailToName);
			//Asunto del correo
			$mail->Subject = "Nuevo ticket creado";
			//Toda la informacion que se necesita enviar escrita
			$mail->msgHTML($salida);
			$mail->AltBody = "HTML messaging not supported";
			//Se envia el mensaje, si no ha habido problema la variable $exito sera TRUE
			$exito = $mail->Send();
			//Si el mensaje no ha podido ser enviado se realizaran 4 intentos mas como mucho para intentar enviar
			//el mensaje, cada intento se hara 5 segundos desoues del anterior, para ello se usa la funcion sleep

			$intentos = 1;
			while((!$exito) && ($intentos<3)){
				sleep(3);
				echo $mail->ErrorInfo;
				$exito = $mail->Send();
				$intentos = $intentos + 1;
			}
			//$arreglo = array();
			if(!$exito){
				echo "<p>Problemas enviando correo electronico a: " . $valor ."</p>";
				echo "<br>".$mail->ErrorInfo;
			}
			else{
				echo "<p>Correo enviado correctamente</p>";
			}

		}

	}

?>