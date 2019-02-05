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
            <div class="page-title">
              <div class="title_left">
                <h3>Ingreso de Suscripcion</h3>
                

              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                   
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> <small>Registro de suscripciones</small></h2>
                    <br>
                     <div id="msj"> </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form id="form_suscripcion" class="form-horizontal form-label-left" novalidate>

                      <p>Ingrese los datos del formulario <code>Clic en Boton Guardar</code> Para almacenar los cambios en sistema 
                      </p>

                      <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Codigo Membresia  
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                              <input readonly="readonly" type="text" id="codigo_membresia"  name="codigo_membresia"   class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                     

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Membresia</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <select name="membresia" class="select2_single form-control" tabindex="-1">
                             
                            <option value="1">Mensual</option>
                            <option value="2">Clase</option>
                          
                             
                          </select>
                        </div>
                      </div>

                       <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="promocion"> Ingresa bajo promocion 
                            </label>
                            
                            <div id="promocion"  class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="promocion" value="no" checked="checked"> &nbsp; No &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="promocion" value="si"> Si
                            </label>
                          </div>


                          </div>

                            <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Monto de Suscripcion $  
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="number" id="cuota" name="cuota" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Cantidad meses/clases <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="number" id="cantidad" name="cantidad" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pago</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <select name="tipo_pago" class="select2_single form-control" tabindex="-1">
                             
                            <option value="1">Completo</option>
                            <option value="2">Parcial</option>
                          
                             
                          </select>
                        </div>
                      </div>





                             <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Fecha de Inicio <span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                              <input id="birthday"  name="f_inicio" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                            </div>
                          </div>


                             <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Fecha de Fin <span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input name="f_fin" type="text" class="form-control" data-inputmask="'mask': '99/99/9999'">
                            </div>
                          </div>

                       
 
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Comentario <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="comentario" required="required" name="comentario" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>

     </form>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button  class="btn btn-primary">Cancelar</button>
                          <button id="send"   class="btn btn-success">Guardar</button>


                        </div>
                      </div>
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

<?php
include("../footer.php");

 
?>


<script>


  $(document).on('ready',function(){       
    $('#send').click(function(){
      //alert("ingres");
      //ingresa
        var url = "ingreso_suscripcion.php";
        $.ajax({                        
           type: "POST",                 
           url: url,                     
           data: $("#form_suscripcion").serialize(), 
           success: function(data)             
           {
             $('#msj').html(data);  
               document.getElementById('form_suscripcion').reset();         
           }
       });
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

 <!-- jquery.inputmask -->
    <script>
      $(document).ready(function() {
        $(":input").inputmask();
      });
    </script>
    <!-- /jquery.inputmask -->
 

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