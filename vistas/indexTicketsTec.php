<?php  
	require_once('../dao/DiagnosticosTec.dao.php');
	require_once "scripts.php";
	require_once"../controladores/controladorSesion.php";
	//echo "<script>var idPersona = '". $_SESSION['idPersona'] ."';</script>";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Index de Categorias</title>
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
<body>
	<div class="container-fluid">
		<div class="row"><!--inicia segunda fila-->
			<div id="contenedorTabla" class="table-responsive"><!--inicia contenedor de la tabla-->
				<br><br><table id="dgv" class="table  table-hover table-dark">
					  <thead>
						    <tr class="bg-primary">
							    <th scope="col">Id</th>
							    <th scope="col">Fecha Creacion</th>
							    <th scope="col">Asunto</th>
							    <th scope="col">Descripcion</th>
						    </tr>
					  </thead>
					  <tbody id="cuerpoTabla">
						<?php foreach(clsDiagnosticosDAO::listarTickets() as $fila): ?>
							<tr>
								<th style="width: 5%;"><?=$fila[0]?></th>
								<td style="width: 10%;"><?=date("d/m/Y h:i A", strtotime($fila[1])); ?></td>
								<td style="width: 15%;"><?=$fila[2]?></td>
								<td style="text-align: justify; width: 70%;"><?=$fila[3]?></td>
							</tr>
						<?php endforeach ?>
					  </tbody>
				</table>
			</div><!--termina contenedor de la tabla-->
		</div><!--termina segunda fila-->
	</div><!--termina el contenedor fluido-->

</body>
</html>