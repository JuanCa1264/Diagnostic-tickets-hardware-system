<?php
	require_once('../dao/Diagnosticos.dao.php');
	require_once('../modelos/clsDiagnosticos.php');

	switch ($_GET['a']) {
		case 'ingr':
			$obj = new clsDiagnosticos();
			ini_set('date.timezone', 'America/El_Salvador');
			$fechaLocal = date('Y-m-d H:i:s',time());
			$obj->setFechaAsignacion($fechaLocal);
			$obj->setIdTecnico($_POST['idTecnico']);
			$obj->setIdTicket($_POST['idTicket']);
			$obj->setEstadoDiagnostico('Abierto');
			$obj->setEstado(1);
			
			clsDiagnosticosDAO::agregarRegistro($obj);
			
			break;
			
		case 'edit':
			$obj = new clsDiagnosticos();
			$obj->setIdDiagnostico($_POST['id']);
			$obj->setIdTecnico($_POST['idTecnico']);
			
			clsDiagnosticosDAO::modificarRegistroPorId($obj);

			break;

		/*case 'elim':
			clsDiagnosticosDAO::eliminarPorId($_GET['id']);
		break;*/
	}

	//header("Location: ../vistas/dashboard.php?form=6");


?>