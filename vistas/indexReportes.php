<?php  
require_once "scripts.php";
/*require_once"../controladores/controladorsesion.php";
if ($_SESSION['rol']=="Cliente"){
  header("location: dashboard.php");
}*/
?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulario de Reportes</title>
</head>
<style type="text/css">
label{
	font-weight: bold;
}
#contenedorForm{
	color: black;
}
#contenedorTabla{
	color: black;
	height: 300px; 
	overflow: scroll;	
}
body{
	background-color:  #F1F0F0;
}
#contenedorTabla #dgv th{
	cursor: pointer;
}
</style>
<script type="text/javascript" src="../js/indexReportes.js"></script>
<body>
	<div class="form-group col-xs-12 col-sm-12 col-md-12 container-fluid">
		<div class="jumbotron">
			<h2 style="text-align: center;">Bienvenido al sistema de Reportes</h2>
			<hr class="my-4">
			<p style="text-align: center;" class="lead">Seleccione el tipo de reporte que desea generar, e introduzca los parámetros que sean necesarios</p>								
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 "><!--inicia contenedor del contenido externo-->
				
				<div class="row"><!--inicia fila que divide la barra lateral con el formulario-->
					<div id="contenedorForm" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!--inicia contenedor del formulario-->
						<form id="formReportes" action="" method="POST" enctype="multipart/form-data" target="_blank">	
							<div class="form-row">
								<div class="form-group col-md-12">

									<label for="cmbReporte">Tipo de reporte</label>
									<select class="custom-select" id="cmbReporte" name="rol">
										<option disabled selected>--Seleccione un tipo de reporte--</option>
										<option value="r1">Tickets cerrados en un rango de fechas</option>
										<option value="r2">Tickets abiertos en un rango de fechas</option>
										<option value="r3">Por Hardware o Software</option>
										<option value="r4">Por categoría de problema</option>
										<option value="r5">Por departamento</option>
										<option value="r6">Por técnico</option>
									</select>
									<div id="mensajeRol" class=""></div><br><br>
								</div>
							</div>				
							<div class="form-row">
								<div class="form-group col-md-6">
									<label id="lblPara1" for="txtParametro">Parametro 1</label>
									<input placeholder="" disabled type="text" class="form-control" id="txtParametro" name="" >
									<div id="mensajeParametro" class=""></div>
								</div>
								<div class="form-group col-md-6">
									<label id="lblPara2" for="txtParametro2">Parametro 2</label>
									<input placeholder="" disabled type="text" class="form-control" id="txtParametro2" name="">
									<div id="mensajeParametro2" class=""></div>
								</div>
							</div>
							<div id="divIds"></div>
							<br><br>												  
							<div class="row">
								<div style="text-align: center;" class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<input type="submit" value="Generar reporte" id="enviar" name="enviar" class="btn btn-primary">
								</div>
								<div style="text-align: center;" class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<input id="resetear" type="reset" value="Borrar" name="borrrar" class="btn btn-primary">
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