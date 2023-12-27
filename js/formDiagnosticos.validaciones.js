var con = 0;
var idTecnico = false;
var idTicket = false;

$(document).ready(function(){
	$("#formDiagnosticos").submit(function(){
		validarIdTicket();
		validarIdTecnico();
		con++;
		if(idTecnico==false || idTicket==false){
			return false;
		}
	});

	//Llamada a evento de liberacion de tecla de la caja de texto #nombreCompleto
	$("#cmbIdTecnico").change(function(){
		if(con>0){
			validarIdTecnico();
		}
	});

	$("#cmbIdTicket").change(function(){
		if(con>0){
			validarIdTicket();
		}
	});

	$("#resetear").click(resetear);

});

///////////////////////////////////////////////////
///////INICIAN FUNCIONES DE VALIDACION/////////////
///////////////////////////////////////////////////

	function validarIdTecnico(){
		var valor = $("#cmbIdTecnico").val();
		if(valor==null){
			$("#cmbIdTecnico").attr('class','custom-select is-invalid').focus();
			$("#mensajeIdTecnico").replaceWith("<div id='mensajeIdTecnico' class='invalid-feedback'><b>Seleccione una opción (*)</b></di>");
			idTecnico = false;
		}
		else{
			$("#cmbIdTecnico").attr('class','custom-select is-valid');
			$("#mensajeIdTecnico").replaceWith("<div id='mensajeIdTecnico' class='invalid-feedback'><b>Campo completado correctamente :)</b></di>");
			idTecnico = true;
		}
	}

	function validarIdTicket(){
		var valor = $("#cmbIdTicket").val();
		if(valor==null){
			$("#cmbIdTicket").attr('class','custom-select is-invalid').focus();
			$("#mensajeIdTicket").replaceWith("<div id='mensajeIdTicket' class='invalid-feedback'><b>Seleccione una opción (*)</b></di>");
			idTicket = false;
		}
		else{
			$("#cmbIdTicket").attr('class','custom-select is-valid');
			$("#mensajeIdTicket").replaceWith("<div id='mensajeIdTicket' class='invalid-feedback'><b>Campo completado correctamente :)</b></di>");
			idTicket = true;
		}
	}


	function resetear(){
		con = 0;
		$("#cmbIdTecnico").attr('class','custom-select');
		$("#cmbIdTicket").attr('class','custom-select');

		$("#mensajeIdTecnico").replaceWith("<div id='mensajeIdTecnico' class=''></di>");
		$("#mensajeIdTicket").replaceWith("<div id='mensajeIdTicket' class=''></di>");
	}