var con = 0;
var nombre = false;
var direccion = false;
var telefono = false;
var dui = false;
var especialidad = false;
var fecha = false;
var usuarioC = false

var anioMax = 0;
var anioMin = 0;

$(document).ready(function(){
	colocarFechaMaxMin();
		//Llamada al evento submit del formulario

	$("#formTecnicos").submit(function(){
		validarUsuarioC();
		validarFecha();
		validarEspecialidad();
		validarDui();
		validarTelefono();
		validarDireccion();
		validarNombre();
		con++;
		if(nombre==false || direccion == false || telefono == false || dui == false || especialidad == false || fecha == false || usuarioC == false){
			return false;
		}
	});


	$("#txtNombre").keyup(function(){
		if(con>0){
			validarNombre();
			//$("#txtId").val(nombre);
		}
	});

	$("#txtDireccion").keyup(function(){
		if(con>0){
			validarDireccion();
		}
	});

	$("#txtTelefono").keyup(function(){
		if(con>0){
			validarTelefono();
		}
	});

	$("#txtDui").keyup(function(){
		if(con>0){
			validarDui();
		}
	});

	$("#txtEspecialidad").keyup(function(){
		if(con>0){
			validarEspecialidad();
		}
	});

	$("#txtFecha").change(function(){
		if(con>0){
			validarFecha();
		}
	});


	$("#usuarioC").change(function(){
		if(con>0){
			validarUsuarioC();
		}
	});

	$("#resetear").click(resetear);

});

/////////////// FUNCIONES PARA VALIDAR ///////////////

	//Funcion para validar el Nombre.
	function validarNombre(){
		var valor = $("#txtNombre").val();
		var valorId = "";
		var contador = 0;
		if(valor!=""){
			band = 0;

			for(var i = 0; i < valor.length; i++){
				aux = valor.charCodeAt(i);
				if( (aux>=65 && aux<=90) ||(aux>=97 && aux<=122) || aux==209 || aux==241 || aux==32 || aux==225 || aux==233 || aux==237 || aux==243 || aux==250 || aux==193 || aux==201 || aux==205 || aux==218  ){
					band = band;
					if(i==0){
						
						valorId += valor[i];
					}
					if(aux==32){
						contador++;
						if(contador<3){
							i++;
							valorId += valor[i];
							i--;
						}						
					}
				}
				else{
					band++;
				}
			}
			if(band!=0){
				$("#txtNombre").attr('class', 'form-control is-invalid').focus();
				$("#mensajeNombre").replaceWith("<div id='mensajeNombre' class='invalid-feedback'><b>Por favor, solo introduzca letras (*)</b></di>");
				nombre = false;
			}
			else{
				if(valor.length>=15 && valor.length<=50){
					$("#txtNombre").attr('class', 'form-control is-valid');
					$("#mensajeNombre").replaceWith("<div id='mensajeNombre' class='valid-feedback'><b>Campo completado correctamente </b></di>");
					nombre = true;
					var fecha = new Date();
					var anio = fecha.getFullYear();
					valorId += anio;
					valorId = valorId.toUpperCase();
					$("#txtId").val(valorId);
				}
				else{
					$("#txtNombre").attr('class', 'form-control is-invalid').focus();
					$("#mensajeNombre").replaceWith("<div id='mensajeNombre' class='invalid-feedback'><b>Por favor introduzca caracteres en un rango de 15 - 50 (*)</b></di>");
					nombre = false;
				}
			}
		}
		else{
			$("#txtNombre").attr('class', 'form-control is-invalid').focus();
			$("#mensajeNombre").replaceWith("<div id='mensajeNombre' class='invalid-feedback'><b>Por favor, rellene este campo (*)</b></di>");
			nombre = false;
		}
	}// Fin de la funcion para validar el Nombre.


