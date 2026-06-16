<?php

if (!isset($_COOKIE['erabiltzailea']) || $_COOKIE['erabiltzailea'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}
require('../../klaseak/com/leartik/daw24gone/diskoak/mezua.php');
require('../../klaseak/com/leartik/daw24gone/diskoak/mezua_db.php');

use com\leartik\daw24gone\diskoak\Mezua;
use com\leartik\daw24gone\diskoak\MezuaDB;

$mezua = "";
$id_ezabatu = 0;


if (isset($_POST['ezabatu_berretsi'])) {

    $id_ezabatu = $_POST['id'];

    if (is_numeric($id_ezabatu) && $id_ezabatu > 0) {
        $mezua = new Mezua();
        $mezua->setId($id_ezabatu);

        $emaitza = MezuaDB::ezabatuMezua($mezua);

        if ($emaitza > 0) {
            include('mezua_ezabatu_da.php');
            exit();
        } else {
            $mezua = "Errorea: Mezua ezin izan da ezabatu.";
            include('mezua_ez_da_ezabatu.php');
            exit();
        }
    } else {
        include('../mezua_id_baliogabea.php');
        exit();
    }
} elseif (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id_ezabatu = $_GET['id'];

    $mezua_obj = MezuaDB::selectMezua($id_ezabatu);

    if ($mezua_obj) {
        $izena = $mezua_obj->getIzena();
        $id = $mezua_obj->getId();

        include('mezua_ezabatu.php');
        exit();
    } else {

        include('../mezua_id_baliogabea.php');
        exit();
    }
} else {
    include('../mezua_id_baliogabea.php');
    exit();
}
