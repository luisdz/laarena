<?php
include("../clases/class.php");
//print_r($_POST);
//echo"<br>";
$db = new BaseDatos();
 $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
   'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

 $arrayM = [
	"0" => "&nbsp;",
    "01" => "Enero-&nbsp;",
    "02" => "Febrero-&nbsp;",
    "03" => "Marzo-&nbsp;",
    "04" => "Abril-&nbsp;",
    "05" => "Mayo-&nbsp;",
    "06" => "Junio-&nbsp;",
    "07" => "Julio-&nbsp;",
    "08" => "Agosto-&nbsp;",
    "09" => "Sept-&nbsp;",
    "10" => "Octubre-&nbsp;",
    "11" => "Nov-&nbsp;",
    "12" => "Diciembre-&nbsp;",
];
//----------------------comprobar en la funcion si viene el valor de los 3 periodos-----------------------------------------
if (empty($_POST['periodos'][0]) or (empty($_POST['periodos'][1]) or (empty($_POST['periodos'][2])))){
	$p1=0; $p2=1; $p3=2;
	$fecha1=0;$fecha2=0;$fecha3=0;
}else{
$p1=$_POST['periodos'][0]; $p2=$_POST['periodos'][1]; $p3=$_POST['periodos'][2];

$rest1 = substr(($p1), -2);
	$rest2 = substr(($p2), -2);
	$rest3 = substr(($p3), -2);
	$fecha1=$arrayM[$rest1];
	$fecha2=$arrayM[$rest2];
	$fecha3=$arrayM[$rest3];

		if (empty($_POST['categoria'][0]) or (empty($_POST['categoria'][1]))){
		?>
		<div class="col-md-12 col-sm-9 col-xs-6">
		
		<div class="alert alert-info alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Alerta!</strong> Por favor ingrese 3 periodos y 2 Categorias.
		</div>
		</div>
		<?php
		$tabla[]=0;
		}else {
			$tabla=$db->table($_POST['categoria'][0],$_POST['tipo'],$p1,$p2,$p3);
		}
	}
//realizamos la conexion para el segundo nivel
 $connectionInfo = array("UID" => "AppUser", "PWD" => "H@noi1197", "Database" => "SEG_PREPAGO");
      $serverName = "172.24.3.240";
$conn = sqlsrv_connect($serverName, $connectionInfo) or die ("Error Conectando a la Base de Datos.");

