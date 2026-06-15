<?php
if (!isset($_COOKIE['erabiltzailea']) || $_COOKIE['erabiltzailea'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

require('../../klaseak/com/leartik/daw24gone/diskoak/diskoa.php');
require('../../klaseak/com/leartik/daw24gone/diskoak/diskoa_db.php');

use com\leartik\daw24gone\diskoak\Diskoa;
use com\leartik\daw24gone\diskoak\DiskoaDB;

$mezua = "";
$id_ezabatu = 0;
$titulua = "";
$diskoa = null;

if (isset($_POST['ezabatu'])) {

    $id_ezabatu = $_POST['id'];

    if (is_numeric($id_ezabatu) && $id_ezabatu > 0) {
        $diskoa = new Diskoa();
        $diskoa->setId($id_ezabatu);

        $emaitza = DiskoaDB::ezabatuDiskoa($diskoa);

        if ($emaitza > 0) {
            include('diskoa_ezabatu_da.php');
            exit();
        } else {
            $mezua = "Errorea: Diskoa ezin izan da ezabatu.";
            include('diskoa_ez_da_ezabatu.php');
            exit();
        }
    } else {
        include('diskoa_id_baliogabea.php');
        exit();
    }
} elseif (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id_del_get = $_GET['id'];

    // El objeto cargado se almacena en $diskoa
    $diskoa = DiskoaDB::selectDiskoa($id_del_get);

    if ($diskoa) {

        $id_ezabatu = $diskoa->getId();
        $titulua = $diskoa->getTitulua();

        include('diskoa_ezabatu.php');
        exit();
    } else {
        include('diskoa_id_baliogabea.php');
        exit();
    }
} else {
    include('diskoa_id_baliogabea.php');
    exit();
}
