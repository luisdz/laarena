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
                   <?php
                        $srpt ="SELECT  count( DISTINCT t1.codigo_membresia) cant   FROM `suscripcion` t1 INNER JOIN persona t2 ON t1.codigo_membresia=t2.codigo_membresia WHERE (select max(fecha_fin) from suscripcion where codigo_membresia=t2.codigo_membresia) > sysdate() and datediff((select max(fecha_fin) from suscripcion where codigo_membresia=t2.codigo_membresia),sysdate()) BETWEEN 0 and 15";
                         
                        //$sql = "SELECT t2.*,t1.fecha_fin FROM `suscripcion` t1 INNER JOIN persona t2 ON t1.codigo_membresia=t2.codigo_membresia WHERE fecha_fin > sysdate() and datediff(fecha_fin,sysdate())<6";  
                            $qsrp = mysqli_query($db->conectar(),$srpt);
                            //echo $srpt;
                            $rowrp = mysqli_fetch_array($qsrp); 

                            $srpt2 ="SELECT count( DISTINCT t1.codigo_membresia) cantidad FROM persona t1 where datediff( sysdate(), (select max(fecha_registro) from asistencia_log where codigo_membresia=t1.codigo_membresia )) > 30";

                            $srpt3="SELECT count( DISTINCT t1.codigo_membresia) cantidad FROM persona t1 where datediff(sysdate(),(select max(fecha_fin) from suscripcion where codigo_membresia=t1.codigo_membresia ))  BETWEEN 1 and 15"; 

                            $srpt4="SELECT count( DISTINCT t1.codigo_membresia) cantidad FROM persona t1 where datediff(sysdate(),(select max(fecha_fin) from suscripcion where codigo_membresia=t1.codigo_membresia ))  BETWEEN 16 and 30";

                            $srpt5="SELECT count( DISTINCT t1.codigo_membresia) cantidad FROM persona t1 where datediff(sysdate(),(select max(fecha_fin) from suscripcion where codigo_membresia=t1.codigo_membresia ))  > 30";

                            $srpt6="SELECT  count( DISTINCT t1.codigo_membresia) cant   FROM `suscripcion` t1 INNER JOIN persona t2 ON t1.codigo_membresia=t2.codigo_membresia WHERE (select max(fecha_fin) from suscripcion where codigo_membresia=t2.codigo_membresia) > sysdate() and datediff((select max(fecha_fin) from suscripcion where codigo_membresia=t2.codigo_membresia),sysdate()) BETWEEN 16 and 30";



                         
                        //$sql = "SELECT t2.*,t1.fecha_fin FROM `suscripcion` t1 INNER JOIN persona t2 ON t1.codigo_membresia=t2.codigo_membresia WHERE fecha_fin > sysdate() and datediff(fecha_fin,sysdate())<6";  
                            $qsrp2 = mysqli_query($db->conectar(),$srpt2);
                            //echo $srpt;
                            $rowrp2 = mysqli_fetch_array($qsrp2); 

                             $qsrp3 = mysqli_query($db->conectar(),$srpt3);
                            //echo $srpt;
                            $rowrp3 = mysqli_fetch_array($qsrp3); 

                            $qsrp4 = mysqli_query($db->conectar(),$srpt4);
                            //echo $srpt;
                            $rowrp4 = mysqli_fetch_array($qsrp4); 

                            $qsrp5 = mysqli_query($db->conectar(),$srpt5);
                            //echo $srpt;
                            $rowrp5 = mysqli_fetch_array($qsrp5); 

                            $qsrp6 = mysqli_query($db->conectar(),$srpt6);

                            $rowrp6 = mysqli_fetch_array($qsrp6);
                      ?>
                   

<div class="row top_tiles">

                

              <div class="col-md-6">
                <div class="tile-stats">
                  <div class="icon" style="color: #337ab7;"><i class="fa fa-bell-o"></i></div>
                  <div class="count"><?php echo  $rowrp2['cantidad']?></div>
                  <a href="suscripcion_inactivos.php"><h3>Clientes inactivos</h3></a>
                </div>
              </div>
               <div class="col-md-6">
                <div class="tile-stats">
                  <div class="icon" style="color: #337ab7;"><i class="fa fa-bell-o"></i></div>
                  <div class="count"><?php echo  $rowrp3['cantidad']?></div>
                  <a href="suscripcion_vencida_15.php"><h3>Clientes Suscripcion Vencida de 1 a 15 dias</h3></a>
                </div>
              </div>
               <div class="col-md-6">
                <div class="tile-stats">
                  <div class="icon" style="color: #337ab7;"><i class="fa fa-bell-o"></i></div>
                  <div class="count"><?php echo  $rowrp4['cantidad']?></div>
                  <a href="suscripcion_vencida_30.php"><h3>Clientes Suscripcion Vencida de 16 a 30 dias</h3></a>
                </div>
              </div>
               <div class="col-md-6">
                <div class="tile-stats">
                  <div class="icon" style="color: #337ab7;"><i class="fa fa-bell-o"></i></div>
                  <div class="count"><?php echo  $rowrp5['cantidad']?></div>
                  <a href="suscripcion_vencida_mas30.php"><h3>Clientes Suscripcion Vencida mas de 30 dias</h3></a>
                </div>
              </div> 
              <div class="col-md-6">
                <div class="tile-stats">
                  <div class="icon" style="color: #337ab7;"><i class="fa fa-bell-o"></i></div>
                  <div class="count"><?php echo  $rowrp['cant']?></div>
                  <a href="suscripcion_vencimiento_15.php"><h3>Clientes proximos a vencer dentro de 1 a 15 dias</h3> </a>
                </div>
              </div>
              <div class="col-md-6">
                <div class="tile-stats">
                  <div class="icon" style="color: #337ab7;"><i class="fa fa-bell-o"></i></div>
                  <div class="count"><?php echo  $rowrp6['cant']?></div>
                  <a href="suscripcion_vencimiento_30.php"><h3>Clientes proximos a vencer dentro de 16 a 30 dias</h3> </a>
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