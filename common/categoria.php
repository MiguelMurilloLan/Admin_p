<?php
    include_once('../php/conexion.php');
 

    $id_estado = $_POST['id_menu'];
    
	
	$queryM = "SELECT relaciones.IdGrupoRelacion, grupos.Tipo,grupos.Descripcion, grupos.URL 
    from grupos inner join relaciones on relaciones.IdGrupo = '$id_estado'
    and relaciones.IdGrupoRelacion= grupos.IdGrupo and grupos.Activo=1";
	$resultadoM = $mysqli->query($queryM);

	$html= "<option value='0'>categoria</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['idGrupo']."'>".$rowM['Descripcion']."</option>";
	}
	
	echo $html;
    
?>