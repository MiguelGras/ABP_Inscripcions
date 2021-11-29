<?php
include '../services/config.php';
include '../services/connection.php';
$stmt = $pdo->prepare("UPDATE tbl_eventos SET nombre_ev=?, desc_ev=?, img_ev=?, edad_ev=?, capacidad_ev=?, fecha_ev=?, direccion_ev=?, telf_contacto_ev=? WHERE id_ev=?" );
// Bind
$nombre_ev=$_REQUEST['nombre_ev'];
$desc_ev=$_REQUEST['desc_ev'];
$img_ev=$_REQUEST['img_ev'];
$edad_ev=$_REQUEST['edad_ev'];
$capacidad_ev=$_REQUEST['capacidad_ev'];
$fecha_ev=$_REQUEST['fecha_ev'];
$direccion_ev=$_REQUEST['direccion_ev'];
$telf_contacto_ev=$_REQUEST['telf_contacto_ev'];
$stmt->bindParam(1, $nombre_ev);
$stmt->bindParam(2, $desc_ev);
$stmt->bindParam(3,$img_ev);
$stmt->bindParam(4,$edad_ev);
$stmt->bindParam(5,$capacidad_ev);
$stmt->bindParam(6,$fecha_ev);
$stmt->bindParam(7,$direccion_ev);
$stmt->bindParam(8,$telf_contacto_ev);
// Excecute
$stmt->execute();
header("Location:../view/vista_admin.php");

/*
$nombre_ev=$_REQUEST['nombre_ev'];
$desc_ev=$_REQUEST['desc_ev'];
$img_ev=$_REQUEST['img_ev'];
$edad_ev=$_REQUEST['edad_ev'];
$capacidad_ev=$_REQUEST['capacidad_ev'];
$fecha_ev=$_REQUEST['fecha_ev'];
$direccion_ev=$_REQUEST['direccion_ev'];
$telf_contacto_ev=$_REQUEST['telf_contacto_ev'];
$stmt = $pdo->prepare("UPDATE tbl_eventos SET nombre_ev=:nombre_ev, desc_ev=:desc_ev, img_ev=:img_ev, edad_ev=:edad_ev, capacidad_ev=:capacidad_ev, fecha_ev=:fecha_ev, direccion_ev=:direccion_ev, telf_contacto_ev=:telf_contacto_ev WHERE id_ev=:id_ev" );

try{
    if($stmt->execute()){
        //echo 'bien';
        header("Location:../view/vista_admin.php");
    }
}catch(PDOException $e){
    //echo 'mal';
    echo $e->getMessage();
    header("Location:../view/vista_admin.php");
}

*/