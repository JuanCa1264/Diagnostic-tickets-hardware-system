<?php
	require_once('../modelos/clsCliente.php');
	require_once('../dao/Clientes.dao.php');

	switch ($_GET['a']) {
		case 'ingr':
			$obj = new clsCliente();
			$obj->setId($_POST['idCliente']);
			$obj->setNombre($_POST['nombre']);
			$obj->setFechaNac($_POST['fecha']);
			$obj->setDireccion($_POST['direccion']);
			$obj->setTelefono($_POST['telefono']);
			$obj->setDui($_POST['dui']);
			$obj->setIdDept($_POST['departamento']);
			$obj->setIdUser($_POST['usuario']);
			$obj->setEstado(1);
			clsCLienteDao::agregarRegistro($obj);
		break;
		case 'edit':
			$obj = new clsCliente();
			$obj->setId($_POST['idCliente']);
			$obj->setNombre($_POST['nombre']);
			$obj->setFechaNac($_POST['fecha']);
			$obj->setDireccion($_POST['direccion']);
			$obj->setTelefono($_POST['telefono']);
			$obj->setDui($_POST['dui']);
			$obj->setIdDept($_POST['departamento']);
			$obj->setIdUser($_POST['usuario']);
			$obj->setEstado(1);
			
			clsClienteDao::modificarRegistro($obj);
		break;
		case 'elim':
			$obj = new clsCliente();
			$obj->setId($_GET['IdCliente']);
			$obj->setEstado(0);
			clsClienteDao::eliminarRegistro($obj);
		break;
	}

	//header("Location: ../vistas/indexCategoria.php");
?>