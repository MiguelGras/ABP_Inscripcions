<?php


include '../services/config.php';
include '../services/connection.php';
/*
#Hacemos request del usuario y la contraseña que pillamos del login
$email=$_REQUEST['email'];
$pass=$_REQUEST['contraseña'];

$email = mysqli_real_escape_string($servidor,$email); //hace que este string no pueda tener carácteres especiales cómo comillas
#Comprobamos que el usuario y contraseña existan en la tabla ADMIN
$user = mysqli_query($servidor,"SELECT * FROM tbl_usuarios where email_usuario='$email' and contra_usuario=('{$contraseña}')");
#Realizamos la query
#Aqui guardamos el resultado, si es 1 o 0.
if (mysqli_num_rows($user) == 1) {
    // coincidencia de credenciales
    session_start();
    $_SESSION['email']=$email;
    header("location: ../view/vista.php");
} else {
    // usuario o contraseña erróneos
    header("location: ../view/login.html");
}

mysqli_free_result($user);
*/

//////////////////////////

if (isset($_POST['email_admin']) && isset($_POST['pass_admin'])) {
    require_once '../services/connection.php';
    session_start();

    #Hacemos request del usuario y la contraseña que pillamos del login
    $email_admin=$_POST['email_admin'];
    $pass_admin=$_POST['pass_admin'];
    $stmt = $pdo->prepare("SELECT * FROM tbl_admin WHERE email_admin='$email_admin' and pass_admin=MD5('{$pass_admin}')");
    $stmt->execute();
    $comprobacion=$stmt->fetchAll(PDO::FETCH_ASSOC);
    try {
        if (!$comprobacion=="") {
            //print_r($comprobacion);
            $_SESSION['email_admin']=$email_admin;
            header("location:../view/vista_admin.php?email=$email_admin");
        }else {
            //print_r($comprobacion);
            header("location: ../view/login.html");
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
