<?php  
require_once('../dao/Usuarios.dao.php');
require_once"../controladores/controladorSesion.php";
require_once "scripts.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulario de Usuarios</title>
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
<script type="text/javascript" src="../js/formUsuarios.validaciones.js"></script>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 "><!--inicia contenedor del contenido externo-->
				
				<div class="row"><!--inicia fila que divide la barra lateral con el formulario-->
					<div id="contenedorForm" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!--inicia contenedor del formulario-->
						<form id="formUsuarios" action="../controladores/Usuario.controlador.php?a=ingr&origen=$origen" method="POST" enctype="multipart/form-data">					
							<div class="form-row">
							    <div class="form-group col-md-12">
							    	<br>
							      	<label for="txtUsername">Usuario</label>
							      	<input placeholder="Usuario" type="text" class="form-control" id="txtUsername" name="username">
							      	<div id="mensajeUsername" class=""></div>
							    </div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-6">
							    	<br>
							      	<label for="txtPassword">Contraseña</label>
							      	<input placeholder="Contraseña" type="password" class="form-control" id="txtPassword" name="password">
							      	<div id="mensajePassword" class=""></div>
							    </div>

							    <div class="form-group col-md-6">
							    	<br>
							      	<label for="txtConfirmPassword">Confirmar Contraseña</label>
							      	<input placeholder="Confirmar Contraseña" type="password" class="form-control" id="txtConfirmPassword" name="confirmPassword">
							      	<div id="mensajeConfirmPassword" class=""></div>
							    </div>
							</div>
							
							<div class="form-row">
							    <div class="form-group col-md-6">
							    	<br>
							      	<label for="cmbRol">Rol</label>
							      	<select class="custom-select" id="cmbRol" name="rol">
							      		<option disabled selected>--Seleccione una opción--</option>
							      		<option value="Administrador">Administrador</option>
							      		<option value="Cliente">Cliente</option>
							      		<option value="Tecnico">Tecnico</option>
							      	</select>
							      	<div id="mensajeRol" class=""></div><br><br>
							    </div>

							      <div class="form-group col-md-6">
							    	<br>
							      	<label for="avatar">Avatar</label>
							      	<input type="file" class="form-control" id="avatar" name="avatar">
							      	<div id="mensajeAvatar" class=""></div><br><br>
							    </div>
							</div>						  
							<div class="row">
							    <div style="text-align: center;" class="form-group col-xs-6 col-sm-6 col-md-3 col-lg-4">
							    	<input type="submit" value="Agregar" name="enviar" class="btn btn-dark">
							    </div>
							    <div style="text-align: center;" class="form-group col-xs-6 col-sm-6 col-md-3 col-lg-4">
							    	<input id="resetear" type="reset" value="Borrar" name="borrrar" class="btn btn-dark">
							    </div>
							    <div style="text-align: center;" class="form-group col-xs-6 col-sm-6 col-md-3 col-lg-4">
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