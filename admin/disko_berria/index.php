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
if (isset($_POST['gorde'])) {
    $titulua = $_POST['titulua'];
    $kanta_kop = $_POST['kanta_kop'];
    $prezioa = $_POST['prezioa'];
    $deskontua = isset($_POST['deskontua']) ? $_POST['deskontua'] : 0;
    $nobedadea = isset($_POST['nobedadea']) ? 1 : 0;
    $kategoria = $_POST['kategoria'];

    // Server-side validation: titulua non-empty, numeric fields numeric and within ranges
    $valid = true;
    if (strlen($titulua) == 0) $valid = false;
    if (!is_numeric($kanta_kop) || (int)$kanta_kop < 0) $valid = false;
    if (!is_numeric($prezioa) || (float)$prezioa < 0) $valid = false;
    if (!is_numeric($deskontua) || (int)$deskontua < 0 || (int)$deskontua > 100) $valid = false;

    if ($valid) {
        $kanta_kop = (int)$kanta_kop;
        $prezioa = (float)$prezioa;
        $deskontua = (int)$deskontua;

        $diskoa = new Diskoa();
        $diskoa->setTitulua($titulua);
        $diskoa->setKanta_kop($kanta_kop);
        $diskoa->setPrezioa($prezioa);
        $diskoa->setDeskontua($deskontua);
        $diskoa->setNobedadea($nobedadea);
        $diskoa->setId_kategoria($kategoria);

        if (DiskoaDB::insertDiskoa($diskoa) > 0) {
            include('diskoa_gorde_da.php');
        } else {
            include('diskoa_ez_da_gorde.php');
        }
    } else {
        $mezua = "Eremu guztiak bete behar dira";
        include('disko_berria.php');
    }
} else {
    $titulua = "";
    $kanta_kop = "";
    $prezioa = "";
    $deskontua = 0;
    $nobedadea = "";
    $mezua = "";
    $kategoria_aukera = "";
    include('disko_berria.php');
}
