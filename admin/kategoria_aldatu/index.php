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
$izena = "";
$deskribapena = "";


if (isset($_POST['gorde'])) {
    $id = $_POST['id'];
    $izena = $_POST['izena'];
    $deskribapena = $_POST['deskribapena'];



    if (strlen($izena) > 0 && strlen($deskribapena) > 0) {

        $kategoria = new Kategoria();
        $kategoria->setId($id);
        $kategoria->setIzena($izena);
        $kategoria->setDeskribapena($deskribapena);


        if (KategoriaDB::aldatuKategoria($kategoria) > 0) {
            include('kategoria_aldatu_da.php');
            exit();
        } else {
            include('kategoria_ez_da_aldatu.php');
            exit();
        }
    } else {
        $mezua = "Eremu guztiak bete behar dira";
        include('kategoria_aldatu.php');
        exit();
    }
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $kategoria = KategoriaDB::selectKategoria($id);

        if ($kategoria) {
            $id = $kategoria->getId();
            $izena = $kategoria->getIzena();
            $deskribapena = $kategoria->getDeskribapena();

            include('kategoria_aldatu.php');
            exit();
        } else {
            include('kategoria_id_baliogabea.php');
            exit();
        }
    } else {
        include('kategoria_id_baliogabea.php');
        exit();
    }
}
?>