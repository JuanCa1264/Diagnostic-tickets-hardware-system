var con = 0;
var nombre = false;
var descripcion = false;

$(document).ready(function(){

	$("#formDepartamento").submit(function(){
		validarNombre();
		validarDescripcion();			
		
		con++;
		if(nombre==false|| descripcion==false){
			return false;
		}
	});

	//Llamada al evento de liberacion de tecla de la caja de texto #nombre

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

	$("#resetear").click(resetear);

});


	/////////////// FUNCIONES PARA VALIDAR ///////////////

	function validarNombre(){
		var valor = $("#txtNombre").val();
		if(valor!=""){
			band = 0;
			for(var i = 0; i < valor.length;i++){
				aux =  valor.charCodeAt(i);
				//225, 233, 237, 243, 250  193, 201, 205, 211, 218,    punto y coma 46, 44,  ñ 241, 209
				if((aux>=65 && aux<=90) || (aux>=97 && aux<=122) || (aux==32) || (aux==225) || (aux==233) || (aux==237) || (aux==243) 
				|| (aux==250) || (aux==193) || (aux==201) || (aux==205) || (aux==211) || (aux==218) || (aux==241) || (aux==209)){
					band = band;
				}
				else{
					band++;
				}
			}
			if(band!=0){
				$("#txtNombre").attr('class','form-control is-invalid').focus();
				$("#mensajeNombre").replaceWith("<div id='mensajeNombre' class='invalid-feedback'><b>Por favor, solo introduzca letras (*)</b></di>");
				nombre = false;
			}
			else{
				if(valor.length>=3 && valor.length<=50){
					$("#txtNombre").attr('class','form-control is-valid');
					$("#mensajeNombre").replaceWith("<div id='mensajeNombre' class='valid-feedback'><b>Campo completado correctamente</b></di>");
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
				|| (aux==205) || (aux==211) || (aux==218) || (aux==241) || (aux==209) || (aux==46) || (aux==44) || (aux==40) || (aux==41)){
					band = band;
				}
				else{
					band++;
				}
			}
			if(band!=0){
				$("#txtDescripcion").attr('class','form-control is-invalid').focus();
				$("#mensajeDescripcion").replaceWith("<div id='mensajeDescripcion' class='invalid-feedback'><b>Por favor, solo introduzca letras, parentesis, comas y puntos  (*)</b></di>");
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

		$("#mensajeNombre").replaceWith("<div id='mensajeNombre' class=''></di>");
		$("#mensajeDescripcion").replaceWith("<div id='mensajeDescripcion' class=''></di>");
	}
