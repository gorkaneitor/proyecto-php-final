<?php

if (!isset($_COOKIE['erabiltzailea']) || $_COOKIE['erabiltzailea'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}
require('../../klaseak/com/leartik/daw24gone/diskoak/kategoria.php');
require('../../klaseak/com/leartik/daw24gone/diskoak/kategoria_db.php');

use com\leartik\daw24gone\diskoak\Kategoria;
use com\leartik\daw24gone\diskoak\KategoriaDB;

$mezua = "";
$id_ezabatu = 0;


if (isset($_POST['ezabatu_berretsi'])) {

    $id_ezabatu = $_POST['id'];

    if (is_numeric($id_ezabatu) && $id_ezabatu > 0) {
        $kategoria = new Kategoria();
        $kategoria->setId($id_ezabatu);

        $emaitza = KategoriaDB::ezabatuKategoria($kategoria);

        if ($emaitza > 0) {
            include('kategoria_ezabatu_da.php');
            exit();
        } else {
            $mezua = "Errorea: Kategoria ezin izan da ezabatu.";
            include('kategoria_ez_da_ezabatu.php');
            exit();
        }
    } else {
        include('../disko_id_baliogabea.php');
        exit();
    }
} elseif (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id_ezabatu = $_GET['id'];

    $kategoria_obj = KategoriaDB::selectKategoria($id_ezabatu);

    if ($kategoria_obj) {
        $izena = $kategoria_obj->getIzena();
        $id = $kategoria_obj->getId();

        include('kategoria_ezabatu.php');
        exit();
    } else {

        include('../disko_id_baliogabea.php');
        exit();
    }
} else {
    include('../disko_id_baliogabea.php');
    exit();
}
