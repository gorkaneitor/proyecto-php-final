<?php
// Category view: shows disks from a specific category
require_once '../klaseak/com/leartik/daw24gone/diskoak/kategoria_db.php';
require_once '../klaseak/com/leartik/daw24gone/diskoak/diskoa_db.php';

use com\leartik\daw24gone\diskoak\KategoriaDB;
use com\leartik\daw24gone\diskoak\DiskoaDB;

$kategoria = null;
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $kategoriaId = intval($_GET['id']);
    $kategoria = KategoriaDB::selectKategoria($kategoriaId);
}

if (!$kategoria) {
    echo '<p>Kategoria ez da existitzen.</p>';
    return;
}

$diskoak = DiskoaDB::selectDiskoakByKategoria($kategoria->getId());
if (!$diskoak) $diskoak = array();
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twenty One Pilots - <?php echo $kategoria->getIzena(); ?></title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/katalogoa.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../img/logos/top_logo.png">
</head>

<body>
    <?php include '../header.php'; ?>
    <main>
        <h2><?php echo $kategoria->getIzena(); ?>ak</h2>
        <section class="diskoak">
            <?php for ($i = 0; $i < count($diskoak); $i++) {
                $diskoa = $diskoak[$i];
                $id = $diskoa->getId(); ?>

                <div id="prod<?php echo $id; ?>" class="diskoa">
                    <a href="diskoa_erakutsi.php?id=<?php echo $id; ?>">
                        <img src="../img/covers/<?php echo $id; ?>.jpg" alt="<?php echo $diskoa->getTitulua(); ?>"><br>
                        <p class="titulua"><?php echo $diskoa->getTitulua(); ?></p>
                        <p class="prezioa"><?php echo $diskoa->getPrezioa(); ?> &euro;</p>
                    </a>
                </div>

            <?php } ?>
        </section>
    </main>
    <?php include '../footer.php'; ?>