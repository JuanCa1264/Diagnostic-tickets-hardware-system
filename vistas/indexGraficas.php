<?php  
	require_once "scripts.php";
	require_once"../controladores/controladorSesion.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Index de Graficas</title>
</head>
<style type="text/css">

	body{
		background-color:  #F1F0F0;
	}

	#contenedorTabla{
		height: 500px;
		overflow: scroll;
	}	
	

	#dgv th,td{
		text-align: center;
	}

</style>
<script type="text/javascript" src="../js/indexDepartamento.js"></script>
<script type="text/javascript">
	var valor = $("#cmbFiltro").val();
	var ruta = "indexGraficasTicket.php";
	$(document).ready(function(){

		$("#cmbFiltro").change(function(){
			valor = parseInt($(this).val());
			if(valor==2){
				ruta = "indexGraficasDepto.php";
			}
			else if(valor==1){
				ruta = "indexGraficasTicket.php";
			}
		});

		$("#director").click(function(){
			$("#director").attr('href',ruta);
			if(valor==""){
				Swal.fire({
					title: 'Error',
					type: 'error',
					text: 'Seleccione una opción para visualizar una gráfica',
					showConfirmButton: true,
					timer: 2000,
				});
				return false;
			}
		});


	});
</script>
<body>
		<div class="container-fluid"><!--inicia el contenedor fluido-->

		<div class="form-group col-xs-12 col-sm-12 col-md-12 container-fluid">
			<div class="jumbotron">
				<h2 style="text-align: center;">Bienvenido al sistema de gráficos</h2>
				<hr class="my-4">
				<p style="text-align: center;" class="lead">Seleccione el tipo de gráfica que desea visualizar y haga click en el botón de "visualizar gráfica"</p>								
			</div>
		</div>

		<div class="row"><!--inicia primera fila-->
			<div class="col-xs-12 col-md-12 col-sm-12 col-sm-12">
				<br><br><form id="formBusqueda">
					<div class="form-row">
						<div class="form-group col-xs-12 col-sm-12 col-md-10">
							<select id="cmbFiltro" name="filtro" class="custom-select">
									<option value="1">Tipo</option>
									<option value="2">Departamento</option>
							</select>
						</div>
						<div class="form-group col-xs-12 col-sm-2 col-md-2">
							<input type="hidden" id="estado" value="">
							<a id="director" href="" target="_blank" class="btn btn-primary">Visualizar gráfica</a>
						</div>
				</form>
			</div>
		</div><!--termina la primera fila-->
	</div><!--termina el contenedor fluido-->

</body>
</html>