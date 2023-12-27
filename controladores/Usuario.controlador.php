<?php
	require_once('../modelos/clsUsuario.php');
	require_once('../dao/Usuarios.dao.php');

	switch ($_GET['a']) {
		case 'ingr':
			$obj = new clsUsuario();
			$obj->setUsername($_POST['username']);
			$obj->setPassword(hash("sha256", $_POST['password']));
			$obj->setRol($_POST['rol']);
		
		if(empty($_FILES['avatar']['name'])){			
			$defecto = "defecto.jpg";
			$obj->setAvatar($defecto);			 
		}else{
			
			 $obj->setAvatar($_FILES['avatar']['name']);
			 $nombre=$_FILES['avatar']['name'];
			 $origen=$_FILES['avatar']['tmp_name'];
			 $destino="../vistas/userpics/".$nombre;
			 copy($origen, $destino);

		}
		
			clsUsuarioDAO::agregarRegistro($obj);
		
			break;
		
		default:
			# code...
			break;
	}

	//header("Location: ../vistas/indexUsuarios.php");

?>