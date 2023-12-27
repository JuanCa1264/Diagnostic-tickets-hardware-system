var parametro =1;
var valor = "";
var estado = "input";

$(document).ready(function(){

	buscarDatos();

	$("#cmbFiltro").change(function(){
		parametro = $(this).val();
		if(parametro==1){
			buscarDatos();
			$("#parametroBusqueda").val("");
			$("#parametroBusqueda").prop('disabled',true);
		}
		else if(parametro!=1){
			$("#parametroBusqueda").prop('disabled',false);
		}
	});

	$("#parametroBusqueda").keyup(function(){
		valor = $(this).val();
		if(parametro==2){
			if(valor!="" && !(isNaN(valor))){
				buscarDatos();
			}
			else if(valor==""){
				parametro = 1;
				buscarDatos();
				parametro = 2;
			}
		}
		if(parametro==3){
			if(valor!="" && isNaN(valor)){
				buscarDatos();
			}
			else if(valor==""){
				parametro = 1;
				buscarDatos();
				parametro = 3;
			}
		}
	});


$("body #contenedorTabla table").on("click","a", function(e){
        //e.preventDefault();
        var clase = $(this).attr("class");
        var modificar = clase.substring(0,9);
        if(modificar=="modificar"){
            var valores = $(this).attr('id');
            var id="";
            var usuario = "";
            var arreglo = valores.split(".");
            for(var i =0; i<arreglo.length; i++){
                if(i==0){
                    id = arreglo[i];
                }
                else if(i==1){
                    usuario = arreglo[i];
                }
            }
            cargar2(id, usuario);
        }  
    });

});

function buscarDatos(){
        
    	$.ajax({
    		url: '../dao/DiagnosticosTec.dao.php',
    		type: 'POST',
    		dataType: 'html',
    		data: {consulta: parametro, valor: valor},
    	})
    	.done(function(respuesta){
    		$("#cuerpoTabla").replaceWith(respuesta);
            imprimirAltura();
    	})
    	.fail(function(){
    		console.log("Error");
    	})
}


 function cargar2(id, usuario){
        $.ajax({
            url: 'formModificarDiagnosticosTec.php',
            type: 'POST',
            dataType: 'html',
            data: {id: id},
        })
        .done(function(respuesta){
            $('#resultado2').replaceWith(respuesta);
        })
        .fail(function(){
            console.log("Error");
        })
    }

function imprimirAltura(){
        var altura = $("#dgv").css('height');
        var array = altura.split(".");
        for (var i = 0; i < array.length; i++) {
            if(i==0){
                altura = parseInt(array[i]);
            }
        }
        if(altura<=425){
            altura+=50;
            $("#contenedorTabla").css('height',altura);
        }
        else{
            $("#contenedorTabla").css('height','425px');
        }
}


