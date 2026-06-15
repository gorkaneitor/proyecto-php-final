<?php

require('../../klaseak/com/leartik/daw24gone/diskoak/kategoria.php');
require('../../klaseak/com/leartik/daw24gone/diskoak/kategoria_db.php');

use com\leartik\daw24gone\diskoak\KategoriaDB;

?>
<html>

<head>
    <meta charset="utf-8">
    <title>Diskoak</title>
</head>

<body>
    <h1>Diskoen administrazio gunea</h1>
    <p><a href="..">Hasiera</a> &gt; Disko berria</p>
    <h2>Disko berria</h2>
    <?php echo htmlspecialchars($mezua) ?></p>
    <form action="index.php" method="post">
        <p>
            <label for="titulua">Titulua</label>
            <input type="text" id="titulua" name="titulua" size="50" maxlength="255" placeholder="Diskoaren titulua" value="<?php echo htmlspecialchars($titulua ?? ''); ?>">
        </p>

        <p>
            <label for="kanta_kop">Kanta kopurua</label>
            <input type="text" id="kanta_kop" name="kanta_kop" size="50" maxlength="255" placeholder="Diskoaren kanta kopurua" value="<?php echo htmlspecialchars($kanta_kop ?? ''); ?>">
        </p>

        <p>
            <label for="prezioa">Prezioa</label>
            <input type="text" id="prezioa" name="prezioa" size="50" maxlength="255" placeholder="Diskoaren prezioa" value="<?php echo htmlspecialchars($prezioa ?? ''); ?>">
        </p>

        <p>
            <label for="deskontua">Deskontua (%)</label>
            <input type="text" id="deskontua" name="deskontua" size="50" maxlength="255" placeholder="Diskoaren deskontua (%)" value="<?php echo htmlspecialchars($deskontua ?? '0'); ?>">
        </p>

        <p>
            <label for="nobedadea">Nobedadea</label>
            <input type="checkbox" id="nobedadea" name="nobedadea" value="0"
                <?php echo (isset($nobedadea) && $nobedadea == 1) ? 'checked' : ''; ?>>
        </p>

        <p>
            <label for="kategoria">Kategoria</label>
            <select id="kategoria" name="kategoria">
                <option value="0">Aukeratu kategori bat</option>

                <?php
                $kategoriak = KategoriaDB::selectKategoriak();

                foreach ($kategoriak as $kategoria) {
                    $id = $kategoria->getId();
                    $kat_izena = $kategoria->getIzena();
                    $selected = (isset($kategoria_aukera) && $id == $kategoria_aukera) ? ' selected' : '';

                    echo "<option value=\"$id\"$selected>" . htmlspecialchars($kat_izena) . "</option>";
                }
                ?>
            </select>
        </p>

        <p>
            <input type="submit" value="Gorde" name="gorde">
        </p>
    </form>
</body>

</html>