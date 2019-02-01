<?php
  include("../clases/class.php");
  $db = new BaseDatos();
  //$result = $db->mostrar($_POST['imei'] or $_POST['telefono']);
  $skill = $db->consultar();
   
 // print_r($skill);
         $html="<table id='gestion_usuario' class='table table-striped jambo_table bulk_action'>";
         $html.="<thead>";
         $html.="<tr class='headings'>";
		 $html.="<th>";
	
		 $html.="</th>";
         $html.="<th class='column-title'>Id_User </th>";
         $html.="<th class='column-title'>Nombre </th>";
         $html.="<th class='column-title'>User</th>";
         $html.="<th class='column-title'>Contrase&ntilde;a</th>";
		 $html.="<th class='column-title'>Email </th>";
		 $html.="<th class='column-title'>Rol</th>";
		 $html.="<th class='column-title no-link last'><span class='nobr'>Estado</span>";
		 $html.="<th class='column-title'>Acciones</th>";
		 $html.="</th>";
		 
		 $html.="<th class='bulk-actions' colspan='7'>";
		 $html.="<a class='antoo' style='color:#fff; font-weight:500;'>Bulk Actions ( <span class='action-cnt'> </span> ) <i class='fa fa-chevron-down'></i></a>";
		 $html.="</th>";
         $html.="</tr>";
         $html.="</thead>";
		 $html.="<tbody>";
	     $html.="<tr class='even pointer'>";
		 $html.="</thead>";
		 if (count($skill)>0){
			 
     foreach ($skill as $row ) {
		
		$html.="<tbody>";
		$html.="<tr class='even pointer'>";
		$html.="<td class='a-center '>";
		//$html.="<input type='checkbox' id='".$row["ID"]."' class='flat' name='checkbox[]' value='".$row["ID"]."'>";
		$html.="</td>";
		$html.="<td class=' '>".$row["ID"]."</td>";
		$html.="<td class=' '>".$row["Nombre"]."</td>";
		$html.="<td class=' '>".$row["usuario"]."</td>";
		$html.="<td class=' '>".$row["Password"]."</td>";
		$html.="<td class=' '>".$row["Email"]."</td>";
		$html.="<td class='a-right a-right'>".$row["nombre"]."</td>";
		$html.="<td class='last'>".$row["Estado"]."</a>";
		$html.="</td>";
		$html.="<td>";
		$html.="<a href='../usuario/editar.php?ID=".$row['ID']."'class='btn btn-round btn-info' >Editar</a>";
		//$html.="<button type='button' id='btnEditar' class='btn btn-info' onclick='editar()'><span class='glyphicon glyphicon-edit'></span>&nbsp;Editar Usuario</button>";
		$html.="<a href='../seguridad/eliminar_user.php?ID=".$row['ID']."' class='btn btn-round btn-danger'>Eliminar</a>";
		$html.="</td>";
		$html.="</tr>";
		
		}
	 }else {
		
	 }
	$html.="</tbody>   </table>";
	echo $html;
?>