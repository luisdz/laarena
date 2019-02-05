<?php
//print_r($_POST);


include("../clases/class.php");
 $db = new BaseDatos();
 
$ingresar=$db->ingresar_clientes();  
  

      echo '<br>';

if($ingresar==0){

 echo '

  <div id="resp" class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Datos guardados con Exito</strong> Se ha creado el registros del cliente exitosamente
                  </div>


 ';

}
else{

echo '

  <div id="resp" class="alert alert-warning alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Error en el ingreso</strong> Los datos del cliente NO se han registrado.
                  </div>


 ';


}

  


 ?>