<?php   
session_start(); //to ensure you are using same session
 		$_SESSION['id']="";
        $_SESSION['nombre']="";
session_destroy(); //destroy the session
header("location:login1.php"); //to redirect back to "index.php" after logging out
exit();
?>