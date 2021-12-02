<?php
include '../services/config.php';
include '../services/connection.php';

/*
$stmt = $pdo->prepare("UPDATE tbl_eventos SET nombre_ev=?, desc_ev=?, edad_ev=?, capacidad_ev=?, fecha_ev=?, direccion_ev=?, telf_contacto_ev=?, img_ev=? WHERE id_ev=?" );
$stmt2 = $pdo->prepare("UPDATE tbl_eventos SET nombre_ev=?, desc_ev=?, edad_ev=?, capacidad_ev=?, fecha_ev=?, direccion_ev=?, telf_contacto_ev=? WHERE id_ev=?" );

// Bind
$nombre_ev=$_REQUEST['nombre_ev'];
$desc_ev=$_REQUEST['desc_ev'];
$img_ev="../img/".date('j-m-y')."-".$_FILES['file']['name'];
$edad_ev=$_REQUEST['edad_ev'];
$capacidad_ev=$_REQUEST['capacidad_ev'];
$fecha_ev=$_REQUEST['fecha_ev'];
$direccion_ev=$_REQUEST['direccion_ev'];
$telf_contacto_ev=$_REQUEST['telf_contacto_ev'];

// stmt
$stmt->bindParam(1, $nombre_ev);
$stmt->bindParam(2, $desc_ev);
$stmt->bindParam(3,$edad_ev);
$stmt->bindParam(4,$capacidad_ev);
$stmt->bindParam(5,$fecha_ev);
$stmt->bindParam(6,$direccion_ev);
$stmt->bindParam(7,$telf_contacto_ev);
$stmt->bindParam(8,$img_ev);
// stmt2
$stmt2->bindParam(1, $nombre_ev);
$stmt2->bindParam(2, $desc_ev);
$stmt2->bindParam(3,$edad_ev);
$stmt2->bindParam(4,$capacidad_ev);
$stmt2->bindParam(5,$fecha_ev);
$stmt2->bindParam(6,$direccion_ev);
$stmt2->bindParam(7,$telf_contacto_ev);

// Excecute
if (isset($img_ev)){
    $stmt->execute();
} else {
    $stmt2->execute();
}
//header("Location:../view/vista_admin.php");
//header("Location:../view/hola.php");
print_r ($stmt);
echo "<br>";
print_r ($stmt2);
*/

$id_ev=$_REQUEST['id_ev'];
$nombre_ev=$_REQUEST['nombre_ev'];
$desc_ev=$_REQUEST['desc_ev'];
if (isset($_FILES['file']['name'])){
$img_ev="../img/".date('j-m-y')."-".$_FILES['file']['name'];
}
$edad_ev=$_REQUEST['edad_ev'];
$capacidad_ev=$_REQUEST['capacidad_ev'];
$fecha_ev=$_REQUEST['fecha_ev'];
$direccion_ev=$_REQUEST['direccion_ev'];
$telf_contacto_ev=$_REQUEST['telf_contacto_ev'];

//$stmt = $pdo->prepare("UPDATE tbl_eventos SET nombre_ev=:nombre_ev, desc_ev=:desc_ev, edad_ev=:edad_ev, capacidad_ev=:capacidad_ev, fecha_ev=:fecha_ev, direccion_ev=:direccion_ev, telf_contacto_ev=:telf_contacto_ev WHERE id_ev=:id_ev" );
//$stmt2 = $pdo->prepare("UPDATE tbl_eventos SET nombre_ev=:nombre_ev, desc_ev=:desc_ev, img_ev=:img_ev, edad_ev=:edad_ev, capacidad_ev=:capacidad_ev, fecha_ev=:fecha_ev, direccion_ev=:direccion_ev, telf_contacto_ev=:telf_contacto_ev WHERE id_ev=:id_ev" );

$stmt=$pdo->prepare("UPDATE tbl_eventos SET nombre_ev='{$nombre_ev}', desc_ev='{$desc_ev}', edad_ev='{$edad_ev}', capacidad_ev='{$capacidad_ev}', fecha_ev='{$fecha_ev}', direccion_ev='{$direccion_ev}', telf_contacto_ev='{$telf_contacto_ev}' WHERE id_ev='{$id_ev}';");
$stmt2=$pdo->prepare("UPDATE tbl_eventos SET nombre_ev='{$nombre_ev}', desc_ev='{$desc_ev}', img_ev='{$img_ev}', edad_ev='{$edad_ev}', capacidad_ev='{$capacidad_ev}', fecha_ev='{$fecha_ev}', direccion_ev='{$direccion_ev}', telf_contacto_ev='{$telf_contacto_ev}' WHERE id_ev='{$id_ev}';");

//$stmt = $pdo->prepare("UPDATE tbl_eventos SET nombre_ev=:nombre_ev, desc_ev=:desc_ev, edad_ev=:edad_ev, capacidad_ev=:capacidad_ev, fecha_ev=:fecha_ev, direccion_ev=:direccion_ev, telf_contacto_ev=:telf_contacto_ev WHERE id_ev=:id_ev" );
//$stmt = $pdo->prepare("UPDATE tbl_eventos SET nombre_ev=?, desc_ev=?, edad_ev=?, capacidad_ev=?, fecha_ev=?, direccion_ev=?, telf_contacto_ev=?, img_ev=? WHERE id_ev=?" );
//$stmt2 = $pdo->prepare("UPDATE tbl_eventos SET nombre_ev=?, desc_ev=?, edad_ev=?, capacidad_ev=?, fecha_ev=?, direccion_ev=?, telf_contacto_ev=? WHERE id_ev=?" );
if (isset($_POST['guardar'])){
    if(move_uploaded_file($_FILES['file']['tmp_name'],$img_ev)){
        try{
                $stmt2->execute();
            //print_r ($stmt2);
            
            if(empty($stmt) && empty($stmt2)){
                echo 'mal';
            }else{
                header("location:../view/vista_admin.php");
                //header("location:modificar.php");
                /*
                print_r ($stmt);
                echo "<br>";
                echo "<br>";echo "<br>";echo "<br>";
                print_r ($stmt2);
                */
                //echo 'hola';
                //echo $email;
            }
        }catch(PDOException $e){
            echo 'mal';
        echo  $e->getMessage();
        }
    }else{
        try{
                $stmt->execute();
            //print_r ($stmt2);
            
            if(empty($stmt) && empty($stmt2)){
                echo 'mal';
            }else{
                header("location:../view/vista_admin.php");
                //header("location:modificar.php");
                /*
                print_r ($stmt);
                echo "<br>";
                echo "<br>";echo "<br>";echo "<br>";
                print_r ($stmt2);
                */
                //echo 'hola';
                //echo $email;
            }
        }catch(PDOException $e){
            echo 'mal';
        echo  $e->getMessage();
        }
    }
}


