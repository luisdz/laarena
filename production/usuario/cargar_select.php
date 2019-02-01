<?php
  include("../clases/class.php");
  $db = new BaseDatos();
  print_r($_POST);
  $opcion_seleccionada=$_POST["elegido"];
  
	  //voy a la base de datos a traer los sub menus
   $skill = $db->cargar_spiner($opcion_seleccionada);
   
    print_r($skill);
//	die();
   foreach ($skill as $key ) { 
   echo'<option value="';
   echo $key['id_submenu'];
   echo '">';
   echo $key['nombre'];
   echo '</option>';
} 

?>