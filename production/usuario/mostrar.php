<?php
include("../header.php");
?>
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
               <h3><p class="text-danger"><strong>Usuarios</strong></p></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><p class="text-primary">Informaci&oacute;n de Usuarios </p></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                   
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">


                    <div class="table-responsive">
                      <form id="form_participante">
					  <?php
						include("../seguridad/mostrar_user.php");
						?>
						
					  </form>
					<!--<button type="button" id="btnEditar" class="btn btn-info" onclick="editar()"><span class="glyphicon glyphicon-edit"></span>&nbsp;Editar Usuario</button>
					<!--<button type="button" id="btnEliminar" class="btn btn-danger" onclick="eliminar()" value="Eliminar"><span class="glyphicon glyphicon-trash"></span>&nbsp;Eliminar Usuario</button>
                   -->
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
<div id="cajaMensaje" title="No data" style="display:none">
</div>
 