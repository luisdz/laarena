<?php
include("../header.php");
//include("../page_content.php");
?>

<?php
// session_start();  
include("../clases/class.php");
 $db = new BaseDatos();
 
  
 //$promciones=$db->consultarc_promociones();  
 
 

                 

                        $srpt ="SELECT * FROM catalogo_promocion";   
                            $qsrp = mysqli_query($db->conectar(),$srpt);
                            //echo $srpt;
                            if(mysqli_num_rows($qsrp)==0)
                            {
                            echo 'Sin resultados';
                            }
                            else
                            {
                              
                            }
                    



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
                              <input readonly="readonly" type="text" id="codigo_membresia"  name="codigo_membresia"   class="form-control col-md-7 col-xs-12" value="<?php echo $_GET['idmembresia']?>">
                            </div>
                          </div>
                     

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Membresia</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <select id="promociones" name="membresia" class="select2_single form-control" tabindex="-1"



                          >
                            <?php 
                            while ($rowrp = mysqli_fetch_array($qsrp)) 
                              {
                                 //     print_r($rowrp);  
                      
                        echo "<option value='".$rowrp['id_promocion']."' >".$rowrp['nombre']."</option>"; 
                  
                         
                                 
                              }
                              ?>
                             
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
                          <input type="number" id="cuota" name="cuota" value="" disabled="disabled" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Cantidad meses/clases <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="number" id="cantidad" name="cantidad"  value="" disabled="disabled" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
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
                              <input   id="f_inicio"  name="f_inicio" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                            </div>
                          </div>


                             <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Fecha de Fin <span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input id="f_fin" name="f_fin" value="" type="text" class="form-control" data-inputmask="'mask': '9999-99-99'">
                            </div>
                          </div>

                       
 
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Comentario <span class="required">*</span>
                        </label>
                        <div id="cm" class="col-md-6 col-sm-6 col-xs-12">
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

                      <div id="msj"></div>
                  
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

  $( "#promociones" ).change(function() {
  //alert( "Handler for .change() called." );

   
 //alert();
      var url = "datos_promociones.php";
        $.ajax({                        
           type: "POST",                 
           url: url,                     
           data:  {f_inicio:$("#f_inicio").val(),seleccionado:$('select[name=membresia]').val()}, 
           success: function(data)             
           {

            //alert('asdjashd');
            $('#msj').html(data);  

            //var cantidad=data.cantidad;
            //console.log(JSON.stringify(data));
             console.log(cantidad);
             console.log(data.precio);

          // $("#msj").html("Servidor:<br><pre>"+JSON.stringify(data, null, 2)+"</pre>");
    
             console.log(data.f_fin);
             //  console.log($("#f_inicio").val());
               $("#cuota").val(data.precio);
               $("#cantidad").val(data.cantidad);
               $("#f_fin").val(data.f_fin);

               

           }
       });


});
 



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
             //  document.getElementById('form_suscripcion').reset();   
                setTimeout(function(){// wait for 5 secs(2)
           location.reload(); // then reload the page.(3)
       }, 3000);    

           }
       });
    });
});


    $(document).ready(function() {
        $('#f_inicio').daterangepicker({
          singleDatePicker: true,
    
           
          locale: {
      format: 'YYYY-MM-DD'
    }
        }, function(start, end, label) {
          console.log(start.toISOString(),start.format('DD/MM/YYYY'),end.format('DD/MM/YYYY'), end.toISOString(), label);
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