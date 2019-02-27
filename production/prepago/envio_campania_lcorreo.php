<?php 

//print_r($_POST);

include("../clases/class.php");
 $db = new BaseDatos();
 

                        $srpt ="SELECT * FROM persona";   
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