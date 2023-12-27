	var r1 = false;
	var r2 = false;
	var r3 = false;
	var r4 = false;
	var r5 = false;
	var r6 = false;
	var para1 = "";
	var para2 = "";
	$(document).ready(function(){
		$("#cmbReporte").change(function(){
			var parametro = $("#cmbReporte").val();
			habilitarParametros(parametro);
		});
		$("#txtParametro").change(function(){
			para1 = $(this).val();
		});
		$("#txtParametro2").change(function(){
			para2 = $(this).val();
		});

		$("#enviar").click(function(){
			var ruta = "";
			if(r1==true){
				para1+= " 00:00:00";
				para2+= " 23:59:29";
				ruta = "reportes/reporte1.php?f1=" + para1 + "&f2=" + para2;
			}
			else if(r2==true){
				para1+= " 00:00:00";
				para2+= " 23:59:29";
				ruta = "reportes/reporte2.php?f1=" + para1 + "&f2=" + para2;
			}
			else if(r3==true){
				var valor = $("#cmbParametro").val();
				ruta = "reportes/reporte3.php?tipo=" + valor;
			}
			else if(r4==true){
				var valor = $("#cmbParametro").val();
				ruta = "reportes/reporte4.php?cat=" + valor;
			}
			else if(r5==true){
				var valor = $("#cmbParametro").val();
				ruta = "reportes/reporte5.php?dep=" + valor;
			}
			else if(r6==true){
				var valor = $("#cmbParametro").val();
				ruta = "reportes/reporte6.php?tec=" + valor;
			}	
			$("#formReportes").attr('action',ruta);
			$("#formReportes").submit();
		});
	});


	function habilitarParametros(reporte){
		if(reporte=="r1"){
			$("#lblPara1").replaceWith('<label id="lblPara1" for="txtParametro">Fecha 1</label>');
			$("#lblPara2").replaceWith('<label id="lblPara2" for="txtParametro">Fecha 2</label>');
			$("#txtParametro").attr('type','date');
			$("#txtParametro2").attr('type','date');
			$("#txtParametro").attr('name','f1');
			$("#txtParametro2").attr('name','f2');
			$("#txtParametro").prop('disabled',false);
			$("#txtParametro2").prop('disabled',false);
			$("#divIds").replaceWith('<div id="divIds"></div>');
			bloquear(2);
			r1 = true;
			r2 = false;
			r3 = false;
			r4 = false;
			r5 = false;
			r6 = false;
			$("#enviar").prop('disabled',false);
		}
		if(reporte=="r2"){
			$("#lblPara1").replaceWith('<label id="lblPara1" for="txtParametro">Fecha 1</label>');
			$("#lblPara2").replaceWith('<label id="lblPara2" for="txtParametro">Fecha 2</label>');
			$("#txtParametro").attr('type','date');
			$("#txtParametro2").attr('type','date');
			$("#txtParametro").prop('disabled',false);
			$("#txtParametro2").prop('disabled',false);
			$("#divIds").replaceWith('<div id="divIds"></div>');
			bloquear(2);
			r1 = false;
			r2 = true;
			r3 = false;
			r4 = false;
			r5 = false;
			r6 = false;
			$("#enviar").prop('disabled',false);
		}
		if(reporte=="r3"){
			$("#lblPara1").replaceWith('<label id="lblPara1" for="txtParametro">Parametro 1</label>');
			$("#lblPara2").replaceWith('<label id="lblPara2" for="txtParametro">Parametro 2</label>');
			$("#txtParametro").attr('type','text');
			$("#txtParametro2").attr('type','text');
			$("#txtParametro").prop('disabled',true);
			$("#txtParametro2").prop('disabled',true);
			colocarCategorias();
			bloquear(1);
			r1 = false;
			r2 = false;
			r3 = true;
			r4 = false;
			r5 = false;
			r6 = false;
		}
		if(reporte=="r4"){
			$("#divIds").replaceWith('<div id="divIds"></div>');
			bloquear(1);
			obtenerCategoriasPro();

			r1 = false;
			r2 = false;
			r3 = false;
			r4 = true;
			r5 = false;
			r6 = false;
			$("#enviar").prop('disabled',false);
		}
		if(reporte=="r5"){
			$("#divIds").replaceWith('<div id="divIds"></div>');
			bloquear(1);
			obtenerDepartamentos();

			r1 = false;
			r2 = false;
			r3 = false;
			r4 = false;
			r5 = true;
			r6 = false;
			$("#enviar").prop('disabled',false);
		}
		if(reporte=="r6"){
			$("#divIds").replaceWith('<div id="divIds"></div>');
			bloquear(1);
			obtenerTecnicos();

			r1 = false;
			r2 = false;
			r3 = false;
			r4 = false;
			r5 = false;
			r6 = true;
			$("#enviar").prop('disabled',false);
		}
	}

	function obtenerCategoriasPro(){
		$.ajax({
			url: '../dao/Reporte.dao.php',
			type: 'POST',
			data: {peticionCat: 1},
		})
		.done(function(respuesta){
			let aux = JSON.parse(respuesta);
			if(aux[0][0]!="null"){
				var salida = '<div id="divIds" class="form-row">';
				salida+= '<div class="form-group col-md-12">';
				salida+='<label for="cmbParametro">Categoria</label>';
				salida+= '<select class="custom-select" id="cmbParametro">';
				for(var i=0; i<aux.length;i++){
					salida+= '<option value="' + aux[i][0] + '">' +  aux[i][1] +'</option>';
				}
				salida+="</select>";
				salida+="</div></div>";
				$("#divIds").replaceWith(salida);
			}
			else{
				alert("No hay categorias agregadas");
				$("#enviar").prop('disabled',true);
			}		
		})
		.fail(function(){
			console.log("Error");
		})
	}

	function obtenerDepartamentos(){
		$.ajax({
			url: '../dao/Reporte.dao.php',
			type: 'POST',
			data: {peticionDep: 1},
		})
		.done(function(respuesta){
			let aux = JSON.parse(respuesta);
			if(aux[0][0]!="null"){
				var salida = '<div id="divIds" class="form-row">';
				salida+= '<div class="form-group col-md-12">';
				salida+='<label for="cmbParametro">Departamento</label>';
				salida+= '<select class="custom-select" id="cmbParametro">';
				for(var i=0; i<aux.length;i++){
					salida+= '<option value="' + aux[i][0] + '">' +  aux[i][1] +'</option>';
				}
				salida+="</select>";
				salida+="</div></div>";
				$("#divIds").replaceWith(salida);
			}
			else{
				alert("No hay departamentos agregados");
				$("#enviar").prop('disabled',true);
			}		
		})
		.fail(function(){
			console.log("Error");
		})
	}

	function obtenerTecnicos(){
		$.ajax({
			url: '../dao/Reporte.dao.php',
			type: 'POST',
			data: {peticionTec: 1},
		})
		.done(function(respuesta){
			let aux = JSON.parse(respuesta);
			if(aux[0][0]!="null"){
				var salida = '<div id="divIds" class="form-row">';
				salida+= '<div class="form-group col-md-12">';
				salida+='<label for="cmbParametro">Tecnico</label>';
				salida+= '<select class="custom-select" id="cmbParametro">';
				for(var i=0; i<aux.length;i++){
					salida+= '<option value="' + aux[i][0] + '">' +  aux[i][1] +'</option>';
				}
				salida+="</select>";
				salida+="</div></div>";
				$("#divIds").replaceWith(salida);
			}
			else{
				alert("No hay tecnicos agregados");
				$("#enviar").prop('disabled',true);
			}		
		})
		.fail(function(){
			console.log("Error");
			alert("error");
		})
	}

	function colocarCategorias(){
		var salida = '<div id="divIds" class="form-row">';
		salida+= '<div class="form-group col-md-12">';
		salida+= '<label for="cmbParametro">Categoria</label>';
		salida+= '<select id="cmbParametro" class="custom-select">';
		salida+= '<option>Hardware</option>';
		salida+= '<option>Software</option>';
		salida+= '</select></div></div>';
		$("#divIds").replaceWith(salida);
	}

	function bloquear(para){
		if(para==1){
			$("#lblPara1").hide();
			$("#lblPara2").hide();
			$("#txtParametro").hide();
			$("#txtParametro2").hide();
		}
		else{
			$("#lblPara1").show();
			$("#lblPara2").show();
			$("#txtParametro").show();
			$("#txtParametro2").show();
		}
	}