<?php
require('../klaseak/com/leartik/daw24gone/diskoak/diskoa.php');
require('../klaseak/com/leartik/daw24gone/diskoak/diskoa_db.php');
require('../klaseak/com/leartik/daw24gone/diskoak/saskia.php');
require('../klaseak/com/leartik/daw24gone/diskoak/detailea.php');
require('../klaseak/com/leartik/daw24gone/diskoak/bezeroa.php');
require('../klaseak/com/leartik/daw24gone/diskoak/eskaria.php');
require('../klaseak/com/leartik/daw24gone/diskoak/eskaria_db.php');

session_start();

use com\leartik\daw24gone\diskoak\Saskia;
use com\leartik\daw24gone\diskoak\Bezeroa;
use com\leartik\daw24gone\diskoak\Eskaria;
use com\leartik\daw24gone\diskoak\EskariaDB;

if (!isset($_SESSION['saskia'])) {
    $_SESSION['saskia'] = new Saskia();
}
$saskia = $_SESSION['saskia'];

if (isset($_POST['gehitubat']) && is_numeric($_POST['id'])) {
    $saskia->unitateaGehitu((int)$_POST['id']);
}

if (isset($_POST['kendubat']) && is_numeric($_POST['id'])) {
    $saskia->unitateaKendu((int)$_POST['id']);
}

if (isset($_POST['ezabatu']) && is_numeric($_POST['id'])) {
    $saskia->detaileaEzabatu((int)$_POST['id']);
}

if (isset($_POST['eskaria_gorde'])) {
    $bezeroa = new Bezeroa();
    $bezeroa->setIzena(trim($_POST['izena'] ?? ''));
    $bezeroa->setAbizena(trim($_POST['abizena'] ?? ''));
    $bezeroa->setHelbidea(trim($_POST['helbidea'] ?? ''));
    $bezeroa->setHerria(trim($_POST['herria'] ?? ''));
    $bezeroa->setPostaKodea(trim($_POST['posta_kodea'] ?? ''));
    $bezeroa->setEmaila(trim($_POST['email'] ?? ''));

    if (!empty($bezeroa->getIzena()) && !empty($bezeroa->getEmaila()) && count($saskia->getDetaileak()) > 0) {
        $eskaria = new Eskaria();
        $eskaria->setData(date("Y-m-d H:i:s"));
        $eskaria->setBezeroa($bezeroa);
        $eskaria->setDetaileak($saskia->getDetaileak());

        $id_berria = EskariaDB::insertEskaria($eskaria);

        if ($id_berria > 0) {
            unset($_SESSION['saskia']);
            $_SESSION['mezua'] = "Eskerrik asko! Zure eskaera (#$id_berria) ondo jaso dugu.";
            header("Location: index.php");
            exit();
        }
    }
}

$_SESSION['saskia'] = $saskia;

if ((isset($_GET['akzioa']) && $_GET['akzioa'] == 'datuak_bete') || isset($_POST['eskaria'])) {
    include 'eskaria-berria.php';
} else {
    include '../saskia/saskia_erakutsi.php';
}
