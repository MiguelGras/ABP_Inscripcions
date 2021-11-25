<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Upload Files</title>
</head>
<body>
    <!--MUY IMPORTANTE: enctype="multipart/form-data" PARA LA SUBIDA DE FICHEROS !-->
    <center>
    <br><br>
    <form action="../processes/insert.upload.proc.php" method="post" enctype="multipart/form-data">
        Archivo
        <!--la etiqueta accept="image/*" nos permite aislar 
        para que solo se puedan subir imagenes con cierta extension-->
        <input class="form-control" type="file" accept="image/*" name="file" id="">
        <br><br>
        <input type="submit" value="Send">
    </form>
    </center>
    <?php
        include "../services/connection.php";

        $fotos=$pdo->prepare("SELECT img_ev FROM tbl_eventos");
        $fotos->execute();
        $listafotos=$fotos->fetchAll(PDO::FETCH_ASSOC);

        foreach ($listafotos as $foto) {
            echo "<table>";
                    echo "<img style='width:200px;height:200px;' src='{$foto['img_ev']}'";
                    echo "</br>";
                    echo "</tr>";
            echo "</table>";
        }
    ?>
</body>
</html>