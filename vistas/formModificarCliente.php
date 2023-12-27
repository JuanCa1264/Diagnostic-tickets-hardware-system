<?php  
require_once('../dao/Clientes.dao.php');
require_once"../controladores/controladorSesion.php";
require_once "scripts.php";

if(isset($_POST['id'])){
		$obj = clsClienteDao::obtenerRegistroPorId($_POST['id']);
		echo "<script>var tipo = '". $obj[1] ."';</script>";
		echo "<script>var us = '". $obj[7] ."';</script>";
		echo "<script>var dep = '". $obj[6] ."';</script>";
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulario de Clientes</title>
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
<script type="text/javascript" src="../js/formCliente.validaciones.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#cmbTipo").val(tipo);
		$("#txtDepartamento").val(dep);
		$("#usuarioC").val(us);
		
		$(document).keydown(function(e){ 
        	if (e.keyCode == 27){
        		location.reload();
        	}  
    	});

	});
</script>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 "><!--inicia contenedor del contenido externo-->
				
				<div class="row"><!--inicia fila que divide la barra lateral con el formulario-->
					<div id="contenedorForm" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!--inicia contenedor del formulario-->
						<form id="formClientes" action="../controladores/Cliente.controlador.php?a=edit" method="POST">					
							<div class="form-row">
							    <div class="form-group col-md-12">
							    	<br>
							    	<input type="hidden" value="<?=$obj[0]?>" name="idCliente">
							      	<label for="txtNombre">Nombre Completo</label>
							      	<input placeholder="Nombre" type="text" class="form-control" id="txtNombre" name="nombre" value="<?=$obj[1]?>">
							      	<div id="mensajeNombre" class=""></div>
							    </div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-6">
							    	<br>
							      	<label for="txtFecha">Fecha de nacimiento</label>
							      	<input type="date" class="form-control" id="txtFecha" name="fecha" value="<?=$obj[2]?>">
							      	<div id="mensajeFecha" class=""></div>
							    </div>

							    <div class="form-group col-md-6">
							    	<br>
							      	<label for="txtDireccion">Dirección</label>
							      	<input placeholder="Dirección actual" type="text" class="form-control" id="txtDireccion" name="direccion" value="<?=$obj[3]?>">
							      	<div id="mensajeDireccion" class=""></div>
							    </div>
							</div>

							<div class="form-row">
							<div class="form-group col-md-6">
							    	<br>
							      	<label for="txtTelefono">Teléfono</label>
							      	<input placeholder="Ej. 7809-0932" type="text" class="form-control" id="txtTelefono" name="telefono" value="<?=$obj[4]?>">
							      	<div id="mensajeTelefono" class=""></div>
							    </div>
							
							
							<div class="form-group col-md-6">
							    	<br>
							      	<label for="txtDui">DUI</label>
							      	<input placeholder="Ej. 98430940-0" type="text" class="form-control" id="txtDui" name="dui" value="<?=$obj[5]?>">
							      	<div id="mensajeDui" class=""></div>
							    </div>
							</div>

							<div class="form-row">
							    <div class="form-group col-md-6">
							    	<br>
							      	<label for="txtDepartamento">Departamento</label>
							      	<select class="custom-select" id="txtDepartamento" name="departamento">
							      		<option disabled selected value="">--Seleccione una opción--</option>
							      		<?php foreach(clsClienteDao::listarDepartamentos() as $fila): ?>
							      			<option value="<?=$fila[0]?>"><?=$fila[1]?></option>
							      		<?php endforeach?>
							      	</select>
							      	<div id="mensajeDepartamento" class=""></div><br><br>
							    </div>

							      <div class="form-group col-md-6">
							    	<br>
							      	<label for="usuarioC">Identificador de usuario</label>
							      	<select class="custom-select" id="usuarioC" name="usuario">
							      		<option disabled selected value="">--Seleccione una opción--</option>
							      		<?php foreach(clsClienteDao::listarUsuariosMod($obj[7]) as $fila): ?>
							      			<option value="<?=$fila[0]?>"><?=$fila[1]?></option>
							      		<?php endforeach?>
							      	</select>
							      	<div id="mensajeUsuarioC" class=""></div><br><br>
							    </div>
							</div>	
							
							<div class="form-row">
								<div style="text-align: center;" class="form-group col-xs-4 col-sm-4 col-md-4">
									<input type="submit" class="btn btn-dark" name="enviar" value="Modificar">
								</div>
								<div style="text-align: center;" class="form-group col-xs-4 col-sm-4 col-md-4">
									<input id="resetear" type="reset" class="btn btn-dark" name="borrar" value="Resetear">
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