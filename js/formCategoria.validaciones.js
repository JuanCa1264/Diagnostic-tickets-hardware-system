var con = 0;
var tipo = false;
var nombre = false;
var descripcion = false;

$(document).ready(function(){

	$("#formCategoria").submit(function(){
		validarTipo();
		validarNombre();
		validarDescripcion();			
		
		con++;
		if(tipo==false || nombre==false|| descripcion==false){
			return false;
		}
	});

	//Llamada al evento de liberacion de tecla de la caja de texto #nombre
	$("#cmbTipo").change(function(){
		if(con>0){
			validarTipo();
		}
	});

	$("#txtNombre").keyup(function(){
		if(con>0){
			validarNombre();
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
	function validarTipo(){
		var valor = $("#cmbTipo").val();
		if(valor!=""){
			$("#cmbTipo").attr('class','custom-select is-valid');
			$("#mensajeTipo").replaceWith("<div id='mensajeTipo' class='invalid-feedback'><b>Campo completado correctamente :)</b></di>");
			tipo = true;
		}
		else{
			$("#cmbTipo").attr('class','custom-select is-invalid').focus();
			$("#mensajeTipo").replaceWith("<div id='mensajeTipo' class='invalid-feedback'><b>Por favor, seleccione una opción (*)</b></di>");
			tipo = false;
		}
	}

	function validarNombre(){
		var valor = $("#txtNombre").val();
		if(valor!=""){
			band = 0;
			for(var i = 0; i < valor.length;i++){
				aux =  valor.charCodeAt(i);
				if((aux>=65 && aux<=90) || (aux>=97 && aux<=122) || (aux==32) || (aux==225) || (aux==233) || (aux==237) || (aux==243) 
				|| (aux==250) || (aux==193) || (aux==201) || (aux==205) || (aux==211) || (aux==218) || (aux==241) || (aux==209)
				|| (aux>=48 && aux<=57) || (aux==35) ){
					band = band;
				}
				else{
					band++;
				}
			}
			if(band!=0){
				$("#txtNombre").attr('class','form-control is-invalid').focus();
				$("#mensajeNombre").replaceWith("<div id='mensajeNombre' class='invalid-feedback'><b>Por favor, solo introduzca letras, numeros y # (*)</b></di>");
				nombre = false;
			}
			else{
				if(valor.length>=3 && valor.length<=50){
					$("#txtNombre").attr('class','form-control is-valid');
					$("#mensajeNombre").replaceWith("<div id='mensajeNombre' class='valid-feedback'><b>Campo completado correctamente :)</b></di>");
					nombre = true;
				}
				else{
					$("#txtNombre").attr('class','form-control is-invalid').focus();
					$("#mensajeNombre").replaceWith("<div id='mensajeNombre' class='invalid-feedback'><b>Por favor, Introduzca caracteres en un rango de 3 - 50</b></di>");
					nombre = false;
				}
			}			
		}
		else{
			$("#txtNombre").attr('class','form-control is-invalid').focus();
			$("#mensajeNombre").replaceWith("<div id='mensajeNombre' class='invalid-feedback'><b>Por favor, rellene este campo (*)</b></di>");
			nombre = false;
		}
	}

	function validarDescripcion(){
		var valor = $("#txtDescripcion").val();
		if(valor!=""){
			band = 0;
			for(var i = 0; i < valor.length;i++){
				aux =  valor.charCodeAt(i);
				if((aux>=65 && aux<=90) || (aux>=97 && aux<=122) || (aux==32) || (aux==130) || (aux==160) || (aux==161) || (aux==162) || (aux==163)
				|| (aux==96) || (aux==225) || (aux==233) || (aux==237) || (aux==243) || (aux==250) || (aux==193) || (aux==201)
				|| (aux==205) || (aux==211) || (aux==218) || (aux==241) || (aux==209) || (aux==46) || (aux==44) || (aux==40) || (aux==41)
				|| (aux>=48 && aux<=57) || (aux==35) ){
					band = band;
				}
				else{
					band++;
				}
			}
			if(band!=0){
				$("#txtDescripcion").attr('class','form-control is-invalid').focus();
				$("#mensajeDescripcion").replaceWith("<div id='mensajeDescripcion' class='invalid-feedback'><b>Por favor, solo introduzca letras, numeros, parentesis, comas, puntos y #</b></di>");
				descripcion = false;
			}
			else{
				if(valor.length>=20 && valor.length<=150){
					$("#txtDescripcion").attr('class','form-control is-valid');
					$("#mensajeDescripcion").replaceWith("<div id='mensajeDescripcion' class='valid-feedback'><b>Campo completado correctamente :)</b></di>");
					descripcion = true;
				}
				else{
					$("#txtDescripcion").attr('class','form-control is-invalid').focus();
					$("#mensajeDescripcion").replaceWith("<div id='mensajeDescripcion' class='invalid-feedback'><b>Por favor, Introduzca caracteres en un rango de 20 - 150</b></di>");
					descripcion = false;
				}
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
		$("#txtNombre").attr('class','form-control');
		$("#txtDescripcion").attr('class','form-control');
		$("#cmbTipo").attr('class','form-control');

		$("#txtNombre").val("");
		$("#txtDescripcion").val("");
		$("#cmbTipo").val("Hardware");

		$("#mensajeNombre").replaceWith("<div id='mensajeNombre' class=''></di>");
		$("#mensajeDescripcion").replaceWith("<div id='mensajeDescripcion' class=''></di>");
		$("#mensajeTipo").replaceWith("<div id='mensajeTipo' class=''></di>");
	}
