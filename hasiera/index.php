<?php

require('../klaseak/com/leartik/daw24gone/diskoak/diskoa.php');
require('../klaseak/com/leartik/daw24gone/diskoak/diskoa_db.php');
require('../klaseak/com/leartik/daw24gone/diskoak/kategoria.php');
require('../klaseak/com/leartik/daw24gone/diskoak/kategoria_db.php');

use com\leartik\daw24gone\diskoak\DiskoaDB;

$nobedadeak = DiskoaDB::selectNobedadeak();
$deskontuak = DiskoaDB::selectDeskontuak();
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twenty One Pilots</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../img/logos/top_logo.png">
</head>

<body>
    <?php include '../header.php'; ?>
    <main class="row">
        <div class="col-3 col-s-3 menu">
            <ul>
                <li>Nobedadeak</li>
                <?php
                for ($i = 0; $i < count($nobedadeak); $i++) { ?>
                    <li><a href="../katalogoa/diskoa_erakutsi.php?id=<?php echo $nobedadeak[$i]->getId() ?>"><img src="../img/covers/<?php echo $nobedadeak[$i]->getId() ?>.jpg" alt="<?php echo $nobedadeak[$i]->getTitulua() ?>"></a>
                        <p><?php echo $nobedadeak[$i]->getTitulua() ?></p>
                    </li>
                <?php  } ?>
            </ul>
        </div>

        <div class="col-6 col-s-9">
            <h1>Eskaintzak</h1>
            <?php
            for ($i = 0; $i < count($deskontuak); $i++) { ?>
                <a href="../katalogoa/diskoa_erakutsi.php?id=<?php echo $deskontuak[$i]->getId() ?>"><img src="../img/covers/<?php echo $deskontuak[$i]->getId() ?>.jpg" alt="<?php echo $deskontuak[$i]->getTitulua() ?>"></a>
                <p><?php echo $deskontuak[$i]->getTitulua() ?></p>
                <br>
            <?php  } ?>
        </div>

        <div class="col-3 col-s-12">
            <aside>
                <h2>Nortzuk dira?</h2>
                <p>Tyler Joseph abeslariak eta Josh Dun bateristak osatzen duten duo estatubatuarra da.</p>
                <h2>Musika mota</h2>
                <p>Twenty One Pilots hip-hop eta rock talde bat da.</p>
                <h2>Diskoak</h2>
                <p>Beraien album, EP eta single ezberdinak eros ditzakezue.</p>
            </aside>
        </div>

    </main>
    <?php include '../footer.php'; ?>