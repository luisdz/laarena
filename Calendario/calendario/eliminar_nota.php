<?php
include("../../production/clases/class.php");
$db = new BaseDatos();
print_r($_POST);
if (empty($_POST['id'])){
	//header("Location: calendario.php");
}else{
        //primero ingresamos el registros a bitacora para luego eliminamos
		$id=($_POST['id']);
		$usuario=($_POST['usuario2']);
		$accion='Delete';
		$modf='Elimino';
		$fecha=($_POST['fecha2']);
		$bitacora=$db->bitacora_calendario($id,$usuario,$accion,$modf,$modf,$fecha);
		//eliminamos el registros
		$borrar=$db->borrar_calendario($id);
}

	?>