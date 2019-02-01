<?php
  include("../clases/class.php");
  $db = new BaseDatos();
  //$result = $db->mostrar($_POST['imei'] or $_POST['telefono']);
  $skill = $db-> permiso();
   
/*echo'<pre>';
print_r($skill);
echo'</pre>';
*/
        $html="<table id='datatable' class='table table-striped table-bordered'>";
         $html.="<thead>";
         $html.="<tr class='headings'>";
         $html.="<th bgcolor='#75D1CA'>ROL</th>";
		 //$html.="<th>DESCRIPCI&Oacute;N</th>";
         $html.="<th bgcolor='#75D1CA'>MENU</th>";
		 $html.="<th bgcolor='#75D1CA'>SUB_MENU</th>";
		 $html.="<th bgcolor='#75D1CA'>URL</th>";
		 //$html.="<th>Acciones</th>";
         $html.="</tr>";
         $html.="</thead>";
		 $html.="<tbody>";	
		 if (count($skill)>0){
			 
     foreach ($skill as $row ) { 
		$html.="<tr>";
		$html.="<td>".$row["ROL"]."</td>";
		//$html.="<td>".$row["Descripcion"]."</td>";
		$html.="<td>".$row["MENU"]."</td>";
		$html.="<td>".$row["SUB_MENU"]."</td>";
		$html.="<td>".$row["url"]."</td>";
	
		$html.="</tr>";
		}
	 }else {
		
	 }
	$html.="</tbody>   </table>";
	echo $html;
?>
  