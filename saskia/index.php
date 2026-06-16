<?php
// Beharrezko fitxategiak kargatu (Zure bideak erabiliz)
require('../klaseak/com/leartik/daw24gone/diskoak/produktua.php');
require('../klaseak/com/leartik/daw24gone/diskoak/diskoak_db.php');
require('../klaseak/com/leartik/daw24gone/diskoak/detailea.php');
require('../klaseak/com/leartik/daw24gone/diskoak/saskia.php');

session_start();

use com\leartik\daw24gone\diskoak\Produktua;
use com\leartik\daw24gone\diskoak\ProduktuaDB;
use com\leartik\daw24gone\diskoak\Detailea;
use com\leartik\daw24gone\diskoak\Saskia;


if (!isset($_SESSION['saskia'])) {
    $saskia = new Saskia();
    $_SESSION['saskia'] = $saskia;
} else {
    $saskia = $_SESSION['saskia'];
}


if (isset($_POST['gehitu'])) {
    $id = $_POST['id'];
    $kopurua = $_POST['kopurua'];
    
    
    $aurkitua = false;
    foreach ($saskia->getDetaileak() as $detailea) {
        if ($detailea->getArtikulua()->getId() == $id) {
            // Jada badago, kopurua gehitu besterik ez dugu egiten
            $oraingoKopurua = $detailea->getKopurua();
            $detailea->setKopurua($oraingoKopurua + $kopurua);
            $aurkitua = true;
            break;
        }
    }

    if (!$aurkitua) {
        $produktua = ProduktuaDB::selectProduktua($id);
        $detailea = new Detailea();
        $detailea->setArtikulua($produktua);
        $detailea->setKopurua($kopurua);
        $saskia->detaileaGehitu($detailea);
    }

    $_SESSION['saskia'] = $saskia;
}

// Bista kargatu
include('saskia_erakutsi.php');
?>