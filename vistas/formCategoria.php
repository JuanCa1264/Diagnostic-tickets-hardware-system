<?php
	require_once('../dao/Categoria.dao.php');
	require_once('scripts.php');
	require_once"../controladores/controladorSesion.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulario de Contratos</title>
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
<script type="text/javascript" src="../js/formCategoria.validaciones.js"></script>
<script type="text/javascript" src="../js/formContrato.validaciones.js"></script>

<body><!--oncontextmenu="return false" onkeydown="return false" bloquear teclado y click derecho-->
	<div class="container-fluid">
		<div class="row">

			<div class="col-xs-12 col-sm-12 col-md-12 "><!--inicia contenedor del contenido externo-->
		
				<div class="row"><!--inicia fila que divide la barra lateral con el formulario-->
					<div id="contenedorForm" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!--inicia contenedor del formulario-->
						<br><form id="formCategoria" action="../controladores/Categoria.controlador.php?a=ingr" method="POST">					
							<div class="form-row">
								<div class="form-group col-md-4">
							    	<br>
							      	<label for="cmbTipo">Tipo</label>
									<select class="custom-select" name="tipo" id="cmbTipo">
										<option value="Hardware">Hardware</option>
										<option value="Software">Software</option>
									</select>
									<div id="mensajeTipo" class=""></div>
							    </div>
							    <div class="form-group col-md-8">
							    	<br>
							      	<label for="txtNombre">Nombre</label>
									<input maxlength="50" type="text" class="form-control" id="txtNombre" name="nombre">
									<div id="mensajeNombre" class=""></div>
							    </div>
							</div>

							<div class="form-row">
							    <div class="form-group col-md-12">
							    	<br>
							    	<label for="txtDescripcion">Descripción</label>
							    	<textarea maxlength="150" style="resize: none;" name="descripcion" id="txtDescripcion" class="md-textarea form-control" rows="5"></textarea>
							    	<div id="mensajeDescripcion" class=""></div>
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
									<button type="button" onclick="location.reload()" class="btn btn-dark" data-dismiss="modal">Regresar</button>
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