<?php
require_once '../klaseak/com/leartik/daw24gone/diskoak/diskoa.php';
require_once '../klaseak/com/leartik/daw24gone/diskoak/diskoa_db.php';
require_once '../klaseak/com/leartik/daw24gone/diskoak/kategoria.php';
require_once '../klaseak/com/leartik/daw24gone/diskoak/kategoria_db.php';

use com\leartik\daw24gone\diskoak\DiskoaDB;
use com\leartik\daw24gone\diskoak\KategoriaDB;

$page = 'disko';

$diskoa = null;
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $diskoa = DiskoaDB::selectDiskoa(intval($_GET['id']));
}

$kategoriaIzena = '';
if (isset($diskoa) && $diskoa) {
    $kat = KategoriaDB::selectKategoria($diskoa->getId_kategoria());
    if ($kat) {
        $kategoriaIzena = $kat->getIzena();
    } else {
        $kategoriaIzena = $diskoa->getId_kategoria();
    }
}
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twenty One Pilots<?php if ($diskoa) {
                                echo ' - ' . $diskoa->getTitulua();
                            } ?></title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/diskoa.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../img/logos/top_logo.png">
</head>

<body>
    <?php include '../header.php'; ?>
    <main>
        <?php if ($diskoa) { ?>
            <section>
                <div id="irudia">
                    <img src="../img/covers/<?php echo $diskoa->getId(); ?>.jpg" alt="Twenty One Pilots - <?php echo $diskoa->getTitulua(); ?>">
                    <br>
                </div>
                <div id="deskripzioa">
                    <h1><?php echo $diskoa->getTitulua(); ?></h1>
                    <p><strong>Kategoria:</strong> <?php echo $kategoriaIzena; ?></p>
                    <p><strong>Kanta kopurua:</strong> <?php echo $diskoa->getKanta_kop(); ?></p>
                    <p><strong>Prezioa:</strong> <?php
                                                    $prezioa = $diskoa->getPrezioa();
                                                    $deskontua = $diskoa->getDeskontua();

                                                    if ($deskontua > 0) {
                                                        $prezio_finala = $prezioa - ($prezioa * ($deskontua / 100));
                                                        echo "<del>" . number_format($prezioa, 2) . "€</del> ";
                                                        echo "<strong>" . number_format($prezio_finala, 2) . "€</strong>";
                                                    } else {
                                                        echo "<strong>" . number_format($prezioa, 2) . "€</strong>";
                                                    }
                                                    ?></p>
                    <form action="../saskia/index.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $diskoa->getId(); ?>">
                        <input type="hidden" name="kopurua" value="1">
                        <button type="submit" name="gehitu">Saskira gehitu</button>
                    </form>
                </div>
            </section>
        <?php } ?>
    </main>
    <?php include '../footer.php'; ?>