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
                    <h2>Consultar<small>Clientes</small></h2>
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
                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 197px;">nombre</th>  
                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 197px;">apellido</th>   
                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 420px;">Telefono</th>                           
                           
                          <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 197px;">Email</th>   
                           <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"   style="width: 197px;">Fecha de naciemiento</th> 
                           <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"   style="width: 197px;">Fecha de Vencimiento</th> 
                        </tr>
                      </thead>


                      <tbody>  
                        <?php

                        $srpt ="SELECT t2.*, max(t1.fecha_fin) fecha_fin  FROM `suscripcion` t1 INNER JOIN persona t2 ON t1.codigo_membresia=t2.codigo_membresia WHERE (select max(fecha_fin) from suscripcion where codigo_membresia=t2.codigo_membresia) > sysdate() and datediff((select max(fecha_fin) from suscripcion where codigo_membresia=t2.codigo_membresia),sysdate())<90 group by t2.nombre,t2.apellido,t2.telefono,t2.email,t2.fecha_nac,t2.codigo_membresia";  
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
                                 echo "<td>".$rowrp['telefono']."</td>";
                                 echo "<td>".$rowrp['email']."</td>";
                                 echo "<td>".$rowrp['fecha_nac']."</td>";
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

$(document).on('ready',function(){       
    $('#delete').click(function(){
      //ingresa
        //var url = "update_clientes.php";
        //alert("hello");
        if(!confirm('¿Desea eliminar el cliente?')){
            e.preventDefault();
            return false;
        }
         alert("si");

       /* $.ajax({                        
           type: "POST",                 
           url: url,                     
           data: $("#update_clientes").serialize(), 
           success: function(data)             
           {
             $('#resp').html(data); 
             alert(data);  
                         
           }
       });*/
    });
});

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