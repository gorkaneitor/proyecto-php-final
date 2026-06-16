<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="eu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saskia - Twenty One Pilots</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/saskia.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../img/logos/top_logo.png">
</head>
<body>
    <?php include '../header.php'; ?>

    <main class="saskia-main">
        <section class="saskia-section">
            <h2>Zure Saskia</h2>

            <?php if (isset($_SESSION['mezua'])): ?>
                <div class="status-message">
                    <?php
                    echo htmlspecialchars($_SESSION['mezua']);
                    unset($_SESSION['mezua']);
                    ?>
                </div>
            <?php endif; ?>

            <?php if (count($saskia->getDetaileak()) > 0) { ?>
                <table class="saskia-table">
                    <thead>
                        <tr>
                            <th>Produktua</th>
                            <th>Prezioa</th>
                            <th>Kopurua</th>
                            <th>Guztira</th>
                            <th>Ekintzak</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($saskia->getDetaileak() as $detailea) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($detailea->getArtikulua()->getTitulua()); ?></td>
                                <td>
                                    <?php
                                    $prezioa = $detailea->getArtikulua()->getPrezioa();
                                    $deskontua = $detailea->getArtikulua()->getDeskontua();
                                    if ($deskontua > 0) {
                                        $prezio_finala = $prezioa - ($prezioa * ($deskontua / 100));
                                        echo '<del>' . number_format($prezioa, 2) . '€</del> ';
                                        echo '<strong>' . number_format($prezio_finala, 2) . '€</strong>';
                                    } else {
                                        echo '<strong>' . number_format($prezioa, 2) . '€</strong>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <div class="quantity-controls">
                                        <?php echo htmlspecialchars((string)$detailea->getKopurua()); ?>
                                        <form action="index.php" method="post" style="display:inline;">
                                            <input type="hidden" name="id" value="<?php echo htmlspecialchars((string)$detailea->getArtikulua()->getId()); ?>">
                                            <button type="submit" name="kendubat">-</button>
                                        </form>
                                        <form action="index.php" method="post" style="display:inline;">
                                            <input type="hidden" name="id" value="<?php echo htmlspecialchars((string)$detailea->getArtikulua()->getId()); ?>">
                                            <button type="submit" name="gehitubat">+</button>
                                        </form>
                                    </div>
                                </td>
                                <td><?php echo number_format($detailea->getGuztira(), 2); ?> &euro;</td>
                                <td>
                                    <form action="index.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo htmlspecialchars((string)$detailea->getArtikulua()->getId()); ?>">
                                        <button type="submit" name="ezabatu" class="action-button-remove">X</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr class="saskia-total-row">
                            <td colspan="3">GUZTIRA:</td>
                            <td><?php echo number_format($saskia->getSaskiaGuztira(), 2); ?> &euro;</td>
                            <td>
                                <form action="index.php" method="post">
                                    <button type="submit" name="ezabatudena" class="action-button-clear">Hustu</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="cart-actions">
                    <form action="../eskaria/index.php" method="post">
                        <button type="submit" name="eskaria" class="btn-order">ESKARIA EGIN</button>
                    </form>
                </div>

            <?php } else { ?>
                <div class="empty-cart">
                    <p>Saskia hutsik dago.</p>
                    <a href="../katalogoa/">Itzuli katalogora produktuak gehitzeko.</a>
                </div>
            <?php } ?>
        </section>
    </main>

    <?php include '../footer.php'; ?>
</body>

</html>