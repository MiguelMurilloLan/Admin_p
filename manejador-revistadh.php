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
    $titulo = trim($_POST['Titulo']);
    $imagenes = array();

    $error = array();
    $extension = array("jpeg", "jpg", "png","pdf");

    $documentosext = array("pdf","xls");
    $imagenesext = array("jpeg", "jpg", "png");
    $videosext  = array("mp4");
    $audiosext  = array("mp3");

    $carpeta = "/RevistaDH/";


    if (!file_exists("../Recursos" . $carpeta)) {
        mkdir("../Recursos" . $carpeta);
    }
    $dir = "/Recursos" . $carpeta;

    print_r($_FILES["files"]);
    $tipoa="";

    try {
        if(is_array($_FILES["files"]["name"]) && $_FILES["files"]["size"][0]!=0){
            foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
                if ($_FILES["files"]["size"][$key] > 0) {
                    $archivo_nombre = $_FILES["files"]["name"][$key];
                    $archivo_tmp = $_FILES["files"]["tmp_name"][$key];
                    $ext = pathinfo($archivo_nombre, PATHINFO_EXTENSION);
                    $nombreimagen = null;
        
                    if (in_array($ext, $extension)) {
                        if (!file_exists("../Recursos/".$carpeta. $archivo_nombre)) {
                            $nombreimagen = str_replace(' ', '_', trim($archivo_nombre));
                            move_uploaded_file($archivo_tmp = $_FILES["files"]["tmp_name"][$key], $_SERVER['DOCUMENT_ROOT'] . '/PDHEG' . $dir . $nombreimagen);
                            if(in_array($ext,$documentosext)){
                                $tipoa="Documento";
                            }elseif(in_array($ext,$imagenesext)){
                                $tipoa="Imagen";
                            }elseif(in_array($ext,$videosext)){
                                $tipoa="Video";
                            }elseif(in_array($ext,$audiosext)){
                                $tipoa="Audio";
                            }
                            array_push($imagenes, array("directorio" => $dir, "nombre" => $nombreimagen,"tipo"=>$tipoa));
                        } else {
                            $archivo_nombre = basename($archivo_nombre, $ext);
                            $nuevoArchivoNombre = substr($archivo_nombre,0,-1). time() . "." . $ext;
                            $nombreimagen = str_replace(' ', '_', trim($nuevoArchivoNombre));
                            move_uploaded_file($archivo_tmp = $_FILES["files"]["tmp_name"][$key], $_SERVER['DOCUMENT_ROOT'] . '/PDHEG' . $dir . $nombreimagen);
                            if(in_array($ext,$documentosext)){
                                $tipoa="Documento";
                            }elseif(in_array($ext,$imagenesext)){
                                $tipoa="Imagen";
                            }elseif(in_array($ext,$videosext)){
                                $tipoa="Video";
                            }elseif(in_array($ext,$audiosext)){
                                $tipoa="Audio";
                            }
                            array_push($imagenes, array("directorio" => $dir, "nombre" => $nombreimagen,"tipo"=>$tipoa));
                        }
                    } else {
                        throw new Exception("Ocurrio un error al subir imagenes");
                    }
                }
            }

        }else if(!is_array($_FILES["files"]["size"]) && $_FILES["files"]["size"]!=0){
            $archivo_nombre = $_FILES["files"]["name"];
            $archivo_tmp = $_FILES["files"]["tmp_name"];
            $ext = pathinfo($archivo_nombre, PATHINFO_EXTENSION);
            $nombreimagen = null;
            if (in_array($ext, $extension)) {
                if (!file_exists("../Recursos/". $carpeta . $archivo_nombre)) {
                    $nombreimagen = str_replace(' ', '_', trim($archivo_nombre));
                    move_uploaded_file($archivo_tmp = $_FILES["files"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . '/PDHEG' . $dir . $nombreimagen);
                    if(in_array($ext,$documentosext)){
                        $tipoa="Documento";
                    }elseif(in_array($ext,$imagenesext)){
                        $tipoa="Imagen";
                    }elseif(in_array($ext,$videosext)){
                        $tipoa="Video";
                    }elseif(in_array($ext,$audiosext)){
                        $tipoa="Audio";
                    }
                    array_push($imagenes, array("directorio" => $dir, "nombre" => $nombreimagen,"tipo"=>$tipoa));
                } else {
                    $archivo_nombre = basename($archivo_nombre, $ext);
                    $nuevoArchivoNombre = substr($archivo_nombre,0,-1) . time() . "." . $ext;
                    $nombreimagen = str_replace(' ', '_', trim($nuevoArchivoNombre));
                    move_uploaded_file($archivo_tmp = $_FILES["files"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . '/PDHEG' . $dir . $nombreimagen);
                    if(in_array($ext,$documentosext)){
                        $tipoa="Documento";
                    }elseif(in_array($ext,$imagenesext)){
                        $tipoa="Imagen";
                    }elseif(in_array($ext,$videosext)){
                        $tipoa="Video";
                    }elseif(in_array($ext,$audiosext)){
                        $tipoa="Audio";
                    }
                    array_push($imagenes, array("directorio" => $dir, "nombre" => $nombreimagen,"tipo"=>$tipoa));
                }
            } else {
                throw new Exception("Ocurrio un error al subir imagenes");
            }

        }
        
        $datos->agregarRevistaDH($titulo,$imagenes);
        print_r("Se agrego el revistadh");
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
    
