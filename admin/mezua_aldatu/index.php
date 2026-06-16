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
$id = 0;
$izena = "";
$email = "";
$mezuaTextua = "";
$erantzunda = 0;
$sortzeData = date('Y-m-d H:i:s'); // Corregida la sintaxis Date()

if (isset($_POST['gorde'])) {
    $id = $_POST['id'];
    $izena = $_POST['izena'];
    $email = $_POST['email'];
    $mezuaTextua = $_POST['mezua'];
    $erantzunda = isset($_POST['erantzunda']) ? 1 : 0;

    if (strlen($izena) > 0 && strlen($email) > 0 && strlen($mezuaTextua) > 0 && is_numeric($id) && $id > 0) {

        $mezuak = new Mezua();
        $mezuak->setId($id);
        $mezuak->setIzena($izena);
        $mezuak->setEmail($email);
        $mezuak->setMezua($mezuaTextua);
        $mezuak->setErantzunda($erantzunda);
        $mezuak->setSortzeData($sortzeData);

        if (MezuaDB::aldatuMezua($mezuak) > 0) {
            include('mezua_aldatu_da.php');
            exit();
        } else {
            include('mezua_ez_da_aldatu.php');
            exit();
        }
    } else {
        $mezua = "Eremu guztiak bete behar dira";
        include('mezua_aldatu.php');
        exit();
    }
} else {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id_get = $_GET['id'];

        if (is_numeric($id_get) && $id_get > 0) {
            $mezuak = MezuaDB::selectMezua($id_get);

            if ($mezuak) {
                $id = $mezuak->getId();
                $izena = $mezuak->getIzena();
                $email = $mezuak->getEmail();
                $mezuaTextua = $mezuak->getMezua();
                $erantzunda = $mezuak->getErantzunda();

                include('mezua_aldatu.php');
                exit();
            } else {
                include('mezua_id_baliogabea.php');
                exit();
            }
        } else {
            include('mezua_id_baliogabea.php');
            exit();
        }
    } else {
        include('mezua_id_baliogabea.php');
        exit();
    }
}
