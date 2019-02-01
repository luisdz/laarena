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
						<div class="col-md-4 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
					<!--<span class="label label-danger">Seleccione Periodos</span>-->
                     <h2><p class="text-danger"><strong>Periodos.</strong><small class="text-primary">Mes</small></p></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                      <div class="form-group">
							<select name="periodos[]" id="select2_group" class="select2_multiple form-control" multiple="multiple" required>
                        <?php                         
                         $año=date("Y");
                         $año_ant=date("Y")-2;
                                       //$mesactual=date("m");
                         for ($i =$año_ant; $i <=$año; $i++){
            
                            for ($m =1; $m <=12; $m++) {
                            $l=strlen($i.$m);
                            if ($l==5){
                            echo '<option value="'.$i."0".$m.'">'.$i.'&nbsp;de&nbsp;'.$mes=$arrayM[$m].'</option>';
                            }else {echo '<option value="'.$i.$m.'">'.$i.'&nbsp;de&nbsp;'.$mes=$arrayM[$m].'</option>';}
                            //echo '<option value="'.$i.$m.'">'.$i.$m.'</option>';
                          }
                         }
                
                ?>
                          </select>
								
								 </div>
            
                      <div class="divider-dashed"></div>
                        
                        </div>
                      </div>
                  </div>
				  
				  <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
					<!--<span class="label label-danger">Seleccione Periodos</span>-->
                     <h2><p class="text-danger"><strong>Producto.</strong><small class="text-primary">Tipo</small></p></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                      </li>
                    
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                      <div class="form-group">
							<select class="select2_single form-control"  name="tipo" id="tipo">
						   <option value="0">Selecione...</option>
						   <option value="1">VOZ</option>
						   <option value="2">SMS</option>
						   <option value="14">VAS</option>
						   <option value="23">NAV</option>
							
                          </select>
								
								 </div>
            
                      <div class="divider-dashed"></div>
                        
                        </div>
                      </div>
                  </div>
				  <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
					<!--<span class="label label-danger">Seleccione Periodos</span>-->
                     <h2><p class="text-danger"><strong>Categoria.</strong></p></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                      </li>
                    
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                      <div class="form-group">
							<select name="categoria[]" id="select2_group1" class="select2_multiple1 form-control" multiple="multiple" required>
						   
						   <option value="CATEGORIA1">Categoria1</option>
						   <option value="CATEGORIA2">Categoria2</option>
               <option value="CATEGORIA3">Categoria3</option>
						   <option value="CATEGORIA4">Categoria4</option>
							
                          </select>
								
								 </div>
            
                      <div class="divider-dashed"></div>
                        
                        </div>
                      </div>
                  </div>
					 <div class="col-md-12 col-sm-12 col-xs-12">
					<br />
					<button type="submit" class="btn btn-round btn-danger" id="btn_enviar"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Aceptar</button>
					</div>
					</div>
					 </form> 
                </div>
        
          <div id="tabla_comparativa" class="row">  
          </div>
<!-- /page content -->
   </div>     
<?php
include("../footer.php");

?>

     <script>
        $("#btn_enviar").click(function(periodos,tipo,categoria){
		$('#tabla_comparativa').html('<div><img src="../images/Claro.gif"/>Cargando Datos Espere Por Favor</div>').css("display:block");
			//alert("ingresa");
            var parametros = {
                "periodos" :periodos,
                "tipo" :tipo,
                "categoria" : categoria
            };
			
            $.ajax({
                data:  parametros,
                url:   'descripcion_categoria.php',
                type:  'post',
                data: $("#form_participante").serialize(), // Adjuntar los campos del formulario enviado.
				success: function(data)
                {
                  // alert("ingresa");
				$('#tabla_comparativa').fadeIn(10000).html(data);
				$("#tabla_comparativa").html(data); // Mostrar la respuestas del script PHP.
                }
            });
			return false; // Evitar ejecutar el submit del formulario.
        });
    </script>
	<script>
      $(document).ready(function() {
       
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 3,
          placeholder: "Con límite máximo de selección 3 Periodos",
          allowClear: true
        });
      });
    </script>
	<script>
      $(document).ready(function() {
       
        $(".select2_group1").select2({});
        $(".select2_multiple1").select2({
          maximumSelectionLength: 2,
          placeholder: "Con límite máximo de selección 2 Categorias",
          allowClear: true
        });
      });
    </script>
	