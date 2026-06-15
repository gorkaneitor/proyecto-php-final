<?php
require('../klaseak/com/leartik/daw24gone/diskoak/diskoa.php');
require('../klaseak/com/leartik/daw24gone/diskoak/diskoa_db.php');
require('../klaseak/com/leartik/daw24gone/diskoak/kategoria.php');
require('../klaseak/com/leartik/daw24gone/diskoak/kategoria_db.php');

use com\leartik\daw24gone\diskoak\KategoriaDB;

$kategoriak = KategoriaDB::selectKategoriak();

if (isset($_GET['id'])) {
	if (is_numeric($_GET['id'])) {
		$kategoria = KategoriaDB::selectKategoria(intval($_GET['id']));
		if ($kategoria) {
			include 'katalogoa_kategoria.php';
		} else {
			include 'id_baliogabea.php';
		}
	} else {
		include 'id_baliogabea.php';
	}
} else {
	include 'katalogoa.php';
}

?>