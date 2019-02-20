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
          <div class="">
             

                 <!-- start  --> 
                    
                    <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Consultar asistencias <small>Users</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li> 
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  
                    <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                      
                          <div class="row">
                            <div class="col-sm-12">
                      <table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                      <thead>
                        <tr role="row">
                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 263px;">Codigo</th>
                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 263px;">Nombre</th>
                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 263px;">Apellido</th>
                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 263px;">Tipo</th>
                            
                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 197px;">Fecha asistencia</th> 
                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 197px;">Fecha vencimiento</th>
                        </tr>
                      </thead>


                      <tbody> 
                        
                        
                     
                        <?php

                        $srpt ="SELECT t1.codigo_membresia,t1.idsuscripcion,t3.nombre,t3.apellido,t2.fecha_fin,t1.fecha_registro, case t2.tipo_membresia when 1 then \"Mensual\" else \"Clases\" END tipo FROM asistencia_log t1 inner join suscripcion t2 on t1.idsuscripcion=t2.id_suscripcion inner join persona t3 on t2.codigo_membresia=t3.codigo_membresia where t1.fecha_registro >= DATE_FORMAT(STR_TO_DATE(concat(\"01/\",month(sysdate()),\"/\", YEAR(sysdate())  ), \"%d/%m/%Y\"), \"%Y-%m-%d\")";

                            $qsrp = mysqli_query($db->conectar(),$srpt);
                            //echo $srpt;
                            if(mysqli_num_rows($qsrp)==0)
                            {
                            echo 'Sin resultados';
                            }
                            else
                            {
                              while ($rowrp = mysqli_fetch_array($qsrp)) 
                              {
                                 //     print_r($rowrp);  
                                echo "<tr>";
                                 echo "<td>".$rowrp['codigo_membresia']."</td>"; 
                                 echo "<td>".$rowrp['nombre']."</td>"; 
                                 echo "<td>".$rowrp['apellido']."</td>"; 
                                 echo "<td>".$rowrp['tipo']."</td>"; 
                                 echo "<td>".$rowrp['fecha_registro']."</td>"; 
                                 echo "<td>".$rowrp['fecha_fin']."</td>";
                                 echo "</tr>" ;
                                      //$this->consumos[] = $rowrp;
                              }
                            }
                      ?>
                      </tbody>
                    </table></div></div>

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
    </script>
    <!-- /Datatables -->