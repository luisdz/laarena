<?php  

//print_r($_POST);

if (empty($_POST['fecha'])) 
	{
		echo "<div class='alert alert-danger'>Por favor ingrese la fecha Correcta</div>";
		echo "<a href='inicio.php' class='btn btn-round btn-danger'>Atras</a>";
	}
	else{
		
		header("Location: index.php");
	}

?>