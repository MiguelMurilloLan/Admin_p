<?php
session_start();

include_once('../php/connection.php');
include_once('../php/datos.php');

//print_r($_POST);

$datos = new Datos;
if(isset($_POST['submit'])){
    $usuario=trim($_POST['Usuario']);
    $pass=trim($_POST['Contrasena']);

    $resultado = $datos->obtenerUsuario($usuario);

    if(!is_null($resultado) && !empty($resultado) && password_verify($pass, $resultado['Contrasena'])){
        $_SESSION['id']=$resultado['IdUsuario'];
        $_SESSION['nombre']=$resultado['Nombre'];
        header("Location: index.php");
    }else{
        $_SESSION['error']="Error en la validacion del usuario";
        header("Location: login1.php");
        exit();
    }

}else{
    $_SESSION['error']="Vacio";
    header("Location: login1.php");
    exit();
}
?>