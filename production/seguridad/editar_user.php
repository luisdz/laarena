<?php

include("../clases/class.php");
$db = new BaseDatos();
//recibir el id del usuario
//print_r($_POST);

//comprobar si vienen todos los parametros del formulario
if (empty($_POST['rol']) or (empty($_POST['Estado']))){
	header("location: ../usuario/mostrar.php");
	?>
	<div class="container">
		<div class="alert alert-info alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Alerta!</strong> Por favor Seleccione tipo de Rol y Estado del Usuario.
		</div>
	</div>
	<?php
}else{
$contr=MD5($_POST['Password']);
$update=$db->editar_user($_POST['Nombre'],$_POST['usuario'],$contr,$_POST['Email'],$_POST['rol'],$_POST['Estado'],$_POST["id_usr"]);
header("location: ../usuario/mostrar.php");
}
//print_r($update);
?>