<?php
	require_once('../dao/Diagnosticos.dao.php');
	require_once('scripts.php');
	require_once"../controladores/controladorSesion.php";

if(isset($_POST['id'])){
	$obj = clsDiagnosticosDAO::buscarPorId($_POST['id']);
	echo "<script>var tecnico = '". $obj[1] ."';</script>";

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
	<script type="text/javascript" src="../js/formDiagnosticos.validaciones.js"></script>
	<script type="text/javascript">

		$(document).ready(function(){		
			$("#cmbIdTecnico").val(tecnico);
		});

	</script>

	<body>
		<div class="container-fluid">
			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-12"></div>

				<div class="col-xs-12 col-sm-12 col-md-12 "><!--inicia contenedor del contenido externo-->
					<div class="row"><!--inicia fila que divide la barra lateral con el formulario-->
						<div id="contenedorForm" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!--inicia contenedor del formulario-->
						<form action="../controladores/Diagnosticos.controlador.php?a=edit" method="POST">
							<div class="form-row">
								<div class="form-group col-md-6">
								    <br>
								    <input type="hidden" name="id" value="'. $obj[0] .'" >
								    <label for="cmbIdTecnico">Nombre del Tecnico</label>
								    <select id="cmbIdTecnico" name="idTecnico" class="custom-select">
										<option disabled selected value="default">--seleccione una opcion--</option>';
											foreach (clsDiagnosticosDAO::listarIdTecnicos() as $fila):
													$salida.=	'<option value="'.$fila[0].'">'.$fila[1].'</option>';
													endforeach;
											$salida.= '
									</select>
									<div id="mensajeIdTecnico" class=""></div>
								</div>

								<div class="form-group col-md-6">
								    <br>
								    <label for="cmbIdTicket">Tickets</label>
								    <select disabled id="cmbIdTicket" name="idTicket" class="custom-select">
										<option disabled selected value="default">--seleccione una opcion--</option>';
											foreach (clsDiagnosticosDAO::listarIdTicket() as $fila):
													$salida.=	'<option value="'.$fila[0].'">'.$fila[1].'</option>';
													endforeach;


											$salida.= '
									</select>
									<div id="mensajeIdTicket" class=""></div>
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