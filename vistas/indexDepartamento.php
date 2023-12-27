<?php  
	require_once('../dao/Departamento.dao.php');
	require_once "scripts.php";
	require_once"../controladores/controladorSesion.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Index de Departamentos</title>
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
<body>
		<div class="container"><!--inicia el contenedor fluido-->
		<div class="row"><!--inicia primera fila-->
			<div class="col-xs-12 col-md-12 col-sm-12 col-sm-12">
				<br><br><form id="formBusqueda">
					<div class="form-row">
						<div class="form-group col-xs-12 col-sm-12 col-md-4">
							<select id="cmbFiltro" name="filtro" class="custom-select">
									<option disabled selected>--Filtrar Por--</option>
									<option value="1">Todos</option>
									<option value="2">Id</option>
									<option value="3">Nombre</option>
							</select>
						</div>
						<div class="form-group col-xs-10 col-sm-10 col-md-8">
							<input type="text" class="form-control" id="parametroBusqueda" name="parametroBusqueda" placeholder="Buscar">						    	
						</div>
					</div>	
					<div class="form-row">
						<div class="form-group col-xs-4 col-sm-4 col-md-4">
							<span class="btn btn-primary"  data-toggle="modal" data-target="#agregarModal" onclick="cargar()">Ingresar Nuevo Departamento <span class="fas fa-user-plus"></span>
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
							    <th scope="col">Nombre</th>
							    <th scope="col">Descripcion</th>
							    <th scope="col" colspan="2">Opciones</th>
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
					<h5 class="modal-title" id="exampleModalLabel">Ingresar Nuevo Departamento</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
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
					<h5 class="modal-title" id="exampleModalLabel">Modificar Departamento</h5>
				</div>
				<div class="modal-body">
					<div  id="resultado2">
						
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>