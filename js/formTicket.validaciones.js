var con = 0;
var asunto = false;
var descripcion = false;

$(document).ready(function(){

	$("#formTicket").submit(function(){
		validarAsunto();
		validarDescripcion();			
		
		con++;
		if(asunto==false|| descripcion==false){
			return false;
		}
	});

	//Llamada al evento de liberacion de tecla de la caja de texto #nombre
	$("#txtAsunto").keyup(function(){
		if(con>0){
			validarAsunto();
		}
	});

	$("#txtDescripcion").keyup(function(){
		if(con>0){
			validarDescripcion();
		}
	});

	$("#resetear").click(function(){
		resetear();
	});

});


	/////////////// FUNCIONES PARA VALIDAR ///////////////
	function validarAsunto(){
		var valor = $("#txtAsunto").val();
		if(valor!=""){
			if(valor.length>=10 && valor.length<=75){
				$("#txtAsunto").attr('class','form-control is-valid');
				$("#mensajeAsunto").replaceWith("<div id='mensajeAsunto' class='valid-feedback'><b>Campo completado correctamente :)</b></di>");
				asunto = true;
			}
			else{
				$("#txtAsunto").attr('class','form-control is-invalid').focus();
				$("#mensajeAsunto").replaceWith("<div id='mensajeAsunto' class='invalid-feedback'><b>Por favor, Introduzca caracteres en un rango de 10 - 75</b></di>");
				asunto = false;
			}			
		}
		else{
			$("#txtAsunto").attr('class','form-control is-invalid').focus();
			$("#mensajeAsunto").replaceWith("<div id='mensajeAsunto' class='invalid-feedback'><b>Por favor, rellene este campo (*)</b></di>");
			asunto = false;
		}
	}

	function validarDescripcion(){
		var valor = $("#txtDescripcion").val();
		if(valor!=""){
			if(valor.length>=25 && valor.length<=600){
				$("#txtDescripcion").attr('class','form-control is-valid');
				$("#mensajeDescripcion").replaceWith("<div id='mensajeDescripcion' class='valid-feedback'><b>Campo completado correctamente :)</b></di>");
				descripcion = true;
			}
			else{
				$("#txtDescripcion").attr('class','form-control is-invalid').focus();
				$("#mensajeDescripcion").replaceWith("<div id='mensajeDescripcion' class='invalid-feedback'><b>Por favor, Introduzca caracteres en un rango de 25 - 600</b></di>");
				descripcion = false;
			}			
		}
		else{
			$("#txtDescripcion").attr('class','form-control is-invalid').focus();
			$("#mensajeDescripcion").replaceWith("<div id='mensajeDescripcion' class='invalid-feedback'><b>Por favor, rellene este campo (*)</b></di>");
			descripcion = false;
		}
	}

	function resetear(){
		con = 0;
		$("#txtAsunto").attr('class','form-control');
		$("#txtDescripcion").attr('class','form-control');

		$("#txtAsunto").val("");
		$("#txtDescripcion").val("");

		$("#mensajeAsunto").replaceWith("<div id='mensajeAsunto' class=''></di>");
		$("#mensajeDescripcion").replaceWith("<div id='mensajeDescripcion' class=''></di>");
	}