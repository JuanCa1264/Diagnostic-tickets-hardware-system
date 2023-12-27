<?php

	require_once('../dao/Diagnosticos.dao.php');
	require_once('scripts.php');
	require_once"../controladores/controladorSesion.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulario de Diagnosticos</title>
</head>
<style type="text/css">

	label{
		font-weight: bold;
	}

	#contenedorForm{
		color: black;
	}


	body{
		background-color:  #F1F0F0;
	}

</style>
<script type="text/javascript" src="../js/formDiagnosticos.validaciones.js"></script>

<body><!--oncontextmenu="return false" onkeydown="return false" bloquear teclado y click derecho-->
	<div class="container-fluid">
		<div class="row">

			<div class="col-xs-12 col-sm-12 col-md-12 "><!--inicia contenedor del contenido externo-->
		
				<div class="row"><!--inicia fila que divide la barra lateral con el formulario-->
					<div id="contenedorForm" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!--inicia contenedor del formulario-->
						<form id="formDiagnosticos" action="../controladores/Diagnosticos.controlador.php?a=ingr" method="POST">					
							<div class="form-row">
								<div class="form-group col-md-6">
							    	<br>
							      	<label for="txtFechaAsignacion">Fecha de Asginación</label>
									<input type="date" min="" max=""  class="form-control" id="txtFechaAsignacion" name="fechaAsignacion">
									<div id="mensajeFechaAsignacion" class=""></div>
							    </div>

							    <div class="form-group col-md-6">
							    	<br>
							      	<label for="txtFechaCierre">Fecha de Cierre</label>
									<input disabled type="date" min="" max=""  class="form-control" id="txtFechaCierre" name="fechaCierre">
									<div id="mensajeFechaCierre" class=""></div>
							    </div>
							</div>

							<div class="form-row">
							 	<div class="form-group col-md-6">
							    	<br>
							      	<label for="txtDiagnostico">Diagnostico</label>
							      	<textarea maxlength="150" style="resize: none;" name="diagnostico" id="txtDiagnostico" class="md-textarea form-control" rows="5"></textarea>
							      	<div id="mensajeDiagnostico" class=""></div>
							    </div>

							    <div class="form-group col-md-6">
							    	<br>
							      	<label for="txtSolucion">Solución</label>
							      	<textarea maxlength="150" style="resize: none;" name="solucion" id="txtSolucion" class="md-textarea form-control" rows="5"></textarea>
							      	<div id="mensajeSolucion" class=""></div>
							    </div>
							</div>

							<div class="form-row">

								<div class="form-group col-md-6">
								    <br>
								    <label for="cmbIdTecnico">Nombre del Tecnico</label>
								    <select id="cmbIdTecnico" name="idTecnico" class="custom-select">
										<option disabled selected value="default">--seleccione una opcion--</option>
										<?php foreach (clsDiagnosticosDAO::listarIdTecnicos() as $fila): ?>
											<option value="<?= $fila[0] ?>"><?= $fila[1] ?></option>
										<?php endforeach ?>
									</select>
									<div id="mensajeIdTecnico" class=""></div>
								</div>

								<div class="form-group col-md-6">
								    <br>
								    <label for="cmbIdTicket">Tickets</label>
								    <select id="cmbIdTicket" name="idTicket" class="custom-select">
										<option disabled selected value="default">--seleccione una opcion--</option>
										<?php foreach (clsDiagnosticosDAO::listarIdTicket() as $fila): ?>
											<option value="<?= $fila[0] ?>"><?= $fila[1] ?></option>
										<?php endforeach ?>
									</select>
									<div id="mensajeIdTicket" class=""></div>
								</div>

							</div>


							<div class="form-row">

								<div class="form-group col-md-6">
								    <br>
								    <label for="cmbIdCategoria">Categoria</label>
								    <select id="cmbIdCategoria" name="idCategoria" class="custom-select">
										<option disabled selected value="default">--seleccione una opcion--</option>
										<?php foreach (clsDiagnosticosDAO::listarIdCategoria() as $fila): ?>
											<option value="<?= $fila[0] ?>"><?= $fila[1] ?></option>
										<?php endforeach ?>
									</select>
									<div id="mensajeIdCategoria" class=""></div>
								</div>

								<div class="form-group col-md-6">
							    	<br>
							    	<label for="cmbEstadoDiagnostico">Estado del Diagnostico</label>
							    	<select id="cmbEstadoDiagnostico" name="estadoDiagnostico" class="custom-select">
										<option disabled selected value="default">--seleccione una opcion--</option>
										<option value="Abierto">Abierto</option>
										<option value="Cerrado">Cerrado</option>
									</select>
									<div id="mensajeEstadoDiagnostico" class=""></div>
							    </div>

							</div>

							<br><br>
							<div class="form-row">
								<div style="text-align: center;" class="form-group col-xs-4 col-sm-4 col-md-4">
									<input type="submit" class="btn btn-dark" name="enviar" value="Agregar">
								</div>
								<div style="text-align: center;" class="form-group col-xs-4 col-sm-4 col-md-4">
									<input id="resetear" type="reset" class="btn btn-dark" name="borrar" value="Borrar">
								</div>
								<div style="text-align: center;" class="form-group col-xs-4 col-sm-4 col-md-4">
									<button type="button" class="btn btn-dark" data-dismiss="modal">Regresar</button>
								</div>
							</div>
						</form><br>	
					</div><!--termina contenedor del formulario-->
				</div><!--termina fila que divide la barra lateral con el formulario-->
			</div><!--termina contenedor del contenido interno-->
		</div><!--termina la row mas externa-->
	</div><!--termina el container-fluid mas externo-->	

</body>
</html>