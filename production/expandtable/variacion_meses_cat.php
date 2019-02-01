<?php
include("../header.php");
include("../clases/class.php");
 $db = new BaseDatos();
$arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
   'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

 $arrayM = [
    "01" => "Enero",
    "02" => "Febrero",
    "03" => "Marzo",
    "04" => "Abril",
    "05" => "Mayo",
    "06" => "Junio",
    "07" => "Julio",
    "08" => "Agosto",
    "09" => "Sept.",
    "10" => "Octubre",
    "11" => "Nov.",
    "12" => "Diciembre",
];
$date = date("Ym");    
$pass1 = ($date)-1;
$pass2 = ($date)-2;

$mpre=substr(($date),-2);
$mpas1=substr(($pass1),-2);
$mpas2=substr(($pass2),-2);
$m1=$arrayM[$mpre];
$m2=$arrayM[$mpas1];
$m3=$arrayM[$mpas2];

$consulta = $db->variacion_catxmes($date,$pass1,$pass2);

//---------------------para el año anterior del presente año subtraemos el año para restale 1 -----------------------
$a= date("Ym");
$mes= date("m");
$año=substr(($a),0,4)-1;
//-----------disminuyen los dos meses a la fecha pasada de la actual-------------
$periodo=$año.$mes;
$mes1=$año.$mes-1;
$mes2=$año.$mes-2;
//---------------------mandamos las fechas a la consulta -------------------

$consulta2 = $db->variacion_catxmes($periodo,$mes1,$mes2);

/*
echo '<pre>';
print_r($consulta2);
echo '</pre>';
*/
?>
<!-- page content -->
       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Tables <small>Some examples to get you started</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Table design <small>Custom design</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                  
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
					<form id="form_participante">
                    <div class="table-responsive">
                      <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                          <tr class="headings">
                            
                            <th bgcolor="#A6DDD9" class="column-title">PERIODO</th>
                            <th bgcolor="#A6DDD9" class="column-title"><?php echo $m2 ?></th>
                            <th bgcolor="#A6DDD9" class="column-title"><?php echo $m3 ?></th>
							<th bgcolor="#A6DDD9" class="column-title"><?php echo $m1 ?></th>
							<th bgcolor="#A6DDD9" class="column-title">Variaci&oacute;n entre <?php echo $m1 ." y ".$m3?></th>
							<th bgcolor="#A6DDD9" class="column-title">Variaci&oacute;n entre <?php echo $m1 ." y ".$m2?></th>
							
                          </tr>
                        </thead>

                        <tbody>
						<?php
						if (count($consulta)>0){
							
						foreach ($consulta as $row ) {
						
							$num=$row[$date]/$row[$pass2]-1;
							$num1=$row[$date]/$row[$pass1]-1;
							
						?>	
                          <tr>
                            <td class=" "><?php  echo $row["PERIODO"]?></td>
                            <td class=" ">$<?php echo number_format($row[$pass1],2)?></td>
                            <td class=" ">$<?php echo number_format($row[$pass2],2)?></td>
                            <td class=" ">$<?php echo number_format($row[$date],2)?></td>
							              <td class=" "><?php echo round($num,2)*100?>%</td>
                            <td class=" "><?php echo round($num1,2)*100?>%</td>
                            
                          </tr>
						  <?php
						  
							}
							 }else {
								
							 }
						
							 ?>
							 <?php
						if (count($consulta2)>0){
							
						foreach ($consulta2 as $res ) {
							$num=$res[$periodo]/$res[$mes1]-1;
							$num1=$res[$periodo]/$res[$mes2]-1;
							
						?>	
                          <tr>
                            <td class=" "><?php  echo $res["PERIODO"]?></td>
                            <td class=" ">$<?php echo number_format($res[$mes2],2)?></td>
                            <td class=" ">$<?php echo number_format($res[$mes1],2)?></td>
							              <td class=" ">$<?php echo number_format($res[$periodo],2)?></td>
							              <td class=" "><?php echo round($num,2)*100?>%</td>
                            <td class=" "><?php echo round($num1,2)*100?>%</td>
                            
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
			
					<div class="fa-hover col-md-3 col-sm-4 col-xs-12"><strong><a class="text-danger" href="#/sort-desc" id="btn_enviar"><i class="fa fa-eye"></i> &nbsp;Mostrar Detalle de Tabla. </a></strong>
                        </div>
						
				   </form>
				   <div id="grafica_comparativa" class="row">
				</div>
                </div>
              </div>
            </div>
          </div>
      
        <!-- /page content -->

 <?php
include("../footer.php");
?>

 <script>
        $("#btn_enviar").click(function(){
			//alert("ingresa");
			//Añadimos la imagen de carga en el contenedor
        $('#grafica_comparativa').html('<div><img src="../images/Claro.gif"/>Cargando Datos Espere Por Favor</div>').css("display:block");
            
            $.ajax({
                url:   'variacion_categoria.php',
                type:  'post',
                data: $("#form_participante").serialize(), // Adjuntar los campos del formulario enviado.
				success: function(data)
                {
                  // alert("ingresa");
				$('#grafica_comparativa').fadeIn(10000).html(data);
				$("#grafica_comparativa").html(data); // Mostrar la respuestas del script PHP.
                }
            });
			return false; // Evitar ejecutar el submit del formulario.
        });
    </script>

