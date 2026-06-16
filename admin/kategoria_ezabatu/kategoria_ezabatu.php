<?php

if (!isset($_COOKIE['erabiltzailea']) || $_COOKIE['erabiltzailea'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Diskoen administrazio gunea</title>
</head>

<body>
    <h1>Diskoen administrazio gunea</h1>
    <p><a href="..">Hasiera</a> &gt; Kategoria ezabatu</p>
    <h2>Ziur zaude kategori hau ezabatu nahi duzula?</h2>

    <table cellspacing="5" border="">
        <tbody>
            <tr>
                <th>Kategoria</th>
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