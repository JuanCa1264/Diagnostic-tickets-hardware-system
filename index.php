
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="./css/main.css">
</head>
<body class="cover" style="background-image: url(imagenes/tec.jpg); color: white;">
	<form action="" method="post" autocomplete="off" class="full-box logInForm">
		<p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
		<p class="text-center text-muted text-uppercase">Inicia sesión con tu cuenta</p>
		<div class="form-group label-floating">
		  <label class="control-label" for="UserEmail">Nombre de usuario</label>
		  <input class="form-control"  type="text" required="" name="UserEmail" style="color: white;">
		  <p class="help-block">Escribe tú nombre de usuario</p>
		</div>
		<div class="form-group label-floating">
		  <label class="control-label" for="UserPass">Contraseña</label>
		  <input class="form-control" id="UserPass" type="password" required="" name="UserPass" style="color: white;">
		  <p class="help-block">Escribe tú contraseña</p>
		</div>
		<div class="form-group text-center">
			<input type="submit" value="Iniciar sesión" class="btn btn-raised btn-danger"  name="login">
		</div>
	</form>
	<?php 
	require'modelos/clsConexion.php';
	if(!empty($_POST['login'])){
		$usuario = $_POST["UserEmail"];
		$contra = hash("sha256", $_POST["UserPass"]);
		//$contra = $_POST["UserPass"];

		$con=new mysqli("localhost","root","","bdsistema");

		//$sql="SELECT * FROM cliente as c, usuario as u WHERE username ='$usuario' AND password ='$contra' AND u.userid=c.userid";
		//$res=$con->query($sql);
		$res=$con->query("SELECT * FROM usuario WHERE username ='$usuario' AND password ='$contra'");
		

		if($res->num_rows>0){
			while($row = mysqli_fetch_array($res)){
				session_start();
				$_SESSION["usuario"]=$row["username"];
				$_SESSION["id"]=$row["userid"];
				$_SESSION["rol"]=$row["rol"];
				$_SESSION["idPersona"]="";
			}
			if($_SESSION['rol']=="Administrador"){
				header('Location:vistas/dashboard.php');
			}
			else{
				if($_SESSION['rol']=="Cliente"){
					$res=$con->query("SELECT idCliente from cliente where userid = '". $_SESSION["id"] ."'");
					if($res->num_rows>0){
						while($row = mysqli_fetch_array($res)){
							$_SESSION["idPersona"]=$row["idCliente"];
						}
						header('Location:vistas/dashboard.php');
					}
					else{
						echo "<div style='background-color: #FAB1AD;'><center>Usuario o contraseña no son válidos(contacte a un administrador en caso de que este experimentando problemas al iniciar sesión.)</center></div>";
						session_destroy();
					}
				}
				else if($_SESSION['rol']=="Tecnico"){
					$res=$con->query("SELECT idTecnico from tecnicos where userid = '". $_SESSION["id"] ."'");
					if($res->num_rows>0){
						while($row = mysqli_fetch_array($res)){
							$_SESSION["idPersona"]=$row["idTecnico"];
						}
						header('Location:vistas/dashboard.php');
					}
					else{
						echo "<div style='background-color: #FAB1AD;'><center>Usuario o contraseña no son válidos(contacte a un administrador en caso de que este experimentando problemas al iniciar sesión.)</center></div>";
						session_destroy();
					}
				}
			}

		}else{
			echo "<div style='background-color: #FAB1AD;'><center>Usuario o contraseña no son válidos</center></div>";
		}
		
	}

 ?>
	<!--====== Scripts -->
	<script src="./js/jquery-3.1.1.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/material.min.js"></script>
	<script src="./js/ripples.min.js"></script>
	<script src="./js/sweetalert2.min.js"></script>
	<script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="./js/main.js"></script>
	<script>
		$.material.init();
	</script>
</body>
</html>