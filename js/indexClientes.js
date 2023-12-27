var parametro = 1;
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
		}else if(parametro!=1){
			$("#parametroBusqueda").prop('disabled', false);
		}
	});

	$("#parametroBusqueda").keyup(function(){
		valor = $(this).val();
		if(parametro==2){
			if(valor!=""){
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
			if(valor!=""){
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
                var id = $(this).attr('id');
                var array = id.split(".");
                id = array[0];
                id= '../controladores/Cliente.controlador.php?a=elim&IdCliente=' + id;
               Swal.fire({
                  title: 'Eliminado!',
                  text: 'El registro ha sido eliminado satisfactoriamente.',
                  type: 'success',
                  showConfirmButton: false,
                });
                setTimeout(function(){
                    location.href=id;
                }, 1000);
                //termina if
              }
              else{
              }
            });
        }

        else if(modificar=="modificar"){
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
            cargarCliente2(id, usuario);
        }  
    });

});

 function buscarDatos(){
      $.ajax({
        url: '../dao/Clientes.dao.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: parametro, valor: valor},
      })
      .done(function(respuesta){
        $("#cuerpoTablaClientes").replaceWith(respuesta);
            imprimirAltura();
      })
      .fail(function(){
        console.log("Error");
      })
}

function cargarCliente(){      
        $.ajax({                
            url: 'formClientes.php',
            success: function(response){                                    
                $('#resultado').load('formClientes.php');
            }
    });
}

function cargarCliente2(id){
    $.ajax({
        url: 'formModificarCliente.php',
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



	 