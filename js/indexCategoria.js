var parametro = 1;
var valor = "";

$(document).ready(function(){
	buscarDatos();

	$("#cmbFiltro").change(function(){
		parametro = $(this).val();
		if(parametro==1){
			buscarDatos();
			$("#parametroBusqueda").val("");
			$("#parametroBusqueda").prop('disabled',true);
		}else if(parametro!=1){
			$("#parametroBusqueda").prop('disabled', false);
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
			}else if(valor==""){
				parametro = 1;
				buscarDatos();
				parametro = 3;
			}
		}
		if(parametro==4){
			if(valor!="" && isNaN(valor)){
				buscarDatos();
			}else if(valor==""){
				parametro = 1;
				buscarDatos();
				parametro = 4;
			}
		}
	});

	$("body #contenedorTabla table").on("click","a", function(e){
        //e.preventDefault();
        var clase = $(this).attr("class");
        var modificar = clase.substring(0,9);
        var eliminar = clase.substring(0,8);

        if(eliminar=="eliminar"){
        	var id = $(this).attr('id');
            eliminarRegistro(id);
        }

        else if(modificar=="modificar"){
        	var valores = $(this).attr('id');
        	modificarRegistro(valores);
        }  
    });

});

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

function buscarDatos(){
      $.ajax({
        url: '../dao/Categoria.dao.php',
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

function eliminarRegistro(id){
	Swal.fire({
        title: '¿Desea eliminar el registro?',
        text: "Una vez eliminado, no será capaz de recuperar el registro!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, deseo eliminarlo!'
    }).then((result) => {
        if (result.value) {
	        var array = id.split(".");
	        id = array[0];
	        id= '../controladores/Categoria.controlador.php?a=elim&idCategoria=' + id;
	       location.href=id;
        }//termina if
        else{
        }
    });
}//termina funcion eliminar


function modificarRegistro(valores){
    var id="";
    var arreglo = valores.split(".");
    for(var i =0; i<arreglo.length; i++){
       	if(i==0){
            id = arreglo[i];
        }
    }
    cargar2(id);
}

function cargar(){      
    $.ajax({                
        url: 'formCategoria.php',
        success: function(response){                                    
        	$('#resultado').load('formCategoria.php');
        }
    });
}

function cargar2(id){
    $.ajax({
        url: 'formModificarCategoria.php',
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