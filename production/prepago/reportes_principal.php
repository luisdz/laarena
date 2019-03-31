<?php
include("../header.php");
  
include("../clases/class.php");
 $db = new BaseDatos();
 
  
 
 $clientes_t=$db->reportep_clientest();  
 $suscripciones_a=$db->reportep_suscripcionesa();  
 $suscripciones_v=$db->reportep_suscripcionesv();  
 $clientes_m=$db->reportep_morac();  
 $clientes_asisactivos=$db->reportep_susactiva_asistiendo();  
 $ingresoma=$db->reportep_ingresos_mac();  
 $ingresomant=$db->reportep_ingresos_mant();  
 $clientesna=$db->reportep_clientesnuevos_ma();  
 $avg_diarias=$db->reportep_avg_asistenciad();  

$suscripcion_vencida=$suscripciones_v[0]['suscripciones']/($suscripciones_a[0]['suscripciones']+$suscripciones_v[0]['suscripciones']);
//echo $suscripciones_v[0]['suscripciones'];
//echo $suscripciones_a[0]['suscripciones'];
//echo "detalle"; echo $clientes_aldia;
//$clientes_aldia=1-$clientes_aldia;
//echo "clientes al dia %"; echo $clientes_aldia;

if($suscripcion_vencida==0){

  $suscripcion_vencida=100;
}
 //print_r($suscripciones_a);

// para los clientes asistiendo son aquellos que tienen sucripcion activa y tienen asistencias en esa suscripcion activa
//mas los clientes que tienen suscripcion vencida pero siguen asistiendo, serian clientes en mora
$clientes_asis=$clientes_asisactivos[0]['clientes']+$clientes_m[0]['clientes'];



$clientes_mora= $clientes_m[0]['clientes']/ $clientes_asis;

 
if($clientes_mora==0){

  $clientes_mora=0;
}




