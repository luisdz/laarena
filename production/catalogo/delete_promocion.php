<?php
print_r($_GET);

include("../clases/class.php");
 $db = new BaseDatos();


  $codigo=$_GET['id'];

  $sql2="select count(*) c from suscripcion where tipo_membresia=".$codigo;
  $qsrp2 = mysqli_query($db->conectar(),$sql2);
  $rowrp = mysqli_fetch_array($qsrp2);
 if($rowrp['c']==0)
 {
 	$sql = "delete from catalogo_promocion where id_promocion='".$codigo."'";
      $qsrp = mysqli_query($db->conectar(),$sql);
      //print_r("elimino");
    header("Location: /laarena/production/catalogo/consultar_promociones.php?code=201");
 }
 else
 { 
    header("Location: /laarena/production/catalogo/consultar_promociones.php?code=101");
 }




     // print_r($sql2);

//
      

 ?>