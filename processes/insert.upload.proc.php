<?php
include "../services/connection.php";
$img_ev="../public/".date('h-i-s-j-m-y')."-".$_FILES['file']['name'];
$title=$_REQUEST['title'];
$error=false;
if(move_uploaded_file($_FILES['file']['tmp_name'],$img_ev)){
 try {
     #Insertaré el registro
    $query="INSERT INTO tbl_eventos (img_ev) VALUES(?)";
    $sentences=$pdo->prepare($query);
    $sentences->bindParam(1,$img_ev);
    $sentences->execute();
    //$sentences=$sentences->fetchAll(PDO::FETCH_ASSOC);
 } catch (\Throwable $th) {
     //throw $th;
     echo $th;
     $error=true;
     unlink($img_ev);
 }
 if ($error) {
    header("Location:../view/formulario.php?error=1");
 }else {
    header("Location:../view/formulario.php");
 }  
}else{
    header("Location:../view/formulario.php?error=1");
}