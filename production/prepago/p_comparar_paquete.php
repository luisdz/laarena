<?php
include("../header.php");
//include("../page_content.php");
?>

<?php
// session_start();  
include("../clases/class.php");
 $db = new BaseDatos();
$arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
   'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

 $arrayM = [
    "1" => "Enero",
    "2" => "Febrero",
    "3" => "Marzo",
    "4" => "Abril",
    "5" => "Mayo",
    "6" => "Junio",
    "7" => "Julio",
    "8" => "Agosto",
    "9" => "Sept.",
    "10" => "Octubre",
    "11" => "Nov.",
    "12" => "Diciembre",
];
?>
  
 <link href="../../vendors/datepicker/jquery-ui.css" rel="stylesheet">
<style>
.ui-datepicker-calendar {
    display: none;
    }
</style>
 <!-- page content -->
<div class="right_col" role="main">
          <!-- top tiles -->
            <div class="row tile_count"> 
         
          </div>
          <!-- /top tiles -->

          <div class="x_content">
				<h2><p class="text-success">
				</p></h2>
                    <form id="form_participante" >
					   
						<div class="col-md-12">
						<div class="select_menu">
					
						<div class="col-md-4 col-sm-9 col-xs-6">
						<h4><p class="text-danger"><strong>PRODUCTOS</strong></p></h4>
                          <select class="select2_single1 form-control"  name="tipo" id="tipo">
						   <option value="0">Selecione...</option>
						   <option value="1">VOZ</option>
						   <option value="2">SMS</option>
						   <option value="14">VAS</option>
						   <option value="23">NAV</option>
                          </select>
                        </div>
                        <div class="col-md-4 col-sm-9 col-xs-6" id="id">
						<h4><p class="text-danger"><strong>PAQUETES</strong></p></h4>
                           <div class="form-group">
							<select name="paquetes[]" id="select2_group" class="select2_multiple form-control" multiple="multiple">
							
							</select>
						  
                        </div>
                        </div>
						
						
						<div class="col-md-4 col-sm-9 col-xs-6">
						<h4><p class="text-danger"><strong>PERIODOS.</strong></p></h4>
						 <label for="startDate">FECHA:</label>
						<input name="startDate" id="startDate" class="date-picker" />
                        </div>
						
						</div>
						   
						     <div class="col-md-6 col-sm-9 col-xs-6">
							<br />
							
							   <button type="submit" class="btn btn-round btn-danger" id="btn_enviar"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Aceptar</button>
							</div>
							
						 </div>
							
					 </form>
					 
                </div>
				
          <div id="grafica_comparativa" class="row">
          
          </div>
       </div>
       
<!-- /page content -->

<?php
include("../footer.php");
?>
    
  <script>
      $(document).ready(function() {
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 3,
          placeholder: "Con límite máximo de selección 3 Paquetes",
          allowClear: true
        });
      });
    </script>
<script>
	<!-- cargar datos del select 2 -->
	$(".select2_single1").change(function () {
		 $('#grafica_comparativa').html('<div><img src="../images/Claro.gif"/></div>');

		//recorrer el select y obtener el seleccionado
	   $(".select2_single1 option:selected").each(function () {
		         
				 //asignas a una variable el valor seleccionado
				value=$(this).val();
					
					$.post("dibujarcategoria.php", { value:value}, function(data){
					
					$('#grafica_comparativa').fadeIn(10000).html(data);
					
					$("#select2_group").html(data);
				
			}); 
		})
		})  
</script>

     <script>
        $("#btn_enviar").click(function(paquetes,periodo){
			//alert("ingresa");
			//Añadimos la imagen de carga en el contenedor
        $('#grafica_comparativa').html('<div class="col-xs-12"><img src="../images/Claro.gif"/>Cargando Datos Espere Por Favor...</div>');
            var parametros = {
                "paquetes" : paquetes,
                "periodo" : periodo
            };
			
            $.ajax({
                data:  parametros,
                url:   'categoria.php',
                type:  'post',
                data: $("#form_participante").serialize(), // Adjuntar los campos del formulario enviado.
				success: function(data)
                {
                  // alert("ingresa");
				$('#grafica_comparativa').fadeIn(10000).html(data);
				$("#grafica_comparativa").html(data); // Mostrar la respuestas del script PHP.
                }
            });
			return false; // Evitar ejecutar el submit del formulario.
        });
    </script>
	
	<script>
	$(function() {
		$.noConflict();
    $('.date-picker').datepicker( {
		changeYear: true,
		yearRange: '2016:2018',
        changeMonth: true,
        showButtonPanel: true,
        dateFormat: 'yy MM',
        onClose: function(dateText, inst) { 
            $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
        }
    });
	});
</script>


