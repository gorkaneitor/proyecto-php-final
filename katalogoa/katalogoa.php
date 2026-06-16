<?php
// Full catalog grouped by category. Self-contained: loads categories and disks.
require_once '../klaseak/com/leartik/daw24gone/diskoak/kategoria_db.php';
require_once '../klaseak/com/leartik/daw24gone/diskoak/diskoa_db.php';

use com\leartik\daw24gone\diskoak\KategoriaDB;
use com\leartik\daw24gone\diskoak\DiskoaDB;

$kategoriak = KategoriaDB::selectKategoriak();
if (!$kategoriak) $kategoriak = array();
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twenty One Pilots</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/katalogoa.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../img/logos/top_logo.png">
</head>

<body>
    <?php include '../header.php'; ?>
    <main>
        <?php for ($k = 0; $k < count($kategoriak); $k++) {
            $kategoria = $kategoriak[$k];
            $diskoak = DiskoaDB::selectDiskoakByKategoria($kategoria->getId());
            if (!$diskoak) $diskoak = array();
        ?>

            <h2><a class="kategoria" href="index.php?id=<?php echo $kategoria->getId(); ?>"><?php echo $kategoria->getIzena(); ?>ak</a></h2>
            <section class="diskoak">
                <?php for ($i = 0; $i < count($diskoak); $i++) {
                    $diskoa = $diskoak[$i];
                    $id = $diskoa->getId(); ?>

                    <div id="prod<?php echo $id; ?>" class="diskoa">
                        <a href="diskoa_erakutsi.php?id=<?php echo $id; ?>">
                            <img src="../img/covers/<?php echo $id; ?>.jpg" alt="<?php echo $diskoa->getTitulua(); ?>"><br>
                            <p class="titulua"><?php echo $diskoa->getTitulua(); ?></p>
                            <p class="prezioa">
                                <?php $prezioa = $diskoa->getPrezioa(); $deskontua = $diskoa->getDeskontua();
                                if ($deskontua > 0) {
                                    $prezio_finala = $prezioa - ($prezioa * ($deskontua / 100));
                                    echo '<del>' . number_format($prezioa, 2) . '€</del> ';
                                    echo '<strong>' . number_format($prezio_finala, 2) . '€</strong>';
                                } else {
                                    echo '<strong>' . number_format($prezioa, 2) . '€</strong>';
                                }
                                ?>
                            </p>
                        </a>
                    </div>
                <?php } ?>
            </section>

        <?php } ?>
    </main>
    <?php include '../footer.php'; ?>