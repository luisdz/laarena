<?php
$stonevar = isset($_GET['id']) ? $_GET['id'] : NULL;

                       if (empty($stonevar)) {
                          header("Location: /laarena/production/prepago/registro_asistencias.php");
                          exit();
                        }
?>


<?php
include("../header.php");
//include("../page_content.php");
?>

<?php
// session_start();  
include("../clases/class.php");
 $db = new BaseDatos();
 
//$ingresar=$db->ingresar_clientes();  
  

?>
 

  <!-- page content -->
        <div class="right_col" role="main">

            <div id="resp"> </div>

          <div class="">
                    <!-- End SmartWizard Content -->

                     <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Asistecias <small>Clientes</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>  
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="update_clientes" data-parsley-validate class="form-horizontal form-label-left">
                      <?php

                      

                      $srpt="select *, fecha_nac fecha from persona where codigo_membresia='".$_GET['id']."'";


                      $srpt ="SELECT t1.codigo_membresia,t1.idsuscripcion,t3.nombre,t3.apellido,t2.fecha_fin,t1.fecha_registro, case t2.tipo_membresia when 1 then \"Mensual\" else \"Clases\" END tipo FROM asistencia_log t1 inner join suscripcion t2 on t1.idsuscripcion=t2.id_suscripcion inner join persona t3 on t2.codigo_membresia=t3.codigo_membresia where t1.codigo_membresia='".$_GET['id']."'"." and t2.id_suscripcion=".$_GET['ids']."";

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
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
                          <?php 
                          echo "<a class='btn btn-round btn-primary' href='insertar_asistencia.php?id=".$rowrp['codigo_membresia']."&ids=".$rowrp['idsuscripcion']."'>Registrar asistencias</a>";
                          ?>
                        </div>
                      </div>

                    </form>
                  </div>


                  


                </div>
              </div>
            </div>   
            
          </div>
        </div>
        <!-- /page content -->
 <script src="../../vendors/validator/validator.js"></script>

<?php
include("../footer.php");

 
?>



 <!-- validator -->
    <script>
      // initialize the validator function
      validator.message.date = 'not a real date';

      // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
      $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

      $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });

     
    </script>
    <!-- /validator -->
 
 <!-- jquery.inputmask -->
    <script>
      $(document).ready(function() {
        $(":input").inputmask();
      });
    </script>
    <!-- /jquery.inputmask -->

<script>

 



      $(document).ready(function() {
        $('#fecha').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4",
          locale: {
           format: "YYYY-MM-DD"
          } 
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
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