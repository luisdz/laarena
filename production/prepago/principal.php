<?php
include("../header.php");
//include("../page_content.php");
?>

<?php
//session_start();  
include("../clases/class.php");
 $db = new BaseDatos();
 
  
 
 

?>
 

  <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              

               
            </div>
            <div class="clearfix"></div>


            <div class="row">
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a tabindex="-1" href="../prepago/registro_clientes.php">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-child"></i>
                          </div>
                          <div class="count">Clientes</div>

                          <h3>Registro </h3>
                          <p>Cliente Nuevo.</p>
                        </div>
                      </a>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                         <a tabindex="-1" href="../prepago/registro_asistencias.php">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-calendar"></i>
                          </div>
                          <div class="count">Asistencia</div>

                          <h3>Registro</h3>
                          <p>Asistencia Diaria</p>
                        </div>
                      </a>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                         <a tabindex="-1" href="../prepago/registrar_suscripciones.php">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-cc-visa"></i>
                          </div>
                          <div class="count">Suscripcion</div>

                          <h3>Registros</h3>
                          <p>Nueva o Renovacion.</p>
                        </div>
                      </a>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a tabindex="-1" href="../prepago/reportes_principal.php">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-bar-chart"></i>
                          </div>
                          <div class="count">Reportes</div>

                          <h3>Consultas</h3>
                          <p>Clientes, Ingresos...</p>
                        </div>
                      </a>
                      </div>
                    </div>

                     
                     <img src="../images/arena_portada.jpg" alt="..."  class="img-responsive center-block">




            
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
    </script>
    <!-- /Datatables -->