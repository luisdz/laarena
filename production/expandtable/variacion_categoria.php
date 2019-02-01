<?php
include("../clases/class.php");
 $db = new BaseDatos();
$arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
   'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

 $arrayM = [
    "01" => "Ene.",
    "02" => "Feb.",
    "03" => "Mar.",
    "04" => "Abr.",
    "05" => "May.",
    "06" => "Jun.",
    "07" => "Jul.",
    "08" => "Agos.",
    "09" => "Sept.",
    "10" => "Oct.",
    "11" => "Nov.",
    "12" => "Dic.",
];
$date = date("Ym");   
$pass1 = substr(($date), 0,6)-1;
$pass2 = substr(($date), 0,6)-2;
//-----------------Substraigo el mes para mostrar en la tabla-------------------
$mpre=substr(($date),-2);
$mpas1=substr(($pass1),-2);
$mpas2=substr(($pass2),-2);
$mes1=$arrayM[$mpre];
$mes2=$arrayM[$mpas1];
$mes3=$arrayM[$mpas2];
 //---------------------para el año anterior del presente año subtraemos el año para restale 1 -----------------------
 $a= date("Ym");
$mes= date("m");
$año=substr(($a),0,4)-1;
//-----------disminuyen los dos meses a la fecha pasada de la actual-------------
$periodo=$año.$mes;
$m1=$año.$mes-1;
$m2=$año.$mes-2;
//---------------------mandamos las fechas a la consulta -------------------
$detalle = $db->detalle_cate($date,$pass1,$pass2,$periodo,$m2,$m1);

?>

<!-- page content -->
             <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">CATEGORIA</th>
                            <th><?php echo $h=substr(($pass1),0,4).'-'.$mes3?></th>
                            <th><?php echo $h=substr(($pass2),0,4).'-'.$mes2?></th>
                            <th><?php echo $h=substr(($date),0,4).'-'.$mes1?></th>
							<th class="column-title">Variaci&oacute;n entre <?php echo $mes1 ." y ".$mes2?></th>
							<th class="column-title">Variaci&oacute;n entre <?php echo $mes1 ." y ".$mes3?></th>
							 <th><?php echo $año.'-'.$mes1?></th>
                            <th><?php echo $año.'-'.$mes2?></th>
                            <th><?php echo $año.'-'.$mes3?></th>
							<th class="column-title">Variaci&oacute;n entre <?php echo $mes1 ." y ".$mes2?></th>
							<th class="column-title">Variaci&oacute;n entre <?php echo $mes1 ." y ".$mes3?></th>
							
							
                          </tr>
                        </thead>

                        <tbody>
						<?php
						if (count($detalle)>0){
						foreach ($detalle as $res ) {
							$num=$res[$date]/$res[$pass1]-1;
							$num1=$res[$date]/$res[$pass2]-1;
							$num2=$res[$periodo]/$res[$m1]-1;
							$num3=$res[$periodo]/$res[$m2]-1;
						?>	
                        <tr class="even pointer">
                          
                            <!--<td class=" "><?php echo substr(($res["IDPERIODO"]),0,4).'-'.$fecha?></td>-->
              							<td class=" ">CATEGORIAS<?php //echo $res["CATEGORIA"]?></td>
              							<td class=" ">$<?php echo $res[$pass2]?></td>
                            <td class=" ">$<?php echo number_format($res[$pass1],2)?></td>
                            <td class=" ">$<?php echo number_format($res[$date],2)?></td>
							              <td bgcolor="#e6e3e3" class=" "><?php echo round($num,2)*100?>%</td>
                            <td bgcolor="#e6e3e3" class=" "><?php echo round($num1,2)*100?>%</td>
							              <td class=" ">$<?php echo $res[$periodo]?></td>
                            <td class=" ">$<?php echo number_format($res[$m1],2)?></td>
                            <td class=" ">$<?php echo number_format($res[$m2],2)?></td>
							              <td bgcolor="#e6e3e3" class=" "><?php echo round($num2,2)*100?>%</td>
                            <td bgcolor="#e6e3e3" class=" "><?php echo round($num3,2)*100?>%</td>
							
                        </tr>
						  <?php
						  
							}
							 }else {
								
							 }
							 ?>
							 
                        </tbody>
                      </table>
                    </div>
                  </div>	
            
        <!-- /page content -->

       
	
	