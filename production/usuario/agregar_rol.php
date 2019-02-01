<?php
include("../header.php");

include("../clases/class.php");
 $db = new BaseDatos();
 ?>
         <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><p class="text-danger" >Formulario Rol</p></h3>
              </div>

              <div class="title_right">
           
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
				  
                    <h2><p class="text-primary" >Crear Rol <small class="text-success" >Roles </small></p></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" method="POST" action="../seguridad/add_rol.php" role="form" id="form_participante">

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input name="rol" type="text" required="required" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nombre de rol">
		
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input name="descrip" required="required" type="text" class="form-control" id="inputSuccess3" placeholder="Descripci&oacute;n">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
						<br />
						<div>
						<hr />
						</div>
                      <div class="select_menu">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" required="required">Menu</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1" name="menu">
						   <option value="0">Selecione...</option>
							<?php
							  
							  //$menu=$_POST["elegido"];
							  
								  //voy a la base de datos a traer los sub menus
							   $skill = $db->cargar_menu($_POST["elegido"]);
							   
								print_r($skill);
							//	die();
							   foreach ($skill as $key ) { 
								echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
								} 
							  ?>                       	
                          </select>
                        </div>
                      </div>
					
					   <div class="con-json">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub_Menu</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
						
                          <select name="submenu[]" id="select2_group" class="select2_multiple form-control" multiple="multiple">
                           
                          </select>
						  
                        
                      </div>
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
						<br>
                          <!--<button type="submit" class="btn btn-primary">Cancel</button>-->
						  <button type="submit" id="btn_enviar" class="btn btn-round btn-success"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;&nbsp;Nuevo Rol</button>
						  <a href="../usuario/adm_rol.php" class="btn btn-round btn-info"> <span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;Mostrar Roles</a>
                        </div>
                      </div>
                  </form>
                  </div>
                </div>
			
              </div>
            </div>

   	 </div>
    </div>
  </div>
</div>
	
<?php
include("../footer.php");
?>
 <!-- Select2 -->
  <script>
      $(document).ready(function() {
        $(".select2_single").select2({
          placeholder: "Select a state",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });
    </script>
    <!-- /Select2 -->
	
	<script>
	<!-- cargar datos del select 2 -->
	$(".select2_single").change(function () {
        
		//alert("ingresa");
		console.log("ingresa al change");
		//recorrer el select y obtener el seleccionado
	   $(".select2_single option:selected").each(function () {
		         
				 //asignas a una variable el valor seleccionado
				elegido=$(this).val();
				//alert("elegido"+elegido);
				console.log(elegido);
				
		
					//envio por post la opcion seleccionada en este caso el rol
					$.post("cargar_select.php", { elegido:elegido}, function(data){
					//alert(elegido);
					console.log("entra en el success");
					$("#select2_group").html(data);
			}); 
			
		})
		})  
</script>
	<!-- cargar datos del select 2 -->

 



			
			
			
			