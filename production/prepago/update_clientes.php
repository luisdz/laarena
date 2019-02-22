<?php
//print_r($_POST);


include("../clases/class.php");
 $db = new BaseDatos();
 
$ingresar=$db->actualizar_clientes();   


 ?>