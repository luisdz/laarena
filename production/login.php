<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>La Arena </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">
	
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
	
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form class="form-singin" role="form" id="miform" method="POST" action="seguridad/validar_usuario.php">
              <img src="images/logo_arena.jpg"><h1>Bienvenido La Arena</h1>
            <div>
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input type="text" class ="form-control" placeholder="usuario" required autofocus name="user" id="user">
           </div>    
          <div>
          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
		  <input type="password" class ="form-control"placeholder="password" required autofocus name="passw" id="passw">
               </div> 
              <div>
                <button class= "btn btn-lg btn-block btn-info">Iniciar Sesion</button> 
              
                <a class="reset_pass" href="#">Olvido su contraseña</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Desea Acceso?
                  <a href="#signup" class="to_register"> solicitar Permiso</a>
                </p>

                <div class="clearfix"></div>
                <br />
     
                <div>
                 

                  <p>©2019 Derechos Reservados.</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form id="permiso">
              <h1>Solicitar Permiso</h1>
              <div>
                <input type="text" class="form-control" placeholder="Nombre de Usuario" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Contraseña" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="login.php">Aceptar</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Ya eres Usuario ?
                  <a href="#signin" class="to_register"> Iniciar sesi&oacute;n </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="glyphicon glyphicon-stats"></i> La Arena</h1>
                  <p>©2019 Todos los derechos reservados</p>
                  <p>Sistema de Control</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
	</body>
</html>