//Funcion para validar la direccion
	function validarDireccion(){
		var valor = $("#txtDireccion").val();
		if(valor!=""){
			band = 0;
			for(var i = 0; i < valor.length;i++){
				aux =  valor.charCodeAt(i);
				if((aux>=65 && aux<=90) || (aux>=97 && aux<=122) || aux==209 || aux==241 || aux==32 || aux==225 || aux==233 || aux==237 || aux==243 ||
				aux==250 || aux==193 || aux==201 || aux==205 || aux==218 || aux==44 || aux==46 || (aux>=48 && aux<=57)){
					band = band;
				}
				else{
					band++;
				}
			}
			if(band!=0){
				$("#txtDireccion").attr('class','form-control is-invalid').focus();
				$("#mensajeDireccion").replaceWith("<div id='mensajeDireccion' class='invalid-feedback'><b>Por favor, solo introduzca letras, números y caracteres especiales ( .  , ) (*)</b></di>");
				direccion = false;
			}
			else{
				if(valor.length>=15 && valor.length<=100){
					$("#txtDireccion").attr('class','form-control is-valid');
					$("#mensajeDireccion").replaceWith("<div id='mensajeDireccion' class='valid-feedback'> Campo completado correctamente </di>");
					direccion = true;
				}
				else{
					$("#txtDireccion").attr('class','form-control is-invalid').focus();
					$("#mensajeDireccion").replaceWith("<div id='mensajeDireccion' class='invalid-feedback'><b>Por favor, Introduzca caracteres en un rango de 15 - 100</b></di>");
					direccion = false;
				}
			}			
		}
		else{
			$("#txtDireccion").attr('class','form-control is-invalid').focus();
			$("#mensajeDireccion").replaceWith("<div id='mensajeDireccion' class='invalid-feedback'><b>Por favor, rellene este campo (*)</b></di>");
			direccion = false;
		}
	}//FIn de la funcion para validar la direccion

	//Funcion para validar el telefono
	function validarTelefono(){
		var valor = $("#txtTelefono").val();
		if(valor!=""){
			if(valor.length==9){
				band = 0;
				for(var i = 0; i < valor.length;i++){
					aux =  valor.charCodeAt(i);
					if(i==0){
						if(aux<54 || aux>55){
							band++;
						}
					}
					if(i>=1 && i<=3){
						if(aux<48 || aux>57){
							band++;
						}
					}
					if(i==4){
						if(aux!=45){
							band++;
						}
					}
					if(i>=5 && i<=8){
						if(aux<48 || aux>57){
							band++;
						}
					}
				}//termina for
				if(band==0){
					$("#txtTelefono").attr('class','form-control is-valid');
					$("#mensajeTelefono").replaceWith("<div id='mensajeTelefono' class='valid-feedback'><b>Campo completado correctamente </b></di>");
					telefono = true;
				}
				else{
					$("#txtTelefono").attr('class','form-control is-invalid').focus();
					$("#mensajeTelefono").replaceWith("<div id='mensajeTelefono' class='invalid-feedback'><b>Por favor, use el formato solicitado (xxxx-xxxx)</b></di>");
					telefono = false;
				}
			}//termina if que valida que hayan 9 caracteres
			else{
				$("#txtTelefono").attr('class','form-control is-invalid').focus();
				$("#mensajeTelefono").replaceWith("<div id='mensajeTelefono' class='invalid-feedback'><b>Por favor, Introduzca 9 caracteres con el formato solicitado (xxxx-xxxx)</b></di>");
				telefono = false;
			}
		}
		else{
			$("#txtTelefono").attr('class','form-control is-invalid').focus();
			$("#mensajeTelefono").replaceWith("<div id='mensajeTelefono' class='invalid-feedback'><b>Por favor, rellene este campo (*)</b></di>");
			telefono = false;
		}
	}//fin de la funcion para validar el telefono

	function validarDui(){
		var valor = $("#txtDui").val();
		if(valor!=""){
			if(valor.length==10){
				band = 0;
				for(var i = 0; i < valor.length;i++){
					aux =  valor.charCodeAt(i);
					if(i>=0 && i<=7){
						if(aux<48 || aux>57){
							band++;
						}
					}
					if(i==8){
						if(aux!=45){
							band++;
						}
					}
					if(i==9){
						if(aux<48 || aux>57){
							band++;
						}
					}
				}//termina for
				if(band==0){
					$("#txtDui").attr('class','form-control is-valid');
					$("#mensajeDui").replaceWith("<div id='mensajeDui' class='valid-feedback'><b>Campo completado correctamente :)</b></di>");
					dui = true;
				}
				else{
					$("#txtDui").attr('class','form-control is-invalid').focus();
					$("#mensajeDui").replaceWith("<div id='mensajeDui' class='invalid-feedback'><b>Por favor, use el formato solicitado (xxxxxxxx-x)</b></di>");
					dui = false;
				}
			}//termina if que valida que hayan 10 caracteres
			else{
				$("#txtDui").attr('class','form-control is-invalid').focus();
				$("#mensajeDui").replaceWith("<div id='mensajeDui' class='invalid-feedback'><b>Por favor, Introduzca 10 caracteres con el formato solicitado (xxxxxxxx-x)</b></di>");
				dui = false;
			}
		}
		else{
			$("#txtDui").attr('class','form-control is-invalid').focus();
			$("#mensajeDui").replaceWith("<div id='mensajeDui' class='invalid-feedback'><b>Por favor, rellene este campo (*)</b></di>");
			dui = false;
		}
	}

	//Funcion para validar la Especialidad
	function validarEspecialidad(){
		var valor = $("#txtEspecialidad").val();
		if(valor!=""){
			band = 0;

			for(var i = 0; i < valor.length; i++){
				aux = valor.charCodeAt(i);
				if( (aux>=65 && aux<=90) ||(aux>=97 && aux<=122) || aux==209 || aux==241 || aux==32 || aux==225 || aux==233 || aux==237 || aux==243 || aux==250 || aux==193 || aux==201 || aux==205 || aux==218  ){
					band = band;
				}
				else{
					band++;
				}
			}
			if(band!=0){
				$("#txtEspecialidad").attr('class', 'form-control is-invalid').focus();
				$("#mensajeEspecialidad").replaceWith("<div id='mensajeEspecialidad' class='invalid-feedback'><b>Por favor, solo introduzca letras (*)</b></di>");
				especialidad = false;
			}
			else{
				if(valor.length>=5 && valor.length<=50){
					$("#txtEspecialidad").attr('class', 'form-control is-valid');
					$("#mensajeEspecialidad").replaceWith("<div id='mensajeEspecialidad' class='valid-feedback'><b>Campo completado correctamente </b></di>");
					especialidad = true;
				}
				else{
					$("#txtEspecialidad").attr('class', 'form-control is-invalid').focus();
					$("#mensajeEspecialidad").replaceWith("<div id='mensajeEspecialidad' class='invalid-feedback'><b>Por favor introduzca caracteres en un rango de 5 - 50 (*)</b></di>");
					especialidad = false;
				}
			}
		}
		else{
			$("#txtEspecialidad").attr('class', 'form-control is-invalid').focus();
			$("#mensajeEspecialidad").replaceWith("<div id='mensajeEspecialidad' class='invalid-feedback'><b>Por favor, rellene este campo (*)</b></di>");
			especialidad = false;
		}
	}// Fin de la funcion para validar la Especialidad


	function validarFecha(){
		var valor = $("#txtFecha").val();
			if(valor!=""){
				if(valor.length==10){
					var aux = valor.substring(4,0);
					if(aux<anioMin || aux>anioMax){
						$("#txtFecha").attr('class','form-control is-invalid');
						$("#mensajeFecha").replaceWith("<div id='mensajeFecha' class='invalid-feedback'><b>Por favor, ingrese un año existente en el rango de " + anioMin + " a " + anioMax + "(*)</b></di>");
						fecha = false;
					}
					else{
						$("#txtFecha").attr('class','form-control is-valid');
						$("#mensajeFecha").replaceWith("<div id='mensajeFecha' class='valid-feedback'><b>Campo completado correctamente :)</b></di>");
						fecha = true;
					}	
				}
				else{
					$("#txtFecha").attr('class','form-control is-invalid').focus();
					$("#mensajeFecha").replaceWith("<div id='mensajeFecha' class='invalid-feedback'><b>Por favor, rellene este campo completamente (*)</b></di>");
					fecha = false;
				}
		}
		else{
			$("#txtFecha").attr('class','form-control is-invalid').focus();
			$("#mensajeFecha").replaceWith("<div id='mensajeFecha' class='invalid-feedback'><b>Por favor, rellene este campo (*)</b></di>");
			fecha = false;
		}
	}

		function validarUsuarioC(){
		var valor = $("#usuarioC").val();
		if(valor==null){
			$("#usuarioC").attr('class','custom-select is-invalid').focus();
			$("#mesnajeUsuarioC").replaceWith("<div id='mesnajeUsuarioC' class='invalid-feedback'><b>Seleccione una opción (*)</b></di>");
			usuarioC = false;
		}
		else{
			$("#usuarioC").attr('class','custom-select is-valid');
			$("#mesnajeUsuarioC").replaceWith("<div id='mesnajeUsuarioC' class='invalid-feedback'><b>Campo completado correctamente :)</b></di>");
			usuarioC = true;
		}
	}


		function colocarFechaMaxMin(){
		var fechaMax;
		var fechaMin;

		var fecha = new Date();
		var anio = fecha.getFullYear();

		
		anioMax = anio - 18
        anioMin = anioMax - 80;
		fechaMax = anioMax  + "-12-31";
		fechaMin = anioMin + "-01-01";

		
		$("#txtFecha").attr('max',fechaMax);
		$("#txtFecha").attr('min',fechaMin);

	}

		function resetear(){
		con = 0;
		$("#txtNombre").attr('class','form-control');
		$("#txtDireccion").attr('class','form-control');
		$("#txtTelefono").attr('class','form-control');
		$("#txtDui").attr('class','form-control');
		$("#txtEspecialidad").attr('class','form-control');
		$("#txtFecha").attr('class','form-control');
		$("#usuarioC").attr('class','custom-select');


		$("#mensajeNombre").replaceWith("<div id='mensajeNombre' class=''></di>");
		$("#mensajeDireccion").replaceWith("<div id='mensajeDireccion' class=''></di>");
		$("#mensajeTelefono").replaceWith("<div id='mensajeTelefono' class=''></di>");
		$("#mensajeDui").replaceWith("<div id='mensajeDui' class=''></di>");
		$("#mensajeEspecialidad").replaceWith("<div id='mensajeEspecialidad' class=''></di>");
		$("#mensajeFecha").replaceWith("<div id='mensajeFecha' class=''></di>");
		$("#mensajeUsuarioC").replaceWith("<div id='mensajeUsuarioC' class=''></di>");
	}







