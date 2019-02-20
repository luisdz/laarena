<?php 


//print_r($_POST);

include("../clases/class.php");
 $db = new BaseDatos();
 

  //$actual = strtotime($_POST['f_inicio']);
  //$mesmenos = date("Y-m-d", strtotime("+3 month", $actual));
  //echo $mesmenos;


 // print_r($_POST);
 //$promciones=$db->consultarc_promociones();  
      //$time = strtotime($_POST['f_inicio']);
      //$f_inicio = date('Y-M-d',$time);
 
 //$cadena_nuevo_formato = date_format($_POST['f_inicio'], "d/m/Y");
 //echo 'cadena nf';
 //echo $cadena_nuevo_formato;
 //echo date_format($date, 'd/m/Y H:i:s');

    // $tipo_promocion=$_POST['promocion'];            

        $srpt ="SELECT a.*, 

         case when tipo=1 then date_format(date_add('".$_POST['f_inicio']."',INTERVAL cantidad MONTH),'%Y/%m/%d') else date_format(date_add('".$_POST['f_inicio']."',INTERVAL 3 MONTH),'%Y/%m/%d') end as f_fin 
         FROM catalogo_promocion  a where id_promocion=".$_POST['seleccionado']."";   
                       $qsrp = mysqli_query($db->conectar(),$srpt);
                           //echo $srpt;
                            if(mysqli_num_rows($qsrp)==0)
                            {
                            echo 'Sin resultados';
                            }
                            else
                            {
                             //  print_r($qsrp);
                               $rowrp = mysqli_fetch_array($qsrp);
                               //print_r($rowrp);
                            }
   
  // echo 'json datos'; 
header('Content-Type: application/json');                
echo json_encode($rowrp, JSON_FORCE_OBJECT);

?>