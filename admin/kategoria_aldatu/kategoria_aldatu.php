<?php

if (!isset($_COOKIE['erabiltzailea']) || $_COOKIE['erabiltzailea'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

require_once('../../klaseak/com/leartik/daw24gone/diskoak/diskoa.php');
require_once('../../klaseak/com/leartik/daw24gone/diskoak/diskoa_db.php');
require_once('../../klaseak/com/leartik/daw24gone/diskoak/kategoria.php');
require_once('../../klaseak/com/leartik/daw24gone/diskoak/kategoria_db.php');

use com\leartik\daw24gone\diskoak\KategoriaDB;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Diskoen administrazio gunea</title>
</head>

<body>
    <h1>Diskoen administrazio gunea</h1>
    <p><a href="..">Hasiera</a> &gt; Kategoria aldatu</p>
    <h2>Kategoria aldatu</h2>
    <?php echo htmlspecialchars($mezua) ?>
    <form action="" method="post">

        <input type="hidden" name="id" value="<?php echo $id ?>">
        <p>
            <label for="izena">Izena</label>
            <input type="text" id="izena" name="izena" size="50" maxlength="255" value="<?php echo htmlspecialchars($izena) ?>">
        </p>
        <p>
            <label for="deskribapena">Deskribapena</label>
            <input id="deskribapena" name="deskribapena" size="50" maxlength="255" placeholder="Kategoriaren deskribapena" value="<?php echo htmlspecialchars($deskribapena); ?>">
        </p>
        <p>
            <input type="submit" value="Gorde" name="gorde">
        </p>
    </form>
</body>

</html>