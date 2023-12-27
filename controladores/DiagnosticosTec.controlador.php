<?php
	require_once('../dao/DiagnosticosTec.dao.php');
	require_once('../modelos/clsDiagnosticos.php');

	switch ($_GET['a']) {
			
		case 'edit':
			$obj = new clsDiagnosticos();

			ini_set('date.timezone', 'America/El_Salvador');
			$fechaLocal = date('Y-m-d H:i:s',time());

			$obj->setIdDiagnostico($_POST['id']);
			$obj->setFechaCierre($fechaLocal);
			$obj->setDiagnostico($_POST['diagnostico']);
			$obj->setSolucion($_POST['solucion']);
			$obj->setIdCategoria($_POST['idCategoria']);
			$obj->setEstadoDiagnostico($_POST['estadoDiagnostico']);
			
			clsDiagnosticosDAO::modificarRegistroPorId($obj);
			break;
	}

	//header("Location: ../vistas/dashboard.php?form=6");


?>