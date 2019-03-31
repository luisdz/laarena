<?php
print_r($_GET);

include("../clases/class.php");
 $db = new BaseDatos();


  $codigo=$_GET['id'];
   
 	$sql = "delete from usuario where id_usuario='".$codigo."'";
      $qsrp = mysqli_query($db->conectar(),$sql);
      //print_r("elimino");
    
 

if($qsrp ==false )
{
 
	 header("Location: consultar_usuarios.php?code=101");
   //if(($errors=mysql_error())!=null){}
}
else
{
	header("Location: consultar_usuarios.php?code=201");
} 


     // print_r($sql2);

//
      

 ?>