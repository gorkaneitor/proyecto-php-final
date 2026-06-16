<?php

if (!isset($_COOKIE['erabiltzailea']) || $_COOKIE['erabiltzailea'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

require('../../klaseak/com/leartik/daw24gone/diskoak/kategoria.php');
require('../../klaseak/com/leartik/daw24gone/diskoak/kategoria_db.php');

use com\leartik\daw24gone\diskoak\kategoria;
use com\leartik\daw24gone\diskoak\kategoriaDB;

if (isset($_POST['gorde'])) {
    $izena = $_POST['izena'];
    $deskribapena = $_POST['deskribapena'];

    if (strlen($izena) > 0 && strlen($deskribapena) > 0) {
        $kategoria = new Kategoria();
        $kategoria->setIzena($izena);
        $kategoria->setDeskribapena($deskribapena);

        if (KategoriaDB::insertKategoria($kategoria) > 0) {
            include('kategoria_gorde_da.php');
        } else {
            include('kategoria_ez_da_gorde.php');
        }
    } else {
        $mezua = "Eremu guztiak bete behar dira";
        include('kategoria_berria.php');
    }
} else {
    $izena = "";
    $deskribapena = "";
    $mezua = "";
    include('kategoria_berria.php');
}
