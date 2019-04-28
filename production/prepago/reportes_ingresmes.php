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
                    <h2>Detalle Ingresos <small></small></h2>
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
                       Muestra el detalle de los ingresos de los ultimos meses
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <?php
                        $qsrp=$db->reportep_ingresmes_encabezado();
                       
                        $rowrp = mysqli_fetch_array($qsrp) ;

                        echo  '<tr>'; 
                        echo  '<th>'.$rowrp['mes2'].'</th>'; 
                        echo  '<th>'.$rowrp['mes3'].'</th>';
                        echo  '<th>'.$rowrp['mes4'].'</th>';
                        echo  '<th>'.$rowrp['cre2'].'</th>';
                        echo  '<th>'.$rowrp['cre3'].'</th>';
                        echo  '</tr>';
                        echo  '</thead>';                      

                      ?>

                          <tbody>  
                        <?php
                           
                           $qsrp=$db->reportep_ingresmes_detalle(); 
                        
                             if(mysqli_num_rows($qsrp)==0)
                            {
                            echo 'Sin resultados';
                            }
                            else
                            {
                              while ($rowrp = mysqli_fetch_array($qsrp)) 
                              {                                      
                                
                                echo "<tr>"; 
                                 echo "<td>$".$rowrp['mes2']."</td>"; 
                                 echo "<td>$".$rowrp['mes3']."</td>";                                
                                 echo "<td>$".$rowrp['mes4']."</td>";
                                echo  '<td>$'.$rowrp['cre2'].'</td>';
                                echo  '<td>$'.$rowrp['cre3'].'</td>';
                                 echo "</tr>" ;
                                      //$this->consumos[] = $rowrp;
                              }
                            }
                             
                      ?>
                      </tbody>



                    
                    </table>
                    <br>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <?php
                        $qsrp=$db->reportep_ingresmes_encabezado();
                       
                        $rowrp = mysqli_fetch_array($qsrp) ;

                        echo  '<tr>'; 
                        echo  '<th>Mes</th>'; 
                        echo  '<th>Ingresos</th>';
                        echo  '<th>Asistencias</th>';
                        echo  '<th>Clientes</th>'; 
                        echo  '</tr>';
                        echo  '</thead>';                      

                      ?>

                          <tbody>  
                        <?php
                           
                           $qsrp=$db->reportep_ingresmes_detalle2(); 
                        
                             if(mysqli_num_rows($qsrp)==0)
                            {
                            echo 'Sin resultados';
                            }
                            else
                            {
                              while ($rowrp = mysqli_fetch_array($qsrp)) 
                              {                                      
                                
                                echo "<tr>"; 
                                 echo "<td>".$rowrp['mes_esp']."</td>"; 
                                 echo "<td>$".$rowrp['ingresos']."</td>";                                
                                 echo "<td>".$rowrp['asistencias']."</td>";
                                echo  '<td>'.$rowrp['clientes'].'</td>'; 
                                 echo "</tr>" ;
                                      //$this->consumos[] = $rowrp;
                              }
                            }
                             
                      ?>
                      </tbody>
                    </table>

                    <br>

                    

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