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
 $ingresoxmes=$db->reportep_ingresosxmesh();  



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


//%de clientes asisitiendo
 $xcent_clientesa=$clientes_asis/($suscripciones_a[0]['suscripciones']+$suscripciones_v[0]['suscripciones']);


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
                          <a href="reportes_suscripa.php"><p>Detalle.</p></a>
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
                        <span>Promedio Asistencia por Dia</span>
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
                      


                      <div class="col-md-4 col-xs-12 widget widget_tally_box">
                        <div class="x_panel fixed_height_390">
                          <div class="x_title">
                            <h2>Ingresos Mensuales</h2>
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
                                    <div class="progress-bar progress-bar-dark" role="progressbar" data-transitiongoal="<?php 
                                    if(isset($ingresoxmes[0]['ingresos'])){

                                     
                                      //calcular tamano de ingresos para la grafica de barra y poder dividir entre 10, 100 0 1000 
                                      $tamanio=strlen($ingresoxmes[0]['ingresos']);
                                      if($tamanio==3) 
                                        $divisible=10;

                                      if($tamanio==4) 
                                        $divisible=100;


                                      if($tamanio==5) 
                                        $divisible=1000;
                                      
                                      if($tamanio==5) 
                                        $divisible=10000;

                                         echo $ingresoxmes[0]['ingresos']/$divisible ;


                                    }
                                    ?>"></div>
                                  </div>
                                </li>
                                <li>
                                  <div class="progress vertical progress_wide bottom">
                                    <div class="progress-bar progress-bar-gray" role="progressbar" data-transitiongoal="<?php 
                                    if(isset($ingresoxmes[1]['ingresos'])){

                                     
                                      //calcular tamano de ingresos para la grafica de barra y poder dividir entre 10, 100 0 1000 
                                      $tamanio=strlen($ingresoxmes[1]['ingresos']);
                                      if($tamanio==3) 
                                        $divisible=10;

                                      if($tamanio==4) 
                                        $divisible=100;


                                      if($tamanio==5) 
                                        $divisible=1000;
                                      
                                      if($tamanio==5) 
                                        $divisible=10000;

                                         echo $ingresoxmes[1]['ingresos']/$divisible ;


                                    }
                                    ?>"></div>
                                  </div>
                                </li>
                                <li>
                                  <div class="progress vertical progress_wide bottom">
                                    <div class="progress-bar progress-bar-info" role="progressbar" data-transitiongoal="<?php 
                                    if(isset($ingresoxmes[2]['ingresos'])){

                                     
                                      //calcular tamano de ingresos para la grafica de barra y poder dividir entre 10, 100 0 1000 
                                      $tamanio=strlen($ingresoxmes[2]['ingresos']);
                                      if($tamanio==3) 
                                        $divisible=10;

                                      if($tamanio==4) 
                                        $divisible=100;


                                      if($tamanio==5) 
                                        $divisible=1000;
                                      
                                      if($tamanio==5) 
                                        $divisible=10000;

                                         echo $ingresoxmes[2]['ingresos']/$divisible ;


                                    }
                                    ?>"></div>
                                  </div>
                                </li>
                                <li>
                                  <div class="progress vertical progress_wide bottom">
                                    <div class="progress-bar progress-bar-success" role="progressbar" data-transitiongoal="<?php 
                                    if(isset($ingresoxmes[3]['ingresos'])){

                                     
                                      //calcular tamano de ingresos para la grafica de barra y poder dividir entre 10, 100 0 1000 
                                      $tamanio=strlen($ingresoxmes[3]['ingresos']);
                                      if($tamanio==3) 
                                        $divisible=10;

                                      if($tamanio==4) 
                                        $divisible=100;


                                      if($tamanio==5) 
                                        $divisible=1000;
                                      
                                      if($tamanio==5) 
                                        $divisible=10000;

                                         echo $ingresoxmes[3]['ingresos']/$divisible ;


                                    }
                                    ?>"></div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                            <div class="divider"></div>

                            <ul class="legend list-unstyled">
                              <li>
                                <p>
                                  <span class="icon"><i class="fa fa-square dark"></i></span> <span class="name">Mes <?php if(isset($ingresoxmes[0]['ingresos']))
                                    echo $ingresoxmes[0]['mes'];
                                   ?></span>
                                </p>
                              </li>
                              <li>
                                <p>
                                  <span class="icon"><i class="fa fa-square grey"></i></span> <span class="name">Mes <?php if(isset($ingresoxmes[1]['ingresos']))
                                    echo $ingresoxmes[1]['mes'];
                                   ?></span>
                                </p>
                              </li>
                              <li>
                                <p>
                                  <span class="icon"><i class="fa fa-square blue"></i></span> <span class="name">Mes <?php if(isset($ingresoxmes[2]['ingresos']))
                                    echo $ingresoxmes[2]['mes'];
                                   ?></span>
                                </p>
                              </li>
                              <li>
                                <p>
                                  <span class="icon"><i class="fa fa-square green"></i></span> <span class="name">Mes <?php if(isset($ingresoxmes[3]['ingresos']))
                                    echo $ingresoxmes[3]['mes'];
                                   ?></span>
                                </p>
                              </li>
                            </ul>

                          </div>
                        </div>
                      </div>


                      <div class="col-md-4 col-xs-12 widget widget_tally_box">
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

                      <div class="col-md-4 col-xs-12 widget widget_tally_box">
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

                       <div class="col-md-4 col-xs-12 widget widget_tally_box">
                        <div class="x_panel ui-ribbon-container fixed_height_390">
                           
                          <div class="x_title">
                            <h2>% de Clientes</h2>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">

                            <div style="text-align: center; margin-bottom: 17px">
                              <span class="chart" data-percent="<?php echo number_format($xcent_clientesa,2)*100; ?>">
                                                  <span class="percent"></span>
                              </span>
                            </div>

                            <h3 class="name_title">Asistiendo</h3>
                            <p>Detalle</p>

                            <div class="divider"></div>

                            <p>Muestra el % de clientes que estan asistiendo, para visualizar el % de clientes que se pueden renovar.</p>

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
 

 