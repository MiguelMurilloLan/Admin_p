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
    $titulo = trim($_POST['Titulo']);
    $oldURL = trim($_POST['oldURL']);
    $oldImageURL = trim($_POST['oldImageURL']);
    $imagenes = array();

    $error = array();
    $extension = array("jpeg", "jpg", "png", "pdf");

    $documentosext = array("pdf", "xls");
    $imagenesext = array("jpeg", "jpg", "png");
    $videosext  = array("mp4");
    $audiosext  = array("mp3");

    $carpeta = "/RevistaDH/";


    if (!file_exists("../Recursos" . $carpeta)) {
        mkdir("../Recursos" . $carpeta);
    }
    $dir = "/Recursos" . $carpeta;

    print_r($_FILES);
    $tipoa = "";
    $imagen=null;
    $archivo=null;
    try {
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

        if (!(is_null($_FILES["archivo"]["name"]) || empty($_FILES["archivo"]["name"]))) {
            $archivo_nombre = $_FILES["archivo"]["name"];
            $archivo_tmp = $_FILES["archivo"]["tmp_name"];
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
                    move_uploaded_file($archivo_tmp = $_FILES["archivo"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . '/PDHEG' . $dir . $nombreimagen);
                    $archivo= array("directorio" => $dir, "nombre" => $nombreimagen, "tipo" => $tipoa);
                } else {
                    $archivo_nombre = basename($archivo_nombre, $ext);
                    $nuevoArchivoNombre = substr($archivo_nombre, 0, -1) . time() . "." . $ext;
                    $nombreimagen = str_replace(' ', '_', trim($nuevoArchivoNombre));
                    move_uploaded_file($archivo_tmp = $_FILES["archivo"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . '/PDHEG' . $dir . $nombreimagen);
                    $archivo= array("directorio" => $dir, "nombre" => $nombreimagen, "tipo" => $tipoa);
                }
            } else {
                throw new Exception("Ocurrio un error al subir imagenes");
            }
        }
        
        $datos->modificarRevistaDH($id,$titulo, $imagen,$archivo);
        if($imagen!=NULL){
            unlink($_SERVER['DOCUMENT_ROOT'] . '/PDHEG' . $oldImageURL);
        }
        if($archivo!=NULL){
            unlink($_SERVER['DOCUMENT_ROOT'] . '/PDHEG' . $oldURL);
        }
        print_r("Se modifico la revista");
    } catch (Exception $ex) {
        foreach ($imagenes as $item) {
            echo $_SERVER['DOCUMENT_ROOT'] . '/PDHEG' . $item['directorio'] . $item['nombre'];
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/PDHEG' . $item['directorio'] . $item['nombre'])) {
                unlink($_SERVER['DOCUMENT_ROOT'] . '/PDHEG' . $item['directorio'] . $item['nombre']);
            }
        }

        throw $ex;
    }

    //header('Location: ./index.php');

    print_r($titulo);
    print_r($oldURL);
    print_r($oldImageURL);
    print_r($imagen);
    print_r($archivo);

}

?>
    
