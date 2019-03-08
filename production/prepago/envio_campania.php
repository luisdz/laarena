<?php
include("../header.php");
//include("../page_content.php");
  
include("../clases/class.php");
 $db = new BaseDatos();
 

                        $srpt ="SELECT * FROM catalogo_promocion";   
                            $qsrp = mysqli_query($db->conectar(),$srpt);
                            //echo $srpt;
                            if(mysqli_num_rows($qsrp)==0)
                            {
                            echo 'Sin resultados';
                            }
                            else
                            {
                              
                            }
  
 
 

?>
 

  <!-- page content -->
 



        <div class="right_col" role="main">

           <div class="adjoined-bottom">
    <div class="grid-container">
      <div class="grid-width-100">



        <form action="envio_c.php" method="POST">


          
           <textarea name="editor1" id="editor"  >
                
            </textarea>

            <input type="submit" value="Submit">

<br>
<br>
<div class="col-md-12 col-sm-3 col-xs-12">
            <div class=" form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Asunto de Correo <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="name" class="form-control" data-validate-length-range="6" data-validate-words="2" name="asunto" placeholder="Asunto del Correo" required="required" type="text">
                        </div>
           </div>

 <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12">Grupo de Correo </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <select id="grupoc" name="grupoc" class="select2_single form-control" tabindex="-1">
                             
                            <option value="0">Seleccione una Opcion</option>
                            <option value="0">Manual</option>
                            <option value="1">Todos</option>
                            <option value="2">Suscripciones Vencidas</option>
                            <option value="3">Clientes Inactivos</option>
                            <option value="4">Clientes Asistiendo con Suscripcion Vencida</option>
                          
                             
                          </select>
                        </div>
   </div>

</div>
 <div id="msj">
         </div>


         
        </form>

        
          
      </div>
    </div>
  </div>
          
        </div>
        <!-- /page content -->


<?php
include("../footer.php");

 
?>

<script src="../../vendors/ckeditor/ckeditor.js"></script>
  <script src="../../vendors/ckeditor/samples/js/sample.js"></script>
  <link rel="stylesheet" href="../../vendors/ckeditor/samples/css/samples.css">
  <link rel="stylesheet" href="../../vendors/ckeditor/sammples/toolbarconfigurator/lib/codemirror/neo.css">
  
 <script>
  initSample();
</script>

 

 <script>

  $( "#grupoc" ).change(function() {
  //alert( "Handler for .change() called." );


 var url = "envio_campania_lcorreo.php";
        $.ajax({                        
           type: "POST",                 
           url: url,                     
           data:  {seleccionado:$('select[name=grupoc]').val()}, 
           success: function(data)             
           {

            //alert('asdjashd');
            $('#msj').html(data);  

             

               

           }
       });


   
 //alert();
       

}); 

</script>
 





