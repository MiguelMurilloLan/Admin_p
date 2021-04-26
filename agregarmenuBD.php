<?php 
    include '../php/conexion.php';
    $menuP = $_POST['IdGrupo'];
    $nombreC = $_POST['titulo'];
    $tipo = $_POST['contenido'];
    $activo = $_POST['options'];
    
    if($tipo == 'Submenu 1' ){
        $sql = "INSERT INTO  grupos (Descripcion,Tipo,Activo,TituloGrupo,LogoGrupo,DescripcionGrupo, ImagenGrupo, URL) 
        VALUES('".$nombreC."','".$tipo."','".$activo."','','','','','')";

        $result = $conexion->query($sql);
        if ($result===TRUE){

        }
   else{

        }
    }


?>