 <?php 
include("../clases/class.php");

$db = new BaseDatos();
//print_r($_POST);
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
//--------------------------Capturamos el dia y le agregamos cero al dia q tenga un solo digito---
$d=$_POST['ID'];
$l=strlen($d);
if ($l==1){
	$dia="0".$d;
}else {$dia=$d;}
	
$p1=$_POST['p1']; $p2=$_POST['p2']; $p3=$_POST['p3'];

$rest1 = substr(($p1), -2);
	$rest2 = substr(($p2), -2);
	$rest3 = substr(($p3), -2);
	$fecha1=$arrayM[$rest1];
	$fecha2=$arrayM[$rest2];
	$fecha3=$arrayM[$rest3];
	
$prod1=$_POST['prod1'];
$prod2=$_POST['prod2'];
$prod3=$_POST['prod3'];
	$recarga=$db->detalle_xdia($prod1,$prod2,$prod3,$p1,$p2,$p3,$dia);
	//print_r($recarga);
?>
            <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
		 <button type="button" class="close" data-dismiss="modal">&times;</button>
		 <h4 class="modal-title">Detalles del dia <?php echo $dia;?></h4>
            <div class="col-md-12">
				<!-- Tab panes -->
                        <div role="tabpanel" class="tab-pane active" id="result-2">
                          <form id="form_participante">
						  <table class="table table-striped jambo_table bulk_action" id="tabla_recarga">
                                        <thead>
                                            <tr>
                                              <th>TIPO</th>
                                              <th><?php echo $fecha1, $ano=substr(($p1),0,4)?></th>
                                              <th><?php echo $fecha2, $ano=substr(($p2),0,4)?></th>
                                              <th><?php echo $fecha3, $ano=substr(($p3),0,4)?></th>
                                              <th><?php echo $fecha2, $ano=substr(($p2),0,4)." / ".$fecha1, $ano=substr(($p1),0,4)?>%</th>
                                                <th><?php echo $fecha3, $ano=substr(($p3),0,4)." / ".$fecha2, $ano=substr(($p2),0,4)?>%</th>
												
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										if (count($recarga)>0){
											
										foreach ($recarga as $row ) {
										$num=$row[$p2]/$row[$p1]-1;
										$to=number_format(($row[$p2]/$row[$p1]-1),3);
										$var_mesan=$to*100;
										$to2=number_format(($row[$p3]/$row[$p2]-1),3);
										$var_mesan2=$to2*100;
										if ($var_mesan<0){
											$color='count red';
										}else $color='count green';
										if ($var_mesan2<0){
											$colorb='count red';
										}else $colorb='count green';
											
										?>
										<tr>
										<th><?php echo $row['tipo2']?></th>
										<th>$<?php echo number_format($row[$p1])?></th>
										<th>$<?php echo number_format($row[$p2])?></th>
										<th>$<?php echo number_format($row[$p3])?></th>
										<td class="<?php echo $color?>"><?php echo $var_mesan?>%</td>
										<td class="<?php echo $colorb?>"><?php echo $var_mesan2?>%</td>
										</tr>
										<?PHP
							//}
							}
						}else{ //echo "sin datos";
							}
						?>
					</tbody>  
                      </table>
					  </form>
                    </div>
				 <div class="modal-footer">
				  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
                </div>
                </div>
                </div>
               
