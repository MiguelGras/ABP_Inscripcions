<?php

include '../services/config.php';
include '../services/connection.php';
//-----------------------------------------------------------------------------------------------
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¿Has participado ya en algun evento previo?</title>
</head>
<body>
    <h1>Introduce tu DNI a continuacion:</h1>
    <form method="post">
        <p>DNI: <input type="text" minlength="9" maxlength="9" name="dni" id="dni" placeholder="Introduce tu DNI..." required></p>
        <input type='submit' class='btn btn-success' value='Enviar' name='Enviar'>
    </form>
</body>
</html>
<?php
//-----------------------------------------------------------------------------------------------
if(isset($_POST['Enviar'])){
    //------------
    $dni=$_POST['dni'];
    $id_ev=$_GET['id_ev'];
    //------------
    $comprdni=$pdo->prepare("SELECT dni_usu FROM tbl_usuarios WHERE dni_usu='{$dni}';");
    $comprdni->execute();
    $listaDni=$comprdni->fetchAll(PDO::FETCH_ASSOC);
    //print_r($listaDni);
    //echo "<br>";
    //------------
    $comprdnivol=$pdo->prepare("SELECT dni_par, evento_par FROM tbl_voluntarios WHERE dni_par='{$dni}' and id_ev={$id_ev};");
    $comprdnivol->execute();
    $listaDnivol=$comprdnivol->fetchAll(PDO::FETCH_ASSOC);
    //print_r($listaDnivol);
    //echo "<br>";
    //------------
    $selectEv=$pdo->prepare("SELECT nombre_ev FROM tbl_eventos WHERE id_ev={$id_ev}");
    $selectEv->execute();
    $selectEv=$selectEv->fetchAll(PDO::FETCH_ASSOC);
    //print_r($selectEv);
    //------------
    foreach ($selectEv as $nomevento) {
        $selectEv=$nomevento['nombre_ev'];
        //print_r($selectEv);
        //echo "<br>";
    }
    
    //------------
    try{
        if (!empty($listaDni && empty($listaDnivol))) {
            $comprdni=$pdo->prepare("INSERT INTO tbl_voluntarios(id_par,dni_par,evento_par,id_ev) VALUES (NULL,'{$dni}','{$selectEv}','{$id_ev}');");
            $comprdni->execute();
            echo "Se han registrado tus datos de forma correcta";
            echo "<br>";
            echo "<a href='../view/vista.php'>Volver a vista</a>";
            echo "<br>";
            echo "<a href='../view/eventos.php?id_ev={$_GET['id_ev']}'>Volver al evento ".$selectEv."</a>";
        }elseif(!empty($listaDni && !empty($listaDnivol))){
            if(empty($listaDnivol)){    
                $comprdni=$pdo->prepare("INSERT INTO tbl_voluntarios(id_par,dni_par,evento_par,id_ev) VALUES (NULL,'{$dni}','{$selectEv}','{$id_ev}');");
                $comprdni->execute();
                echo "Se han registrado tus datos de forma correcta";
                echo "<br>";
                echo "<a href='../view/vista.php'>Volver a vista</a>";
                echo "<br>";
                echo "<a href='../view/eventos.php?id_ev={$_GET['id_ev']}'>Volver al evento ".$selectEv."</a>";
            }elseif(!empty($listaDnivol)){
                echo "Ya te has registrado en este evento!";
                echo "<br>";
                echo "<a href='../view/vista.php'>Volver a vista</a>";
                echo "<br>";
                echo "<a href='../view/eventos.php?id_ev={$_GET['id_ev']}'>Volver al evento ".$selectEv."</a>"; 
            }
        }elseif(empty($listaDni && empty($listaDnivol))){
            echo "Todavia no has participado en ningun evento...";
            echo "<br>";
            echo "<a href='../view/vista.php'>Volver a vista</a>";
            echo "<br>";
            echo "<a href='../view/eventos.php?id_ev={$_GET['id_ev']}'>Volver al evento ".$selectEv."</a>";
        }
    }catch(PDOException $e){
        echo 'mal';
        echo  $e->GETMessage();
    }
}