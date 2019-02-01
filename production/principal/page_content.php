<?php
// session_start();  
include("../clases/class.php");
 $db = new BaseDatos();

$consumos_dia_mactual=$db->consultar_consumos_dia_mactual();
$consumostop_mactual=$db->consultar_topconsumos_mactual();
$consumos_dia_manterior=$db->consultar_consumos_dia_manterior();
//consulta para consumo por cdr ultimos 6 meses

$cdr_voz_lastm=$db->consumos_cdr_lastm(1);
$cdr_sms_lastm=$db->consumos_cdr_lastm(2);
$cdr_nav_lastm=$db->consumos_cdr_lastm(23);
$cdr_vas_lastm=$db->consumos_cdr_lastm(14);

//consulta para consumo por cdr ultimos 6 meses order by

$cdr_voz_lastmorder=$db->consumos_cdr_lastm_order(1);
$cdr_sms_lastmorder=$db->consumos_cdr_lastm_order(2);
$cdr_nav_lastmorder=$db->consumos_cdr_lastm_order(23);
$cdr_vas_lastmorder=$db->consumos_cdr_lastm_order(14);

//calcular total de los 4 productos del ulitmo mes
$total_consumolmes=$cdr_voz_lastm[3]['SIVA']+$cdr_sms_lastm[3]['SIVA']+$cdr_nav_lastm[3]['SIVA']+$cdr_vas_lastm[3]['SIVA'];

//para la grafica de porcentajes de consumo por producto
$voz=(number_format($cdr_voz_lastm[3]['SIVA']/$total_consumolmes, 2, '.', '')*100);
$sms=(number_format($cdr_sms_lastm[3]['SIVA']/$total_consumolmes, 2, '.', '')*100);
$nav=(number_format($cdr_nav_lastm[3]['SIVA']/$total_consumolmes, 2, '.', '')*100);
$vas=(number_format($cdr_vas_lastm[3]['SIVA']/$total_consumolmes, 2, '.', '')*100);



//print_r($consumos);

$cmes_actual=number_format($consumos_dia_mactual[0]['SIVA']+$consumos_dia_mactual[1]['SIVA']+$consumos_dia_mactual[2]['SIVA']+$consumos_dia_mactual[3]['SIVA']);

$cmes_anterior=number_format($consumos_dia_manterior[0]['SIVA']+$consumos_dia_manterior[1]['SIVA']+$consumos_dia_manterior[2]['SIVA']+$consumos_dia_manterior[3]['SIVA']);

if($cmes_anterior>$cmes_actual){
  $color='count red';
}
else{
  $color='count green';
}

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


?>
 <!-- page content -->
<div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count"> 
         <!--   <?php print_r($consumos); ?> -->
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Consumo <?php echo $consumos_dia_mactual[0]['CATEGORIA']; ?> </span>
              <div class="count" style="font-size:27px">$<?php echo number_format($consumos_dia_mactual[0]['SIVA']);?></div>
              <span class="count_bottom"><i class="green">$<?php echo number_format($consumos_dia_manterior[0]['SIVA']);?> </i> <?php echo $arrayMeses[date('m')-2]?></span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Consumo <?php echo $consumos_dia_mactual[1]['CATEGORIA']; ?></span>
              <div class="count" style="font-size:27px">$<?php echo number_format($consumos_dia_mactual[1]['SIVA']);?></div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>$<?php echo number_format($consumos_dia_manterior[1]['SIVA']);?> </i> <?php echo $arrayMeses[date('m')-2]?></span>
            </div>
           
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Consumo <?php echo $consumos_dia_mactual[2]['CATEGORIA']; ?></span>
              <div class="count" style="font-size:27px">$<?php echo number_format($consumos_dia_mactual[2]['SIVA']);?></div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-desc"></i>$<?php echo number_format($consumos_dia_manterior[2]['SIVA']);?> </i> <?php echo $arrayMeses[date('m')-2]?></span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Consumo <?php echo $consumos_dia_mactual[3]['CATEGORIA']; ?></span>
              <div class="count" style="font-size:27px">$<?php echo number_format($consumos_dia_mactual[3]['SIVA']);?></div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>$<?php echo number_format($consumos_dia_manterior[3]['SIVA']);?> </i> <?php echo $arrayMeses[date('m')-2]?></span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Mes <?php echo $arrayMeses[date('m')-2]?></span>
              <div class="count" style="font-size:27px">$<?php echo $cmes_anterior; ?></div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i>Total Consumo </span>
            </div>
             <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Mes <?php echo $arrayMeses[date('m')-1]?></span>
              <div class="<?php echo $color;?>" style="font-size:27px">$<?php echo $cmes_actual;?></div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> Total Consumo</span>
            </div>
          </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                
                    <h3>Comportamiento<small> Ultimos 6 meses</small></h3>
                  </div>
                  <div class="col-md-6">
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                    </div>
                  </div>
                </div>

                <div class="col-md-9 col-sm-9 col-xs-12">
                  <div id="placeholder33" style="height: 260px; display: none" class="demo-placeholder"></div>
                  <div style="width: 80%;">
                   <div class="x_content">
                    <canvas id="lineChart"></canvas>
                  </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                  <div class="x_title">
                    <h2>Top Consumo Mensual</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <p><?php echo $consumostop_mactual[0]['CATEGORIA']; ?></p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 70%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p><?php echo $consumostop_mactual[1]['CATEGORIA']; ?></p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 50%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <p><?php echo $consumostop_mactual[2]['CATEGORIA']; ?></p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 30%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="40"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p><?php echo $consumostop_mactual[3]['CATEGORIA']; ?></p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 25%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="clearfix"></div>
              </div>
            </div>

          </div>
          <br />

          <div class="row">

