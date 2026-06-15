<?php

require('../klaseak/com/leartik/daw24gone/diskoak/diskoa.php');
require('../klaseak/com/leartik/daw24gone/diskoak/diskoa_db.php');
require('../klaseak/com/leartik/daw24gone/diskoak/kategoria.php');
require('../klaseak/com/leartik/daw24gone/diskoak/kategoria_db.php');

use com\leartik\daw24gone\diskoak\DiskoaDB;
use com\leartik\daw24gone\diskoak\KategoriaDB;

$admin = false;

if (isset($_POST['sartu'])) {
    if ($_POST['erabiltzailea'] == 'admin' && $_POST['pasahitza'] == 'admin') {
        $admin = true;
        setcookie("erabiltzailea", "admin", time() + 86400);
    }
} elseif (isset($_COOKIE['erabiltzailea']) && $_COOKIE['erabiltzailea'] == 'admin') {
    $admin = true;
}

if ($admin == true) {
    $kategoriak = KategoriaDB::selectKategoriak();
    $diskoak = DiskoaDB::selectDiskoak();
    include('erakutsi.php');
} else {
    if (isset($_POST['sartu'])) {
        $mezua = "Datuak ez dira zuzenak";
    } else {
        $mezua = "";
    }
    include('login.php');
}
