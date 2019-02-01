
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
			  <h3><p class="text-danger"><strong>Formulario Usuario</strong></p></h3>
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
				  
                    <h2><p class="text-primary">DATOS DEL USUARIO</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="../seguridad/add_user.php">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre Completo:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="Nombre">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Usuario:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="usuario" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" placeholder="ejemplo@claro.com.sv" type="text" name="Email">
                        </div>
                      </div>
								
					   <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Contraseña:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="password" name="Password">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Previlegios:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="rol">
                            <option value="0">Seleccionar</option>
                            <?php
								  //voy a la base de datos a traer los sub menus
							   $skill = $db-> roles();
							   
								print_r($skill);
							//	die();
							   foreach ($skill as $key ) { 
								echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
								} 
							  ?>
                          </select>
                        </div>
                      </div>
					   <div class="form-group" center name="Estado">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Estado">Estado: <span class="required">*</span>
						
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <label>
						 <br>
						Activo<input type="radio" class="flat" value="1" name="Estado">
						Inactivo<input type="radio" class="flat" value="2" name="Estado">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						  <button type="submit" class="btn btn-round btn-success"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;&nbsp;Nuevo Usuario</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
			  </div>
        </div>
<?php
include("../footer.php");
?>