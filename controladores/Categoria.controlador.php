<?php
	require_once('../modelos/clsCategoria.php');
	require_once('../dao/Categoria.dao.php');

	switch ($_GET['a']) {
		case 'ingr':
			$obj = new Categoria();
			$obj->setTipo($_POST['tipo']);
			$obj->setNombre($_POST['nombre']);
			$obj->setDescripcion($_POST['descripcion']);
			$obj->setEstado(1);
			CategoriaDao::agregarRegistro($obj);
		break;
		case 'edit':
			$obj = new Categoria();
			$obj->setIdCategoria($_POST['idCategoria']);
			$obj->setTipo($_POST['tipo']);
			$obj->setNombre($_POST['nombre']);
			$obj->setDescripcion($_POST['descripcion']);
			$obj->setEstado(1);
			CategoriaDao::modificarRegistro($obj);
		break;
		case 'elim':
			$obj = new Categoria();
			$obj->setIdCategoria($_GET['idCategoria']);
			$obj->setEstado(0);
			CategoriaDao::eliminarRegistro($obj);
		break;
	}

	//header("Location: ../vistas/indexCategoria.php");
?>