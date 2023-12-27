<?php
	require_once('../dao/DiagnosticosTec.dao.php');
	require_once('scripts.php');
	require_once"../controladores/controladorSesion.php";

if(isset($_POST['id'])){
	$obj = clsDiagnosticosDAO::buscarPorId($_POST['id']);

	$salida = '<!DOCTYPE html>
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
	<script type="text/javascript" src="../js/formDiagnosticosTec.validaciones.js"></script>
	<script type="text/javascript">

		$(document).ready(function(){
			var aux = $("#catS").val();
			if(aux!=""){
				$("#cmbIdCategoria").val(aux);	
			}					
		});

	</script>

	<body>
		<div class="container-fluid">
			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-12"></div>

				<div class="col-xs-12 col-sm-12 col-md-12 "><!--inicia contenedor del contenido externo-->
					<div class="row"><!--inicia fila que divide la barra lateral con el formulario-->
						<div id="contenedorForm" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!--inicia contenedor del formulario-->
							<form id="formDiagnosticos" action="../controladores/DiagnosticosTec.controlador.php?a=edit" method="POST">	
							<div class="form-row">

								<div class="form-group col-md-6">
								    <br>
								    <input type="hidden" name="id" value="'. $obj[0] .'">
								    <label for="cmbIdCategoria">Categoria</label>
								    <select id="cmbIdCategoria" name="idCategoria" class="custom-select">
										<option disabled selected value="">--seleccione una opcion--</option>';
											foreach (clsDiagnosticosDAO::listarIdCategoria() as $fila):
													$salida.=	'<option value="'.$fila[0].'">'.$fila[1].'</option>';
											endforeach;


											$salida.= '
									</select>
									<div id="mensajeIdCategoria" class=""></div>
								</div>

								<div class="form-group col-md-6">
							    	<br>
							    	<label for="cmbEstadoDiagnostico">Estado del Diagnostico</label>
							    	<input type="hidden" id="catS"  value="'. $obj[3] .'">
							    	<input type="hidden" id="estadoSeleccionado" value="'.$obj[4].'">
							    	<select id="cmbEstadoDiagnostico" name="estadoDiagnostico" class="custom-select">
										<option value="Abierto">Abierto</option>
										<option value="Cerrado">Cerrado</option>
									</select>
									<div id="mensajeEstadoDiagnostico" class=""></div>
							    </div>
							</div>
							<div class="form-row">
							 	<div class="form-group col-md-6">
							    	<br>
							      	<label for="txtDiagnostico">Diagnostico</label>
							      	<textarea maxlength="150" style="resize: none;" name="diagnostico" id="txtDiagnostico" class="md-textarea form-control" rows="5">'.$obj[1].'</textarea>			
							      	<div id="mensajeDiagnostico" class=""></div>
							    </div>

							    <div class="form-group col-md-6">
							    	<br>
							      	<label for="txtSolucion">Solución</label>
							      	<textarea maxlength="150" style="resize: none;"  name="solucion" id="txtSolucion" class="md-textarea form-control" rows="5">'.$obj[2].'</textarea>
							      	<div id="mensajeSolucion" class=""></div>
							    </div>
							</div>
								<br><br>
								<div class="form-row">
									<div style="text-align: center;" class="form-group col-xs-6 col-sm-6 col-md-6">
										<input type="submit" class="btn btn-dark" name="enviar" value="Modificar">
									</div>
									<div style="text-align: center;" class="form-group col-xs-6 col-sm-6 col-md-6">
										<a href="dashboard.php" class="btn btn-dark">Regresar</a>
									</div>
								</div>
							</form><br>	
						</div><!--termina contenedor del formulario-->
					</div><!--termina fila que divide la barra lateral con el formulario-->
				</div><!--termina contenedor del contenido interno-->
			</div><!--termina la row mas externa-->
		</div><!--termina el container-fluid mas externo-->	

	</body>
	</html>';

	echo $salida;
}	
?>