<?php

require_once'../modelos/clsConexion.php';
require_once"../controladores/controladorSesion.php";
//require_once"scripts.php";

$idFoto=$_SESSION['id'];
if (!isset($_SESSION['id'])){
	header('location:../index.php');
	
}
else{
	//echo "<script>var idPersona = '". $_SESSION['idPersona'] ."'; alert(idPersona);</script>";
	echo "<script>var rol = '". $_SESSION['rol'] ."'</script>";

}

if(isset($_GET['form'])){
	echo "<script>var form = '". $_GET['form'] ."'</script>";
}



?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inicio</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../css/main2.css">
	<link rel="stylesheet" type="text/css" href="../css/menuDashboard.css">
	<link rel="stylesheet" type="text/css" href="../css/efecto.css">
	<link rel="stylesheet" type="text/css" href="../plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../plugins/bootstrap/bootstrap.min.css">
	<script src="../plugins/bootstrap/popper.min.js"></script>
	<script src="../plugins/jquery.min.js"></script>
</head>
<body>
	<!-- SideBar -->
	<section class="full-box cover dashboard-sideBar">
		<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
		<div class="full-box dashboard-sideBar-ct">
			<!--SideBar Title -->
			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 ">
				<span><a href="../index.php"><img src="../imagenes/logo.png" style="width: 180px; padding-top: 10px; padding-left: 20px;"></a></span>
			</div><br>
			<!-- SideBar User info -->
			<div class="full-box dashboard-sideBar-UserInfo">
				<figure class="full-box">
						<?php

							$con = new clsConexion();
							$contenedor = $con->ejecutarConsulta("SELECT avatar, username from usuario where userid='$idFoto'");	
							$salida = "<tbody id='cuerpoTabla' > ";

						foreach($contenedor as $fila):
							$salida .= "<tr>				
							<td>	<img alt='UserIcon' style=' width: 100px; height: 100px;  border-radius:160px; border: 2.5px solid gray; margin: auto;' src='userpics/". $fila[0] ."'>	</td>".
							"<td><br> <figcaption class='text-center text-titles'><h4> &nbsp". $fila[1] ."</h4></figcaption> </td>".				
							"</tr>";		
						endforeach;

						$salida.= "</tbody>";
						echo $salida;

						?>
				
				</figure>


					<ul class="full-box list-unstyled text-center	" >	
						<li>
							<a href="#" class="btn-exit-system">
								<i class="zmdi zmdi-settings"><b style="font-family: calibri">&nbsp Configuracion</b></i>
							</a>
						</li>
					</ul>
				


			</div>
			
			<!-- SideBar Menu -->
			<ul id="menu" class="list-unstyled full-box dashboard-sideBar-Menu">
			<script type="text/javascript">

				$(document).ready(function(){

					validarPermisos();

					$("#usuarios").click(function(){
						$("#mostrador").load(rutaUsuarios,function(data){
							$(this).html(data);					
						});
					});

					$("#tecnicos").click(function(){
						$("#mostrador").load(rutaTecnicos,function(data){
							$(this).html(data);					
						});
					});

					$("#clientes").click(function(){
						$("#mostrador").load(rutaClientes,function(data){
							$(this).html(data);					
						});
					});

					$("#departamentos").click(function(){
						$("#mostrador").load(rutaDepartamentos,function(data){
							$(this).html(data);					
						});
					});

					$("#tickets").click(function(){
						$("#mostrador").load(rutaTickets,function(data){
							$(this).html(data);					
						});
					});

					$("#diagnosticos").click(function(){
						$("#mostrador").load(rutaDiagnosticos,function(data){
							$(this).html(data);					
						});
					});

					$("#diagnosticosTec").click(function(){
						$("#mostrador").load(rutaDiagnosticosTec,function(data){
							$(this).html(data);					
						});
					});

					$("#listaTicketsTec").click(function(){
						$("#mostrador").load(rutaTicketsTec,function(data){
							$(this).html(data);					
						});
					});

					$("#categorias").click(function(){
						$("#mostrador").load(rutaCategorias,function(data){
							$(this).html(data);					
						});
					});

					$("#reportes").click(function(){
						$("#mostrador").load(rutaReportes,function(data){
							$(this).html(data);					
						});
					});

					$("#listaTickets").click(function(){
						$("#mostrador").load(listaTickets,function(data){
							$(this).html(data);					
						});
					});

					$("#graficos").click(function(){
						$("#mostrador").load(rutaGraficos,function(data){
							$(this).html(data);					
						});
					});
				});

				var rutaUsuarios = "indexUsuarios.php";
				var rutaTecnicos = "indexTecnicos.php";
				var rutaClientes = "indexClientes.php";
				var rutaDepartamentos = "indexDepartamento.php";
				var rutaTickets = "formTicket.php";
				var rutaDiagnosticos = "indexDiagnosticos.php";
				var rutaCategorias = "indexCategoria.php";
				var rutaReportes = "indexReportes.php";
				var listaTickets = "indexTickets.php";
				var rutaDiagnosticosTec = "indexDiagnosticosTec.php";
				var rutaTicketsTec = "indexTicketsTec.php";
				var rutaGraficos = "indexGraficas.php";

				
				function validarPermisos(){
				//VARIABLE QUE ME ALMACENA LOS ELEMENTOS DEL MENU PARA CADA USUARIO
				var elementos = "";

				if(rol=='Cliente'){
					//AGREGO LOS ELEMENTOS DEL MENU QUE PODRA USAR EL CLIENTES
					elementos+='<div id="tickets" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 color1 efecto"><label style="color: white;"><span class="fas fa-ticket-alt"></span> &nbsp Tickets </label></div>';
					elementos+='<div id="listaTickets" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 color1 efecto"><label style="color: white;"><span class="fas fa-user-plus"></span> &nbsp Mis Tickets </label></div>';


				}
				else if(rol=='Tecnico'){
					//AGREGO LOS ELEMENTOS DEL MENU QUE PODRA USAR EL TECNICO		
					
					elementos+='<div id="diagnosticosTec" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 color1 efecto"><label style="color: white;"><span class="fas fa-clipboard-list"></span> &nbsp Diagnosticos </label></div>';

					elementos+='<div id="listaTicketsTec" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 color1 efecto"><label style="color: white;"><span class="fas fa-user-plus"></span> &nbsp Tickets </label></div>';									
				}
				else if(rol=='Administrador'){
					//AGREGO LOS ELEMENTOS DEL MENU QUE PODRA USAR EL ADMIN					
					elementos+='<div id="usuarios" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 color1 efecto"><label style="color: white;"><span class="fas fa-user-plus"></span> &nbsp Usuarios </label></div>';

					elementos+='<div id="tecnicos" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 color1 efecto"><label style="color: white;"><span class="fas fa-user-shield"></span> &nbsp Tecnicos </label></div>';

					elementos+='<div id="clientes" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 color1 efecto"><label style="color: white;"><span class="fas fa-users"></span> &nbsp Clientes </label></div>';

					elementos+='<div id="departamentos" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 color1 efecto"><label style="color: white;"><span class="fas fa-building"></span> &nbsp Departamentos </label></div>';

					elementos+='<div id="diagnosticos" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 color1 efecto"><label style="color: white;"><span class="fas fa-clipboard-list"></span> &nbsp Diagnosticos </label></div>';

					elementos+='<div id="categorias" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 color1 efecto"><label style="color: white;"><span class="fas fa-tasks"></span> &nbsp Categorias </label></div>';

					elementos+='<div id="listaTickets" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 color1 efecto"><label style="color: white;"><span class="fas fa-user-plus"></span> &nbsp Tickets </label></div>';

					elementos+='<div id="graficos" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 color1 efecto"><label style="color: white;"><span class="fas fa-file-alt"></span> &nbsp Graficos </label></div>';

					elementos+='<div id="reportes" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 color1 efecto"><label style="color: white;"><span class="fas fa-file-alt"></span> &nbsp Reportes </label></div>';
					
				}

				//LA FUNCION APPEND ME AGREGA LO QUE HAY EN ELEMENTOS (LOS ELEMENTOS DEL MENU) INMEDIATAMENTE DESPUES DEL DIV CON ID DE #MENU
					$("#menu").after(elementos);
				}


				</script>

				</ul>
			</div>
		</section>


	<!-- Content page-->
	<section class="full-box dashboard-contentPage">
		<!-- NavBar -->
		<nav class="full-box dashboard-Navbar">
			<ul class="full-box list-unstyled text-left	" >
				<li class="pull-left">
					<a href="#!" class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
				</li>
					
				<li>
					<a href="logout.php" class="btn-exit-system">
						<i class="zmdi zmdi-power"></i>
					</a>
				</li>
			</ul>
		</nav>
		<!-- Content page -->
	
	<!--------- aqui ira el msotrador -------->
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12- col-md-12 col-sm-12 col-xs-12">
				<div id="mostrador">
				
				</div>		
			</div>					
		</div>		
	</div>
		
	</section>
	

	</div>
	<!--====== Scripts -->
	<script src="../js/jquery-3.1.1.min.js"></script>
	<script src="../js/sweetalert2.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/material.min.js"></script>
	<script src="../js/ripples.min.js"></script>
	<script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="../js/main.js"></script>
	<script>
		$.material.init();
	</script>
</body>
</html>