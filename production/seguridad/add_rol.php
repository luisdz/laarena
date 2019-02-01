<?php
include("../clases/class.php");
$db = new BaseDatos();
//print_r($_POST);

//consultar en tu capa de modelo la funcioninsertar que esta en el archivo de clases

 $Result=$db->insertar_rol();
 echo 'result de insertt rol';
 print_r($Result);

 //hacer un for each y recorrer el arreglo

foreach ($_POST['submenu'] as $value){
$permiso=$db->insertar_permiso($Result['id'],$_POST['menu'],$value);
}
if($permiso==true)

{
  echo 'Error al realizar el Ingreso del registro';
}

else{
   header("Location: ../usuario/adm_rol.php");
  
}
?>