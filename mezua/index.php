<?php
require('../klaseak/com/leartik/daw24gone/diskoak/mezua.php');
require('../klaseak/com/leartik/daw24gone/diskoak/mezua_db.php');
use com\leartik\daw24gone\diskoak\Mezua;
use com\leartik\daw24gone\diskoak\MezuaDB;



if (isset($_POST['izena']) && isset($_POST['email']) && isset($_POST['mezua'])) {
    
    $izena = $_POST['izena'];
    $email = $_POST['email'];
    $mezuaTextua = $_POST['mezua'];
    $erantzunda = 0;
    $sortzeData = Date('Y-m-d H:i:s');


    $mezua = new Mezua();
    $mezua->setIzena($izena);
    $mezua->setEmail($email);
    $mezua->setMezua($mezuaTextua);
    $mezua->setErantzunda($erantzunda);
    $mezua->setSortzeData($sortzeData);

    if (MezuaDB::insertMezua($mezua) > 0) {
        
        include('mezua_gorde_da.php');

    } else {

        include('mezua_ez_da_gorde.php');

    }

} else {
    include('mezu_berria.php');
}
?>