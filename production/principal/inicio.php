<?php 

session_start();
 ?>
 <?php
if (isset($_SESSION['usuario'])){
	 //header("Location:../principal/index.php");
 }else{
	 echo'Error';
 header("Location: ../login.php");
 }

//print_r($_SERVER['REQUEST_URI']); 

 ?>
<?php
// session_start();  
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
    "11" => "Noviembre.",
    "12" => "Diciembre",
];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>..::Portal Mercadeo::..</title>
  <!-- Bootstrap -->
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../../vendors/animate.css/animate.min.css" rel="stylesheet">
	
    <!-- Custom Theme Style -->
    <link href="../../build/css/custom.min.css" rel="stylesheet">
	 <link href="inicio.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div id="login">
        <div class="well">
          <form class="form-singin" id="miform" method="POST" action="../prepago/p_consumo_diario.php">
           <img src="../images/logoclaro.png"><h1><p class="text-danger">Bienvenido Portal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mercadeo</p></h1>
		    <div class="x_content">
          <div class="col-md-6 col-sm-6 col-xs-6">
		  
						<h4><p class="text-primary"><strong>A&Ntilde;O.</strong></p></h4>
						
                          <select class="select2_single1 form-control"  name="anno" id="anno">
						   <option value="0">Selecione...</option>
							<?php
							  $periodo = $db->anno($_POST["elegido1"]);
							   foreach ($periodo as $key ) { 
										//echo $i;
										echo '<option value="'.$key['anno'].'">'.$key['anno'].'</option>';
								} 
							  ?>
                          </select>
			
						</div>
						 <div class="col-md-6 col-sm-6 col-xs-6">
		  
						<h4><p class="text-primary"><strong>MES.</strong></p></h4>
						
                          <select class="select2_single form-control"  name="mes" id="mes">
						   <option value="0">Selecione...</option>
							<?php
							  $periodo = $db->anno();
							   foreach ($periodo as $key ) { 
										//echo $i;
										 echo'<option value="';
										   echo $key['mes'];
										   echo '">';
										   echo $fecha1=$arrayM[$key['mes']];
										   echo '</option>';
								} 
							  ?>
                          </select>
						</div>
						
							 <div class="col-md-9 col-md-offset-1">
						<br />
						<h4><p class="text-primary"><strong>FECHA DISPONIBLE.</strong></p></h4>
						
                          <select class="select2_single2 form-control"  name="fecha" id="fecha">
						  
                          </select>
			
						</div>
						
								
						</div>
						<div class="col-md-9 col-sm-6 col-xs-6" id="mensaje">
						<h5><p class="text-danger">Mensaje</p></h5>
						</div>
						 <div class="col-md-9 col-md-offset-3">
							<br />
							   <button type="submit" class="btn btn-round btn-danger" id="btn_enviar"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Aceptar</button>
							</div>
					  </div>
					  </div>
					  </form>
					</div>
		  </body>
		</html>
    <!-- jQuery -->
    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../../vendors/Flot/jquery.flot.js"></script>
    <script src="../../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../../vendors/moment/min/moment.min.js"></script>
    <script src="../../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../../build/js/custom.min.js"></script>

<script>
    $(document).ready(function(){
        // Parametros para el mes
       $(".select2_single1").change(function () {
            $(".select2_single1 option:selected").each(function () {
                elegido=$(this).val();    
            });
       })
        // Parametros para el año
       $(".select2_single").change(function () {
            $(".select2_single option:selected").each(function () {
				
					elegido1=$(this).val();
                    $.post("datosfecha.php", { elegido: elegido,elegido1: elegido1 }, function(data){
                    $("#fecha").html(data);
                    
                });
                    
            })
       })
    });
	</script>
