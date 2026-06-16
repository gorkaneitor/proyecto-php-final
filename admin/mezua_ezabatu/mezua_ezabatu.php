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
    <p><a href="..">Hasiera</a> &gt; Mezua ezabatu</p>
    <h2>Ziur zaude mezu hau ezabatu nahi duzula?</h2>

    <table cellspacing="5" border="">
        <tbody>
            <tr>
                <th>Izena</th>
                <td><?php echo htmlspecialchars($izena ?? ''); ?></td>
            </tr>
            <tr>
                <th>Email-a</th>
                <td><?php echo htmlspecialchars($mezua_obj->getEmail()); ?></td>
            </tr>
            <tr>
                <th>Mezua</th>
                <td><?php echo htmlspecialchars($mezua_obj->getMezua()); ?></td>
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