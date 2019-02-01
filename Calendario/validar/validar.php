<?php
include("../../production/clases/class.php");
$db = new BaseDatos();
//recibir los datos del formulario
//print_r($_POST);
//incriptar contraseña

//incriptar contraseña

if (empty($_POST['passw'])){
}else{$contr=MD5($_POST['passw']);}
//---------------------
//comprobar en la funcion si existe este usuario en la base de datos
$validar_user=$db->validar_usuario($_POST['user'],$contr);

//si existe redireccionar al calendario
if($validar_user==1)
	{ 
		//iniciar la sesion y guardar en las variables
		$estado=$db->estado($_POST['user'],$contr);
		session_name('calendario');
		session_start(calendario);
		$_SESSION["usuario"] = $estado[0]['usuario'];
        $_SESSION["id"] = $estado[0]['id'];
        $_SESSION["Nombre"] = $estado[0]['Nombre'];
        $_SESSION["Estado"] = $estado[1]['Estado'];
		$_SESSION["id_rol"] = $estado[0]['id_rol'];
		//consulta la informacion del usuario 
		 if($_SESSION["Estado"]==1) {
		//redireccionar
			header("Location: ../calendario/calendario.php");
			
		 } 
	//si no existe redireccionar al login y enviar mensaje de usuario o contrasena no valido
	}else{	
		echo "Contraseña o Usuario Erroneo";
		header("Location: ../login.php");
	}
		
?>