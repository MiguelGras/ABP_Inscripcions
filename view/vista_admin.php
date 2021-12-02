<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Vista Admin</title>
</head>
<body>

<?php
session_start();


if(!empty($_SESSION['email_admin'])){
?>
    <a class='btnlogout' href="../processes/logout.php">Log Out</a>
    <br>
    <marquee behavior="scroll" direction="right" scrolldelay="1">Bienvenido <?php echo $_SESSION['email_admin']; ?></marquee>
    <br>
    <!--MUY IMPORTANTE: enctype="multipart/form-data" PARA LA SUBIDA DE FICHEROS !-->
    <center>

    <br><br>
    <form action="../processes/crear_evento.php" method="post" enctype="multipart/form-data" width="100%">
        <p>Nombre evento: <input type="text" name="nombre_ev" size="50"></p>
        <p>Descripción evento: <input type="text" name="desc_ev" width="100%"></p>
        <!--la etiqueta accept="image/*" nos permite aislar 
        para que solo se puedan subir imagenes con cierta extension-->
        <p>Imagen evento: <input class="form-control" type="file" accept="image/*" name="file" id="" width="100%"></p>
        <p>Edad mínima: <input type="number" name="edad_ev" size="3"></p>
        <p>Capacidad evento: <input type="number" name="capacidad_ev" size="6"></p>
        <p>Fecha evento: <input type="date" name="fecha_ev" step="1" min="2021-01-01" max="2028-12-31" value="<?php echo date("Y-m-d");?>"></p>
        <p>Direccion evento: <input type="text" name="direccion_ev" size="50"></p>
        <p>Telefono contacto evento: <input type="number" name="telf_contacto_ev" size="9"></p>
        <br><br>
        <input type="submit" value="Enviar">
        <input type="reset" value="Borrar">
    </form>
    </center>
    <?php
        include "../services/connection.php";


    echo "<table class='table'>";
    echo "<tr>";
    echo "<th>Evento</th>";
    echo "<th>Descripción</th>";
    echo "<th>img</th>";
    echo "<th>Edad mínima</th>";
    echo "<th>Capacidad</th>";
    echo "<th>Fecha</th>";
    echo "<th>Dirección</th>";
    echo "<th>Telf contacto</th>";
    echo "</tr>";


        $fotos=$pdo->prepare("SELECT * FROM tbl_eventos");
        $fotos->execute();
        $listafotos=$fotos->fetchAll(PDO::FETCH_ASSOC);

        foreach ($listafotos as $foto) {
                echo "<td>{$foto['nombre_ev']}</td>";
                echo "<td>{$foto['desc_ev']}</td>";  
                echo "<td><img style='width:200px;height:200px;' src='{$foto['img_ev']}'</td>";
                echo "<td>{$foto['edad_ev']}</td>";
                echo "<td>{$foto['capacidad_ev']}</td>";
                echo "<td>{$foto['fecha_ev']}</td>";
                echo "<td>{$foto['direccion_ev']}</td>";
                echo "<td>{$foto['telf_contacto_ev']}</td>";
                echo "<td><a type='button' href='modificar_evento.php?id_ev={$foto['id_ev']}' onclick=\"return confirm('¿Estás seguro de modificar?')\">Modificar</a></td>";
                echo "<td><a type='button' href='../processes/eliminar_evento.php?id_ev={$foto['id_ev']}'  onclick=\"return confirm('¿Estás seguro de borrar?')\">Borrar</a></td>";  
                echo "</tr>";
        }
        echo "</table>";
}else{
    header("Location:../view/login.html");
}
    ?>
</body>
</html>