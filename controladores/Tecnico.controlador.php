<?php
	require_once('../modelos/clsTecnico.php');
	require_once('../dao/Tecnico.dao.php');

	switch ($_GET['a']) {
		case 'ingr':
			$obj = new clsTecnico();
			$obj->setId($_POST['idTecnico']);
			$obj->setNombre($_POST['nombre']);
			$obj->setDireccion($_POST['direccion']);
			$obj->setTelefono($_POST['telefono']);
			$obj->setDui($_POST['dui']);
			$obj->setEspecialidad($_POST['especialidad']);
			$obj->setFechaNac($_POST['fecha']);
			$obj->setIdUser($_POST['usuario']);
			$obj->setEstado(1);
			clsTecnicoDao::agregarRegistro($obj);
		break;
		case 'edit':
			$obj = new clsTecnico();
			$obj->setId($_POST['idTecnico']);
			$obj->setNombre($_POST['nombre']);
			$obj->setDireccion($_POST['direccion']);
			$obj->setTelefono($_POST['telefono']);
			$obj->setDui($_POST['dui']);
			$obj->setEspecialidad($_POST['especialidad']);
			$obj->setFechaNac($_POST['fecha']);
			$obj->setIdUser($_POST['usuario']);
			$obj->setEstado(1);
			
			clsTecnicoDao::modificarRegistro($obj);
		break;
		case 'elim':
			$obj = new clsTecnico();
			$obj->setId($_GET['idTecnico']);
			$obj->setEstado(0);
			clsTecnicoDao::eliminarRegistro($obj);
		break;
	}

	//header("Location: ../vistas/indexCategoria.php");
?>