?>
<div class="container">
      
        <div class="center">
            
            <div class="col-md-12">
                <div role="tabpanel">
                  
              <h4><p class="text-primary">TABLA DE DESCRIPCI&Oacute;N DE CATEGORIA</h4>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="result-2">
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-hover table-demo-2">
                                        <thead>
                                            <tr>
                                               <th bgcolor="#75D1CA">DESCRIPCI&Oacute;N</th>
                                                <th bgcolor="#75D1CA"><?php echo $fecha1, $ano=substr(($p1),0,4)?></th>
                                                <th bgcolor="#75D1CA"><?php echo $fecha2, $ano=substr(($p2),0,4)?></th>
                                                <th bgcolor="#75D1CA"><?php echo $fecha3, $ano=substr(($p3),0,4)?></th>
                                                <th bgcolor="#75D1CA"><?php echo $fecha2, $ano=substr(($p2),0,4)." / ".$fecha1, $ano=substr(($p1),0,4)?>%</th>
                                                <th bgcolor="#75D1CA"><?php echo $fecha3, $ano=substr(($p3),0,4)." / ".$fecha2, $ano=substr(($p2),0,4)?>%</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php 
									
                                      if(count($tabla)>0){
                                           $dataid=1;
                                            foreach ($tabla as $key) {
									                             if ( empty($_POST['periodos'][0]) or 
                                                  (empty($_POST['periodos'][1]) or (empty($_POST['periodos'][2])))
                                                  ){

                                               }else{	

                                                if($key[$p1]!=0){
                                                      $num1=$key[$p2]/$key[$p1]-1;
                                                }
                                                  else{
                                                    $num1=0;
                                                  }
                                                    if($key[$p2]!=0)
                                                    {
                                                                 $num2=$key[$p3]/$key[$p2]-1;
                                                    }
                                                  else{
                                                    $num2=0;
                                                  }


									                           
									                    
                    
									}

                                     ?>
                        <tr data-id="<?php echo $dataid?>" data-parent="">
										  <?php 
										      echo "<th>".$key[$_POST['categoria'][0]]."</th>";
                          echo "<th>$".number_format($key[$p1],2)."</th>";
                          echo "<th>$".number_format($key[$p2],2)."</th>";
                          echo "<th>$".number_format($key[$p3],2)."</th>";
											  if (empty($_POST['periodos'][0]) or (empty($_POST['periodos'][1]) or (empty($_POST['periodos'][2])))){}else{
                          echo "<th>".round($num1,2)*100 ."%</th>";
                          echo "<th>".round($num2,2)*100 ."%</th>";
											  }
                                          ?>
		                             <?php 
								              $srpt1 ="select * from (
													   select ".$_POST['categoria'][1].", IDPERIODO, SUM(CTA_PRINCIPALDELTA)as CTA_PRINCIPALDELTA 
                             FROM [SEG_PREPAGO].[dbo].[TBP_RESUMENCATEGORIAS]
														where ".$_POST['categoria'][0]."='".$key[$_POST['categoria'][0]]."' and IDTIPOCDR='".$_POST['tipo']."' 
                             and dia<= (RIGHT(convert(varchar,getdate()-1,112),2))
                             group by IDPERIODO,".$_POST['categoria'][1]."
													)as pivotable PIVOT(sum(CTA_PRINCIPALDELTA) for IDPERIODO in ([".$p1."],[".$p2."],[".$p3."]))x";
											 //print_r($srpt1);
												
										      $qsrp1 = sqlsrv_query($conn,$srpt1, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )); 
												$dataid++;
												$dataP=$dataid-1;
                       
                                                 while($rowrp1 = sqlsrv_fetch_array($qsrp1, SQLSRV_FETCH_ASSOC)){
								                   if($rowrp1[$_POST['categoria'][1]]=='Q1')
														$color='rgb(71, 73, 230)';
												  else
														$color='#ffffff';
                                     ?>
											
                      <tr style="background:<?php echo $color?>; color:#73879c" data-id="<?php echo $dataid ?>" data-parent="<?php  echo $dataP;?>">
											 <?php 
											   
                         if($rowrp1[$p1]!=0){
                           $n1=$rowrp1[$p2]/$rowrp1[$p1]-1;
                         }
                         else{
                           $n1=0;
                         }

                          if($rowrp1[$p2]!=0){
                          $n2=$rowrp1[$p3]/$rowrp1[$p2]-1;
                         }
                         else{
                           $n2=0;
                         }

                        
											 
                        echo "<td>".$rowrp1[$_POST['categoria'][1]]." </td>";
												 echo "<td>$".number_format($rowrp1[$p1],2)."</td>";
												 echo "<td>$".number_format($rowrp1[$p2],2)."</td>";
												 echo "<td>$".number_format($rowrp1[$p3],2)."</td>";
												 echo "<td>".round($n1,2)*100 ."%</td>";
												 echo "<td>".round($n2,2)*100 ."%</td>";
												 
                                             ?>
										
                                          </tr>
										 <?php  $dataid++;
													
                                            }//end while 2er nivel

					 }//end 1er foreach
                                
                } //end count si tiene datos 
             //} //end de comprobacion 
						

				?>

                                      
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>

                        </div>
                    
            
                    </div>
                </div>
            </div>
<script src="jquery.aCollapTable.js"></script>
    <script>
        $(document).ready(function(){
            $('#demo-1').aCollapTable({
                startCollapsed: true,
                addColumn: false,
                plusButton: '<i class="glyphicon glyphicon-plus"></i> ', 
                minusButton: '<i class="glyphicon glyphicon-minus"></i> ' 
            });

            $('.table-demo-2').aCollapTable({
                startCollapsed: true,
                addColumn: true,
                plusButton: '<i class="glyphicon glyphicon-plus"></i> ', 
                minusButton: '<i class="glyphicon glyphicon-minus"></i> ' 
            });
        });
    </script>