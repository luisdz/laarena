<?php 
include("../clases/class.php");
$db = new BaseDatos();
$arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
   'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

 $arrayM = [
    "01" => "Enero",
    "02" => "Febrero",
    "03" => "Marzo",
    "04" => "Abril",
    "05" => "Mayo",
    "06" => "Junio",
    "07" => "Julio",
    "08" => "Agosto",
    "09" => "Sept.",
    "10" => "Octubre",
    "11" => "Nov.",
    "12" => "Diciembre",
];
//print_r($_POST);
$opcion=$_POST["elegido"];
$opcion1=$_POST["elegido1"];
$fech=$opcion.$opcion1;

//print_r($fech);

$date=$db->fecha($fech);

foreach ($date as $key ) { 
   echo'<option value="';
   echo $key['fecha'];
   echo '">';
   $key['dia'];
	$mes=$arrayM[$opcion1];
	$año=$opcion;
	
	$fecha=$key['dia']. " de ".$arrayM[$_POST["elegido1"]]. " del ".$año;
	echo $fecha;
   echo '</option>';
} 

	?>