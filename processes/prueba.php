<?php
include '../services/config.php';
include '../services/connection.php';
$id_ev=1;

$selectEv=$pdo->prepare("SELECT nombre_ev FROM tbl_eventos WHERE id_ev={$id_ev}");
$selectEv->execute();
$selectEv=$selectEv->fetchAll(PDO::FETCH_ASSOC);
foreach ($selectEv as $value) {
    $selectEv=$value['nombre_ev'];

}
print_r($selectEv);