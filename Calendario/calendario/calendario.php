<?php 
session_name('calendario');
session_start(calendario);

if (isset($_SESSION['usuario'])){
   //header("Location: ../calendario/calendario.php");
 }else{
    header("Location: ../login.php");
 echo'Error de usuario o contrasena';
 }
//print_r($_SERVER['REQUEST_URI']); 
  ?>
 <?php
include("../../production/clases/class.php");
$db = new BaseDatos();
$consultar=$db->select_calendario();  
/*
for ($i=0; $i<$consultar; $i++) { 
 
}*/
 $base=($consultar[0]['base']);

$usuario=($_SESSION['usuario']);
//print_r($usuario);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>.::Calendario::.</title>

   <!-- Bootstrap -->
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
     <!-- FullCalendar -->
    <link href="../../vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="../../vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">
    <!-- Datatables -->
    <link href="../../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="form">
   <!-- page content -->
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
        <!-- top navigation -->
        <div class="top_nav">
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../../production/images/claro.png" alt=""><?php echo $usuario?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Perfil</a></li>
                    <li><a href="../validar/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
        </div>
        <!-- /top navigation -->
              <div class="x_title">
              <div class="title_left">
                <h3>Calendario <small>Haga clic para agregar / editar eventos</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Eventos de calendario<small>Sesiones</small>
                    <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i>
                    Imprimir calendario</button></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id='calendar'></div>

                  </div>
                </div>
              </div> 
            </div>
            <!-- footer content -->
        <footer>
          <div class="pull-right">
          Gerencia de Mercadeo <a href="#">Claro</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
          </div>
       </div>
        <!-- /page content -->
  </body>
  </html>
