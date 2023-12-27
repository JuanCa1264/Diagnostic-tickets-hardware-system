<?php
	require_once('../modelos/clsDepartamento.php');
	require_once('../dao/Departamento.dao.php');

	switch ($_GET['a']) {
		case 'ingr':
			$obj = new Departamento();
			$obj->setNombre($_POST['nombre']);
			$obj->setDescripcion($_POST['descripcion']);
			$obj->setEstado(1);
			DepartamentoDao::agregarRegistro($obj);
		break;
		case 'edit':
			$obj = new Departamento();
			$obj->setIdDepartamento($_POST['idDepartamento']);
			$obj->setNombre($_POST['nombre']);
			$obj->setDescripcion($_POST['descripcion']);
			$obj->setEstado(1);
			DepartamentoDao::modificarRegistro($obj);
		break;
		case 'elim':
			$obj = new Departamento();
			$obj->setIdDepartamento($_GET['idDepartamento']);
			$obj->setEstado(0);
			DepartamentoDao::eliminarRegistro($obj);
		break;
	}

	//header("Location: ../vistas/indexCategoria.php");
?>