<!-- last month voz -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2><?php echo $cdr_voz_lastm[0]['CATEGORIA'] ?></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <h4>Comparativa</h4>
                  

                  <!-- Dinamico voz -->
                  <?php 
                  //obtener el monto mayor
                  $consumoM=$cdr_voz_lastmorder[0]['SIVA'];
                     foreach ($cdr_voz_lastm as $key) { 
                        $porcentaje=(($key['SIVA']/$consumoM)*100);
                        //echo $po

                  ?>
                  <div class="widget_summary">
                    <div class="w_left w_25">
                      <span>
                             <?php echo $arrayM[substr($key['IDPERIODO'],4,5)]; ?></span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentaje ?>%;">
                         
                        </div>
                      </div>
                    </div>
                    <div class="w_12" style="font-size:12px;margin-left: 5%">
                      <span>$<?php echo number_format($key['SIVA']); ?></span>
                    </div>
                    <div class="clearfix"></div>
                  </div>


                 <?php }

                  ?>


                </div>
              </div>
            </div>
<!-- end last month voz -->

<!-- last month SMS -->
                       <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2><?php echo $cdr_sms_lastm[0]['CATEGORIA'] ?></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <h4>Comparativa</h4>
                  

                  <!-- Dinamico sms -->
                  <?php 
                  //obtener el monto mayor
                  $consumoM=$cdr_sms_lastmorder[0]['SIVA'];
                     foreach ($cdr_sms_lastm as $key) { 
                        $porcentaje=(($key['SIVA']/$consumoM)*100);
                        //echo $po

                  ?>
                  <div class="widget_summary">
                    <div class="w_left w_25">
                      <span>
                             <?php echo $arrayM[substr($key['IDPERIODO'],4,5)]; ?></span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-red" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentaje ?>%;">
                         
                        </div>
                      </div>
                    </div>
                    <div class="w_12" style="font-size:12px;margin-left: 5%">
                      <span>$<?php echo number_format($key['SIVA']); ?></span>
                    </div>
                    <div class="clearfix"></div>
                  </div>


                 <?php }

                  ?>


                </div>
              </div>
            </div>
<!-- end last month SMS -->
<!-- last month NAV -->
               <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2><?php echo $cdr_nav_lastm[0]['CATEGORIA'] ?></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <h4>Comparativa</h4>
                  

                  <!-- Dinamico nav -->
                  <?php 
                  //obtener el monto mayor
                  $consumoM=$cdr_nav_lastmorder[0]['SIVA'];
                     foreach ($cdr_nav_lastm as $key) { 
                        $porcentaje=(($key['SIVA']/$consumoM)*100);
                        //echo $po

                  ?>
                  <div class="widget_summary">
                    <div class="w_left w_25">
                      <span>
                             <?php echo $arrayM[substr($key['IDPERIODO'],4,5)]; ?></span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentaje ?>%;">
                         
                        </div>
                      </div>
                    </div>
                    <div class="w_12" style="font-size:12px;margin-left: 5%">
                      <span>$<?php echo number_format($key['SIVA']); ?></span>
                    </div>
                    <div class="clearfix"></div>
                  </div>


                 <?php }

                  ?>


                </div>
              </div>
            </div>
