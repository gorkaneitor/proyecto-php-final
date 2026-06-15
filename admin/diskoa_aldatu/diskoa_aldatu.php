<?php

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
    <title>Diskoak</title>
</head>

<body>
    <h1>Diskoen administrazio gunea</h1>
    <p><a href="..">Hasiera</a> &gt; Diskoa aldatu</p>
    <h2>Diskoa aldatu</h2>
    <?php echo htmlspecialchars($mezua) ?></p>
    <form action="" method="post">

        <input type="hidden" name="id" value="<?php echo $id ?>">
        <p>
            <label for="titulua">Titulua</label>
            <input type="text" id="titulua" name="titulua" size="50" maxlength="255" placeholder="Diskoaren titulua" value="<?php echo $titulua ?>">
        </p>
        <p>
            <label for="kanta_kop">Kanta kopurua</label>
            <input type="text" id="kanta_kop" name="kanta_kop" size="50" maxlength="255" placeholder="Diskoaren kanta kopurua" value="<?php echo htmlspecialchars($kanta_kop); ?>">
        </p>
        <p>
            <label for="prezioa">Prezioa</label>
            <input type="text" id="prezioa" name="prezioa" size="50" maxlength="255" placeholder="Diskoaren prezioa" value="<?php echo htmlspecialchars($prezioa); ?>">
        </p>
        <p>
            <label for="deskontua">Deskontua (%)</label>
            <input type="text" id="deskontua" name="deskontua" size="50" maxlength="255" placeholder="Diskoaren deskontua" value="<?php echo htmlspecialchars($deskontua); ?>">
        </p>
        <p>
            <label for="nobedadea">Nobedadea</label>
            <input type="checkbox" id="nobedadea" name="nobedadea" value="1"
                <?php echo (isset($nobedadea) && $nobedadea == 1) ? 'checked' : ''; ?>>
        </p>
        <p>
            <label for="kategoria">Kategoriak</label>
            <select id="kategoria" name="kategoria">
                <option value="kategoria">Kategoria</option>

                <?php
                $kategoriak = KategoriaDB::selectKategoriak();

                foreach ($kategoriak as $kategoria) {
                    $id = $kategoria->getId();
                    $izena = $kategoria->getIzena();
                    //aukeratute bestelaik utzik bixaldu
                    if ($id == $kategoria_aukera) {
                        $selected = 'selected';
                    } else {
                        $selected = '';
                    }
                    // option etiketi generateko ixenak
                    echo "<option value=\"$id\"$selected>" . htmlspecialchars($izena) . "</option>";
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