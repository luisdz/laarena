<?php
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
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Detalle Clientes <small>Asistiendo</small></h2>
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
                    <p class="text-muted font-13 m-b-30">
                       Muestra el detalle de todas las sucripciones activas.
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Periodo</th>
                          <th>Codigo</th>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Email</th>
                          <th>Telefono</th>
                          <th>Tipo Suscripcion</th>
                        
                          <th>N Asistencias</th>
                          <th>Precio</th>
                           
                          <th>Fecha Inicio</th>
                          <th>Fecha Fin</th>
                          <th>Estado </th>
                      
                        </tr>
                      </thead>

                          <tbody>  
                        <?php
                           
                           $qsrp=$db->reportep_clientesmora_detalle(); 
                        
                             if(mysqli_num_rows($qsrp)==0)
                            {
                            echo 'Sin resultados';
                            }
                            else
                            {
                              while ($rowrp = mysqli_fetch_array($qsrp)) 
                              {

                                 
                                echo "<tr>";
                                 echo "<td>".$rowrp['periodo']."</td>";
                                 echo "<td>".$rowrp['codigo_membresia']."</td>";
                                 echo "<td>".$rowrp['nombre']."</td>";
                                 echo "<td>".$rowrp['apellido']."</td>";
                                 echo "<td>".$rowrp['email']."</td>";
                                 echo "<td>".$rowrp['telefono']."</td>";
                              
                                 echo "<td>".$rowrp['tipo_membresia']."</td>";
                                 echo "<td >".$rowrp['cantidad_asistencia']."</td>";
                                 echo "<td> $".$rowrp['precio']."</td>";
                                  
                                 
                                 echo "<td>".$rowrp['fecha_inicio']."</td>";
                                 echo "<td>".$rowrp['fecha_fin']."</td>";
                                 echo "<td>".$rowrp['estado']."</td>";
                                 
                                 echo "</tr>" ;
                                      //$this->consumos[] = $rowrp;
                              }
                            }
                             
                      ?>
                      </tbody>



                    
                    </table>
                  </div>
                </div>
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