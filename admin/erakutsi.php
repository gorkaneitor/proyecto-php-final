<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Diskoak</title>
</head>

<body>
    <h1>Diskoen administrazio gunea</h1>
    <h2>Diskoak</h2>
    <?php
    for ($i = 0; $i < count($diskoak); $i++) { ?>
        <ul>
            <li>
                <?php echo $diskoak[$i]->getTitulua() ?>
                [<a href="diskoa_aldatu/?id=<?php echo $diskoak[$i]->getId() ?>">Aldatu</a>]
                [<a href="diskoa_ezabatu/?id=<?php echo $diskoak[$i]->getId() ?>">Ezabatu</a>]
            </li>
        </ul>
    <?php } ?>

    <form action="disko_berria/" method="post">
        <p><input type="submit" value="Disko berria"></p>
    </form>
    <hr>
    <h2>Kategoriak</h2>
    <?php
    for ($i = 0; $i < count($kategoriak); $i++) { ?>
        <ul>
            <li>
                <?php echo $kategoriak[$i]->getIzena() ?>
                [<a href="kategoria_aldatu/?id=<?php echo $kategoriak[$i]->getId() ?>">Aldatu</a>]
                [<a href="kategoria_ezabatu/?id=<?php echo $kategoriak[$i]->getId() ?>">Ezabatu</a>]
            </li>
        </ul>
    <?php } ?>

    <form action="kategoria_berria/" method="post">
        <p><input type="submit" value="Kategori berria"></p>
    </form>
    <p><a href="irten.php">Sesiotik irten</a></p>
</body>

</html>