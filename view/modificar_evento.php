<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Formulario Modificar</title>
</head>

<body>
<div class="">
    <h1>Modificar Evento</h1>
    <?php
        $id_ev=$_REQUEST['id_ev'];

        require_once '../services/config.php';
        require_once '../services/connection.php';

        $sql=$pdo->prepare("SELECT * FROM tbl_eventos WHERE id_ev=?");
        $sql->bindParam(1, $id_ev);
        $sql->execute(); 

        $listaEventos=$sql->fetchAll(PDO::FETCH_ASSOC);
        foreach($listaEventos as $evento){ 
    ?>
    <form action="../processes/modificar.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label class="control-label col-sm-2" for="nombre_ev">Nombre evento:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nombre_ev" name="nombre_ev" size="50" value="<?php echo "$evento[nombre_ev]";?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="desc_ev">Descripción evento:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="desc_ev" name="desc_ev" value="<?php echo "$evento[desc_ev]";?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="img_ev">Imagen evento:</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="img_ev" accept="image/*" name="file" value="<?php echo "$evento[img_ev]";?>">
                <br>
                <input type="text" class="form-control" id="img_ev" name="img_ev" value="<?php echo "$evento[img_ev]";?>">
                <br>
                <?php echo "<td><img style='width:200px;height:200px;' src='{$evento['img_ev']}'</td>";?>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="edad_ev">Edad mínima:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="edad_ev" name="edad_ev" size="3" value="<?php echo "$evento[edad_ev]";?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="capacidad_ev">Capacidad evento:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="capacidad_ev" name="capacidad_ev" size="6" value="<?php echo "$evento[capacidad_ev]";?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="fecha_ev">Fecha evento:</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="fecha_ev" name="fecha_ev" step="1" min="2021-01-01" max="2028-12-31" value="<?php echo "$evento[fecha_ev]";?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="direccion_ev">Dirección evento:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="direccion_ev" name="direccion_ev" size="50" value="<?php echo "$evento[direccion_ev]";?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="telf_contacto_ev">Descripción evento:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="telf_contacto_ev" name="telf_contacto_ev" size="9" value="<?php echo "$evento[telf_contacto_ev]";?>">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-info">Guardar</button>
                <a href='vista_admin.php' class='btn btn-danger'>Cancelar</a>
            </div>
        </div>
    </form>
    <?php } ?>
</body>
</html>