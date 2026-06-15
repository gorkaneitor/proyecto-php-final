<?php

if (!isset($_COOKIE['erabiltzailea']) || $_COOKIE['erabiltzailea'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

echo "<p>" . htmlspecialchars($mezua) . "</p>"; ?>
<table>
    <tbody>
        <tr>
            <th>Izena</th>
            <td><?php echo htmlspecialchars($izena ?? ''); ?></td>
        </tr>
        <tr>
            <th>Deskribapena</th>
            <td><?php echo htmlspecialchars($kategoria_obj->getDeskribapena()); ?></td>
        </tr>
    </tbody>
</table>
<form action="index.php" method="post">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id_ezabatu); ?>">
    <p>
        <input type="submit" name="ezabatu_berretsi" value="Bai">
        <a href="..">
            <input type="button" value="Ez">
        </a>
    </p>
</form>
</body>

</html>