?>
 
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Datos Principales</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="">
                  <div class="x_content">
                    <div class="row">
                       
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-comments-o"></i>
                          </div>
                          <div class="count"><?php echo $suscripciones_a[0]['suscripciones']; ?></div>

                          <h3>Suscripciones Activas</h3>
                          <p>Detalle.</p>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-sort-amount-desc"></i>
                          </div>
                          <div class="count"><?php echo $suscripciones_v[0]['suscripciones']; ?></div>

                          <h3>Suscripciones Vencidas</h3>
                          <p>Detalle</p>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-check-square-o"></i>
                          </div>
                          <div class="count"><?php echo $clientes_asis; ?></div>

                          <h3>Clientes Asistiendo</h3>
                          <p>Detalle.</p>
                        </div>
                      </div>

                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-check-square-o"></i>
                          </div>
                          <div class="count"><?php echo $clientes_m[0]['clientes']; ?></div>

                          <h3>Clientes con Mora</h3>
                          <p>Detalle.</p>
                        </div>
                      </div>
                    </div>

                    <div class="row top_tiles" style="margin: 10px 0;">
                      <div class="col-md-3 tile">
                        <span>Ingreso del Mes Anterior</span>
                        <h2>$<?php echo $ingresomant[0]['monto']; ?></h2>
                        <span class="sparkline_one" style="height: 160px;">
                                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                  </span>
                      </div>
                      <div class="col-md-3 tile">
                        <span>Ingreso Mes Actual</span>
                        <h2>$<?php echo $ingresoma[0]['monto']; ?></h2>
                        <span class="sparkline_one" style="height: 160px;">
                                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                  </span>
                      </div>
                      <div class="col-md-3 tile">
                        <span>Promedio Asistencia po Dia</span>
                        <h2><?php echo number_format($avg_diarias[0]['prom_asistencia'],0); ?></h2>
                        <span class="sparkline_two" style="height: 160px;">
                                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                  </span>
                      </div>
                      <div class="col-md-3 tile">
                        <span>Clientes Nuevos Mes</span>
                        <h2><?php echo $clientesna[0]['clientes']; ?></h2>
                        <span class="sparkline_one" style="height: 160px;">
                                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                  </span>
                      </div>
                    </div>




                    <br />
                    <div class="row">
                      <div class="col-md-3 col-xs-12 widget widget_tally_box">
                        <div class="x_panel fixed_height_390">
                          <div class="x_title">
                            <h2>Historico Ingresos</h2>
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

                            <div style="text-align: center; overflow: hidden; margin: 10px 5px 0;">
                              <canvas id="canvas_line1" height="200"></canvas>
                            </div>

                             

                            <div>
                              <ul class="list-inline widget_tally">
                                <li>
                                  <p>
                                    <span class="month">Crecimientos Mes 1 </span>
                                    <span class="count">+12%</span>
                                  </p>
                                </li>
                                <li>
                                  <p>
                                    <span class="month">Crecimiento Mes 2 </span>
                                    <span class="count">+12%</span>
                                  </p>
                                </li>
                                <li>
                                  <p>
                                    <span class="month">Crecimiento Mes 3 </span>
                                    <span class="count">+12%</span>
                                  </p>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>


                      <div class="col-md-3 col-xs-12 widget widget_tally_box">
                        <div class="x_panel fixed_height_390">
                          <div class="x_title">
                            <h2>Ingresos Semana</h2>
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

                            <div style="text-align: center; margin-bottom: 17px">
                              <ul class="verticle_bars list-inline">
                                <li>
                                  <div class="progress vertical progress_wide bottom">
                                    <div class="progress-bar progress-bar-dark" role="progressbar" data-transitiongoal="65"></div>
                                  </div>
                                </li>
                                <li>
                                  <div class="progress vertical progress_wide bottom">
                                    <div class="progress-bar progress-bar-gray" role="progressbar" data-transitiongoal="85"></div>
                                  </div>
                                </li>
                                <li>
                                  <div class="progress vertical progress_wide bottom">
                                    <div class="progress-bar progress-bar-info" role="progressbar" data-transitiongoal="45"></div>
                                  </div>
                                </li>
                                <li>
                                  <div class="progress vertical progress_wide bottom">
                                    <div class="progress-bar progress-bar-success" role="progressbar" data-transitiongoal="75"></div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                            <div class="divider"></div>

                            <ul class="legend list-unstyled">
                              <li>
                                <p>
                                  <span class="icon"><i class="fa fa-square dark"></i></span> <span class="name">Semana 1</span>
                                </p>
                              </li>
                              <li>
                                <p>
                                  <span class="icon"><i class="fa fa-square grey"></i></span> <span class="name">Semana 2</span>
                                </p>
                              </li>
                              <li>
                                <p>
                                  <span class="icon"><i class="fa fa-square blue"></i></span> <span class="name">Semana 3</span>
                                </p>
                              </li>
                              <li>
                                <p>
                                  <span class="icon"><i class="fa fa-square green"></i></span> <span class="name">Semana 4</span>
                                </p>
                              </li>
                            </ul>

                          </div>
                        </div>
                      </div>


                      <div class="col-md-3 col-xs-12 widget widget_tally_box">
                        <div class="x_panel ui-ribbon-container fixed_height_390">
                           
                          <div class="x_title">
                            <h2>% de Clientes</h2> 
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">

                            <div style="text-align: center; margin-bottom: 17px">
                              <span class="chart" data-percent="<?php echo number_format($suscripcion_vencida,2)*100; ?>">
                                                  <span class="percent"></span>
                              </span>
                            </div>

                            <h3 class="name_title">Vencidas</h3>
                            <p>Detalle</p>

                            <div class="divider"></div>

                            <p>Muestra el % de clientes que  sus suscripciones estan vencidas.</p>

                          </div>
                        </div>
                      </div>

                      <div class="col-md-3 col-xs-12 widget widget_tally_box">
                        <div class="x_panel ui-ribbon-container fixed_height_390">
                           
                          <div class="x_title">
                            <h2>% de Clientes</h2>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">

                            <div style="text-align: center; margin-bottom: 17px">
                              <span class="chart" data-percent="<?php echo number_format($clientes_mora,2)*100; ?>">
                                                  <span class="percent"></span>
                              </span>
                            </div>

                            <h3 class="name_title">Mora</h3>
                            <p>Detalle</p>

                            <div class="divider"></div>

                            <p>Muestra el % de clientes que estan con mora(asisten pero suscripcion vencida).</p>

                          </div>
                        </div>
                      </div>


                     

                      <div class="col-md-3 col-xs-12 widget widget_tally_box">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Mes 1</h2>
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

                            <div style="text-align: center; margin-bottom: 17px">
                              <span class="chart" data-percent="86">
                                                  <span class="percent"></span>
                              </span>
                            </div>

                            <div class="pie_bg" style="text-align: center; display: none; margin-bottom: 17px">
                              <canvas id="canvas_doughnut" height="130"></canvas>
                            </div>

                             
                            <div style="text-align: center; overflow: hidden; margin: 10px 5px 3px;">
                              <canvas id="canvas_line" height="190"></canvas>
                            </div>
                            <div>
                              <ul class="list-inline widget_tally">
                                <li>
                                  <p>
                                    <span class="month">12 December 2014 </span>
                                    <span class="count">+12%</span>
                                  </p>
                                </li>
                                <li>
                                  <p>
                                    <span class="month">29 December 2014 </span>
                                    <span class="count">+12%</span>
                                  </p>
                                </li>
                                <li>
                                  <p>
                                    <span class="month">16 January 2015 </span>
                                    <span class="count">+12%</span>
                                  </p>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>



                      <div class="col-md-3 col-xs-12 widget widget_tally_box">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Mes 2</h2>
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

                            <div style="text-align: center; margin-bottom: 17px">
                              <span class="chart" data-percent="86">
                                                  <span class="percent"></span>
                              </span>
                            </div>

                            <div class="pie_bg" style="text-align: center; display: none; margin-bottom: 17px">
                              <canvas id="canvas_doughnut2" height="130"></canvas>
                            </div>

                             
                            <div style="text-align: center; overflow: hidden; margin: 10px 5px 3px;">
                              <canvas id="canvas_line2" height="190"></canvas>
                            </div>
                            <div>
                              <ul class="list-inline widget_tally">
                                <li>
                                  <p>
                                    <span class="month">12 December 2014 </span>
                                    <span class="count">+12%</span>
                                  </p>
                                </li>
                                <li>
                                  <p>
                                    <span class="month">29 December 2014 </span>
                                    <span class="count">+12%</span>
                                  </p>
                                </li>
                                <li>
                                  <p>
                                    <span class="month">16 January 2015 </span>
                                    <span class="count">+12%</span>
                                  </p>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>


                      <div class="col-md-3 col-xs-12 widget widget_tally_box">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Mes 3</h2>
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

                            <div style="text-align: center; margin-bottom: 17px">
                              <span class="chart" data-percent="86">
                                                  <span class="percent"></span>
                              </span>
                            </div>

                            <div class="pie_bg" style="text-align: center; display: none; margin-bottom: 17px">
                              <canvas id="canvas_doughnut3" height="130"></canvas>
                            </div>

                             
                            <div style="text-align: center; overflow: hidden; margin: 10px 5px 3px;">
                              <canvas id="canvas_line3" height="190"></canvas>
                            </div>
                            <div>
                              <ul class="list-inline widget_tally">
                                <li>
                                  <p>
                                    <span class="month">12 December 2014 </span>
                                    <span class="count">+12%</span>
                                  </p>
                                </li>
                                <li>
                                  <p>
                                    <span class="month">29 December 2014 </span>
                                    <span class="count">+12%</span>
                                  </p>
                                </li>
                                <li>
                                  <p>
                                    <span class="month">16 January 2015 </span>
                                    <span class="count">+12%</span>
                                  </p>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-3 col-xs-12 widget widget_tally_box">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Mes 4</h2>
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

                            <div style="text-align: center; margin-bottom: 17px">
                              <span class="chart" data-percent="86">
                                                  <span class="percent"></span>
                              </span>
                            </div>

                            <div class="pie_bg" style="text-align: center; display: none; margin-bottom: 17px">
                              <canvas id="canvas_doughnut4" height="130"></canvas>
                            </div>

                             
                            <div style="text-align: center; overflow: hidden; margin: 10px 5px 3px;">
                              <canvas id="canvas_line4" height="190"></canvas>
                            </div>
                            <div>
                              <ul class="list-inline widget_tally">
                                <li>
                                  <p>
                                    <span class="month">12 December 2014 </span>
                                    <span class="count">+12%</span>
                                  </p>
                                </li>
                                <li>
                                  <p>
                                    <span class="month">29 December 2014 </span>
                                    <span class="count">+12%</span>
                                  </p>
                                </li>
                                <li>
                                  <p>
                                    <span class="month">16 January 2015 </span>
                                    <span class="count">+12%</span>
                                  </p>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
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

 
?>

