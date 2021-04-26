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
    $tipo=$_POST['Tipo'];
    $url=null;
    $titulo=$_POST['Titulo'];
    if (isset($_POST['Externo'])) {
        $url = $_POST['Externo'];
    } else {
        $url = null;
    }

    $archivo = null;

    $error = array();
    $extension = array("jpeg", "jpg", "png","pdf","xls","mp4","mp3");

    $documentosext = array("pdf","xls");
    $imagenesext = array("jpeg", "jpg", "png");
    $videosext  = array("mp4");
    $audiosext  = array("mp3");

    $carpeta = "/MecanismoDiscapacidad/";


    if (!file_exists("../Recursos" . $carpeta)) {
        mkdir("../Recursos" . $carpeta);
    }
    $dir = "/Recursos" . $carpeta;

    print_r($_FILES);

    if (!(is_null($_FILES["imagen"]["name"]) || empty($_FILES["imagen"]["name"]))) {
        $archivo_nombre = $_FILES["imagen"]["name"];
        $archivo_tmp = $_FILES["imagen"]["tmp_name"];
        $ext = pathinfo($archivo_nombre, PATHINFO_EXTENSION);
        if (in_array($ext, $documentosext)) {
            $tipoa = "Documento";
        } elseif (in_array($ext, $imagenesext)) {
            $tipoa = "Imagen";
        } elseif (in_array($ext, $videosext)) {
            $tipoa = "Video";
        } elseif (in_array($ext, $audiosext)) {
            $tipoa = "Audio";
        }
        $nombreimagen = null;
        if (in_array($ext, $extension)) {
            if (!file_exists("../Recursos/" . $carpeta . $archivo_nombre)) {
                $nombreimagen = str_replace(' ', '_', trim($archivo_nombre));
                move_uploaded_file($archivo_tmp = $_FILES["imagen"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . '/PDHEG' . $dir . $nombreimagen);
                $imagen= array("directorio" => $dir, "nombre" => $nombreimagen, "tipo" => $tipoa);
            } else {
                $archivo_nombre = basename($archivo_nombre, $ext);
                $nuevoArchivoNombre = substr($archivo_nombre, 0, -1) . time() . "." . $ext;
                $nombreimagen = str_replace(' ', '_', trim($nuevoArchivoNombre));
                move_uploaded_file($archivo_tmp = $_FILES["imagen"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . '/PDHEG' . $dir . $nombreimagen);
                $imagen= array("directorio" => $dir, "nombre" => $nombreimagen, "tipo" => $tipoa);
            }
        } else {
            throw new Exception("Ocurrio un error al subir imagenes");
        }
    }


    if ($url == null) {
        try {
            $archivo_nombre = $_FILES["files"]["name"];
            $archivo_tmp = $_FILES["files"]["tmp_name"];
            $ext = pathinfo($archivo_nombre, PATHINFO_EXTENSION);
            $nombre = null;
            if (in_array($ext, $extension)) {
                if (!file_exists("../Recursos/" . $carpeta . $archivo_nombre)) {
                    $nombre = str_replace(' ', '_', trim($archivo_nombre));
                    move_uploaded_file($archivo_tmp = $_FILES["files"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . '/PDHEG' . $dir . $nombre);
                    $archivo = array("directorio" => $dir, "nombre" => $nombre);
                } else {
                    $archivo_nombre = basename($archivo_nombre, $ext);
                    $nuevoArchivoNombre = substr($archivo_nombre, 0, -1) . time() . "." . $ext;
                    $nombre = str_replace(' ', '_', trim($nuevoArchivoNombre));
                    move_uploaded_file($archivo_tmp = $_FILES["files"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . '/PDHEG' . $dir . $nombre);
                    $archivo = array("directorio" => $dir, "nombre" => $nombre);
                }
            } else {
                throw new Exception("Ocurrio un error al subir imagenes");
            }

            $url = $archivo['directorio'] . $archivo['nombre'];
            $datos->agregarMecanismoDiscapacidad($titulo,$url,$imagen,$tipo);
            print_r("Se agrego la mecanismo de discapacidad");
        } catch (Exception $ex) {
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/PDHEG' . $archivo['directorio'] . $archivo['nombre'])) {
                unlink($_SERVER['DOCUMENT_ROOT'] . '/PDHEG' . $archivo['directorio'] . $archivo['nombre']);
            }

            throw $ex;
        }
    }else{
        $datos->agregarMecanismoDiscapacidad($titulo,$url,$imagen,$tipo);
        print_r("Se agrego la mecanismo de discapacidad");
    }

    header('Location: ./index.php');

    /*print_r($nombre);
    print_r($anio);
    print_r($periodo);
    print_r($categoria);
    print_r($url);*/

}

?>
    
