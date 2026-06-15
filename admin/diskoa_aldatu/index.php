<?php

if (!isset($_COOKIE['erabiltzailea']) || $_COOKIE['erabiltzailea'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

require('../../klaseak/com/leartik/daw24gone/diskoak/diskoa.php');
require('../../klaseak/com/leartik/daw24gone/diskoak/diskoa_db.php');
require('../../klaseak/com/leartik/daw24gone/diskoak/kategoria.php');
require('../../klaseak/com/leartik/daw24gone/diskoak/kategoria_db.php');

use com\leartik\daw24gone\diskoak\Diskoa;
use com\leartik\daw24gone\diskoak\DiskoaDB;
use com\leartik\daw24gone\diskoak\Kategoria;
use com\leartik\daw24gone\diskoak\KategoriaDB;

$mezua = "";
$id = 0;
$titulua = "";
$kanta_kop = "";
$prezioa = "";
$deskontua = "";
$nobedadea = "";
$kategoria = "";
$kategoria_aukera = "";

if (isset($_POST['gorde'])) {
    $id = $_POST['id'];
    $titulua = $_POST['titulua'];
    $kanta_kop = $_POST['kanta_kop'];
    $prezioa = $_POST['prezioa'];
    $deskontua = isset($_POST['deskontua']) ? $_POST['deskontua'] : 0;
    $nobedadea = isset($_POST['nobedadea']) ? 1 : 0;
    $kategoria = $_POST['kategoria'];

    $kategoria_aukera = $kategoria;

    $valid = true;
    if (strlen($titulua) == 0) $valid = false;
    if (!is_numeric($kanta_kop) || (int)$kanta_kop < 0) $valid = false;
    if (!is_numeric($prezioa) || (float)$prezioa < 0) $valid = false;
    if (!is_numeric($deskontua) || (int)$deskontua < 0 || (int)$deskontua > 100) $valid = false;
    if (!is_numeric($kategoria) || (int)$kategoria <= 0) $valid = false;

    if ($valid) {
        $kanta_kop = (int)$kanta_kop;
        $prezioa = (float)$prezioa;
        $deskontua = (int)$deskontua;
        $nobedadea = isset($_POST['nobedadea']) ? 1 : 0;


        $diskoa = new Diskoa();
        $diskoa->setId($id);
        $diskoa->setTitulua($titulua);
        $diskoa->setKanta_kop($kanta_kop);
        $diskoa->setPrezioa($prezioa);
        $diskoa->setDeskontua($deskontua);
        $diskoa->setNobedadea($nobedadea);
        $diskoa->setId_kategoria($kategoria);

        if (DiskoaDB::aldatuDiskoa($diskoa) > 0) {
            include('diskoa_aldatu_da.php');
            exit();
        } else {
            include('diskoa_ez_da_aldatu.php');
            exit();
        }
    } else {
        $mezua = "Eremu guztiak bete behar dira";
        include('diskoa_aldatu.php');
        exit();
    }
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $diskoa = DiskoaDB::selectDiskoa($id);

        if ($diskoa) {
            $id = $diskoa->getId();
            $titulua = $diskoa->getTitulua();
            $kanta_kop = $diskoa->getKanta_kop();
            $prezioa = $diskoa->getPrezioa();
            $deskontua = $diskoa->getDeskontua();
            $nobedadea = $diskoa->getNobedadea();
            $kategoria = $diskoa->getId_kategoria();
            $kategoria_aukera = $kategoria;

            include('diskoa_aldatu.php');
            exit();
        } else {
            include('diskoa_id_baliogabea.php');
            exit();
        }
    } else {
        include('diskoa_id_baliogabea.php');
        exit();
    }
}
