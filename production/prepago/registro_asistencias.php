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
                    <h2>Consultar asistencias <small>Clientes</small></h2>
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
                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 263px;">Codigo Membresia</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 263px;">Nombre</th>
                              <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 263px;">Apellido</th>
                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending"  >Promocion</th>  
                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 100px;">Monto Pagado</th>  
                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 197px;">Cantidad Meses/Clases</th>   
                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 197px;">Tipo Membresia</th>   
                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 197px;">Fecha inicio</th>   
                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 197px;">Fecha fin</th>                               
                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending"  >Asistencias</th>    
                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 197px;">Comentario</th>  
                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"   style="width: 197px;">Accion</th>
                         
                        </tr>
                      </thead>


                      <tbody>  
                        <?php

                        $srpt ="SELECT a.*,d.tipo , (select count(*) from asistencia_log 
                        where codigo_membresia=a.codigo_membresia ) cantidad2 , c.nombre , c.apellido
                         FROM suscripcion a inner join persona c on a.codigo_membresia=c.codigo_membresia   
                          inner join catalogo_promocion d on a.tipo_membresia=d.id_promocion
                         where a.fecha_fin >=sysdate()";   
                            $qsrp = mysqli_query($db->conectar(),$srpt);
                           // echo $srpt;
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
                                 echo "<td>".$rowrp['promocion']."</td>";
                                 echo "<td> $ ".$rowrp['cuota']."</td>";
                                 echo "<td>".$rowrp['cantidad']."</td>";
                                 
                                 switch ($rowrp['tipo']) {
                                   case 1:
                                      echo "<td>Mensual</td>";
                                     break;
                                    case 2:
                                     echo "<td>Clases</td>";
                                    break;
                                    
                                    default:
                                    echo "<td></td>";  


                                    
                                 }   
                                 echo "<td>".$rowrp['fecha_inicio']."</td>";
                                 echo "<td>".$rowrp['fecha_fin']."</td>";
                                 echo "<td>".$rowrp['cantidad2']."</td>";
                                 echo "<td>".$rowrp['comentario']."</td>";
                                
                                 echo "<td><a href='nueva_asistencia.php?id=".$rowrp['codigo_membresia']."&ids=".$rowrp['id_suscripcion']."'>Registrar asistencias</a></td>";
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