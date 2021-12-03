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
    <form method="post" action="partante.php">
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
    //------------
    $comprdni=$pdo->prepare("SELECT dni_usu FROM tbl_usuarios WHERE dni_usu='{$dni}';");
    $comprdni->execute();
    $listaDni=$comprdni->fetchAll(PDO::FETCH_ASSOC);
    //------------
    if (!empty($listaDni)) {
        $comprdni=$pdo->prepare("INSERT INTO tbl_usuarios(dni_usu, nombre_usu, apellido_usu, edad_usu, email_usu, img_dni_usu) VALUES ('{$dni}');");
        //$comprdni->execute();
    }
}