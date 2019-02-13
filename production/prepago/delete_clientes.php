<?php
print_r($_GET);

include("../clases/class.php");
 $db = new BaseDatos();


  $codigo=$_GET['id'];;

      $sql = "delete from persona where codigo_membresia='".$codigo."'";
      $qsrp = mysqli_query($db->conectar(),$sql);


      print_r($sql);

//
      
    header("Location: /laarena/production/prepago/consultar_clientes.php");

 ?>