<?php

include '../services/config.php';
include '../services/connection.php';
//------------
    $id_ev=$_GET['id_ev'];
//------------
    $select=$pdo->prepare("SELECT * FROM tbl_eventos WHERE id_ev={$id_ev}");
    $select->execute();
    $listaEventos=$select->fetchAll(PDO::FETCH_ASSOC);
//------------
        foreach ($listaEventos as $evento) {
            echo "<a href='vista.php'>Atras</a>";
            echo "<br>";
                echo "<div>";
                    echo "<img style='width:200px;height:200px;' src='{$evento['img_ev']}'/>";
                echo "</div>";
                echo "<br>";
                echo "<div><b>Nombre del evento: </b>{$evento['nombre_ev']}</div>";  
                echo "<br>";
                echo "<div><b>Descripcion: </b>{$evento['desc_ev']}</div>";  
                echo "<br>";
                echo "<div><b>Fecha: </b>{$evento['fecha_ev']}</div>";  
                echo "<br>";
                echo "<div><b>Lugar de salida: </b>{$evento['direccion_ev']}</div>";  
                echo "<br>";
                echo "<div><b>Participantes: </b>x/{$evento['capacidad_ev']} participantes</div>";
                echo "<br>";
        }
//-----------------------------------------------------------------------------------------------
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Rellena el formulario con tus datos para participar en la carrera!!</h1>
    <form action="eventos.php" method="POST">
    <!--onsubmit="return false"-->
        <p>Nombre: <input type="text" name="nombre" id="nombre" placeholder="Introduce tu nombre..."></p>
        <br>
        <p>Apellido: <input type="text" name="apellido" id="apellido" placeholder="Introduce tu primer apellido..."></p>
        <br>
        <p>Edad: <input type="number" name="edad" id="edad" placeholder="Introduce tu edad..."></p>
        <br>
        <p>Email: <input type="text" name="email" id="email" placeholder="Introduce tu mail..."></p>
        <br>
        <p>DNI: <input type="text" name="dni" id="dni" placeholder="Introduce tu DNI..."></p>
        <br>
        <p>Foto DNI: <input class="form-control" type="file" accept="image/*" name="fotodni" id="fotodni" width="100%"></p>
        <input type="submit" class="btn btn-success" value="Enviar">
    </form>
</body>
</html>
<?php
//-----------------------------------------------------------------------------------------------

if(isset($_POST['Enviar'])){
    //------------
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $edad=$_POST['edad'];
    $email=$_POST['email'];
    $dni=$_POST['dni'];
    //$fotodni=$_POST['fotodni'];
    //------------
        //$insert=$pdo->prepare("INSERT INTO `tbl_usuarios`(`dni_usu`, `nombre_usu`, `apellido_usu`, `edad_usu`, `email_usu`, `img_dni_usu`) VALUES ({$dni},{$nombre},{$apellido},{$edad},{$email},{$fotodni});");
        $insert=$pdo->prepare("INSERT INTO `tbl_usuarios`(`dni_usu`, `nombre_usu`, `apellido_usu`, `edad_usu`, `email_usu`) VALUES ({$dni},{$nombre},{$apellido},{$edad},{$email};");

        try{
        $insert->execute();
            if (empty($insert)) {
                echo 'mal';
            }else{
                echo "bien";
                //header("location:../view/eventos.php");
            }
        }catch(PDOException $e){
            echo 'mal';
            echo  $e->GETMessage();
        }
    }
    
//------------
?>