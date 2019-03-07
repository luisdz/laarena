<?php
//print_r($_GET);

include("../clases/class.php");
 $db = new BaseDatos();


  $codigo=$_GET['id'];

  $sql2="select count(*) c from suscripcion where codigo_membresia='".$codigo."'"." and estado=1";
  $qsrp2 = mysqli_query($db->conectar(),$sql2);
  $rowrp = mysqli_fetch_array($qsrp2);
 if($rowrp['c']==0)
 {
 	$sql = "delete from persona where codigo_membresia='".$codigo."'";
      $qsrp = mysqli_query($db->conectar(),$sql);
      //print_r("elimino");
    header("Location: consultar_clientes.php?code=201");
 }
 else
 { 
    header("Location: consultar_clientes.php?code=101");
 }




     // print_r($sql2);

//
      

 ?>