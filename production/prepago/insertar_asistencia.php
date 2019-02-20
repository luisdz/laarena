


<?php
// header('refresh:5; Location: /laarena/laarena/registro_asistencias.php');
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
                      $sql_fechafin="select datediff(max(fecha_fin),sysdate()) dif from suscripcion where id_suscripcion=".$idsuscripcion." and codigo_membresia=\"".$codigo."\"";                     
                      $query01 = mysqli_query($db->conectar(),$sql_fechafin); 
                      $result01 = mysqli_fetch_array($query01) ;
                      if ( intval($result01['dif'])>=0) {
                        $srpt ="INSERT INTO asistencia_log (codigo_membresia,fecha_registro,idsuscripcion)
                              VALUES ('".$codigo."', sysdate(),".$idsuscripcion.")"; 
                                  $qsrp = mysqli_query($db->conectar(),$srpt); 
                                  echo '<strong>Asistencia registrada!.</strong>';                        
                      }
                      else
                      {
                                  echo '<strong>Error!.'.$result01['dif'].' </strong>';
                      }


                              
                                  
 
  //header( "refresh:2; url=/laarena/production/prepago/registro_asistencias.php" );  

?>
                  </div>
                     <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
                          <?php 
                          echo "<a class='btn btn-round btn-primary' href='registro_asistencias.php'>Volver</a>";
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


document.addEventListener('DOMContentLoaded', function() {
   setTimeout(function(){// wait for 5 secs(2)
           //window.location.replace("registro_asistencias.php");
      }, 3000);
}, false);

    </script>
    <!-- /Datatables -->