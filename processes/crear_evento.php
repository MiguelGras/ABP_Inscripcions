<?php
include "../services/connection.php";
$nombre_ev=$_POST['nombre_ev'];
$desc_ev=$_POST['desc_ev'];
$img_ev="../img/".date('j-m-y')."-".$_FILES['file']['name'];
$edad_ev=$_POST['edad_ev'];
$capacidad_ev=$_POST['capacidad_ev'];
$fecha_ev=$_POST['fecha_ev'];
$direccion_ev=$_POST['direccion_ev'];
$telf_contacto_ev=$_POST['telf_contacto_ev'];

$error=false;
if(move_uploaded_file($_FILES['file']['tmp_name'],$img_ev)){
 try {
    #Insertaré el registro
    $stmt = $pdo->prepare("INSERT INTO tbl_eventos (nombre_ev, desc_ev, img_ev, edad_ev, capacidad_ev, fecha_ev, direccion_ev, telf_contacto_ev) VALUES(:nombre_ev, :desc_ev, :img_ev, :edad_ev, :capacidad_ev, :fecha_ev, :direccion_ev, :telf_contacto_ev)");
    $stmt->bindParam(':nombre_ev', $nombre_ev);
    $stmt->bindParam(':desc_ev', $desc_ev);
    $stmt->bindParam(':img_ev', $img_ev);
    $stmt->bindParam(':edad_ev', $edad_ev);
    $stmt->bindParam(':capacidad_ev', $capacidad_ev);
    $stmt->bindParam(':fecha_ev', $fecha_ev);
    $stmt->bindParam(':direccion_ev', $direccion_ev);
    $stmt->bindParam(':telf_contacto_ev', $telf_contacto_ev);
    // Excecute
    $stmt->execute();
    //$sentences=$sentences->fetchAll(PDO::FETCH_ASSOC);
 } catch (\Throwable $th) {
     //throw $th;
     echo $th;
     $error=true;
     unlink($img_ev);
 }
 if ($error) {
    header("Location:../view/vista_admin.php?error=1");
 }else {
    header("Location:../view/vista_admin.php");
 }  
}else{
    header("Location:../view/vista_admin.php?error=1");
}