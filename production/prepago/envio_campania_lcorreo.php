<?php 

//print_r($_POST);

include("../clases/class.php");
 $db = new BaseDatos();
 
$seleccionado=$_POST['seleccionado'];

if($seleccionado==0){
 $srpt ="SELECT 'correo@correo.com' email";  

}


if($seleccionado==1){
 $srpt ="SELECT * FROM persona where email not in('notengo@notengo.com')";  

}
if($seleccionado==2){
 $srpt ="select nombre,b.email from suscripcion a inner join persona b on a.codigo_membresia=b.codigo_membresia where estado=2 and email not in('notengo@notengo.com')";  
  
}

if($seleccionado==3){
 $srpt ="SELECT nombre,email FROM persona t1 where datediff( sysdate(), (select max(fecha_registro) from asistencia_log where codigo_membresia=t1.codigo_membresia )) > 30
 and email not in('notengo@notengo.com')";  
  
}

if($seleccionado==4){
 $srpt ="select nombre,b.email from suscripcion a inner join persona b on a.codigo_membresia=b.codigo_membresia where estado=2
and (select count(*) cantidad  from asistencia_log where codigo_membresia=a.codigo_membresia and idsuscripcion=a.id_suscripcion and fecha_registro>a.fecha_fin)>0
and email not in('notengo@notengo.com')";  
  
}




                        
                            $qsrp = mysqli_query($db->conectar(),$srpt);
                          
 


  
 



?>

<br>
<br>
<br>
<div class="control-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12">Lista de Correos</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input id="tags_1" type="text" name="list_correos" class="tags form-control" value='
                          <?php  while ($rowrp = mysqli_fetch_array($qsrp)) 
                              {
                                 //     print_r($rowrp);  
                      
                                echo  $rowrp['email']; 
                                echo ',';
                  
                                
                                 
                              }?>
                              '/>
                          <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                        </div>
                      </div>

 <!-- jQuery Tags Input -->
    <script src="../../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>

 

  <!-- jQuery Tags Input -->
    <script>
      function onAddTag(tag) {
        alert("Added a tag: " + tag);
      }

      function onRemoveTag(tag) {
        alert("Removed a tag: " + tag);
      }

      function onChangeTag(input, tag) {
        alert("Changed a tag: " + tag);
      }

      $(document).ready(function() {
        $('#tags_1').tagsInput({
          width: 'auto'
        });
      });
    </script>
    <!-- /jQuery Tags Input -->