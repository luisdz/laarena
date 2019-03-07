


<?php
header('refresh:5; Location: /laarena/laarena/registro_asistencias.php');
include("../header.php");
//include("../page_content.php");
?>

<?php
// session_start();  
include("../clases/class.php");
 $db = new BaseDatos();
 
  

?>
 

  <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
             

                 <!-- start  --> 
                    
                    <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Consultar asistencias</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li> 
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     
                     <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button> 
<?php
                    	$codigo=$_GET['id'];  
                      $idsuscripcion=$_GET['ids']; 
                      $tipo=$_GET['t']; 
                      $cant=$_GET['c'];                        
                      $asist=$_GET['a']; 
                      
                      if(intval($tipo)==1)
                      {
                        $sql_fechafin="select datediff(max(fecha_fin),sysdate()) dif from suscripcion where id_suscripcion=".$idsuscripcion." and codigo_membresia=\"".$codigo."\"";                     
                      $query01 = mysqli_query($db->conectar(),$sql_fechafin); 
                      $result01 = mysqli_fetch_array($query01) ;
                        if ( intval($result01['dif'])>=0) //suscripcion vigente
                      {
                        $srpt ="INSERT INTO asistencia_log (codigo_membresia,fecha_registro,idsuscripcion)
                              VALUES ('".$codigo."', sysdate(),".$idsuscripcion.")"; 
                                  $qsrp = mysqli_query($db->conectar(),$srpt); 
                                  echo '<strong>Asistencia registrada!.</strong>';                        
                      }
                      else         //suscricion vencida
                      {
                        $sql_fechaultima="select datediff(max(fecha_fin),sysdate()) dif from suscripcion where codigo_membresia=\"".$codigo."\"";
                        $query02 = mysqli_query($db->conectar(),$sql_fechaultima); 
                      $result02 = mysqli_fetch_array($query02) ; 
                       if ( intval($result02['dif'])>=0) //suscripcion vigente
                      {
                                  echo '<strong>No se pudo registrar asistencia, cliente posee otra suscripcion activa!.</strong>';

                      }
                      else
                      {
                         $srpt ="INSERT INTO asistencia_log (codigo_membresia,fecha_registro,idsuscripcion)
                              VALUES ('".$codigo."', sysdate(),".$idsuscripcion.")"; 
                                  $qsrp = mysqli_query($db->conectar(),$srpt);
                                  echo '<strong>Asistencia registrada!.</strong>';  
                      }

                                 
                      }
                      }
                      else
                      {
                        if(intval($cant)<=intval($asist))
                        {
                           echo '<strong>No se pudo registrar asistencia, cliente alcanzo limite de clases !.</strong>';
                        }
                        else
                        {
                          $srpt ="INSERT INTO asistencia_log (codigo_membresia,fecha_registro,idsuscripcion)
                              VALUES ('".$codigo."', sysdate(),".$idsuscripcion.")"; 
                                  $qsrp = mysqli_query($db->conectar(),$srpt);
                                  echo '<strong>Asistencia registrada!.</strong>'; 
                        }

                      }
                      
                      $sql2 = "UPDATE suscripcion t1 set estado=2  where sysdate()>=fecha_fin";
                      $result2=mysqli_query($db->conectar(),$sql2); 

                      $sql3 = "UPDATE suscripcion t1 set estado=2  where (select max(tipo) from catalogo_promocion where id_promocion=t1.tipo_membresia)=2 and (select count(*) from asistencia_log where idsuscripcion=t1.id_suscripcion)>=t1.cantidad";
                      $result3=mysqli_query($db->conectar(),$sql3); 
                                
 
  //header( "refresh:2; url=/laarena/production/prepago/registro_asistencias.php" );  

?>
                  </div>

                  <form id="update_clientes" data-parsley-validate class="form-horizontal form-label-left">
                      <?php


                      $srpt ="SELECT t2.codigo_membresia,t2.id_suscripcion as idsuscripcion,t3.nombre,t3.apellido,t2.fecha_fin, case t2.tipo_membresia when 1 then \"Mensual\" else \"Clases\" END tipo FROM suscripcion t2 inner join persona t3 on t2.codigo_membresia=t3.codigo_membresia where t2.codigo_membresia='".$_GET['id']."'"." and t2.id_suscripcion=".$_GET['ids']."";
//echo $srpt;
                        //$srpt ="select * from persona where codigo_membresia='".$_GET['id']."'"; DATE_FORMAT(fecha_nac, \"%m%d%Y\")  
                            $qsrp = mysqli_query($db->conectar(),$srpt);
                            $rowrp = mysqli_fetch_array($qsrp); 
                      ?>




                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="id">Codigo<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="id" name="id" required="required" readonly="readonly" <?php echo "value='".$_GET['id']."'"   ?>  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nombre" name="nombre" required="required" readonly class="form-control col-md-7 col-xs-12" <?php echo "value='".$rowrp['nombre']."'" ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">Apellido<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="apellido" name="apellido" required="required" readonly <?php echo "value='".$rowrp['apellido']."'" ?> class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de vencimiento <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="fecha" name="fecha" type="text" readonly class="form-control" <?php echo "value='".$rowrp['fecha_fin']."'" ?> >
                         <!--<input id="fecha" name="fecha" type="text" class="form-control"  data-inputmask="'mask': '99/99/9999'"> -->
                        </div>
                      </div>
                      <div class="ln_solid"></div> 

                    </form>

                     <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
                          <?php 
                          echo "<a name='volver' id='volver' class='btn btn-round btn-primary' href='registro_asistencias.php'>Volver</a>";
                          ?>
                     </div>
                  </div>
                </div>
              </div> 
            </div>
                       
                    <!-- End -->


            
          </div>
        </div>
        <!-- /page content -->


<?php
include("../footer.php");

 
?>
 
<script>      

      $( document ).ready(function() { 
        setTimeout(function() {
    window.location.href= 'registro_asistencias.php';
}, 3000);
});
    </script>
   
  <script>
      $(document).ready(function() {
        
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              "ordering":false,
              "searching":false,
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
              if ($("#datatable-buttons1").length) {
            $("#datatable-buttons1").DataTable({
              dom: "Bfrtip",
              "ordering":false,
              "searching":false,
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }

        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 31, 'desc' ]],
          'columnDefs': [
            { orderable: true, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
 

    </script>
    <!-- /Datatables -->