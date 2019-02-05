<?php

include("../clases/class.php");
$db = new BaseDatos();

echo 'ingresa';

$estado=$db->conectar();
header("Location:../prepago/principal.php");
/*
//recibir los datos del formulario
//print_r($_POST);
//incriptar contraseña
if (empty($_POST['passw'])){

}else{$contr=MD5($_POST['passw']);}
//---------------------
//comprobar en la funcion si existe este usuario en la base de datos
$validar_user=$db->validar_usuario($_POST['user'],$contr);
$estado=$db->estado($_POST['user'],$contr);

//print_r($estado);
//echo 'valor de bandera'+$validar_user;

//si existe redireccionar a pagina principal
if($validar_user==1)
	{
		//iniciar la sesion y guardar en las variables
		session_start();
		$_SESSION["usuario"] = $estado[0]['usuario'];
        $_SESSION["id"] = $estado[0]['id'];
        $_SESSION["Nombre"] = $estado[0]['Nombre'];
        $_SESSION["Estado"] = $estado[1]['Estado'];
		$_SESSION["id_rol"] = $estado[0]['id_rol'];
		//consulta la informacion del usuario 
		 if($_SESSION["Estado"]==1) {
		//redireccionar
			header("Location:../prepago/p_consumo_diario.php");
			
		 } else{
		header("Location: ../page_403.html");
		}
	//si no existe redireccionar al login y enviar mensaje de usuario o contrasena no valido
	}else{	
		header("Location: ../login.php");
	} */

?>