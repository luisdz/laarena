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
          <div class="">
             

                 <!-- Smart Wizard -->
                    <p>Los campos con * son obligatorios </p>
                    <div id="resp"> </div>
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
                                              <small>Datos de Membresia</small>
                                          </span>
                          </a>
                        </li>
                     
                         
                      </ul>
                      <form id="registro_clientes"  class="form-horizontal form-label-left" novalidate >
                      <div id="step-1">
                        <div class="form-horizontal form-label-left" id="form_ingresar">

                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"   for="first-name">Nombre <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="nombre"  name="nombre" required="required" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1">
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Apellido <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="last-name" name="apellido" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Telefono <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="number" id="telefono" name="telefono" required="required" data-validate-minmax="9999999,99999999" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      

                       
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Genero</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div id="gender" class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                  <input type="radio" checked="checked" name="genero" value="h"> &nbsp; Hombre &nbsp;
                                </label>
                                <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                  <input type="radio" name="genero" value="m"> Mujer
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Nacimiento <span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                               <input name="fecha_nacimiento" type="text" class="form-control" placeholder="ANIO-MES-DIA" required data-inputmask="'mask': '9999-99-99'">
                            </div>
                          </div>

                      </div>

                      </div>
                      <div id="step-2">
                         
                        <div class="form-horizontal form-label-left">
                           

                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nivel</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <select  name="nivel" class="select2_single form-control" tabindex="-1">
                         
                            <option value="1">Basico</option>
                            <option value="2">Intermedio</option>
                            <option value="3">Avanzado</option>
                      
                          </select>
                        </div>
                      </div>
                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Medio por el que nos conocio<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="medio_conocio" name="medio_conocio" required="required" class="form-control col-md-3 col-sm-3 col-xs-12">
                            </div>
                          </div>

                         
                   
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Fecha de suscripcion <span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                              <input id="birthday"  name="f_inicio"  class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                            </div>
                          </div>

                        </div>

                     </div>


                 
                       </form>

                      

                      

                    </div>
                    <!-- End SmartWizard Content -->


            
          </div>
        </div>
        <!-- /page content -->


<?php
include("../footer.php");

 
?>
 <script src="../../vendors/validator/validator.js"></script>
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

        if (submit)
          this.submit();

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


  $(document).on('ready',function(){       
    $('.buttonFinish').click(function(){
      //ingresa
        var url = "ingreso_clientes.php";
        var submit = true;
        if (!validator.checkAll($('form'))) {
          submit = false;
        }
        //alert($('form'));
        if(submit)
        {
          $.ajax({                        
           type: "POST",                 
           url: url,                     
           data: $("#registro_clientes").serialize(), 
           success: function(data)             
           {
             $('#resp').html(data);   
              setTimeout(function(){// wait for 5 secs(2)
              location.reload(); // then reload the page.(3)
              }, 3000);            
           }
       });
        }
        
    });
});



      $(document).ready(function() {
        $('#birthday').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4" 
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