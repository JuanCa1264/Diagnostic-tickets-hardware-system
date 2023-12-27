<?php
	require_once('scripts.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Enviando correo...</title>
</head>
<script type="text/javascript">
	rutaExito = "../imagenes/enviado.gif";
	rutaFail = "../imagenes/error.png";
	$(document).ready(function(){
		Swal.fire({
			imageUrl: '../imagenes/enviando2.gif',
			imageHeight: 200,
			text: 'Enviando correo...',
			imageAlt: 'A tall image',
			showConfirmButton: false,
		});
		enviarCorreo();
	});

	/*function enviarCorreo(){
		$.ajax({
			url: '../modelos/clsCorreo.php',
			type: 'POST',
			data: {peticionC: 1},
		})
		.done(function(respuesta){
			var r = parseInt(respuesta.length);
			if(r>=3900 && r<=4000){
				$("#gif").attr('src',rutaExito);
			}
			else if(r>=5000){
				$("#gif").hide();
				$("#imgError").css('visibility','visible');
				$("#txtError").css('visibility','visible');
			}
			setInterval(function(){
				self.location = 'dashboard.php';
			},2000);

		})
		.fail(function(){
			console.log("Error");
			alert("error");
		})
	}*/

	function enviarCorreo(){
		$.ajax({
			url: '../modelos/clsCorreo.php',
			type: 'POST',
			data: {peticionC: 1},
		})
		.done(function(respuesta){
			var r = parseInt(respuesta.length);
			if(r>=3900 && r<=5000){
				$("#mensaje").text('Correo enviado con éxito');
				Swal.fire({
					imageUrl: rutaExito,
					imageHeight: 200,
					text: 'Correo enviado con éxito',
					imageAlt: 'Imagen de éxito',
					showConfirmButton: false,
				});
			}
			else if(r>=5000){
				$("#mensaje").text('Error al enviar el correo :(');
				Swal.fire({
					imageUrl: rutaFail,
					imageHeight: 100,
					text: 'Error al enviar el correo :(',
					imageAlt: 'Imagen de error',
					showConfirmButton: false,
				});		
			}
			setInterval(function(){
				self.location = 'dashboard.php';
			},3000);

		})
		.fail(function(){
			console.log("Error");
			alert("error");
		})
	}
	

</script>
<body>
	<p id="mensaje">Enviando correo...</p>
</body>
</html>