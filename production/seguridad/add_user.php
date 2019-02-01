<?php

//
include("../clases/class.php");
$db = new BaseDatos();

//print_r($_POST);

if (empty($_POST['Password'])) 
	{
		echo "<h2><p class='text-primary'>Por favor ingrese todos los campos</p></h2>";
		//header("Location: ../usuario/agregar_user.php");
	}
	else{
		$contr=MD5($_POST['Password']);
		$Result=$db->insertar_user($contr);
		header("Location: ../usuario/mostrar.php");
	}
?>