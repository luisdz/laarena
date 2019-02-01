<?php
include("../../production/clases/class.php");
$db = new BaseDatos();
print_r($_POST);

if (empty($_POST['title']) or (empty($_POST['descr']))){}else{
	//variables por post
	$titulo=$_POST['title'];
	$descr=$_POST['descr'];
	$nota=$_POST['text'];
	$user=$_POST['usuario'];
	$fechainicio=$_POST['fecha'];
	$fechafin=$_POST['fecha_fin'];
	$fecha_ingreso=$_POST['fecha_ingreso'];
	$base=$_POST['tipo'];
	//realizamos el insert a la tabla calendario
	$insert=$db->insert_calendario($titulo,$descr,$nota,$fechainicio,$fechafin,$base);
		
		//consultamos el id maximo para pasarlo a la tabla de bitacora
		$maximo=$db->select_maximo_id();
		$id=$maximo[0]['maximo'];
		//print_r($id);
		//insert para la tabla de bitacora de calendario con la accion realizada
		$accion='Insert';
		$dato='Agrego';
		$bitacora=$db->bitacora_calendario($id,$user,$accion,$dato,$dato,$fecha_ingreso);
}
   if (empty($_POST['title2']) or (empty($_POST['descr2']))){}else{
	   $titulo2=$_POST['title2'];
	   $descr2=$_POST['descr2'];
	   $nota2=$_POST['text2'];
	   $usuario2=$_POST['usuario2'];
	   $fecha2=$_POST['fecha2'];
	   $id=$_POST['id'];
	   $base1=$_POST['tipo2'];
	   
	   //consultamos antes de la modificacion para conocer lo que actualizo
		$ant=$db->consultar_modificaciones($id);
		$antiguo=serialize($ant);
		//print_r($antiguo);
		//editamos en la tabla calendario
		$editar=$db->modif_calendario($titulo2,$descr2,$nota2,$base1,$id);
		
		//consultamos la actualizacion
		$consult=$db->consultar_modificaciones($id);
		$actualizado=serialize($consult);
		//print_r($consult);
		//Ingresamos la actualizacion a la tabla der bitacora
		$accion='Update';
		$bitacora=$db->bitacora_calendario($id,$usuario2,$accion,$antiguo,$actualizado,$fecha2);
		//print_r($bitacora);
   }

?>

 