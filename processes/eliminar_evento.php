<?php 
include '../services/config.php';
include '../services/connection.php';


$id_ev=$_GET['id_ev'];

echo $pdo->exec("DELETE FROM alumnos WHERE email=$email");
$stmt = $pdo->prepare("DELETE FROM tbl_eventos WHERE id_ev=?");

$stmt->bindParam(1, $id_ev);
$stmt->execute();

header("Location:../view/formulario_crear.php");