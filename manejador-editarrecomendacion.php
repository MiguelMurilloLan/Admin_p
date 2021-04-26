<?php
    include_once('../php/connection.php');
    include_once('../php/datos.php');
    session_start();
    if (!isset($_SESSION['id'])) {
        header("Location:login.php");
    }
    /*
    $datos=new Datos;

    $permiso=$datos->tienePermiso($_SESSION['id'],'Agregar Evento');

    if(!$permiso['Tiene']){
        header("Location:index.php");
    }
    */
?>
<?php
include_once('../php/connection.php');
include_once('../php/datos.php');

$datos = new Datos;
if (isset($_POST['submit'])) {
    $id = trim($_POST['ID']);
    $expediente = trim($_POST['Expediente']);
    $descripcionurl = trim($_POST['DescripcionURL']);
    $url = trim($_POST['URL']);
    $fecha = $_POST['Fecha'];
    if (isset($_POST['Activo'])) {
        $activo = true;
    } else {
        $activo = false;
    }
    $anio= date("Y",strtotime($fecha));

    $archivo = null;

    $error = array();
    $extension = array("pdf");

    $documentosext = array("pdf", "xls");
    $imagenesext = array("jpeg", "jpg", "png");
    $videosext  = array("mp4");
    $audiosext  = array("mp3");

    $carpeta = "/Recomendaciones/";


    if (!file_exists("../Recursos" . $carpeta)) {
        mkdir("../Recursos" . $carpeta);
    }
    $dir = "/Recursos" . $carpeta;

    print_r($_FILES["files"]);

    try {
        if(file_exists($_FILES['files']['tmp_name']) || is_uploaded_file($_FILES['files']['tmp_name'])) {
            $archivo_nombre = $_FILES["files"]["name"];
            $archivo_tmp = $_FILES["files"]["tmp_name"];
            $ext = pathinfo($archivo_nombre, PATHINFO_EXTENSION);
            $nombre = null;
            if (in_array($ext, $extension)) {
                if (!file_exists("../Recursos/".$carpeta . $archivo_nombre)) {
                    $nombre = str_replace(' ', '_', trim($archivo_nombre));
                    move_uploaded_file($archivo_tmp = $_FILES["files"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . '/PDHEG' . $dir . $nombre);
                    $archivo=array("directorio" => $dir, "nombre" => $nombre);
                } else {
                    $archivo_nombre = basename($archivo_nombre, $ext);
                    $nuevoArchivoNombre = substr($archivo_nombre, 0, -1) . time() . "." . $ext;
                    $nombre = str_replace(' ', '_', trim($nuevoArchivoNombre));
                    move_uploaded_file($archivo_tmp = $_FILES["files"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . '/PDHEG' . $dir . $nombre);
                    $archivo=array("directorio" => $dir, "nombre" => $nombre);
                }
            } else {
                throw new Exception("Ocurrio un error al subir imagenes");
            }
            $oldurl=$url;
            $url=$archivo['directorio'].$archivo['nombre'];
        }
        

        
        $datos->modificarRecomendacion($id,$anio,$fecha,$expediente,$url,$descripcionurl,$activo);
        unlink($_SERVER['DOCUMENT_ROOT'] . '/PDHEG' . $oldurl);
        print_r("Se modifico la recomendacion");
    } catch (Exception $ex) {
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/PDHEG' . $archivo['directorio'] . $archivo['nombre'])) {
                unlink($_SERVER['DOCUMENT_ROOT'] . '/PDHEG' . $archivo['directorio'] . $archivo['nombre']);
            }

        throw $ex;
    }

    header('Location: ./index.php');

    /*print_r($titulo);
    print_r($descripcioncorta);
    print_r($descripcion);
    print_r($lugar);
    print_r($fecha);
    print_r($tipo);
    print_r($banner);
    print_r($imagenes);*/
}

?>
    
