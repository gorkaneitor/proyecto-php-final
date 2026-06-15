<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Diskoak</title>
</head>

<body>
    <h1>Diskoen administrazio gunea</h1>
    <p><a href="..">Hasiera</a> &gt; Diskoa ezabatu</p>
    <h2>Ziur zaude disko hau ezabatu nahi duzula?</h2>

    <table cellspacing="5" border="">

        <tbody>
            <tr>
                <th>Titulua</th>
                <td><?php echo htmlspecialchars($titulua ?? ''); ?></td>
            </tr>
            <tr>
                <th>Kanta kopurua</th>
                <td><?php echo htmlspecialchars($diskoa->getKanta_kop()); ?></td>
            </tr>
            <tr>
                <th>Prezioa</th>
                <td><?php echo $diskoa->getPrezioa(); ?> €</td>
            </tr>
            <tr>
                <th>Deskontua</th>
                <td><?php echo htmlspecialchars($diskoa->getDeskontua()); ?></td>
            </tr>
            <tr>
                <th>Nobedadea</th>
                <td><?php echo ($diskoa->getNobedadea() == 1) ? 'Bai' : 'Ez'; ?></td>
            </tr>
        </tbody>
    </table>
    <?php if (!empty($mezua)) {
        echo "<p>" . htmlspecialchars($mezua) . "</p>";
    } ?>
    <form action="index.php" method="post">

        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id_ezabatu); ?>">

        <p>
            <input type="submit" name="ezabatu" value="Bai">

            <a href="..">
                <input type="button" value="Ez">
            </a>
        </p>
    </form>
</body>

</html>