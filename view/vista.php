<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/vista.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/modalbox.js"></script>
    <script src="../js/vista.js"></script>
    <title>ABP_Inscripciones</title>
</head>
<body>
    <h1>Carreras para participar!</h1>
    <?php
    include "../services/connection.php";
    //include "../view";

    
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_eventos");
        $select->execute();
        $listaEventos=$select->fetchAll(PDO::FETCH_ASSOC);
        /*foreach ($listaEventos as $capacidadev) {
            $listaEv=$capacidadev['capacidad_ev'];
            print_r($listaEv);
            echo "<br>";
        }*/
        //------------
        /*$contar=$pdo->prepare("SELECT evento_par FROM tbl_voluntarios WHERE id_ev={$id_ev}");
        $contar->execute();
        $count=$contar->rowCount(PDO::FETCH_ASSOC);
        print_r($count);*/
        //------------
        foreach ($listaEventos as $evento) {            
            echo "<div>";
                echo "<a href='eventos.php?id_ev={$evento['id_ev']}'><img style='width:200px;height:200px;' src='{$evento['img_ev']}'/></a>";
            echo "</div>";
            echo "<br>";
            echo "<div>{$evento['nombre_ev']}</div>";  
            echo "<br>";
            echo "<div>Maximo de participantes: {$evento['capacidad_ev']}</div>";
            echo "<br>";
            echo "<div>{$evento['fecha_ev']}</div>";
        }
    ?>
</body>