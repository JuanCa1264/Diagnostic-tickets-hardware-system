<?php
	require_once('../dao/Diagnosticos.dao.php');
	require_once('scripts.php');
	require_once"../controladores/controladorSesion.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Index de Diagnosticos</title>
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
<script type="text/javascript" src="../js/indexDiagnosticos.js"></script>

<body>
	<div class="container-fluid"><!--inicia el contenedor fluido-->
		<div class="row"><!--inicia primera fila-->
			<div class="col-xs-12 col-md-12 col-sm-12 col-sm12">
				<br><h1 style="text-align: center;">Diagnosticos &nbsp<span class="fas fa-clipboard-list"></span></h1><br>
				<form id="formBusqueda">
					<div class="form-row">
						<div class="form-group col-xs-12 col-sm-12 col-md-4">
							<select id="cmbFiltro" name="filtro" class="custom-select">
								<option disabled selected>--Filtrar Por--</option>
								<option value="1">Todos</option>
								<option value="2">Id</option>
								<option value="3">Estado</option>
							</select>
						</div>
						<div class="form-group col-xs-10 col-sm-10 col-md-8">
							<input type="text" class="form-control" id="parametroBusqueda" name="parametroBusqueda" placeholder="Buscar">						    	
						</div>
					</div>	
					<div class="form-row">
						<div class="form-group col-xs-4 col-sm-4 col-md-4">
							<span class="btn btn-primary" id="ingresar"  data-toggle="modal" data-target="#agregarModal" onclick="cargar()">Ingresar Nuevo Diagnostico <span class="fas fa-user-plus"></span>
							</span>
						</div>
					</div>		
				</form>
			</div>
		</div><!--termina la primera fila-->

		<div class="row"><!--inicia segunda fila-->
			<div id="contenedorTabla" class="table-responsive"><!--inicia contenedor de la tabla-->
				<table id="dgv" class="table  table-hover table-dark">
					<thead>
						<tr class="bg-primary">
							<th scope="col">ID</th>
							<th scope="col">Fecha Asignación</th>
							<th scope="col">Fecha Finalizacion</th>
							<th scope="col">Diagnostico</th>
							<th scope="col">Solución</th>
							<th scope="col">Tecnico</th>
							<th scope="col">Ticket</th>
							<th scope="col">Categoria</th>
							<th scope="col">Estado</th>
							<th colspan="2" scope="col">Opciones de<br>Manipulacion</th>
						</tr>
					</thead>
					<tbody id="cuerpoTabla">
						
					</tbody>
				</table>
			</div><!--termina contenedor de la tabla-->
		</div><!--termina segunda fila-->
	</div><!--termina el contenedor fluido-->

	<!-- Modal Agregar -->
	<div class="modal fade" id="agregarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ingresar Nuevo Diagnostico</h5>
					
				</div>
				<div class="modal-body">
					<div id="resultado">
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Editar -->
	<div class="modal fade" id="agregarModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modificar Diagnostico</h5>
					
				</div>
				<div class="modal-body">
					<div id="resultado2">
						
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
