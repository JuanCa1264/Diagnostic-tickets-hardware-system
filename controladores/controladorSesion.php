<?php
		session_start();
if ($_SESSION['usuario']=="") {
	header("location:../index.php");
}
if ($_SESSION['id']!=$_SESSION['id']) {
	header('location:../index.php');
}



?>