<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Mezuak</title>
    <script type="text/javascript" src="/erronka01/mezua/api.js"></script>
</head>
<body>
<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DoggyShop - Hasiera</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <div>
            <img id="Logo" src="../img/logoa transparente.png" alt="Logoa">
        </div>
    </header>
    
    <div class="eskuma">
        <nav>
            <ul class="menua">
                <li><a href="index.php">Hasiera</a></li>
                <li><a href="../katalogoa">Katalogoa</a></li>
                <li><a href="../saskia.html">Saskia</a></li>
                <li><a href="../mezua/index.php">Kontaktua</a></li>
                <li><a href="../kontua.html">Kontua</a></li>
            </ul>
        </nav>
    </div>

    <main>
        <div class="row">
            <div class="eskerra">
                <img src="../img/katua nobedadeak.png" class="katua" alt="Katua">
            </div>

            <div class="erdia">
            <h1>Mezuak</h1>
                <p><a href="../hasiera/">Hasiera</a> &gt;</p>
                <h2>Mezu berria</h2>
                <div id="komentarioa">
                        <h2>Saskia</h2>
    <hr>
    
    <?php if (count($saskia->getDetaileak()) > 0) { ?>
        <table cellspacing="5" cellpadding="5" border="1">
            <tr>
                <td>Produktua</td>
                <td>Prezioa</td>
                <td>Kopurua</td>
                <td>Guztira</td>
            </tr>
            
            <?php foreach ($saskia->getDetaileak() as $detailea) { ?>
                <tr valign="top">
                    <td><?php echo $detailea->getArtikulua()->getIzena(); ?></td>
                    <td><?php echo $detailea->getArtikulua()->getPrezioa(); ?> &euro;</td>
                    <td><?php echo $detailea->getKopurua(); ?></td>
                    <td><?php echo number_format($detailea->getGuztira(), 2); ?> &euro;</td>
                </tr>
            <?php } ?>
            
            <tr>
                <td colspan="3" align="right"><strong>GUZTIRA:</strong></td>
                <td><strong><?php echo number_format($saskia->getSaskiaGuztira(), 2); ?> &euro;</strong></td>
            </tr>
        </table>
    <?php } else { ?>
        <p>Saskia hutsik dago</p>
    <?php } ?>
                </div>
            </div>

            <div class="right">
                <img id="portada" src="../img/color-dogs-3274248_640.png" alt="Portada">
                <div class="section1-textua">
                    <h2>Animali batek betirako</h2>
                    <h2>Maitatuko zaitu, zure aukera da berari onena emateko</h2>
                    <p>Txakur batek ez du denbora edo baldintzarik ulertzen.</p>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 DoggyShop.inc</p>
    </footer>
</body>
</html>