<!-- Chart.js -->
    <script src="../../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="../../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- easy-pie-chart -->
    <script src="../../vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>


  <script>
      $(function() {
        $('.chart').easyPieChart({
          easing: 'easeOutElastic',
          delay: 3000,
          barColor: '#26B99A',
          trackColor: '#fff',
          scaleColor: false,
          lineWidth: 20,
          trackWidth: 16,
          lineCap: 'butt',
          onStep: function(from, to, percent) {
            $(this.el).find('.percent').text(Math.round(percent));
          }
        });
      });
    </script>

    <script>
      $(document).ready(function() {
        Chart.defaults.global.legend = {
          enabled: false
        };

        new Chart(document.getElementById("canvas_line"), {
          type: 'line',
          data: {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
              label: "My First dataset",
              backgroundColor: "rgba(38, 185, 154, 0.31)",
              borderColor: "rgba(38, 185, 154, 0.7)",
              pointBorderColor: "rgba(38, 185, 154, 0.7)",
              pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
              pointHoverBackgroundColor: "#fff",
              pointHoverBorderColor: "rgba(220,220,220,1)",
              pointBorderWidth: 1,
              data: [31, 74, 6, 39, 20, 85, 7]
            }, {
              label: "My Second dataset",
              backgroundColor: "rgba(3, 88, 106, 0.3)",
              borderColor: "rgba(3, 88, 106, 0.70)",
              pointBorderColor: "rgba(3, 88, 106, 0.70)",
              pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
              pointHoverBackgroundColor: "#fff",
              pointHoverBorderColor: "rgba(151,187,205,1)",
              pointBorderWidth: 1,
              data: [82, 23, 66, 9, 99, 4, 2]
            }]
          },
        });

        new Chart(document.getElementById("canvas_line1"), {
          type: 'line',
          data: {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
              label: "My First dataset",
              backgroundColor: "rgba(38, 185, 154, 0.31)",
              borderColor: "rgba(38, 185, 154, 0.7)",
              pointBorderColor: "rgba(38, 185, 154, 0.7)",
              pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
              pointHoverBackgroundColor: "#fff",
              pointHoverBorderColor: "rgba(220,220,220,1)",
              pointBorderWidth: 1,
              data: [31, 74, 6, 39, 20, 85, 7]
            }, {
              label: "My Second dataset",
              backgroundColor: "rgba(3, 88, 106, 0.3)",
              borderColor: "rgba(3, 88, 106, 0.70)",
              pointBorderColor: "rgba(3, 88, 106, 0.70)",
              pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
              pointHoverBackgroundColor: "#fff",
              pointHoverBorderColor: "rgba(151,187,205,1)",
              pointBorderWidth: 1,
              data: [82, 23, 66, 9, 99, 4, 2]
            }]
          },
        });

        new Chart(document.getElementById("canvas_line2"), {
          type: 'line',
          data: {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
              label: "My First dataset",
              backgroundColor: "rgba(38, 185, 154, 0.31)",
              borderColor: "rgba(38, 185, 154, 0.7)",
              pointBorderColor: "rgba(38, 185, 154, 0.7)",
              pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
              pointHoverBackgroundColor: "#fff",
              pointHoverBorderColor: "rgba(220,220,220,1)",
              pointBorderWidth: 1,
              data: [31, 74, 6, 39, 20, 85, 7]
            }, {
              label: "My Second dataset",
              backgroundColor: "rgba(3, 88, 106, 0.3)",
              borderColor: "rgba(3, 88, 106, 0.70)",
              pointBorderColor: "rgba(3, 88, 106, 0.70)",
              pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
              pointHoverBackgroundColor: "#fff",
              pointHoverBorderColor: "rgba(151,187,205,1)",
              pointBorderWidth: 1,
              data: [82, 23, 66, 9, 99, 4, 2]
            }]
          },
        });

        new Chart(document.getElementById("canvas_line3"), {
          type: 'line',
          data: {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
              label: "My First dataset",
              backgroundColor: "rgba(38, 185, 154, 0.31)",
              borderColor: "rgba(38, 185, 154, 0.7)",
              pointBorderColor: "rgba(38, 185, 154, 0.7)",
              pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
              pointHoverBackgroundColor: "#fff",
              pointHoverBorderColor: "rgba(220,220,220,1)",
              pointBorderWidth: 1,
              data: [31, 74, 6, 39, 20, 85, 7]
            }, {
              label: "My Second dataset",
              backgroundColor: "rgba(3, 88, 106, 0.3)",
              borderColor: "rgba(3, 88, 106, 0.70)",
              pointBorderColor: "rgba(3, 88, 106, 0.70)",
              pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
              pointHoverBackgroundColor: "#fff",
              pointHoverBorderColor: "rgba(151,187,205,1)",
              pointBorderWidth: 1,
              data: [82, 23, 66, 9, 99, 4, 2]
            }]
          },
        });

        new Chart(document.getElementById("canvas_line4"), {
          type: 'line',
          data: {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
              label: "My First dataset",
              backgroundColor: "rgba(38, 185, 154, 0.31)",
              borderColor: "rgba(38, 185, 154, 0.7)",
              pointBorderColor: "rgba(38, 185, 154, 0.7)",
              pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
              pointHoverBackgroundColor: "#fff",
              pointHoverBorderColor: "rgba(220,220,220,1)",
              pointBorderWidth: 1,
              data: [31, 74, 6, 39, 20, 85, 7]
            }, {
              label: "My Second dataset",
              backgroundColor: "rgba(3, 88, 106, 0.3)",
              borderColor: "rgba(3, 88, 106, 0.70)",
              pointBorderColor: "rgba(3, 88, 106, 0.70)",
              pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
              pointHoverBackgroundColor: "#fff",
              pointHoverBorderColor: "rgba(151,187,205,1)",
              pointBorderWidth: 1,
              data: [82, 23, 66, 9, 99, 4, 2]
            }]
          },
        });
      });
    </script>
    
    <script>
      $('document').ready(function() {
        $(".sparkline_one").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 5, 6, 7, 5, 4, 3, 5, 6], {
          type: 'bar',
          height: '40',
          barWidth: 9,
          colorMap: {
            '7': '#a1a1a1'
          },
          barSpacing: 2,
          barColor: '#26B99A'
        });

        $(".sparkline_two").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 5, 6, 7, 5, 4, 3, 5, 6], {
          type: 'line',
          width: '200',
          height: '40',
          lineColor: '#26B99A',
          fillColor: 'rgba(223, 223, 223, 0.57)',
          lineWidth: 2,
          spotColor: '#26B99A',
          minSpotColor: '#26B99A'
        });
      })
    </script>
 

 