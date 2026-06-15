<?php
echo htmlspecialchars($mezua) ?></p>
<form action="" method="post">
    <p>
        <label for="izena">Izena</label>
        <input type="text" id="izena" name="izena" size="50" maxlength="255" placeholder="Kategoriaren izena" value="<?php echo htmlspecialchars($izena); ?>">
    </p>
    <p>
        <label for="deskribapena">Deskribapena</label>
        <input id="deskribapena" name="deskribapena" size="50" maxlength="255" placeholder="Kategoriaren deskribapena" value="<?php echo htmlspecialchars($deskribapena); ?>">
    </p>
    <p>
        <input type="submit" value="Gorde" name="gorde">
    </p>
</form>