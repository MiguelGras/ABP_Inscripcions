<?php 
include '../services/config.php';
include '../services/connection.php';


$id_ev=$_GET['id_ev'];

echo $pdo->exec("DELETE FROM tbl_eventos WHERE id_ev=$id_ev");
$stmt = $pdo->prepare("DELETE FROM tbl_eventos WHERE id_ev=?");

$stmt->bindParam(1, $id_ev);
$stmt->execute();

header("Location:../view/vista_admin.php");