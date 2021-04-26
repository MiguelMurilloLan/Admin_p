<?php
include_once('../../php/connection.php');
include_once('../../php/datos.php');

$datos = new Datos;

if(isset($_POST['id']) && isset($_POST['idc'])){
    $id=$_POST['id'];
    $idcontenido=$_POST['idc'];

    try{
        $eliminado=$datos->borrarImagenporId($id,$idcontenido);
        echo json_encode(array("mensaje"=>'Se eliminaron '.$eliminado.' elementos'));
    }catch(Exception $ex){
        header('HTTP/1.1 400 Error');
        header('Content-Type: application/json; charset=UTF-8');
        die(json_encode(array('mensaje' => $ex->getMessage(), 'code' => 400)));
    }
    
}else{

    header('HTTP/1.1 400 Error');
    header('Content-Type: application/json; charset=UTF-8');
    die(json_encode(array('mensaje' => 'Error al eliminar la imagen.', 'code' => 400)));
}


?>