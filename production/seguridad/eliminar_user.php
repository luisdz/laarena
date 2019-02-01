<?php

include("../clases/class.php");
$db = new BaseDatos();
//recibir el id del user seleccionado
print_r($_GET);					  			   
if (isset($_GET["ID"]))
{
//Se almacena en una variable el id del registro a eliminar
$id_user = $_GET["ID"];

$eliminar=$db->eliminar_user($id_user);

//redirigir nuevamente a la página para ver el resultado
header("location: ../usuario/mostrar.php");
}else{
header("location: ../usuario/mostrar.php");
 echo "Error al Eliminar";
}

?>