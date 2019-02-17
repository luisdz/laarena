<?php
$stonevar = isset($_GET['id']) ? $_GET['id'] : NULL;

                       if (empty($stonevar)) {
                          header("Location: /laarena/production/prepago/consultar_clientes.php");
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
                    <h2>Actualizar <small>Clientes</small></h2>
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

                        //$srpt ="select * from persona where codigo_membresia='".$_GET['id']."'"; DATE_FORMAT(fecha_nac, \"%m%d%Y\")  
                            $qsrp = mysqli_query($db->conectar(),$srpt);
                            $rowrp = mysqli_fetch_array($qsrp)
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
                          <input type="text" id="nombre" name="nombre" required="required" class="form-control col-md-7 col-xs-12" <?php echo "value='".$rowrp['nombre']."'" ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">Apellido<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="apellido" name="apellido" required="required" <?php echo "value='".$rowrp['apellido']."'" ?> class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="telefono" class="control-label col-md-3 col-sm-3 col-xs-12">Telefono</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="telefono" class="form-control col-md-7 col-xs-12" <?php echo "value='".$rowrp['telefono']."'" ?> type="text" name="telefono">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" required="required" <?php echo "value='".$rowrp['email']."'" ?> class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Genero</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div  class="btn-group" data-toggle="buttons">
                          <p>
                        M:<input type="radio" class="flat" name="gender" value="h" <?php if ($rowrp['genero'] == 'h') {  echo "checked";} ?>  required /> 
                        F:<input type="radio" class="flat" name="gender" value="m"  <?php if ($rowrp['genero'] == 'm') {  echo "checked";} ?>  required />
                      </p>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de nacimiento <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="fecha" name="fecha" type="text" class="form-control" <?php echo "value='".$rowrp['fecha']."'" ?> >
                         <!--<input id="fecha" name="fecha" type="text" class="form-control"  data-inputmask="'mask': '99/99/9999'"> -->
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button id="cancel"  class="btn btn-primary">Cancel</button>
                          <button id="update" type="submit" class="btn btn-success">Guardar</button>
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

      $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        // evaluate the form using generic validaing 
        if (!validator.checkAll($(this))) { 
          submit = false;
        }
        var url = "update_clientes.php";

        if (submit)
        { 
          $.ajax({                        
           type: "POST",                 
           url: url,                     
           data: $("#update_clientes").serialize(), 
           success: function(data)             
           {
             $('#resp').html(data); 
             alert(data);                          
           },
           error: function(){
                alert("Error"); 
        }

       })

          //this.submit();
        }

        return false;
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

//no valido
  $(document).on('ready',function(){       
    $('#update--').click(function(){
      //ingresa
        var url = "update_clientes.php";
        //alert("hello");
        var submit = true;

        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) { 
          submit = false;
        }

        if (submit){
          alert(submit);
        $.ajax({                        
           type: "POST",                 
           url: url,                     
           data: $("#update_clientes").serialize(), 
           success: function(data)             
           {
             $('#resp').html(data); 
             alert(data);                          
           },
           error: function(){
                alert("Error"); 
        }

       });}
        else
        {
          alert("Error: "submit); 
        }

    });
});



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