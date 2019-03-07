<?php
$stonevar = isset($_GET['id']) ? $_GET['id'] : NULL;

                       if (empty($stonevar)) {
                          header("Location: /laarena/production/catalogo/consultar_promocion.php");
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
 
  
 
 

?>
 

  <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Seccion de Catalogos</h3>
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
                    <br>
                     <div id="msj"> </div>
                    <h2>Promociones <small>Creacion de Nuevas Promociones</small></h2>
                     
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form  id="form_promocion" class="form-horizontal form-label-left" novalidate>


                      <?php                      

                      $srpt="select * from catalogo_promocion where id_promocion=".$_GET['id']."";

                        //$srpt ="select * from persona where codigo_membresia='".$_GET['id']."'"; DATE_FORMAT(fecha_nac, \"%m%d%Y\")  
                            $qsrp = mysqli_query($db->conectar(),$srpt);
                            $rowrp = mysqli_fetch_array($qsrp)
                      ?>

                      <p>Ingrese los datos del formulario <code>Clic en Boton Guardar</code> Para almacenar los cambios en sistema 
                      </p>
                     
                     <div class="item form-group hidden">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id">id <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="id" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"   name="id" placeholder="Nombre de la promocion" readonly type="text" <?php echo "value='".$_GET['id']."'" ?> >
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre Promocion <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="name" placeholder="Nombre de la promocion" required="required" type="text" <?php echo "value='".$rowrp['nombre']."'" ?> >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Membresia</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <select name="membresia" class="select2_single form-control" >
                             
                            <option <?php if ($rowrp['tipo'] == '1') {  echo "selected";} ?>  value="1">Mensual</option>
                            <option <?php if ($rowrp['tipo'] == '2') {  echo "selected";} ?> value="2">Clase</option>
                          
                             
                          </select>
                        </div>
                      </div>

                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Cantidad de Clases/Meses <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="number" id="cantidad" name="cantidad" required data-validate-minmax="1,100" class="form-control col-md-7 col-xs-12" <?php echo "value='".$rowrp['cantidad']."'" ?> >
                        </div>
                      </div>

                         <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Precio <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="number" id="precio" name="precio" required data-validate-minmax="5,10000" class="form-control col-md-7 col-xs-12" <?php echo "value='".$rowrp['precio']."'" ?> >
                        </div>
                      </div>


                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado vigente</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div  class="btn-group" data-toggle="buttons">
                          <p>
                        Si:<input type="radio" class="flat" name="estado" value="1" <?php if ($rowrp['estado'] == '1') {  echo "checked";} ?>  required /> 
                        No:<input type="radio" class="flat" name="estado" value="0" <?php if ($rowrp['estado'] == '0') {  echo "checked";} ?>  required />
                      </p>
                          </div>
                        </div>
                      </div>

                      
 

 
                       <div class="item form-group hidden">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Fecha de Inicio <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                           <input name="f_inicio" type="text" class="form-control" data-inputmask="'mask': '9999/99/99'">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                       <div class="item form-group hidden">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Fecha de Fin <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                           <input name="f_fin" type="text" class="form-control" data-inputmask="'mask': '9999/99/99'">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>


                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Comentario <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="textarea" required="required" name="comentario"  class="form-control col-md-7 col-xs-12"><?php echo $rowrp['comentario'] ?></textarea>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        
                      </div>
                    </form>

                    <div class="col-md-6 col-md-offset-3">
                          <button type="cancel" class="btn btn-primary">Cancelar</button>
                          <button id="send"  class="btn btn-success">Guardar</button>
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

 <!-- jquery.inputmask -->

 <script src="../../vendors/validator/validator.js"></script>


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

        //if (submit)
         // this.submit();

        return false;
      });
    </script>

    <script>    


  $(document).on('ready',function(){       
    $('#send').click(function(){
      //alert("ingres");
      //ingresa
        var url = "update_promocion.php";
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
           data: $("#form_promocion").serialize(), 
           success: function(data)             
           {
             $('#msj').html(data);   
              setTimeout(function(){// wait for 5 secs(2)
             location.reload(); // then reload the page.(3)
              }, 3000);            
           }
       });
        } 


    });
});


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