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
print_r($_POST);
$date=$db->mes($_POST["elegido"]);
//print_r($date);
echo '<option value="0">Selecione...</option>';

foreach ($date as $key ) { 
   echo'<option value="';
   echo $key['mes'];
   echo '">';
   echo $fecha1=$arrayM[$key['mes']];
   echo '</option>';
 
} 

?>