<!-- end last month nav -->
<!-- last month VAS -->
             <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2><?php echo $cdr_vas_lastm[0]['CATEGORIA'] ?></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <h4>Comparativa</h4>
                  

                  <!-- Dinamico nav -->
                  <?php 
                  //obtener el monto mayor
                  $consumoM=$cdr_vas_lastmorder[0]['SIVA'];
                     foreach ($cdr_vas_lastm as $key) { 
                        $porcentaje=(($key['SIVA']/$consumoM)*100);
                        //echo $po

                  ?>
                  <div class="widget_summary">
                    <div class="w_left w_25">
                      <span>
                             <?php echo $arrayM[substr($key['IDPERIODO'],4,5)]; ?></span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-aero" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentaje ?>%;">
                         
                        </div>
                      </div>
                    </div>
                    <div class="w_12" style="font-size:12px;margin-left: 5%">
                      <span>$<?php echo number_format($key['SIVA']); ?></span>
                    </div>
                    <div class="clearfix"></div>
                  </div>


                 <?php }

                  ?>


                </div>
              </div>
            </div>
<!-- end last month VAS -->

            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Porcentajes Consumo</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
                      <th style="width:37%;">
                        <p>Top 5</p>
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                          <p class="">Categoria</p>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                          <p class="">Porcentaje</p>
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <canvas id="canvas1" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </td>
                      <td>
                        <table class="tile_info">
                          <tr>
                            <td>
                              <p><i class="fa fa-square blue"></i>SMS </p>
                            </td>
                            <td>30%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square green"></i>NAV </p>
                            </td>
                            <td>10%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>VOZ </p>
                            </td>
                            <td>20%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square aero"></i>VAS </p>
                            </td>
                            <td>15%</td>
                          </tr>
                         
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>


            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>Consumo Total</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="dashboard-widget-content">
                    <ul class="quick-list">
                      
                      <li><i class="fa fa-line-chart"></i><a href="#">Prepago</a>
                      </li>
                      <li><i class="fa fa-bar-chart"></i><a href="#">Pospago</a> </li>
                      <li><i class="fa fa-line-chart"></i><a href="#">Multimedia</a>
                      </li>
                      <li><i class="fa fa-area-chart"></i><a href="#">VAS</a>
                      </li>
                    </ul>

                    <div class="sidebar-widget">
                      <h4>Consumo Actual</h4>
                      <canvas width="150" height="80" id="foo" class="" style="width: 160px; height: 100px;"></canvas>
                      <div class="goal-wrapper">
                        <span class="gauge-value pull-left">$</span>
                        <span id="gauge-text" class="gauge-value pull-left">3,200</span>
                        <span id="goal-text" class="goal-value pull-right">$5,000</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>


          
        </div>
<!-- /page content -->

<?php
include("../footer.php");

//consultas para las graficas
$consumos_lastm=$db->consultar_consumos_lastm();


?>


    <!-- Chart.js -->
    <script>
      Chart.defaults.global.legend = {
        enabled: false
      };

      // Line chart
      var ctx = document.getElementById("lineChart");
      var lineChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre"],
          datasets: [{
            label: "Consumo",
            backgroundColor: "rgba(38, 185, 154, 0.31)",
            borderColor: "rgba(38, 185, 154, 0.7)",
            pointBorderColor: "rgba(38, 185, 154, 0.7)",
            pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointBorderWidth: 1,
            data: ["<?php echo $consumos_lastm[0]['SIVA']; ?>", "<?php echo $consumos_lastm[1]['SIVA']; ?>", "<?php echo $consumos_lastm[2]['SIVA']; ?>", "<?php echo $consumos_lastm[3]['SIVA']; ?>", "<?php echo $consumos_lastm[4]['SIVA']; ?>", "<?php echo $consumos_lastm[5]['SIVA']; ?>"]
          }]
        },
    options: {
      
    scaleLabel : "<%= value + ' + two = ' + (Number(value) + 2)   %>"
    }
      });


      </script>
 
  <!-- Doughnut Chart -->
    <script>
      $(document).ready(function(){
        var options = {
          legend: false,
          responsive: false
        };

        new Chart(document.getElementById("canvas1"), {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: {
            labels: [
              "Voz",
              "Sms",
              "Nav",
              "Vas"
            ],
            datasets: [{
              data: [<?php echo $voz?>, <?php echo $sms?>, <?php echo $nav?>, <?php echo $vas?>],
              backgroundColor: [
                "#9B59B6",
                "#BDC3C7",
                "#3498DB",
                "#26B99A"
              ],
              hoverBackgroundColor: [
                "#B370CF",
                "#CFD4D8",
                "#49A9EA",
                "#36CAAB"
              ]
            }]
          },
          options: options
        });
      });
    </script>
    <!-- /Doughnut Chart -->