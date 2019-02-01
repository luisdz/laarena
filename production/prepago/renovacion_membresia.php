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
             

                 <!-- Smart Wizard -->
                    <p>Los campos con * son obligatorios </p>
                    <div id="wizard" class="form_wizard wizard_horizontal">
                      <ul class="wizard_steps">
                        <li>
                          <a href="#step-1">
                            <span class="step_no">1</span>
                            <span class="step_descr">
                                              Paso 1<br />
                                              <small>Ingreso Datos Personales</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-2">
                            <span class="step_no">2</span>
                            <span class="step_descr">
                                              Paso 2<br />
                                              <small>Pago</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-3">
                            <span class="step_no">2</span>
                            <span class="step_descr">
                                              Paso 3<br />
                                              <small>Generar ticket</small>
                                          </span>
                          </a>
                        </li>
                        
                      </ul>
                      <div id="step-1">
                        <form id="registro_renovacion" class="form-horizontal form-label-left">
                          <div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="codigo-membresia">Codigo membresia <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="codigo-membresia" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nivel</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <select class="select2_single form-control" name="cmb_nivel" tabindex="-1">
                            <option></option>
                            <option value="1">Basico</option>
                            <option value="2">Intermedio</option>
                            <option value="3">Avanzado</option>
                      
                          </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Vigencia <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="number" name="number" required="required" data-validate-minmax="1,100" min="1" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Unidad</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <select class="select2_single form-control" name="cmb_unidad" tabindex="-1">
                            <option></option>
                            <option value="1">Hora</option>
                            <option value="2">Dia</option>
                            <option value="3">Mes</option>
                      
                          </select>
                        </div>
                      </div>
   

                      </div>

                      </div> <!-- End Step 1 -->

                      <div id="step-2">
                        <div class="form-horizontal form-label-left">


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="codigo-membresia">Monto pago<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="pago" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                           <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo pago</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1">
                            <option></option>
                            <option value="1">Completo</option>
                            <option value="2">Parcial</option>
                            <option value="3">Pendiente</option>
                          </select>
                        </div>
                      </div> 
                    </div> 

                      </div> <!-- End Step 2 -->
                      <div id="step-2">
                        <div class="form-horizontal form-label-left">


                          <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                          
                          <input type="button" class="btn btn-primary hidden" name="imprimir" value="imprimir"></input>
                          <a href="prueba_pdf.php?id=" target="_blank" class="btn btn-round btn-primary" id="pdf_imp" onclick="redirect_pdf()">imprimir</a>
                           
                           <p></p>
                        </div>
                      </div>
                      </div>
                      </form>

                      </div> <!-- End Step 2 -->     

                    </div>
                    <!-- End SmartWizard Content -->
            
          </div>
        </div>
        <!-- /page content -->


<?php
include("../footer.php");

 
?>
 

   
  <script>

 $(document).on('ready',function(){       
    $('.buttonFinish').click(function(){
      //ingresa
        var url = "ingreso_renovacion.php";
        $.ajax({                        
           type: "POST",                 
           url: url,                     
           data: $("#registro_renovacion").serialize(), 
           success: function(data)             
           {
             $('#resp').html(data); 
             alert("guardado con exito!")
             location.reload(true);            
           }
       });
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
 
}); </script>



<script type="text/javascript">
 $(document).ready(function(){
    $('.button').click(function(){
        var clickBtnValue = $(this).val();
        var ajaxurl = 'ajax.php',
        data =  {'action': clickBtnValue};
        $.post(ajaxurl, data, function (response) {
            // Response div goes here.
            alert("action performed successfully");
        });
    });

});


     

function redirect_pdf() { 
  document.getElementById("pdf_imp").href=document.getElementById("pdf_imp").href + "102";
  //alert(  document.getElementById("pdf_imp").href);
}

</script>


