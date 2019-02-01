<?php
 include("../header.php");
 include("../clases/class.php");
  $db = new BaseDatos();
  //$result = $db->mostrar($_POST['imei'] or $_POST['telefono']);
 $id_user = $_GET["ID"];

 $select=$db->select_user($id_user);
//print_r($select);
 //recorremos el arreglo con un foreach
  foreach ($select as $key ) { 
	$id=$key["ID"];
	$nombre=$key["Nombre"];
	$user=$key["usuario"];
	$email=$key["Email"];
	$rol=$key["id_rol"];
	//print_r($rol);
  }
	?>
<!-- page content -->

        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
               <h3><p class="text-danger"><strong>Editar Usuario</strong></p></h3>
              </div>
              <div class="title_right">
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
			  <div class="container">
				<div class="alert alert-info alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Info!</strong> Por favor ingrese la contraseña, Seleccione tipo de Rol y el Estado del Usuario.
				</div>
				</div>
                <div class="x_panel">
                  <div class="x_title">
                    <h2><p class="text-primary">DATOS DEL USUARIO <small class="bg-success" >Formulario</small></p></h2>
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
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="../seguridad/editar_user.php">
						<input type="hidden" id="id_usr" name="id_usr" value="<?php echo $id?>">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre Completo<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="Nombre" value="<?php echo $nombre?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Usuario<span>*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="usuario" required="required" class="form-control col-md-7 col-xs-12"
						  value="<?php echo $user?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="Email" required="required" class="form-control col-md-7 col-xs-12"
						  value="<?php echo $email?>">
                        </div>
                      </div>
								
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Password<span>*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" id="last-name" name="Password" required="required" class="form-control col-md-7 col-xs-12"
						  value="">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Seleccionar Rol</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="rol" id="id_rol"required="required">
                            <option value="0">Seleccionar</option>
                            <?php
								  //voy a la base de datos a traer los sub menus
							   $skill = $db-> roles();
								//print_r($skill);
								//die();
							   foreach ($skill as $key ) { 
								echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
								} 
							  ?>
                          </select>
                        </div>
                      </div>
					  <div class="form-group" center name="Estado">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Estado">Estado<span>*</span>
						
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
						   <button type='submit' id='btnEditar' class='btn btn-warning' onclick='editar()'><span class='glyphicon glyphicon-edit'></span>&nbsp;Editar Usuario</button>
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
<script type="text/javascript">
    $(function(){
                        
    $('#id_rol').val('<?php echo $rol?>')
                         
      });
</script>