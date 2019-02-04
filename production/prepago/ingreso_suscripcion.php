<?php
print_r($_POST);

//echo "ongreso";

include("../clases/class.php");
 $db = new BaseDatos();
 
$ingresar=$db->ingresar_suscripcion();  
  


 ?>