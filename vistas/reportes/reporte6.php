<?php
	require 'dompdf/vendor/autoload.php';
	use Dompdf\Dompdf;
	require_once('../../modelos/clsConexion.php');
	require_once('../scripts.php');
	//1.22 cm de margen 2.44 total     21 x 29.7   (27,26 disponible)
	$tec = $_GET['tec'];
	ini_set('date.timezone', 'America/El_Salvador');
	$fechaLocal = date('d/m/Y',time());
	$horaLocal = date('h:i:s A',time());
$salida='
<!DOCTYPE html>
<html>
<head>
	<title>Reporte pdf</title>
	<meta charset="utf-8">
</head>
<style>
	footer .page-number:after { content: counter(page); }
	
	body{
		background-color: white;
		font-family: Arial;
	}

	section{
		margin: 5px auto;
		width: 700px;
	}

	#datos{
		width: 100%;
		background-color: white;
		border-collapse: collapse;
	}

	#datos th,td{
		padding: 5px;
	}

	#datos th{
		font-size: 14px;
	}

	#datos td{
		font-size: 12px;
	}

	#datos thead{
		background-color: #246355;
		border-bottom: solid 5px #0F362D;
		color: white;
	}

	#datos tr:nth-child(even){
		background-color: #ddd;
	}

	#encabezado{
		width: 100%;
		background-color: white;
		border-collapse: collapse;
	}

	footer{
		text-align: left;
		font-size: 10px;
	}

</style>
<body>
<section>
	<table id="encabezado">
	<tr>
		<td style="width: 10%;"><img src="../../imagenes/logo.png" height="55px" width="110px"></td>
		<td style="width: 75%; font-size: 28px; font-weight: bold;"><span style="margin-left: 1.5%;">Reporte de Tickets Cerrados por técnico</span></td>
		<td style="width: 15%; text-align: center;"><b style="font-size: 13px;">'. $fechaLocal . "<br>" . $horaLocal .'</b></td>
	</tr>
	<tr>
		<td style="text-align: left;" colspan="3"><br>Reportes de tickets cerrados según técnico</td>
	</tr>
	</table><br>

	<table id="datos">
		<thead>
			<tr style="text-align: center;">
		      <th>ID</th>
		      <th>Cliente</th>
		      <th>Departamento</th>
		      <th>Asunto</th>
		      <th>Técnico asignado</th>
		      <th>Estado</th>
		    </tr>
	    </thead>
	';
	$con = new clsConexion();
	$query = "SELECT T.idTicket, C.nombreCompleto, W.nombre, T.asunto, E.nombreCompleto, D.estadoDiagnostico FROM ticket as T INNER JOIN cliente as C INNER JOIN departamento as W INNER JOIN diagnostico as D INNER JOIN tecnicos as E INNER JOIN categoria as U WHERE T.idCliente=C.idCliente AND D.idTicket=T.idTicket AND D.idTecnico = E.idTecnico AND U.idCategoria = D.idCategoria AND C.idDepartamento = W.idDepartamento AND T.estado!=0 AND E.idTecnico='". $tec ."'";

	$contenedor = $con->ejecutarConsulta($query);
	$con->cerrarConexion();

	foreach ($contenedor as $fila) {
		$salida.= '<tr>';
		$salida.='<td style="text-align: center;">'. $fila[0] .'</td>';
		$salida.='<td style="text-align: center;">'. $fila[1] .'</td>';
		$salida.='<td style="text-align: center;">'. $fila[2] .'</td>';
		$salida.='<td style="text-align: center;">'. $fila[3] .'</td>';
		$salida.='<td style="text-align: center;">'. $fila[4] .'</td>';
		$salida.='<td style="text-align: center;">'. $fila[5] .'</td>';
		$salida.= '</tr>';
	}
	$salida.= '
	</table>
	</section>
	<footer>
		<br>
		<span class="signature-warning"><b>CompuSV</b> © All Rigths Reserved</span><br>
		<!--span class="page-number">Pagina </span--><br>
	</footer>
</body>
</html>';


$dompdf = new Dompdf();
$dompdf->load_html($salida);
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

ob_end_clean();
// Output the generated PDF to Browser
$dompdf->stream("reporte.pdf", array("Attachment" => 0));

?>