<!-- jQuery -->
    <script src="../../vendors/datepicker/jquerydate.js"></script>
    <script src="../../vendors/datepicker/jquerydate-ui.min.js"></script>
  <!------------------------------------------------------------------------------------>
    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../../vendors/Chart.js/dist/Chart.min.js"></script>
   
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
 
    <!-- bootstrap-daterangepicker -->
    <script src="../../vendors/moment/min/moment.min.js"></script>
    <script src="../../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- full calendar -->
     <script src="../../vendors/fullcalendar/dist/fullcalendar.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../../build/js/custom.min.js"></script>

   <!-- Datatables -->
    <script src="../../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../../vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="../../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../../vendors/pdfmake/build/vfs_fonts.js"></script>

     <!-- morris.js -->
    <script src="../../vendors/raphael/raphael.min.js"></script>
    <script src="../../vendors/morris.js/morris.min.js"></script>

    <script src="../../vendors/echarts/dist/echarts.min.js"></script>
  <!-- Select2 -->
    <script src="../../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- JQVMap 

 <!-- calendar modal -->
    <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Nueva entrada de calendario</h4>
          </div>
          <div class="modal-body">
            <div id="testmodal" style="padding: 5px 20px;">
              <form id="antoform" class="form-horizontal calender" role="form">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Titulo:</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="title">
                    <input type="hidden" id="fecha" name="fecha"/>
                    <input type="hidden" id="usuario" name="usuario" class="form-control"
                        value="<?php echo $usuario?>">
                    <input type="hidden" id="fecha_fin" name="fecha_fin"/>
                    <input type="hidden" id="fecha_ingreso" name="fecha_ingreso"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Descripción:</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" id="descr" name="descr"></input>
                  </div>
                </div>
         <div class="form-group">
                  <label class="col-sm-3 control-label">Texto:</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" style="height:55px;" id="text" name="text"></textarea>
                  </div>
                </div>
          <div class="form-group">
                <label class="col-sm-3 control-label">BASE:</label>
                  <div class="col-sm-9">
                  <select class="select2_single1 form-control"  name="tipo" id="tipo" selected='OTRA'>
                      <option value="PREPAGO_HIBRIDO">PREPAGO HIBRIDO</option>
                       <option value="PREPAGO_PURO">PREPAGO PURO</option>
                       <option value="POSPAGO">POSPAGO</option>
                       <option value="PREPAGO_OFF">PREPAGO OFF</option>
                       <option value="PREPAGO_ON">PREPAGO ON</option>
                       <option value="OTRA">OTRA</option>
                      </select>
                    </div>
                  </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Cerrar</button>
            <button type="submit" id="agregar" class="btn btn-primary antosubmit">Guardar Cambios</button>
          </div>
        </div>
      </div>
    </div>
    <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel2">Editar entrada de calendario</h4>
          </div>
          <div class="modal-body">

            <div id="testmodal2" style="padding: 5px 20px;">
              <form id="antoform2" class="form-horizontal calender" role="form">
                <!-- mostrar usuarios-->
                  <div class="form-group" >
                    <div class="pull-right">
                  <label class="col-sm-6 control-label">Creado por:</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="user1" name="user1" readonly="readonly"
                    >
                   </div>
                  </div>
                </div>
           
                <div class="form-group">
                  <label class="col-sm-3 control-label">Titulo:</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title2" name="title2">
                    <input type="hidden" class="form-control" id="id" name="id">
                    <input type="hidden" id="fecha2" name="fecha2"/>
                  <input type="hidden" id="usuario2" name="usuario2" class="form-control"
                    value="<?php echo $usuario?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Descriptión:</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="descr2" name="descr2"></input>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Texto:</label>
                  <div class="col-sm-9">
                  <textarea class="form-control" style="height:55px;" id="text2" name="text2"></textarea>
                  </div>
                </div>
                <div class="form-group">
                <label class="col-sm-3 control-label">BASE:</label>
                  <div class="col-sm-9">
                  <select class="select2_single1 form-control"  name="tipo2" id="tipo2">
                       <option value="PREPAGO_HIBRIDO">PREPAGO HIBRIDO</option>
                       <option value="PREPAGO_PURO">PREPAGO PURO</option>
                       <option value="POSPAGO">POSPAGO</option>
                       <option value="PREPAGO_OFF">PREPAGO OFF</option>
                       <option value="PREPAGO_ON">PREPAGO ON</option>
                       <option value="OTRA">OTRA</option>
                      </select>
                      
                      <script type="text/javascript">
                      $(function(){
                        
                        $('#tipo2').val('<?php echo $base;?>')
                         
                      });
                      </script>
                    </div>
                  </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Cerrar</button>
            <button type="submit" id="editar" class="btn btn-primary antosubmit2">Guardar cambios</button>
            <button type="submit" id="btn_eliminar" class="btn btn-danger antosubmit3">Borrar</button>
          </div>
        </div>
      </div>
    </div>
  
    <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
    <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
   <div id="oculto" style="visibility: hidden" name="selcc" type="text" > </div>
   <div id="oculto2" style="visibility: hidden" name="selcc" type="text" > </div>
    <!-- /calendar modal -->

 <!-- FullCalendar -->

    <script>
      $(window).load(function() {
        var date = new Date(),
            d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear(),
            started,
            categoryClass;
      

        var calendar = $('#calendar').fullCalendar({
  
    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio','Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          selectable: true,
          selectHelper: true,
          select: function(start, end, allDay) {
            $('#fc_create').click();
      
            started = start;
            ended = end;
      //captura los datos de fecha en inputs de tipo hidden
      
      $("#fecha").val($.fullCalendar.moment(started).format('YYYY/MM/DD'));
      $("#fecha_fin").val($.fullCalendar.moment(ended).format('YYYY/MM/DD'));
      $("#fecha_ingreso").val($.fullCalendar.moment().format('YYYY/MM/DD hh:mm:ss'));
    
      //$("#fecha_edicion").val($.fullCalendar.moment(start).format('YYYY/MM/DD hh:mm:ss'));
            $(".antosubmit").click(function(){
      
              var parametros = {
              "fecha" :fecha,
              "fecha_fin" :fecha_fin,
              "fecha_ingreso" :fecha_ingreso,
              "title" : title,
              "usuario":usuario,
              "descr" : descr
    
            };
      var title = $("#title").val();
      var  description = $("#descr").val();

              if (end) {
                ended = end;
              }
      
            $.ajax({
        
                data:  parametros,
                url:   'detalle_calendario.php',
                type:  'post',
                data: $("#antoform").serialize(), // Adjuntar los campos del formulario enviado.
        success: function(data)
                {
                  // alert("ingresa");
        $("#oculto").html(data); // Mostrar la respuestas del script PHP.
                }
            });

              categoryClass = $("#event_type").val();

              if (title) {
          //alert("title");
                calendar.fullCalendar('renderEvent', {
                    title: title,
          descr:descr,
                    start: started,
                    end: end,
                    allDay: allDay
                  },
                  true // make the event "stick"
                );
              }

              $('#title').val('');
              $('#descr').val('');

              calendar.fullCalendar('unselect');
              $('.antoclose').click();

              return false;
            });
          },
      
          eventClick: function(calEvent, jsEvent, view) {   
            $('#fc_edit').click();
            $('#title2').val(calEvent.title);
            $('#descr2').val(calEvent.description);
            $('#text2').val(calEvent.text);
            $('#user1').val(calEvent.user);
            $('#id').val(calEvent.id);  
      $("#fecha2").val($.fullCalendar.moment().format('YYYY/MM/DD hh:mm:ss'));
      //$("#fecha_fin2").val($.fullCalendar.moment(ended).format('YYYY/MM/DD'));
      
            categoryClass = $("#event_type").val();
      
            $(".antosubmit2").click(function(title2,descr2,fecha2){
        //alert("entra"); 
              calEvent.title = $("#title2").val();
              calEvent.description = $("#descr2").val();
              calEvent.text = $("#text2").val();
              calEvent.id = $ ('#id').val();
              calEvent.user = $("#user1").val();
         var parametros = {
                "fecha2" : fecha2,
                "title2" : title2,
                "descr2" : descr2,
                "user1" : user1,
                "id" : id
            };
          $.ajax({
                data:  parametros,
                url:   'detalle_calendario.php',
                type:  'post',
                data: $("#antoform2").serialize(), // Adjuntar los campos del formulario enviado.
        success: function(data)
                {
                  // alert("ingresa");
        $("#oculto2").html(data); // Mostrar la respuestas del script PHP.
                }
            });
              calendar.fullCalendar('updateEvent', calEvent);
              $('.antoclose2').click();
            });

            calendar.fullCalendar('unselect');
          },
      //eliminar
      
      //fin eliminar
          editable: true,
          events: [
      <?php
      //subtraigo la fecha por separado años mes dia
      if(count($consultar)>0){
       foreach ($consultar as $row ) {
      $fecha=$row['fecha_inicio'];
      $año=substr(($fecha),0 ,4);
      $mes=substr(($fecha),5 ,2);
      $dia=substr(($fecha),8,2);
      //print_r( $mes);
      //para la fecha de finalizar de actividad
      $fechaf=$row['fecha_fin'];
      $añof=substr(($fechaf),0 ,4);
      $mesf=substr(($fechaf),5 ,2);
      $diaf=substr(($fechaf),8,2);
        // {si es el ultimo 
      echo "{
      title: '".$row['titulo']."',
      id: '".$row['id']."',
      description: '".$row['Descripcion']."',
      text: '".$row['Nota']."',
      user: '".$row['usuario']."',
      start: new Date(".$año.", ".$mes."-1, ".$dia."),
      end: new Date(".$añof.", ".$mesf."-1, ".$diaf."),
      allDay: false
      },"; 
        }//fin del bucle for      
              }//sin de comprobacion de datos
      else{
      ?>
      {
      title: 'Inicio',
            start: new Date(y-2, m, d),
            end: new Date(y-2, m, d),
            allDay: false
      }
      <?php 
      }
      ?>
           ],
        eventColor: '#d44f53',
        });
      });
    </script>
<script>

   $(document).ready(function() {
       $('#agregar').click(function() {
            // Recargo la página
            location.reload();
        });
    $('#editar').click(function() {
            // Recargo la página
            location.reload();
        });
    });

</script>
    <!-- /FullCalendar -->
   <script>
        $("#btn_eliminar").click(function(id){
      //alert("ingresa");
      //Añadimos la imagen de carga en el contenedor
        $('#oculto2').html();
            var parametros = {
                "id" : id
            };
      
            $.ajax({
                data:  parametros,
                url:   'eliminar_nota.php',
                type:  'post',
                data: $("#antoform2").serialize(), // Adjuntar los campos del formulario enviado.
        success: function(data)
                {
                  // alert("ingresa");
        $("#oculto2").html(data); // Mostrar la respuestas del script PHP.
                }
            });
      return false; // Evitar ejecutar el submit del formulario.
        });
    </script>

  <script>
    $(document).ready(function() {
        $('#btn_eliminar').click(function() {
            // Recargo la página
            location.reload();
        });
    });
</script>