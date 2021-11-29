<?php   
session_start();
session_unset();
session_destroy();

header("location:../view/vista.php"); //redirige al vista.php al cerrar sesion

?>