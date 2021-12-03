<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/vista.css">
</head>
<header>
        <h1>TodoInscripciones.com</h1>
</header>
<body>
    <div class="row">
        <a href='vista.php'><img class='back' src="../img/atras.png" alt="atras"></a>
    </div>
    <div class="two-column">
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
</div>
<div class="row">
    <div class="two-column">
    <h1>Rellena el formulario con tus datos para participar en la carrera</h1>
    <form method="post" enctype="multipart/form-data">
    <!--onsubmit="return false" -->
        <p>Nombre: <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Introduce tu nombre..."></p>
        <br>
        <p>Apellido: <input class="form-control" type="text" name="apellido" id="apellido" placeholder="Introduce tu primer apellido..."></p>
        <br>
        <p>Edad: <input class="form-control" type="number" name="edad" id="edad" placeholder="Introduce tu edad..."></p>
        <br>
        <p>Email: <input class="form-control" type="email" name="email" id="email" placeholder="Introduce tu mail..."></p>
        <br>
        <p>DNI: <input class="form-control" type="text" minlength="9" maxlength="9" name="dni" id="dni" size="9" placeholder="Introduce tu DNI..."></p>
        <br>
        <p>Foto DNI: <input class="form-control" type="file" accept="image/*" name="file" id="" width="100%"></p>
        <input type="submit" class="button-1" value="Enviar" name="Enviar">
        <input type="submit" class="button-2" value="¿Has participado ya en algun evento?" name="partante">
    </form>
    <?php
    //-----------------------------------------------------------------------------------------------
    if(isset($_POST['Enviar'])){
        //------------
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $edad=$_POST['edad'];
        $email=$_POST['email'];
        $dni=$_POST['dni'];
        $img_ev="../img/dni/".date('j-m-y')."-".$_FILES['file']['name'];
        //------------
        $compemail=$pdo->prepare("SELECT email_usu FROM tbl_usuarios WHERE email_usu='{$email}'");
        $compemail->execute();
        $listaEmails=$compemail->fetchAll(PDO::FETCH_ASSOC);
        //------------
        if (empty($listaEmails)) {
            if(move_uploaded_file($_FILES['file']['tmp_name'],$img_ev)){    
                try{
                    $insert=$pdo->prepare("INSERT INTO tbl_usuarios(dni_usu, nombre_usu, apellido_usu, edad_usu, email_usu, img_dni_usu) VALUES ('{$dni}','{$nombre}','{$apellido}','{$edad}','{$email}','{$img_ev}');");
                    $insert->execute();
                    if (empty($insert)) {
                        echo 'mal';
                    }else{
                        //header("location:../view/eventos.php?id_ev={$_GET['id_ev']}");
                    }
                }catch(PDOException $e){
                    echo 'mal';
                    echo  $e->GETMessage();
                }
            }
        }else{
            echo 'Ese email ya esta registrado';
        }
        //------------ 
    }
    //------------
    ?>
</div>
</div>

</body>


<div class="row" id="footer">
        <div class="two-columnfoot">
            <p>© TodoInscripciones.com</p>
        </div>

        <div class="four-column">
            <p>Facebook</p>
            <p>Instagram</p>
        </div>

        <div class="four-column">
            <p>Discord</p>
            <p>Twitter</p>
        </div>
</div>



</html>